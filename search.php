<?php include __DIR__.'/Fragment/fragmentHeader.html'; ?>
<?php include __DIR__.'/Fragment/fragmentNavBar.html'; ?>
<?php include __DIR__.'/conf.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <br>
            <h5>Résultats trouvés : <?php echo $_GET['search']; ?></h5>
            <form class="d-flex" action="search.php" method="get">
            <input class="form-control me-2" type="search" value="<?php echo $_GET['search']; ?>" name="search" placeholder="Search" aria-label="Search" required="required">
            <button class="btn btn-outline-light" type="submit" name="valider_search">Search</button>
            </form>
        <ul class="list-group list-group-flush">
            <?php
                $query = 'SELECT * FROM `serie` WHERE nom LIKE :nom ';
                $statement = $database->prepare($query);
                $statement->execute([
                    'nom' => '%'.$_GET['search'].'%'
                    ]);
                $results = $statement->fetchAll();
                foreach ($results as $result) {                       
            ?>          
                <li class="list-group-item">
                    <a href="serie.php?nom_serie=<?php echo $result['nom']; ?>&img=<?php echo $result['img']; ?>" class="color">
                    <img src="images/<?php echo $result['img']; ?>" class="img-fluid" alt="..." width="50">
                    <?php echo $result['nom']; ?>
                    </a>  
                </li>
            <?php        
                }
            ?>    
        </ul>
        </div>
        <?php include __DIR__.'/Fragment/fragmentSide.php'; ?>
    </div>

</div>

<?php include __DIR__.'/Fragment/fragmentFooter.html'; ?>