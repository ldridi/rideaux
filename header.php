<?php
session_start();
?>
<div class="connexion" style="display:none;">
      <div class="exit">
      X
      </div>
  </div>
    <div class="page3">
        <div class="sous_page1">
              <span class="recherche_icon">
                  <img src="image/recherche.png">
                  <b id="rech">Recherche</b>
              </span>
              <div class="recherche" style="display:none;"><input type="text" name="recherche" style="margin-top:10px;width:90%;"></div>
              
        </div>
        <div class="sous_page2">
            <a href="acceuil.php"><img src="image/logo.png" class="image_page1" width="200"></a>
        </div>
        <div class="sous_page3">
          <div style="float:right;">
              <img src="image/trais.png" class="pull-right trais">
          </div>
          <div style="float:right;margin-top:40px;margin-right:-65px;display:none;" class="panier" >
            <span><img src="image/identifier.png" width="30"></span>
            <?php
              if(isset($_SESSION['id'])){
              ?>
              <span><a href="logout.php">Se Deconnecter</a></span>
              <?php
              }else{
              ?>
              <span><a href="connexion.php">S'identifier</a></span>
              <?php
              }
            ?>
            
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <span><img src="image/panier.png" width="20"></span>
            <span><a href="panier.php">Panier</a></span>
          </div>
        </div>
    </div>
    <div class="page4">

    <center>
    <table  class="menu" border="0">
        <tr>
          <td class="menu_focus">RIDEAUX</td>

          <td><a href="produit.php?id=4">ACCESSOIRES</a></td>
          <td>CONTACT</td>
          <td><a href="inscription.php">INSCRIVEZ-VOUS</a></td>
          <td>STORE</td>
        </tr>
      </table>

    </center>
    <center>
    <table  class="menu1" style="display:none;">
        <tr>
          <td bgcolor="#D8D4CB" style="padding-left:10px;"><a href="produit.php?id=1">RIDEAUX</a></td>
        </tr>
        <tr>
          <td bgcolor="#D8D4CB" style="padding-left:10px;"><a href="produit.php?id=2">RIDEAUX</a></td>
        </tr>
        <tr>
          <td bgcolor="#D8D4CB" style="padding-left:10px;"><a href="produit.php?id=3">CHAMBRE PARENTALE</a></td>
        </tr>
        
      </table>
      
    </center>
    </div>

