<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="css/conferences.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="container_index">
  <?php include('header.php');?>
    <div class="page5">
        <img src="image/acc1.jpg" class="img-responsive" style="height:100%;width:100%;">
    </div>
  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script type="text/javascript">
        $(function(){
            $('.recherche_icon').click(function(){
                $('.recherche').toggle();
            })
        });
        $(function(){
            $('.trais').click(function(){
                $('.panier').toggle();
            })
        });
        $(function(){
            $('.menu_focus').click(function(){
                $('.menu1').toggle();
            })
        });
        $(function(){
            $('.identification').click(function(){
                $('.connexion').fadeIn(300);
            });
        });
        $(function(){
            $('.exit').click(function(){
                $('.connexion').fadeOut(300);
            });
        });
    </script>
</body>
</html>