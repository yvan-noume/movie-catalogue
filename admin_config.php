<?php include __DIR__.'/Fragment/fragmentHeader.html'; ?>
<?php include __DIR__.'/Fragment/fragmentNavBarAdmin.php'; ?>
<?php include __DIR__.'/conf.php'; ?>

<?php
function validation()
{
    echo '<div class="container padding-form ">
	<div class="row justify-content-md-center">
		<div class="col-md-8">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			 Création réussie
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		</div>
	</div>
</div>';
}
?>

<?php
if(isset($_GET['consulter_saison'])){
?>
	<div class="container">
	<div class="d-grid gap-2 d-md-flex justify-content-md-end padding_button_serie">
	<a href="admin_config.php?creer_saison" ><button class="btn btn-primary me-md-2" type=""> Créer une Saison</button></a>
	</div>
	<table class="table">
	  <thead>
		<tr>
		  <th scope="col">Saisons</th>	
		</tr>
	  </thead>
	  <tbody>
	  <?php
		$query = 'SELECT * FROM `saison` WHERE id_serie = :id_serie';
		$statement = $database->prepare($query);
		$statement->execute([
			'id_serie' => $_GET['consulter_saison']
		]);
		$results = $statement->fetchAll();
		foreach ($results as $result) {
				
		?>
		<tr>
		<td><a href="admin_config.php?consulter_episode=<?php echo $result['nom']; ?>" class="color"><?php echo $result['nom']; ?></a></td>
	
		</tr>
	
		<?php        
		}  
	?>
    </tbody>
    </table>
    </div>
<?php
}
?>

<?php
if(isset($_GET['consulter_episode'])){
?>
	<div class="container">
	<div class="d-grid gap-2 d-md-flex justify-content-md-end padding_button_serie">
	<a href="admin_config.php?creer_episode" ><button class="btn btn-primary me-md-2" type=""> Créer un épisode</button></a>
	</div>
	<table class="table">
	  <thead>
		<tr>
		  <th scope="col">Episode</th>	
		</tr>
	  </thead>
	  <tbody>
	  <?php
		$query = 'SELECT * FROM `episode` WHERE id_saison = :id_saison';
		$statement = $database->prepare($query);
		$statement->execute([
			'id_saison' => $_GET['consulter_episode']
		]);
		$results = $statement->fetchAll();
		foreach ($results as $result) {
				
		?>
		<tr>
		<td><a href="" class="color"><?php echo $result['titre']; ?></a></td>
	
		</tr>
	
		<?php        
		}  
	?>
    </tbody>
    </table>
    </div>
<?php
}
?>

<?php
if(isset($_GET['consulter_film'])){
?>
	<div class="container">
	<div class="d-grid gap-2 d-md-flex justify-content-md-end padding_button_serie">
	<a href="admin_config.php?creer_film" ><button class="btn btn-primary me-md-2" type=""> Créer un film</button></a>
	</div>
	<table class="table">
	  <thead>
		<tr>
		  <th scope="col">Film</th>	
		</tr>
	  </thead>
	  <tbody>
	  <?php
		$query = 'SELECT * FROM `film`';
		$statement = $database->prepare($query);
		$statement->execute();
		$results = $statement->fetchAll();
		foreach ($results as $result) {
				
		?>
		<tr>
		<td><a href="" class="color"><?php echo $result['nom']; ?></a></td>
	
		</tr>
	
		<?php        
		}  
	?>
    </tbody>
    </table>
    </div>
<?php
}
?>

<?php
if(isset($_GET['creer_serie']) || isset($_POST['creer_serie'])){
?>

<div class="container padding-form ">
	<div class="row justify-content-md-center">
		<div class="col-md-8">
			<h4>Création d'une série</h4>
		</div>
	</div>
	<div class="row justify-content-md-center">
		<div class="col-md-8 border border-secondary border-1">
			<form class="row g-3" action="admin_config.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="creer_serie">
				<div class="col-12">
				<label for="inputAddress" class="form-label">Titre</label>
				<input type="text" class="form-control" name="titre"  required="required" placeholder="Titre" required="required">
				</div>
				<div class="mb-3">
				<label for="formFileLg" class="form-label">Insérer une image <span class="consigne">(largeur = (2/3)longeur)</span></label><br>
				<input type="file" name="image" required="required" >
				</div>
				<div class="col-12 d-grid gap-2 d-md-flex  justify-content-md-center">
				<button type="submit" name="valider_serie" value="Envoyer" class="btn btn-primary  padding_button">Envoyer</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
}
?>

<?php
if(isset($_GET['creer_saison'])){
?>

<div class="container padding-form ">
	<div class="row justify-content-md-center">
		<div class="col-md-8">
			<h4>Création d'une Saison</h4>
		</div>
	</div>
	<div class="row justify-content-md-center">
		<div class="col-md-8 border border-secondary border-1">
			<form class="row g-3" action="admin_config.php" method="get">
				<input type="hidden" name="creer_saison">
				<div class="col-md-6">
					<label for="inputState" class="form-label">Event</label>
					<select id="inputState" name="event" class="form-select" required="required">
					<option selected></option>
					<?php
                        $query = 'SELECT * FROM `serie`';
                        $statement = $database->prepare($query);
                        $statement->execute();
                        $results = $statement->fetchAll();
                        foreach ($results as $result) {
                             
                    ?>
					<option value = "<?php echo $result["nom"]; ?>" > <?php echo $result["nom"]; ?> </option>
					<?php        
                        }
                    ?>
					</select>
				</div>
				<div class="col-md-6">
					<label for="inputState" class="form-label">Year</label>
					<select id="inputState" class="form-select" name="year" required="required">
					<option selected></option>
					<?php
					for ($i=2021; $i >2009 ; $i--) { ?>
						<option value = <?php echo $i; ?>> <?php echo $i; ?> </option>
					<?php
					}
					?>
					</select>
				</div>
				<div class="col-12 d-grid gap-2 d-md-flex  justify-content-md-center">
				<button type="submit" name="valider_saison" value="Envoyer" class="btn btn-primary padding_button">Envoyer</button>
				</div>
			</form>
		</div>	
	</div>
	
</div>

<?php
}
?>

<?php
if(isset($_GET['creer_episode'])){
?>

<div class="container padding-form ">
	<div class="row justify-content-md-center">
		<div class="col-md-4">
			<h4>Création d'un Episode</h4>
		</div>
	</div>
	<div class="row justify-content-md-center">
		<div class="col-md-6 border border-secondary border-1">
			<form class="row g-3" method="get" action="admin_config.php">
				<input type="hidden" name="creer_episode_suite" value="">
				<div class="col-md-12">
					<label for="inputState" class="form-label">Serie</label>
					<select id="inputState" name="event" class="form-select" required="required">
					<option selected></option>
					<?php
                        $query = 'SELECT * FROM `serie`';
                        $statement = $database->prepare($query);
                        $statement->execute();
                        $results = $statement->fetchAll();
                        foreach ($results as $result) {
                             
                    ?>
					<option value = "<?php echo $result["nom"]; ?>" > <?php echo $result["nom"]; ?> </option>
					<?php        
                        }
                    ?>
					</select>
				</div>
				<div class="col-12 d-grid gap-2 d-md-flex  justify-content-md-center">
				<button type="submit" name="valider" value="Valider" class="btn btn-primary padding_button">Envoyer</button>
				</div>
			</form>
		</div>	
	</div>
	
</div>

<?php
}
?>

<?php
if(isset($_GET['creer_episode_suite'])){
?>

<div class="container padding-form ">
	<div class="row justify-content-md-center">
		<div class="col-md-8">
			<h4>Création d'un Episode</h4>
		</div>
	</div>
	<div class="row justify-content-md-center">
		<div class="col-md-8 border border-secondary border-1">
			<form class="row g-3" method="get" action="admin_config.php">
				<input type="hidden" name="creer_episode_suite" value="">
				<input type="hidden" name="event" value="<?php echo $_GET['event'] ?>">
				<div class="col-md-6">
					<label for="inputState" class="form-label">Saison</label>
					<select id="inputState" name="saison" class="form-select" required="required">
					<option selected></option>
					<?php
                        $query = 'SELECT * FROM `saison` WHERE id_serie = :id_serie ';
                        $statement = $database->prepare($query);
                        $statement->execute([
							'id_serie' => $_GET['event']
						  ]);
                        $results = $statement->fetchAll();
                        foreach ($results as $result) {
                             
                    ?>
					<option value = "<?php echo $result["nom"]; ?>" > <?php echo $result["nom"]; ?> </option>
					<?php        
                        }
                    ?>
					</select>
				</div>
				<div class="col-md-6">
					<label for="inputState" class="form-label">Episode</label>
					<select id="inputState" class="form-select" name="jour">
					<option selected></option>
					<?php
					for ($i=1; $i <15 ; $i++) { ?>
						<option value = <?php echo $i; ?>> <?php echo $i; ?> </option>
					<?php
					}
					?>
					</select>
				</div>
				<div class="col-12">
				<label for="inputAddress" class="form-label">Titre</label>
				<input type="text" name="titre" class="form-control" id="inputAddress" placeholder="Titre" required="required">
				</div>
				<div class="col-12">
				<label for="inputAddress" class="form-label">Lien Vidéo</label>
				<input type="text" name="lien" class="form-control" id="inputAddress" placeholder="Lien" required="required">
				</div>
				<div class="col-12 d-grid gap-2 d-md-flex  justify-content-md-center">
				<button type="submit" name="valider_episode" value="Valider" class="btn btn-primary padding_button">Envoyer</button>
				</div>
			</form>
		</div>	
	</div>
	
</div>

<?php
}
?>

<?php
if(isset($_GET['creer_film']) || isset($_POST['creer_film'])){
?>

<div class="container padding-form ">
	<div class="row justify-content-md-center">
		<div class="col-md-8">
			<h4>Création d'un film/documentaire</h4>
		</div>
	</div>
	<div class="row justify-content-md-center">
		<div class="col-md-8 border border-secondary border-1">
			<form class="row g-3" action="admin_config.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="creer_film" value="">
				<div class="col-md-12">
					<label for="inputAddress" class="form-label">Titre</label>
					<input type="text" class="form-control" name="titre"  required="required" placeholder="Titre" required="required">
				</div>
				<div class="col-12">
				<label for="inputAddress" class="form-label">Lien Vidéo</label>
				<input type="text" name="lien" class="form-control" id="inputAddress" placeholder="Lien" required="required">
				</div>
				<div class="mb-3">
				<label for="formFileLg" class="form-label">Insérer une image<span class="consigne">(largeur = (2/3)longeur)</span></label><br>
				<input type="file" name="image" required="required">
				</div>
				<div class="col-12 d-grid gap-2 d-md-flex  justify-content-md-center">
				<button type="submit" name="valider_film" value="Valider" class="btn btn-primary padding_button">Envoyer</button>
				</div>
			</form>
		</div>	
	</div>
	
</div>

<?php
}
?>

<?php
if(isset($_GET['creer_news']) || isset($_POST['creer_news']) ){
?>

<div class="container padding-form ">
	<div class="row justify-content-md-center">
		<div class="col-md-8">
			<h4>Création d'une news</h4>
		</div>
	</div>
	<div class="row justify-content-md-center">
		<div class="col-md-8 border border-secondary border-1">
			<form class="row g-3" action="admin.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="creer_news" value="">
				<div class="col-md-12">
					<label for="inputAddress" class="form-label">Titre</label>
					<input type="text" class="form-control" name="titre"  required="required" placeholder="Titre" required="required">
				</div>
				<div class="mb-3">
				<label for="formFileLg" class="form-label">Insérer une image </label><br>
				<input type="file" name="image" required="required">
				</div>
				<div class="col-12 d-grid gap-2 d-md-flex  justify-content-md-center">
				<button type="submit" name="valider_news" value="Valider" class="btn btn-primary padding_button">Envoyer</button>
				</div>
			</form>
		</div>	
	</div>
	
</div>

<?php
}
?>

<?php
	if(isset($_POST['valider_serie'])){
		$location = $_POST['titre'];
		$new_location = str_split($location);
		for($i=0; $i<strlen($location); $i++){
			if ($new_location[$i] == " " ) {
				unset($new_location[$i]);
			}
			
		}
		$location = implode($new_location);
		$image="$location.png";
		move_uploaded_file($_FILES['image']['tmp_name'], "images/series/$image");
        $query = "insert into `serie` values (:nom, :img, :date, :time)";
        $statement = $database->prepare($query);
        $statement->execute([
        'nom' => $_POST['titre'],
        'img' => $image,
        'date' => date('Y-m-d'),
        'time' => date('H:i')
        ]);
		validation();
	}

	if(isset($_GET['valider_saison'])){
        $query = "insert into `saison` values (:nom, :date, :time, :id_serie)";
        $statement = $database->prepare($query);
        $statement->execute([
        'nom' => ($_GET["event"] ." ". $_GET["year"]),
        'date' => date('Y-m-d'),
        'time' => date('H:i'),
		'id_serie' => $_GET["event"]
        ]);
		validation();
	}

	if(isset($_GET['valider_episode'])){
        $query = "insert into `episode` values (:nom,:titre, :lien, :id_saison)";
        $statement = $database->prepare($query);
        $statement->execute([
        'nom' => ("Day ". $_GET["jour"]. " - ". $_GET["titre"]),
        'titre' => $_GET["titre"],
        'lien' => $_GET["lien"],
		'id_saison' => $_GET["saison"]
        ]);
		validation();
	}

	if(isset($_POST['valider_film'])){
		$location = $_POST['titre'];
		$new_location = str_split($location);
		for($i=0; $i<strlen($location); $i++){
			if ($new_location[$i] == " " ) {
				unset($new_location[$i]);
			}
			
		}
		$location = implode($new_location);
		$image="$location.png";
		move_uploaded_file($_FILES['image']['tmp_name'], "images/films/$image");
        $query = "insert into `film` values (:nom, :img, :date, :time, :lien)";
        $statement = $database->prepare($query);
        $statement->execute([
        'nom' => $_POST['titre'],
        'img' => $image,
        'date' => date('Y-m-d'),
        'time' => date('H:i'),
		'lien' => $_POST['lien']
        ]);
		validation();
	}

	if(isset($_POST['valider_news'])){
		$location = $_POST['titre'];
		$new_location = str_split($location);
		for($i=0; $i<strlen($location); $i++){
			if ($new_location[$i] == " " ) {
				unset($new_location[$i]);
			}
			
		}
		$location = implode($new_location);
		$image="$location.png";
		move_uploaded_file($_FILES['image']['tmp_name'], "images/news/$image");
        $query = "insert into `news` values (:titre, :img)";
        $statement = $database->prepare($query);
        $statement->execute([
        'titre' => $_POST['titre'],
        'img' => $image
        ]);
		validation();
	}
             
?>

<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/admin.js"></script> 
<?php include __DIR__.'/Fragment/fragmentFooter.html'; ?>
