<?php require_once('config.php');

?>
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
    <div class="page66">
        <div class="sous_page6">
            RIDEAUX / CHAMBRE PARENTALE
        </div>
        <?php
          $req=mysql_query("select * from produit where id_produit = '$_GET[id_p]'");
          while($row=mysql_fetch_array($req)){


        ?>
        <div class="contenu_produit">
            
              <div class="sous_page77">
                                      <img src="produit/<?php echo $row['image_produit'];?>" class="image_produit_desc">
                  
              </div>
              <div class="sous_page88">
                  <?php
          if(isset($_POST) and isset($_POST['panier'])){
            $quantite = mysql_real_escape_string(htmlentities(htmlspecialchars($_POST['quantite'])));
            $size = mysql_real_escape_string(htmlentities(htmlspecialchars($_POST['size'])));
            $client = $_SESSION['id'];
            $produit = $_GET['id_p'];
            $req = mysql_query("insert into panier 
                                            values ('','$client','$produit','$quantite','$size')");
            if($req){
            ?>
              <center><b style="color:green;">insertion ok</b></center> 
            <?php
            }

          }
        ?>
                  <form action="" method="post">
                      
                      <table style="margin-top:-10px;">
                          <tr>
                              <td style="height:30px;">
                                  <b style="font-size:18px;"><?php echo $row['nom_produit'];?> </b>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <font style="color:silver;font-size:18px;"><?php echo $row['reference_produit'];?></font>
                              </td>
                          </tr>
                          <tr>
                              <td style="height:90px;">
                                  <label><b style="font-size:18px;">Quantite ( <?php echo $row['quantite_produit'];?> )</b></label><br>
                                  <select name="quantite" style="color:black;height:30px;width:50px;border:2px solid grey;margin-top:20px;">

                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                  </select>
                              </td>
                          </tr>
                          <tr>
                              <td style="height:90px;">
                                  <label><b style="font-size:18px;">Hauteur & largeur</b></label><br>
                                  <select name="size" style="color:black;height:30px;width:200px;border:2px solid grey;margin-top:20px;">

                                    <option>Hauteur & largeur</option>
                                    <option value="135*220">135*220</option>
                                    <option value="175*300">175*300</option>
                                    <option value="250*420">250*420</option>
                                   
                                  </select>
                              </td>
                          </tr>
                          <tr>
                              <td style="height:70px;">
                                 <input name="panier" type="submit" value="ajouter"style="border:2px solid grey;height:30px;width:100px;background:transparent;color:black;">
                              </td>
                          </tr>
                          <tr>
                              <td style="height:250px;">
                                  Description: 
                                  <hr style="width:400px;text-align:left;">
                                  <p style="line-height:30px;">
                                  <?php echo $row['description_produit'];?>
                                  </p>
                              </td>
                          </tr>
                      </table>
                  </form>
              </div>
            
        </div>
        <?php
      }
      ?>
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