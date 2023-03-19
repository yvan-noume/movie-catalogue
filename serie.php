<?php include __DIR__.'/Fragment/fragmentHeader.html'; ?>
<?php include __DIR__.'/Fragment/fragmentNavBar.html'; ?>
<?php include __DIR__.'/conf.php'; ?>

<div class="container">
    <div class="row padding">
        <div class="col-md-8">
            <div class="row row-cols-auto padding_episode">
                <div class="col-lg-3">
                    <img src="images/series/<?php echo $_GET['img']; ?> " alt="" class="img-thumbnail img-size">
                </div>
                <div class="col-lg-5">
                <h5><?php echo $_GET['nom_serie']; ?></h5>
                </div>
            </div>

            <h6>Seasons and episodes</h6>
            <hr width="100%" size="3">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <?php
                    $heading = [1 => 'flush-headingOne', 2 => 'flush-headingTwo', 3 => 'flush-headingThree', 4 => 'flush-headingFour', 5 => 'flush-headingFive', 6 => 'flush-headingSix', 7 => 'flush-headingSeven', 8 => 'flush-headingEight', 9 => 'flush-headingNine', 10 => 'flush-headingTen'];
                    $collapse = [1 => 'flush-collapseOne', 2 => 'flush-collapseTwo', 3 => 'flush-collapseThree', 4 => 'flush-collapseFour', 5 => 'flush-collapseFive', 6 => 'flush-collapseSix', 7 => 'flush-collapseSeven', 8 => 'flush-collapseEight', 9 => 'flush-collapseNine', 10 => 'flush-collapseTen']; 
                    $indice = 0;
                    $query = 'SELECT * FROM `saison` WHERE id_serie = :id_serie ';
                    $statement = $database->prepare($query);
                    $statement->execute([
                        'id_serie' => $_GET['nom_serie']
                        ]);
                    $results = $statement->fetchAll();
                    foreach ($results as $result) {
                    $indice = $indice + 1;     
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="<?php echo $heading[$indice] ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse[$indice] ?>" aria-expanded="false" aria-controls="<?php echo $collapse[$indice] ?>">
                        <?php echo $result['nom']; ?> 
                    </button>
                    </h2>
                    <div id="<?php echo $collapse[$indice] ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo $heading[$indice] ?>" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="list-group list-group-flush">
                                <?php
                                $query = 'SELECT * FROM `episode` WHERE id_saison = :id_saison';
                                $statement = $database->prepare($query);
                                $statement->execute([
                                    'id_saison' => $result['nom']
                                ]);
                                $results = $statement->fetchAll();
                                foreach ($results as $result) {
                                    
                                ?>
                                    <li class="list-group-item">
                                        <a href='episode.php?lien=<?php echo $result['lien']; ?>&titre=<?php echo $result['titre']; ?>&img=<?php echo $_GET['img']; ?>&id_saison=<?php echo $result['id_saison']; ?>' class="color">
                                        <img src="images/series/<?php echo $_GET['img']; ?>" class="img-fluid" alt="..." width="50">
                                        <?php echo $result['titre']; ?>
                                        </a>
                                    </li>
                                <?php        
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                         
                    }
                ?>
            </div>

        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>

<?php include __DIR__.'/Fragment/fragmentFooter.html'; ?>

