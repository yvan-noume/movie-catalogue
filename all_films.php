<?php include __DIR__.'/Fragment/fragmentHeader.html'; ?>
<?php include __DIR__.'/Fragment/fragmentNavBar.html'; ?>
<?php include __DIR__.'/conf.php'; ?>

    <div class="container">
        <div class="row padding">
            <div class="col-md-8">
            <h5>Tous les documentaires</h5>
            <div class="row row-cols-auto ">
                <?php
                    $query = 'SELECT * FROM `film`';
                    $statement = $database->prepare($query);
                    $statement->execute();
                    $results = $statement->fetchAll();
                    foreach ($results as $result) {
                            
                ?>
                
                <div class="col-6 padding"><a href="episode.php?lien=<?php echo $result['lien']; ?>"><img src="images/films/<?php echo $result['img']; ?>" class="img-fluid rounded-start" alt="..."></a>
                <h6><?php echo $result['nom']; ?></h6>
                </div>
               
                <?php        
                    }
                ?>
            </div>
            </div>
            <?php include __DIR__.'/Fragment/fragmentSide.php'; ?>
        </div>
</div>

<?php include __DIR__.'/Fragment/fragmentFooter.html'; ?>
