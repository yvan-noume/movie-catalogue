<?php include __DIR__.'/Fragment/fragmentHeader.html'; ?>
<?php include __DIR__.'/Fragment/fragmentNavBar.html'; ?>
<?php include __DIR__.'/conf.php'; ?>

<div class="container">
    <div class="row padding">
        <h3>Formulaire de contact</h3>
        <p>Avoir quelque chose à informer notre équipe d'assistance, s'il vous plaît ne pas hésiter à utiliser ce formulaire.</p>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-lg-8">
        <form class="row g-3" action="contact.php" method="get">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label" >Prenom</label>
                <input type="text" class="form-control" id="inputEmail4" name="prenom" required="required">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label" >Email</label>
                <input type="email" class="form-control" id="inputPassword4" name="email" required="required">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label" >Sujet</label>
                <input type="text" class="form-control" id="inputAddress" name="sujet" required="required">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Message</label> <br>
                <textarea name="message" class="form-control"  id="zmessage" required="required"></textarea>
            </div>
            <div class="col-12">
                <button type="submit" name="valider" class="btn btn-primary">Envoyer le message</button>
            </div>
        </form>
        </div>
    </div>
</div>

<?php 
    if(isset($_GET['valider'])){
        $query = "insert into `contact` values (:prenom, :email, :sujet, :message, :date, :time)";
        $statement = $database->prepare($query);
        $statement->execute([
        'prenom' => $_GET["prenom"],
        'email' => $_GET["email"],
        'sujet' => $_GET["sujet"],
        'message' => $_GET["message"],
        'date' => date('Y-m-d'),
        'time' => date('H:i')
        ]); 
?>
    <div class="container padding-form ">
    <div class="row justify-content-md-center">
        <div class="col">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Création réussie
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>
    </div>
    </div>
<?php
    }
?>

<?php include __DIR__.'/Fragment/fragmentFooter.html'; ?>