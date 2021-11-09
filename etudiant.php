<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Enoncé d'examen</title>
  </head>
  <body>


    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="/app/professeur">Examen</a></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block"> 
                <li><a href="/app/etudiant" class="nav-link">Voir le sujet</a></li>
                <li><a href="/app/professeur" class="nav-link">Créer Un nouveau sujet</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>




<div class="modal fade" id="qtModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group-prepend">
              <input type="text" class="form-control" name="partie" placeholder="Partie..." id="question">
              <button type="button" class="btn btn-outline-success" style="margin-left: 3px;"  id="add-question"><b>+</b></button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-block btn-danger" data-dismiss="modal" id="modal-close">Fermer</button>
      </div>
    </div>
  </div>
</div>

    <div class="content">
      
       <div class="container parties-div" style="margin:200px auto; min-height: 700px;">
        <h2 style="text-align: center; margin: 20px;color:#000">Ennoce d' Examen</h2>
            <ul id="parties" class="list-group">
              <?php 
                try { 
                  $xml = simplexml_load_file("conf/examen.xml");
                  echo "<li class='list-group-item'> <h5 align='center'><b>Code matiere:</b>&nbsp;&nbsp;". $xml[0]['codeMatier'] ."</h5>";
                  echo "<h5 align='center'><b>Date:</b>&nbsp;&nbsp;". $xml[0]->date['mois'] ."/". $xml[0]->date['annee'] ."</h5>";
                  echo "<h5 align='center'><b>Titre:</b>&nbsp;&nbsp;". $xml[0]->titre ."</h5></li>";
                  for($i = 1; $i <= sizeof($xml[0]->quesions->quesion); $i++) {
                    echo "<li class='list-group-item'> <b> Quesion". $i ."</b><br>";
                    for($j = 1; $j <= sizeof($xml[0]->quesions->quesion[$i-1]->partie); $j++) {
                      echo "<br><b>Partie" . $j . ":</b>&nbsp;&nbsp;". $xml[0]->quesions->quesion[$i - 1]->partie[$j - 1];
                    }
                    echo "</li>";
                  }
                } catch (Exception $e) { 
                    echo "<li><h3>Sujet vide !</h3></li>";
                }
                
              ?>
            </ul>
        </div>
        
    </div>
    
    </div>
    <div class="card text-center">
      <div class="card-body">
        <p class="card-text"><b>Projet XML 2021</b></p>
      </div>
      <div class="card-footer text-muted">
        ESP &copy; <?php echo date('Y')?>
      </div>
    </div>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/index.js"></script>
  </body>
</html>

