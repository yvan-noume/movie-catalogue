<div class="col-md-4">
    <div class="row padding">
        <h6>Newsletter CMFI Replay</h6>
        <form action="" method="get">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required="required">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" name="valider" value="Valider" class="btn btn-secondary">Subscribe to the newsletter</button>
            </div>
        </form>
        <?php 
        	if(isset($_GET['valider'])){
                $query = "insert into `newsletter` values (:email, :date, :time)";
                $statement = $database->prepare($query);
                $statement->execute([
                'email' => $_GET["email"],
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

        <h6 class="padding">Category</h6>
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center"> <a href="error.php" class="color">CMFI Documentary</a> 
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center"> <a href="error.php" class="color">CMFI Ministries & Departements</a> 
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center"><a href="error.php" class="color">CMFI Prayer and Fasting Institutions</a>  
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center"><a href="error.php" class="color">CMFI Training Institutions</a> 
                <span class="badge bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center"><a href="error.php" class="color">CMFI Utility Portals</a> 
                <span class="badge bg-primary rounded-pill">0</span>
            </li>
        </ul>
    </div>
    <div class="row padding_release_bloc">
        <div class="accordion accordion-flush padding" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button accordion-button_2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Release Year
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="d-grid gap-2 d-md-block padding_release">
                    <button class="btn btn-outline-secondary" type="button"><a href="error.php" class="color">2021</a> </button>
                    <button class="btn btn-outline-secondary" type="button"><a href="error.php" class="color">2020</a></button>
                    <button class="btn btn-outline-secondary" type="button"><a href="error.php" class="color">2019</a></button>
                    <button class="btn btn-outline-secondary" type="button"><a href="error.php" class="color">2018</a></button>
                </div>
                <div class="d-grid gap-2 d-md-block padding_release">
                    <button class="btn btn-outline-secondary" type="button"><a href="error.php" class="color">2017</a></button>
                    <button class="btn btn-outline-secondary" type="button"><a href="error.php" class="color">2016</a></button>
                    <button class="btn btn-outline-secondary" type="button"><a href="error.php" class="color">2015</a></button>
                    <button class="btn btn-outline-secondary" type="button"><a href="error.php" class="color">2014</a></button>
                </div>
              </div>
            </div>

        </div>
    </div>
    <div class="row padding_subscribe">
        <h6>Support us</h6>
        <a href="error.php"><button type="button" class="btn btn-warning button_subscribe">Subscribe</button></a>
    </div>

</div>