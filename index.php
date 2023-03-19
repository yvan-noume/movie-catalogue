<?php include __DIR__.'/Fragment/fragmentHeader.html'; ?>
<?php include __DIR__.'/Fragment/fragmentNavBar.html'; ?>
<?php include __DIR__.'/conf.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row padding">
                <a href="all_films.php" class="color"><h6>Films/Documentaries</h6></a>
                <hr class="hr">
                <div class="featured-carousel owl-carousel">
                    <?php
                        $query = 'SELECT * FROM `film`';
                        $statement = $database->prepare($query);
                        $statement->execute();
                        $results = $statement->fetchAll();
                        foreach ($results as $result) {
                             
                    ?>
                        <div class="item">
                            <div class="work">
                                <div class="img d-flex align-items-center justify-content-center rounded" style="background-image: url(images/films/<?php echo $result['img']; ?>);">
                                    <a href='film.php?lien=<?php echo $result['lien']; ?>&titre=<?php echo $result['nom']; ?>' class="icon d-flex align-items-center justify-content-center">
                                        <span class="ion-ios-search"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php        
                        }
                    ?>
                </div>
            </div>
           
            <div class="row padding">
                <a href="all_series.php" class="color"><h6>Series</h6></a>
                <hr class="hr">
                <div class="featured-carousel owl-carousel">
                    <?php
                        $query = 'SELECT * FROM `serie`';
                        $statement = $database->prepare($query);
                        $statement->execute();
                        $results = $statement->fetchAll();
                        foreach ($results as $result) {
                             
                    ?>
                        <div class="item">
                            <div class="work">
                                <div class="img d-flex align-items-center justify-content-center rounded" style="background-image: url(images/series/<?php echo $result['img']; ?>);">
                                    <a href="serie.php?nom_serie=<?php echo $result['nom']; ?>&img=<?php echo $result['img']; ?>" class="icon d-flex align-items-center justify-content-center">
                                        <span class="ion-ios-search"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php        
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php include __DIR__.'/Fragment/fragmentSide.php'; ?>
    </div>

</div>

<?php include __DIR__.'/Fragment/fragmentFooter.html'; ?>
