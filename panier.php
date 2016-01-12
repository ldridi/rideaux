<?php require_once('config.php');?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="css/conferences1.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body bgcolor="#F4FDFA">
  <div class="container_index1">
    <?php include('header.php');?>
    <div class="page6666">
        <center><h2 style="color:black;line-height:30px;">Mon Panier</h2></center>
        <?php
        if(isset($_POST) and isset($_POST['commande'])){
            $choix = $_POST['choix'];
            foreach ($choix as $value) {
              $req_commande=mysql_query("insert into commande values('','$value')");
              
            }
              
            
            
        }
        ?>
          
        
        <table border="0" width="30%" style="margin-left:3%;color:white;">
          <tr>
              <th style="color:black;border-bottom:2px solid silver;">
                  total :
              </th>
              <th style="color:black;border-bottom:2px solid silver;">
                  <?php
                             $req_total=mysql_query("select sum(prix_produit) as total from panier, produit where (id_client = '$_SESSION[id]') and (panier.id_produit = produit.id_produit)");
                            $nbr_total = mysql_num_rows($req_total);
                            while($row_total = mysql_fetch_array($req_total)){
                                if($row_total['total'] != 0){
                                  echo "<font color='red'><b>".$row_total['total']." Dt</b></font>";
                                }else{
                                  echo "<font color='red'><b>0 Dt</b></font>";
                                }
                            }
                          ?>
              </th>
              
          </tr>
        </table>
        <form action="" method="post">
        <table   width="90%" style="margin-left:3%;color:white;">
          <tr>
              <th style="color:black;">
                  Choisir :
              </th>
              <th style="color:black;">
                  Image :
              </th>
              <th style="color:black;">
                  Nom :
              </th>
              <th style="color:black;">
                  Description :
              </th>
              <th style="color:black;">
                  prix :
              </th>
              <th style="color:black;">
                  Quantite :
              </th>
              <th style="color:black;">
                  size :
              </th>
              <th style="color:black;">
                  Operation :
              </th>
          </tr>
          <?php
          $req=mysql_query("select * from panier,produit where (panier.id_produit = produit.id_produit) and (panier.id_client = '$_SESSION[id]')");
            while($row = mysql_fetch_array($req)){
            ?>
                <tr>
                <th style="color:black;padding:20px;border-bottom:2px solid silver;">
                  <input type="checkbox" name="choix[]" value="<?php echo $row['id_panier'];?>">
              </th>
              <th style="color:black;padding:20px;border-bottom:2px solid silver;">
                  <img src="produit/<?php echo $row['image_produit'];?>" width="100" height="100" style="border:3px solid silver;">
              </th>
              <th style="color:black;padding:20px;border-bottom:2px solid silver;">
                  <?php echo $row['nom_produit'];?>
              </th>
              <th style="color:black;padding:20px;width:200px;border-bottom:2px solid silver;">
                  <?php echo substr($row['description_produit'],300);?> ...
              </th>
              <th style="color:black;padding:20px;border-bottom:2px solid silver;">
                  <?php echo $row['prix_produit'];?> Dt
              </th>
              <th style="color:black;padding:20px;border-bottom:2px solid silver;">
                  <?php echo $row['quantite'];?>
              </th>
              <th style="color:black;padding:20px;border-bottom:2px solid silver;">
                  <?php echo $row['size'];?>
              </th>
              <th style="color:black;border-bottom:2px solid silver;">
                  <a href="suppr.php?id_su=<?php echo $row['id_panier'];?>">Supprimer</a>
              </th>
          </tr>
            <?php
            }
          ?>
          
          
        </table>
        <table border="0" width="90%;" style="margin-left:3%">
          <tr>  
              <td align="right"><input name="commande" type="submit" value="valider la commande"style="border:2px solid grey;height:40px;width:150px;margin-top:30px;background:transparent;color:black;"></td>
          </tr>
        </table>
        </form>
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