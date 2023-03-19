<?php include __DIR__.'/Fragment/fragmentHeader.html'; ?>
<?php include __DIR__.'/Fragment/fragmentNavBar.html'; ?>
<?php include __DIR__.'/conf.php'; ?>

<div class="container">
  <div class="row padding">
    <div class="col-md-8">
        <div>
        <iframe <?php echo $_GET['lien']; ?> class="iframe" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </div>
        <h5><?php echo $_GET['titre']; ?></h5>
        <hr width="100%" size="3">

            <div class="accordion accordion-flush" id="accordionFlushExample">

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Autres films
                    </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="list-group list-group-flush">
                                <?php
                                $query = 'SELECT * FROM `film` WHERE nom != :nom';
                                $statement = $database->prepare($query);
                                $statement->execute([
                                    'nom' => $_GET['titre']
                                ]);
                                $results = $statement->fetchAll();
                                foreach ($results as $result) {
                                    
                                ?>
                                    <li class="list-group-item">
                                        <a href='film.php?lien=<?php echo $result['lien']; ?>&titre=<?php echo $result['nom']; ?>' class="color">
                                        <img src="images/films/<?php echo $result['img']; ?>" class="img-fluid" alt="..." width="50">
                                        <?php echo $result['nom']; ?>
                                        </a>
                                    </li>
                                <?php        
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
    </div>
    <div class="col-md-4">
        <div class="row padding">
            <h6>Newsletter CMFI Replay</h6>
            <form>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-secondary" type="submit">Button</button>
                </div>
            </form>
            <h6 class="padding">Category</h6>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">An item
                    <span class="badge bg-primary rounded-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">An item
                    <span class="badge bg-primary rounded-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">An item
                    <span class="badge bg-primary rounded-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">An item
                    <span class="badge bg-primary rounded-pill">14</span>
                </li>
            </ul>
        </div>
        <div class="row padding_release_bloc">
            <div class="accordion accordion-flush padding" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button accordion-button_2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Release
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="d-grid gap-2 d-md-block padding_release">
                        <button class="btn btn-outline-secondary" type="button">2021</button>
                        <button class="btn btn-outline-secondary" type="button">2020</button>
                        <button class="btn btn-outline-secondary" type="button">2019</button>
                        <button class="btn btn-outline-secondary" type="button">2018</button>
                    </div>
                    <div class="d-grid gap-2 d-md-block padding_release">
                        <button class="btn btn-outline-secondary" type="button">2017</button>
                        <button class="btn btn-outline-secondary" type="button">2016</button>
                        <button class="btn btn-outline-secondary" type="button">2015</button>
                        <button class="btn btn-outline-secondary" type="button">2014</button>
                    </div>
                  </div>
                </div>

            </div>
        </div>
        <div class="row padding_subscribe">
            <h6>Support us</h6>
            <button type="button" class="btn btn-warning button_subscribe">Subscribe</button>
        </div>

    </div>
  </div>
</div>

<?php include __DIR__.'/Fragment/fragmentFooter.html'; ?>
