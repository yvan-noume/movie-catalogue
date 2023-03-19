<?php
session_start();
if((isset($_SESSION['email'])))
{
?>

<?php include __DIR__.'/Fragment/fragmentHeader.html'; ?>
<?php include __DIR__.'/Fragment/fragmentNavBarAdmin.php'; ?>
<?php include __DIR__.'/conf.php'; ?>

<div class="container">
<div class="d-grid gap-2 d-md-flex justify-content-md-end padding_button_serie">
<a href="admin_config.php?creer_serie" ><button class="btn btn-primary me-md-2" type=""> Créer une Série</button></a>
</div>
<table class="table">
	<thead>
	<tr>
		<th scope="col">Séries</th>	
	</tr>
	</thead>
	<tbody>
	<?php
	$query = 'SELECT * FROM `serie`';
	$statement = $database->prepare($query);
	$statement->execute();
	$results = $statement->fetchAll();
	foreach ($results as $result) {
			
	?>
	<tr>
	<td><a href="admin_config.php?consulter_saison=<?php echo $result['nom']; ?>" class="color"><?php echo $result['nom']; ?></a></td>

	</tr>

	<?php        
	}
	?>	  

	</tbody>
</table>
</div>

<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/admin.js"></script> 
<?php include __DIR__.'/Fragment/fragmentFooter.html'; ?>

<?php
}
else{
	header("location: connexion_admin.php");
}
?>
