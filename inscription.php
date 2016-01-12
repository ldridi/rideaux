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
    <div class="page666">
        <center><h4 style="color:white;line-height:30px">Creer votre compte et soyez parmi les premiers à etre <br>informé de nos promotions et de nos nouveaux postes</h4></center>
        <?php
          if(isset($_POST) and isset($_POST['insc'])){
            $nom = mysql_real_escape_string(htmlentities(htmlspecialchars($_POST['nom'])));
            $prenom = mysql_real_escape_string(htmlentities(htmlspecialchars($_POST['prenom'])));
            $email = mysql_real_escape_string(htmlentities(htmlspecialchars($_POST['email'])));
            $pass = mysql_real_escape_string(htmlentities(htmlspecialchars($_POST['pass'])));
            $tel = mysql_real_escape_string(htmlentities(htmlspecialchars($_POST['tel'])));
            $pays = mysql_real_escape_string(htmlentities(htmlspecialchars($_POST['pays'])));
            $sexe = mysql_real_escape_string(htmlentities(htmlspecialchars($_POST['sexe'])));
            $req = mysql_query("insert into client 
                                            values ('','$nom','$prenom','$email','$pass','$tel','$pays','$sexe')");
            if($req){
            ?>
              <center><b style="color:green;">inscription ok</b></center> 
            <?php
            }

          }
        ?>

         
        <form action="" method="post">
        <table style="margin-left:25%;height:500px;">
          <tr>
              <td>
                  <label style="font-size:18px;color:white;">Nom :</label><br>
                  <input required name="nom" type="text" style="width:300px;height:30px;margin-top:20px;border-top:0;border-left:0;border:-right:0;border-right:0;border-bottom:1px solid silver;background:transparent;">
              </td>
          </tr>
          <tr>
              <td>
                  <label style="font-size:18px;color:white;">Prenom :</label><br>
                  <input required name="prenom" type="text" style="width:300px;height:30px;margin-top:20px;border-top:0;border-left:0;border:-right:0;border-right:0;border-bottom:1px solid silver;background:transparent;">
              </td>
          </tr>
          <tr>
              <td>
                  <label style="font-size:18px;color:white;">Email :</label><br>
                  <input required name="email" type="text" style="width:300px;height:30px;;margin-top:20px;border-top:0;border-left:0;border:-right:0;border-right:0;border-bottom:1px solid silver;background:transparent;">
              </td>
          </tr>
          <tr>
              <td>
                  <label style="font-size:18px;color:white;">Mot de passe :</label><br>
                  <input required name="pass" type="text" style="width:300px;height:30px;;margin-top:20px;border-top:0;border-left:0;border:-right:0;border-right:0;border-bottom:1px solid silver;background:transparent;">
              </td>
          </tr>
          <tr>
              <td>
                  <label style="font-size:18px;color:white;">Telephone mobile :</label><br>
                  <input required name="tel" type="text" style="width:300px;height:30px;;margin-top:20px;border-top:0;border-left:0;border:-right:0;border-right:0;border-bottom:1px solid silver;background:transparent;">
              </td>
          </tr>
          <tr>
              <td>
                  <label style="font-size:18px;color:white;">Pays :</label><br>
                  <select required name="pays" style="width:300px;height:30px;;margin-top:20px;border-top:0;border-left:0;border:-right:0;border-right:0;border-bottom:1px solid silver;background:transparent;">
                      <option class="tunisie">Tunisie</option>
                      <option class="france">France</option>
                      <option value="maroc">MAroc</option>
                  </select>
              </td>
          </tr>
          <tr>
              <td>
                  <input  type="checkbox" name="sexe" value="homme" style="margin-top:20px;width:30px;"> <font style="font-size:18px;color:white;">Homme</font> <input required type="checkbox" style="width:30px;" name="sexe" value="femmme"> <font style="font-size:18px;color:white;">Femme </font>
              </td>
          </tr>
          <tr>
              <td>
                  <input name="insc" type="submit" value="ajouter"style="border:2px solid grey;height:40px;width:150px;margin-top:30px;background:transparent;color:white;">
              </td>
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