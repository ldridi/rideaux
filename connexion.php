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
            $login = mysql_real_escape_string(htmlentities(htmlspecialchars($_POST['login'])));
            $pass = mysql_real_escape_string(htmlentities(htmlspecialchars($_POST['pass'])));
            
            $req = mysql_query("select * from client where (email_client = '$login') and (pass_client = '$pass')");
            $num=mysql_num_rows($req);
            if($num){

            while($row=mysql_fetch_array($req)){
                session_start();
                $_SESSION['id'] = $row['id_client'];
                $_SESSION['login'] = $row['email_client'];
                echo "<script> window.location.href = 'panier.php' </script>";
            } 
            }else{
            ?>
            <center><b style="color:green;">login ou mot de passe incorrecte</b></center> 
            <?php
            }

          }
        ?>

         
        <form action="" method="post">
        <table style="margin-left:38%;height:500px;">
          <tr>
              <td>
                  <label style="font-size:18px;color:white;">Login :</label><br>
                  <input required name="login" type="text" style="width:300px;height:30px;margin-top:20px;margin-bottom:20px;border-top:0;border-left:0;border:-right:0;border-right:0;border-bottom:1px solid silver;background:transparent;"><br>
                  <label style="font-size:18px;color:white;">Mot de passe :</label><br>
                  <input required name="pass" type="text" style="width:300px;height:30px;margin-top:10px;border-top:0;border-left:0;border:-right:0;border-right:0;border-bottom:1px solid silver;background:transparent;"><br>
                  <input name="insc" type="submit" value="connexion"style="border:2px solid grey;height:40px;width:150px;margin-top:30px;background:transparent;color:white;">
              </td>
          </tr>
          <tr>
              <td>
                  
              </td>
          </tr>
          
          <tr>
              <td>
                  
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