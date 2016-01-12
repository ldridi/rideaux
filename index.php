<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/conferences.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container_index">
		<div class="page1">
			<img src="image/acc.jpg" class="image_index" width="600" style="margin-top:90px;">
		</div>
		<div class="page2" style="display:none;">
			<div class="wrapper">

                  <div class="block-half block-left block-1 active" data-helper="0" data-page="1">
                      <div class="box-photo" style="background-image: url(img_slide/1.jpg);"></div>
                  </div>
                  <div class="block-half block-right block-1 active" data-helper="0" data-page="1">
                      <div class="box-photo" style="background-image: url(img_slide/2.jpg);"></div>
                  </div>

                  <div class="block-half block-left block-2" data-helper="-1" data-page="2">
                      <div class="box-photo" style="background-image: url(img_slide/3.jpg);"></div>
                  </div>
                  <div class="block-half block-right block-2" data-helper="1" data-page="2">
                      <div class="box-photo" style="background-image: url(img_slide/4.jpg);"></div>
                  </div>

                  <div class="block-half block-left block-3" data-helper="-2" data-page="3">
                      <div class="box-photo" style="background-image: url(img_slide/5.jpg);"></div>
                  </div>
                  <div class="block-half block-right block-3" data-helper="2" data-page="3">
                      <div class="box-photo" style="background-image: url(img_slide/6.jpg);"></div>
                  </div>

                  

                  
                  <div class="block-titles block-right block-modal open" data-open="info-left">
                      <div class="box-info">
                          <div class="content">
                              <div class="wr">
                                  <div class="row-1">
                                      <h1 class="head-title">Rideaux</h1>
                                  </div>
                                  <div class="info">
                                      
                                      <p class="row-3"><strong class="x-bold">Les rideux ideaux chez vous</strong></p>
                                      <p class="row-4">
                                        <a href="acceuil.php"><button class="bnt btn-default btn-md">Découvrir</button></a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  

                  <div class="pagination">
                      <ul class="page-dots">
                          <li class="active" data-page="1"></li>
                          <li data-page="2"></li>
                          <li data-page="3"></li>
                      </ul>
                  </div>

              </div>
		</div>
	</div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">
        $(function(){
          $('.page1').fadeOut(5000);
          $('.page2').fadeIn(7000);          
        })
    </script>
    <script src="js/conference.js"></script>
    <script src="js/slider.js"></script>
    <script>
    $(document).ready(function() {
        slider.init();
    });

    </script>
</body>
</html>