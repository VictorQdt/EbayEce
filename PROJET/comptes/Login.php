<?php
    include ("../bases/header.php");
?>


<body>
        <?php 
            include ("../bases/menu.php");
        ?>
    <div class="container"> 
        <div calss="row"> 
            <div class="col-lg-10 col-xl-9 mx-auto" >
               <div class="card card-signin flex-row my-5" >
                   <div class="card-body" >
            
                <h4 class="card-header text-center" >Bienvenue sur la page de connexion</h4>
              <br>
                
                <form class="col-md4 ml-auto mr-auto" action="connexion.php" method="post" enctype="multipart/form-data" >       
                       
             <div class="form-label-group">
                 <label for="identifiant">Identifiant:</label>
                <input type="text" class="form-control" name="identifiant" id="identifiant" aria-describedby="nameHelp" placeholder="Identifiant">
                <br>
              </div>
            
            <div class="form-label-group">
                <label for="mdp">Mot de passe :</label>
                <input type="text" class="form-control" name="mdp" id="mdp" aria-describedby="nameHelp" placeholder="Mot de passe"><br>
              </div>
               
                    <input type="submit" id="bttnconnex" value="Connexion" class="btn btn-lg btn-primary btn-block ">
                    
                <br><br>
                </form>
                     <h6 style="text-align: center" >Pas encore de compte ?</h6>
                     <div style="text-align: center">
                <a href="CreationVendeur.php">Créer un compte Vendeur</a>&ensp;
                <a href="CreationAcheteur.php">Créer un compte Acheteur</a>
                    </div>
                       
                   </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>