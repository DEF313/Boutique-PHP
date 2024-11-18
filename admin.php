<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'administration</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="sr/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="DataTables/datatables.min.css"> <!-- CSS de DataTables -->
    <link rel="stylesheet" href="src/admin.css"> <!-- CSS de DataTables -->
    
    <style>
        .table td {
    vertical-align: middle; 
}

.custom-card img {
    height: 100%; 
    object-fit: cover;
}
.description {
    max-height: 200px; 
    overflow-y: auto; 
    padding: 10px;
}
.header{
    box-shadow: 800px 800px 800px black;
    height: 60px;
   
  

}

.header img , .header h7{
    position: absolute;
    top : 10px;
    right: 5%;
}
.header h7{
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
#bg-white {
    background-color: white !important;
}

@media (max-width: 570px){
    .header h7{
    right: 9%;
}

}

@media (max-width: 890px){
    .header h7{
    right: 12%;
}

@media (max-width: 940px){
    .header h7{
    right: 10%;
}}
    </style>
   
</head>
<body>
    <?php
    session_start();
    require_once("connectbd.php");
    if(!isset($_SESSION['id'])|| !isset($_SESSION['nom']) || !isset($_SESSION['prenom'])){
        
        header("location:connexion.php");

       
    }
    $articles = $pdo->query("SELECT * FROM article ORDER BY id DESC");
    $a = $articles->fetch();
    ?>
    <div class="header shadow-lg">
    <?php echo'<h7>'.$_SESSION['nom'].'  '.$_SESSION['prenom'].'</h7>' ;?>
        <img src="src/profile-pic-blank-facebook-profile.jpg" alt="">
    </div>
    <div class="container mt-5 " id='container'>
        <div class="row">
            <div class="col-md-3">
                <div class="custom-card">
                    <img src='<?php echo $a['image']; ?>' alt="Image" class="img-fluid" />
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="description">
                    <h5>Recemment ajouté: <span><?php echo $a['libelle']; ?></span></h5>
                    <p> <?php echo $a['description']; $articles->execute();?></p>
                   
                    </div>
            </div>
        </div>
    </div>

<div class="container mt-5">
    <a href="ajouterArticle.html">
    <button type="button" class="btn btn-primary">Ajouter un produit</button>

    </a>
    <h2 class="text-center mb-2">Liste des Produits</h2>
    <div class="table-responsive">
        <table id="produitTable" class="table table-striped table-bordered text-center"> <!-- Ajout de text-center pour centrer le contenu -->
            <thead class="ta">
                <tr>
                    <th scope="col">Image du produit</th>
                    <th scope="col">Nom du produit</th>
                    <th scope="col">Prix du produit</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Données fictives -->
                 <?php     while ($result = $articles->fetch()){
                    echo "
                     <tr>
                    <td id='bg-white'><img src='" . $result['image'] . "' height='100' alt='Product Image'></td>
                    <td>".$result['libelle']."</td>
                    <td>".$result['prix']."<span> FCFA</span></td>
                    <td>
                        <button type='button' id='".$result['id']."' class='btn btn-success w-100 mb-2' onclick='AjaxDetails(" . $result['id'] . ")'>Details</button>
                        <a href='modifierArticle.php?id=" . $result['id'] . "' class='btn btn-outline-primary w-100 d-block mb-2'>Modifier</a>
                        <button type='button' id='".$result['id']."' onclick='AjaxDelete(" . $result['id'] . ")' class='btn btn-danger w-100'>Suprimmer</button>


                    </td>
                </tr>
                    " ;

                 } ?>
               
            
            </tbody>
        </table>
    </div>
</div>


<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="DataTables/datatables.min.js"></script> <!-- JS de DataTables -->
<script>
    


    $(document).ready(function() {
        $('#produitTable').DataTable({
           pageLength: 3,
            lengthMenu: [2,3, 5, 10, 25, 50],
            responsive: true,
            searching: true,
            language: {
                lengthMenu: "Afficher _MENU_ entrées",
                zeroRecords: "Aucun enregistrement trouvé",
                info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                infoEmpty: "Aucune entrée disponible",
                infoFiltered: "(filtré à partir de _MAX_ entrées totales)",
                search: "Recherche :"
            }
        });
    });

</script>
<script>

function AjaxDelete(str) {
        if (str == "") {
            return;
        } else {        
            let xmlhttp = new XMLHttpRequest();
            console.log(xmlhttp);
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("container").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "ajaxDelete.php?id=" + str, true);
            xmlhttp.send();

        }}



        function AjaxDetails(id) {
        if (id == "") {
            return;
        } else {  
            let xmlhttp = new XMLHttpRequest();
            console.log(xmlhttp);

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("container").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "ajaxDetails.php?id=" + id, true);
            xmlhttp.send();

        }}
</script>
</body>
</html>
