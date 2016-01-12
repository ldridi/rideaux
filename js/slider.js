var slider = {
    scrolling: false,
    curPage: 1,
    timertransition: 5000,
    timer: null,
    el: {
        left: $(".block-half.block-left"),
        right: $(".block-half.block-right"),
        blocks: $(".block-half")
    },
    init: function() {
        if($(window).width() > 680){
            slider.autoplayClear();
            slider.initHandlers();
        }
    },
    initHandlers: function() {
        $(document).on("click", ".page-dots li", function() {
            if (slider.isScrolling()) {
                return;
            }

            var page = parseInt($(this).attr("data-page"), 10);
            slider.goToPage(page);
        });

        $(document).on("mousewheel DOMMouseScroll", function(e) {
            if (slider.isScrolling()) {
                return;
            }

            if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
                slider.navigateUp();
            } else {
                slider.navigateDown();
            }
        });

        $(document).on("keydown", function(e) {
            if (slider.isScrolling()) {
                return;
            }

            if (e.which === 38) {
                slider.navigateUp();
            } else if (e.which === 40) {
                slider.navigateDown();
            }
        });
    },
    autoplay: function() {
        slider.nextPage();
    },
    autoplayClear: function() {
        clearInterval(slider.timer);
        slider.timer = setInterval(function() {
            slider.autoplay();
        }, slider.timertransition);
    },
    isLastPage: function() {
        return slider.curPage >= slider.getLastPage();
    },
    getLastPage: function() {
        return new Number(slider.el.blocks.length / 2);
    },
    isFirstPage: function() {
        return slider.curPage == 1;
    },
    navigateUp: function() {
        slider.previousPage();
    },
    navigateDown: function() {
        slider.nextPage();
    },
    nextPage: function () {
        var nextPage = slider.isLastPage() ? 1 : slider.curPage + 1;

        slider.goToPage(nextPage);
    },
    previousPage: function () {
        var previousPage = slider.isFirstPage() ? slider.getLastPage() : slider.curPage - 1;

        slider.goToPage(previousPage);
    },
    isScrolling: function() {
        return true == slider.scrolling;
    },
    goToPage: function (page) {
        $(".page-dots li").removeClass("active");
        slider.el.blocks.removeClass("active");
        $(".page-dots li[data-page=" + page + "]").addClass("active");
        $(".block-half[data-page=" + page + "]").addClass("active");

        slider.curPage = page;

        slider.autoplayClear();
        slider.doMargins();
    },
    doMargins: function() {
        slider.scrolling = true;

        slider.el.left.each(function() {
            var marginMult = parseInt($(this).attr("data-helper"), 10) + slider.curPage - 1;
            $(this).attr("style", "margin-top: " + marginMult * 100 + "vh");
        });

        slider.el.right.each(function() {
            var marginMult = parseInt($(this).attr("data-helper"), 10) - slider.curPage + 1;
            $(this).attr("style", "margin-top: " + marginMult * 100 + "vh");
        });

        setTimeout(function() {
            slider.scrolling = false;
        }, 1000);
    }
};