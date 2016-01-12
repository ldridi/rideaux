var conference = {
    show: false,
    modal_open: false,
    loop: null,
    mouseX: 0,
    mouseY: 0,
    xp: 0,
    yp: 0,
    el: {
        clocks: $('.clock'),
        menu: $('.menu'),
        html: $('html'),
        boxes: $('.list-item .box'),
        block_info: $('.block-info'),
        block_modal: $('.block-modal'),
        button_close: $('#bt-close'),
    },
    init: function() {

        conference.addMobileMenuHandler();

        /* NAV ANCLAS */

        $('.nav-scroll').click(function() {
            var anchor = $(this).data('idpage');
            $('html, body').stop().animate({
                scrollTop: $('#' + anchor).offset().top
            }, 1000);

        });

        /* LIST-ITEM */

        conference.el.html.click(function() {
            conference.el.boxes.removeClass('open');
        });

        $('.list-item figure').click(function(e) {
            e.stopPropagation();
            conference.el.boxes.removeClass('open');
            $(this).parents('.box').addClass('open');
        });

        conference.addPopup();

        /* CLOCKS  */

        conference.showClocks();

        /* CURSOR FOLLOW - HOVER BOX */

        setTimeout(function() {
            conference.el.boxes.each(function() {
                var conWidth = $(this).width();
                var conHeight = $(this).height();
                var mouseX = (conWidth / 2) - 20,
                    mouseY = 125,
                    limitX = conWidth - 40,
                    limitY = conHeight - 80;
                $(".hover", this).mousemove(function(e) {
                    var offset = $(this).offset();
                    mouseX = Math.min(e.pageX - offset.left - 20, limitX);
                    mouseY = Math.min(e.pageY - offset.top - 20, limitY);
                    if (mouseX < 0) mouseX = 0;
                    if (mouseY < 0) mouseY = 0;
                });
                var follower = $(".hover-close", this);
                var xp = 0,
                    yp = 0;
                var loop = setInterval(function() {
                    xp += (mouseX - xp) / 6;
                    yp += (mouseY - yp) / 6;
                    follower.css({
                        left: xp,
                        top: yp
                    });
                }, 30);
            });
        }, 600);

        /* PARALLAX */

        if ("ontouchstart" in window) {
            document.documentElement.className = document.documentElement.className + " touch";
        }
        if (!conference.el.html.hasClass("touch")) {
            $(".parallax").css("background-attachment", "fixed");
        }

        function fullscreenFix() {
            var h = $('body').height();
            $(".content-b").each(function(i) {
                if ($(this).innerHeight() <= h) {
                    $(this).closest(".fullscreen").addClass("not-overflow");
                }
            });
        }
        $(window).resize(fullscreenFix);
        fullscreenFix();

        function backgroundResize() {
            var windowH = $(window).height();
            $(".parallax").each(function(i) {
                var path = $(this);
                var contW = path.width();
                var contH = path.height();
                var imgW = path.attr("data-img-width");
                var imgH = path.attr("data-img-height");
                var ratio = imgW / imgH;
                var diff = parseFloat(path.attr("data-diff"));
                diff = diff ? diff : 0;
                var remainingH = 0;
                if (path.hasClass("parallax") && !conference.el.html.hasClass("touch")) {
                    var maxH = contH > windowH ? contH : windowH;
                    remainingH = windowH - contH;
                }
                imgH = contH + remainingH + diff;
                imgW = imgH * ratio;
                if (contW > imgW) {
                    imgW = contW;
                    imgH = imgW / ratio;
                }
                path.data("resized-imgW", imgW);
                path.data("resized-imgH", imgH);
                path.css("background-size", imgW + "px " + imgH + "px");
            });
        }
        $(window).resize(backgroundResize);
        $(window).focus(backgroundResize);
        backgroundResize();

        function parallaxPosition(e) {
            var heightWindow = $(window).height();
            var topWindow = $(window).scrollTop();
            var bottomWindow = topWindow + heightWindow;
            var currentWindow = (topWindow + bottomWindow) / 2;
            $(".parallax").each(function(i) {
                var path = $(this);
                var height = path.height();
                var top = path.offset().top;
                var bottom = top + height;
                if (bottomWindow > top && topWindow < bottom) {
                    var imgW = path.data("resized-imgW");
                    var imgH = path.data("resized-imgH");
                    var min = 0;
                    var max = -imgH + heightWindow;
                    var overflowH = height < heightWindow ? imgH - height : imgH - heightWindow;
                    top = top - overflowH;
                    bottom = bottom + overflowH;
                    var value = min + (max - min) * (currentWindow - top) / (bottom - top);
                    var orizontalPosition = path.attr("data-oriz-pos");
                    orizontalPosition = orizontalPosition ? orizontalPosition : "50%";
                    $(this).css("background-position", orizontalPosition + " " + value + "px");
                    // Parallax-text
                    var text_top = -(topWindow / 2) + 'px';
                    var text_opacity = 1 - (topWindow / 300);
                    $('.parallax-text').css({
                        'top': text_top,
                        'opacity': text_opacity
                    });
                }
            });
        }
        if (!conference.el.html.hasClass("touch")) {
            $(window).resize(parallaxPosition);
            $(window).scroll(parallaxPosition);
            parallaxPosition();
        }
    },
    addMobileMenuHandler: function () {
        $('.bt-mobile').click(function() {
            $(this).removeClass('play');
            if (conference.el.menu.hasClass('open')) {
                $(this).removeClass('close');
                conference.el.menu.removeClass('open');
            } else {
                $(this).addClass('close');
                conference.el.menu.addClass('open');
            }
        });
        $('.bt-mobile').hover(
            function() {
                if(!$(this).hasClass('close')){
                    $(this).addClass('play');
                }
            }, function() {
                setTimeout("$(this).removeClass('play')", 500);
            }
        );
    },
    showWeather: function() {
        $('.weather').each(function(){
            var $this = $(this);
            var unit = $('<i></i>').text('°' + $this.data('unit').toUpperCase());
            $.simpleWeather({
                location: $this.data('location'),
                woeid: '',
                unit: $this.data('unit'),
                success: function(weather) {
                    $this.text(weather.temp).append(unit);
                },
                error: function(error) {
                    $this.text('?°').append(unit);
                }
            });
        });
    },
    showClocks: function() {
        conference.el.clocks.each(function() {

            var clock = $(this);
            var date = new Date(clock.data('date'));

            var deg_s = date.getSeconds() / 60 * 360;
            var deg_m = date.getMinutes() / 60 * 360 + date.getSeconds() / 60 * 6;
            var deg_h = date.getHours() / 12 * 360 + date.getMinutes() / 60 * 30;

            var anim_deg_s = deg_s + 360;
            var anim_deg_m = deg_m + 360;
            var anim_deg_h = deg_h + 360;

            $('.seconds', clock).attr("style", "-webkit-transform:rotate(" + deg_s + "deg); transform:rotate(" + deg_s + "deg);");
            $('.minutes', clock).attr("style", "-webkit-transform:rotate(" + deg_m + "deg); transform:rotate(" + deg_m + "deg);");
            $('.hours', clock).attr("style", "-webkit-transform:rotate(" + deg_h + "deg); transform:rotate(" + deg_h + "deg);");

            $('<style>@-webkit-keyframes Tickseconds{to { -webkit-transform: rotate(' + anim_deg_s + 'deg); }} @-moz-keyframes Tickseconds{to { -moz-transform: rotate(' + anim_deg_s + 'deg); }} @-webkit-keyframes Tickminutes{to { -webkit-transform: rotate(' + anim_deg_h + 'deg); }} @-moz-keyframes Tickminutes{to { -moz-transform: rotate(' + anim_deg_h + 'deg); }} @-webkit-keyframes Tickhours{to { -webkit-transform: rotate(' + anim_deg_h + 'deg); }} @-moz-keyframes Tickhours{to { -moz-transform: rotate(' + anim_deg_h + 'deg); }}</style>').appendTo("body");

            clock.addClass('initialised');

        });
    },
    addPopup: function() {
        /* POPUP SHARES */

        $('.popup').popupWindow();
    },
    addLightBoxes: function(paramPage) {
        $('.open-lightbox').click(function() {
            var element = $('#' + $(this).data('id'));
            element.fadeIn('normal');
            $('.block-info', element).addClass('open');
            conference.showBtClose();
        });
    },
    showBtClose: function() {
        conference.addBodyHandler();

        conference.el.button_close.click(function() {
            conference.modal_open = false;
            $(this).fadeOut();
            $('.block-info').removeClass('open');
            $('.block-modal').removeClass('active');
            $('.block-lightbox').fadeOut('normal');
            $('.select-destination').removeClass('hide');
            frames.top.$.fancybox.close(true);
            clearInterval(conference.loop);
        });

        var xp = 0, yp = 0;
        conference.loop = setInterval(function(){
            if (conference.show && conference.modal_open && !conference.el.button_close.is(':visible')) {
                conference.el.button_close.fadeIn();
            }

            if ((!conference.show || !conference.modal_open) && conference.el.button_close.is(':visible')) {
                conference.el.button_close.fadeOut();
            }

            xp += (conference.mouseX - xp) / 6;
            yp += (conference.mouseY - yp) / 6;
            conference.el.button_close.css({left:xp, top:yp});
        }, 30);
    },
    addBodyHandler: function() {
        conference.modal_open = true;
        var conWidth = $(window).width();
        var conHeight = $(window).height();
        var limitX = conWidth - 60, limitY = conHeight - 60;
        $('body').mousemove(function(e){
            var offset = $(this).offset();
            conference.mouseX = Math.min(e.clientX - offset.left - 30, limitX);
            conference.mouseY = Math.min(e.clientY - offset.top - 30, limitY);
            if (conference.mouseX < 0) conference.mouseX = 0;
            if (conference.mouseY < 0) conference.mouseY = 0;

            var hasToShow = true;

            $('.not_hover').each(function(){
                var $this = $(this);

                var theoff = $this.offset();
                var thewidth = $this.outerWidth();
                var theheight =  $this.outerHeight();
                var x = e.clientX, y = e.clientY;

                hasToShow = hasToShow && !((x > theoff.left && x < (thewidth + theoff.left) && y > theoff.top && y < (theheight + theoff.top)))
            });

            conference.show = hasToShow;
        });
    },
    addSideBoxes: function(paramPage) {
        conference.el.block_modal.click(function() {
            $(this).addClass('active');
            $('#' + $(this).data('open')).addClass('open');
            $('.block-info').removeClass('close');
            $('.select-destination').addClass('hide');
            conference.showBtClose();
        });
    },
    addFormSubscriber: function () {
        $('.form_subscriber').submit(function(e){
            e.preventDefault();
            var $this = $(this);

            $.ajax({
                url: $this.attr('action'),
                type: "POST",
                dataType: 'json',
                data: $this.serialize(),
                statusCode: {
                    200: function (data) {
                        var parentTxt = $this.closest('.txt');
                        parentTxt.removeClass('active');
                        parentTxt.siblings('.txt').removeClass('active');
                        parentTxt.siblings('.txt-msg').addClass('active');
                    },
                    400: function (data) {
                        var $message = $this.closest('.txt').siblings('.txt-error');
                        $message.empty();
                        $message.addClass('active');
                        var errors = JSON.parse(data.responseText);
                        var $list = $('<ul></li>');
                        for (var i = 0; i < errors.length; i++) {
                            $list.append('<li></li>').text(errors[i]);
                        };

                        $message.append($list);
                    }
                }
            });

        });
    }
};