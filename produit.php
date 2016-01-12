<?php require_once('config.php');?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="css/conferences1.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="container_index1">
    <?php include('header.php');?>
    <div class="page6">
        <div class="sous_page6">
            RIDEAUX / CHAMBRE PARENTALE
        </div>
        
        <div class="contenu_produit">
            <?php
            if(isset($_GET['id'])){
              $req= mysql_query("select * from produit where categorie_produit = '$_GET[id]'");
            while($row=mysql_fetch_array($req)){
            ?>
              <div class="sous_page7">
                  <div class="thumbnail">
                    <div class="caption">
                        <a href="details.php?id_p=<?php echo $row['id_produit'];?>"><img src="image/bt.png" class="img-responsive center-block" width="300" style="margin-top:40%;"></a>
                    </div>
                    <img src="produit/<?php echo $row['image_produit'];?>" class="image_produit">
                  </div>
              </div>
            <?php
            }
          
            }
            ?>
            
        </div>
      </div>

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