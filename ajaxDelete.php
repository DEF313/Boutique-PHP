<?php
$q = intval($_GET['id']);

//$q = ($_POST['id']);

 require_once('connectbd.php');

 $req = $pdo->prepare("SELECT * FROM article WHERE id = :id");
 $req->execute(['id' => $q]);
 $req = $req->fetch();

 echo "
 
 <div class='container mt-5 '>
        <div class='row'>
            <div class='col-md-3'>
                <div class='custom-card'>
                    <img src='".$req['image']."' alt='Image' class='img-fluid' />
                </div>
            </div>
            <div class='col-md-6 d-flex align-items-center'>
                <div class='description'>
                    <h5><span >Détail du produit:</span> <span>". $req['libelle'] ."</span></h5>
                    <p> ".$req['description']."</p>
                  <a href='delete.php?id=" . $req['id'] . "' class='btn btn-danger'>supprimer</a> cette action va supprimer l'article de votre boutique<br>
                    <h7>chargé via Ajax<h7>
                   
                    </div>
            </div>
        </div>

    </div>

 
 ";




?>