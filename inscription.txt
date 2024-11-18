<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        .i {
            box-shadow: 800px 800px 800px black;
}
.message{
    
    font-weight : bold ;
    position : absolute ;
    top : 200px;
    right : 40%;
    left : 40%
}
/*CREATE DATABASE ma_base_de_donnees;

USE ma_base_de_donnees;

CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'utilisateur', 'moderateur') NOT NULL
);
*/
    </style>
</head>
<body>  
    <?php
        require_once 'connectbd.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nom = htmlspecialchars( $_POST["nom"] );
            $prenom = htmlspecialchars( $_POST["prenom"] );
            $email = htmlspecialchars( $_POST["email"] );
            $role = htmlspecialchars( $_POST["role"] );
            $password = htmlspecialchars( $_POST["password"] );

            if(empty($nom)||empty($prenom) || empty($email)||empty($role)||empty($password)){
                
                echo'<p class="text-center message" style="color:red">certains champs ne sont pas saisi</p>';

            }elseif($role == 'Votre Rôle'){
                echo'<p class="text-center message" style="color:red">Rôle User ou Admin</p>';
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo'<p class="text-center message" style="color:red">Entrer un email valid</p>';

            
            }elseif(strlen($password)< 4){
                echo'<p class="text-center message" style="color:red">mot de passe doit être de minimim 4 caractères</p>';
                
            }else{
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                echo $hashedPassword.'<br>';

                try{
                $req = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, email, role, password) VALUES (:nom, :prenom, :email, :role, :password)");
                $req->execute([
                    'nom'=> $nom,
                    'prenom'=>$prenom,
                    'email'=> $email,
                    'role'=> $role,
                    'password'=> $hashedPassword
                ]);

                echo '   
                 <p class="text-center message" style="color:green">Compte creé avec succès !</p>
    <div class="spinner-grow text-success message" role="status" style="left:38%">
  <span class="visually-hidden">Loading...</span>
</div>
                ';

                header('Refresh: 3; URL=connexion.php');
            

                }catch(Exception $error){
                    if($error->getCode()== 23000){
                        echo'<p class="text-center message" style="color:red">Un compte est deja creé avec ce mail</p>     ';
                    }
                }
                
            }
        }

    ?>
   
    <div class="container vh-100 d-flex justify-content-center align-items-center ">
        <div class="form-container p-4 rounded shadow-lg border-opacity-75 i">
            <form class="form-container" method="post">
                <h2 class="text-center mb-4">Inscrivez Vous</h2>
                
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" id="form3Example1" name="nom" class="form-control fw-bold" required placeholder="Nom"/>
                    </div>
                    <div class="col">
                        <input type="text" id="form3Example2" name="prenom" class="form-control fw-bold" placeholder="Prenom" required/>
                    </div>
                </div>
    
                <div class="form-outline mb-3">
                    <input type="email" id="form3Example3" name="email" class="form-control fw-bold" placeholder="Adresse email" required/>
                </div>
                <div class="form-outline mb-3 w-50">
                    <select id="disabledSelect" name="role" class="form-select" required>
                        <option>Votre Rôle</option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
    
                    </select>
                </div>
    
                <div class="form-outline mb-3 ">
                    <input type="password" id="myInput" name="password" class="form-control mb-2 fw-bold" placeholder="Mot de passe" required/>
                    <input type="checkbox" class="me-2" onclick="myFunction()"> Afficher le password
                </div>
    
    
                <button type="submit" class="btn btn-primary btn-block mb-3">S'inscrire</button>
                <p class="fs-12">Vous avez déja un compte <a href="connexion.php">connectez vous</a></p>
               
            </form>

        </div>

    </div>

    
 <script src="bootstrap/js/bootstrap.min.js"></script>
 <script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
 </script>
</body>
</html>