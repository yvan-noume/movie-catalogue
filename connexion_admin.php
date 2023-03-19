<?php
session_start(); 
?>
<?php include __DIR__.'/Fragment/fragmentHeader.html'; ?>
<?php include __DIR__.'/Fragment/fragmentNavBar.html'; ?>
<?php include __DIR__.'/conf.php'; ?>
<div class="container">
    <div class="row padding">
        <h3>Administration du site</h3>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-lg-8">
        <form class="row g-3" action="connexion_admin.php" method="get">
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label" >Email</label>
                <input type="email" class="form-control" id="inputPassword4" name="email" required="required">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label" >Mot de passe</label>
                <input type="password" class="form-control" id="inputAddress" name="password" required="required">
            </div>
            <div class="col-12">
                <button type="submit" name="valider" class="btn btn-primary">Connexion</button>
            </div>
        </form>
        </div>
    </div>
</div>
<?php 
    if(isset($_GET['valider'])){
        $query = 'SELECT * FROM `admin` WHERE email=:email AND password=:password ';
        $statement = $database->prepare($query);
        $statement->execute([
            'email' => $_GET['email'],
            'password' => $_GET['password']
            ]);
        $results = $statement->fetchAll(); 
        if (sizeof($results) == 0) {
            echo '<div class="container padding-form ">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     Email ou mot de passe incorrect!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                </div>
            </div>
        </div>';
        }else{ 
            $_SESSION['email'] = $_GET['email'];
            ?>
            
            <script>window.location.replace("admin.php"); </script>
            
           
        <?php }
    }
?>
<?php include __DIR__.'/Fragment/fragmentFooter.html'; ?>