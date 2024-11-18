<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le produit</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <style>
       
        .i {
            box-shadow: 800px 800px 800px black;
            width: 500px;
        }
        .header{
            box-shadow: 800px 800px 800px black;
            height: 60px;
           
           /* background-color: #d9e3f1;*/
        
        }
        .header img , .header h7{
            position: absolute;
            top : 10px;
            right: 5%;
        }
        .header img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            right: 2%;
            top:2px;
        }
        h7{
            margin-right: 22px;
            opacity: 0.5;
        }

    </style>
</head>
<?php
session_start();
require_once('connectbd.php');


if (!isset($_GET['id'])) {
    header('Location: admin.php'); 
    exit;
}


$id = $_GET['id'];
$article = $pdo->prepare("SELECT * FROM article WHERE id = ?");
$article->execute([$id]);
$result = $article->fetch();

if (!$result) {
    header('Location: admin.php'); 
    exit;
}
?>
<body>
    <div class="header shadow-lg">
    <?php echo'<h7>'.$_SESSION['nom'].'  '.$_SESSION['prenom'].'</h7>' ;?>
        <img src="src/profile-pic-blank-facebook-profile.jpg" alt="">
    </div>
    <div class="container vh-100 d-flex justify-content-center align-items-center ">
        <div class="form-container p-4 rounded shadow-lg border-opacity-75 i ">
            <form class="form-container" action="Update.php" method="post" enctype="multipart/form-data">
                <h2 class="text-center mb-4">Modifier le produit</h2>
                
                
    
                <!-- Email input -->
                <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                <div class="form-outline mb-3 position-relative">
                    <i class="fas fa-envelope position-absolute" style="left: 10px; top: 12px;"></i>
                    <input type="text" id="form3Example3" class="form-control fw-bold" name='libelle' value="<?php echo ($result['libelle']); ?>" required placeholder="Libelle" />
                </div>
               
    
                <!-- Password input -->
                <div class="form-outline mb-3 ">
                    <input type="number" id="myInput" class="form-control mb-2 fw-bold" name="prix" value="<?php echo ($result['prix']); ?>" required placeholder="Prix" />
                </div>
                <div class="form-outline mb-3 ">
                    <input type="number" id="myInput" class="form-control mb-2 fw-bold" name="quantite" value="<?php echo ($result['quantite']); ?>" require placeholder="quantité" />
                </div>
                <div class="form-outline mb-3 ">
                <textarea type="text" id="myInput" name="description" class="form-control mb-2 fw-bold" required  placeholder="Ajoutez un description du produit"><?php echo ($result['description']); ?></textarea>

                </div>
                <div class="form-outline mb-3 ">
                    <input type="file" id="myInput" name="fichier" class="form-control mb-2 fw-bold"/>
                </div>
    
    
                <!-- Submit button -->
                <button type="submit" value="valider" name="valider" class="btn btn-primary btn-block mb-3">Valider</button>
                <p class="fs-12">Non j'annule <a href="admin.php">Revenir a l'acceuil</a></p>
               
            </form>
        </div>
       
    </div>
    
 <script src="bootstrap/js/bootstrap.min.js"></script>
 
</body>
</html>