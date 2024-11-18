<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <style>
        .i {
            box-shadow: 800px 800px 800px black;
            width: 400px;
        }

        .message{
    
    font-weight : bold ;
    position : absolute ;
    top : 200px;
    right : 40%;
    left : 40%
}
    </style>
</head>
<body>
    <?php
     session_start();
     require_once 'connectbd.php';
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = htmlspecialchars( $_POST["email"] );
        $password = htmlspecialchars( $_POST["password"] );
   

        if(empty($email)||empty($password)){
            echo'
            <p class="text-center message" style="color:red">Certains champs nne sont pas saissi</p>
               ';
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo'
            <p class="text-center message" style="color:red">Entrez un email valid</p>
               ';
            
        }else{

            try{
                $req = $pdo->prepare("Select * from utilisateurs where email = ?");
                $req->execute([$email]);
                $result = $req->fetch();
            }catch(Exception $error){
                echo"Erreure: $error->getMessage()";
            }

            if($result){
              if(password_verify($password,$result["password"])){
                $_SESSION['nom'] = $result['nom'];
                $_SESSION['prenom'] = $result['prenom'];
                $_SESSION['id'] = $result['id'];
                 header("location:admin.php") ;
              }else{
                echo'
                 <p class="text-center message" style="color:red">Email ou mot de passe incorrecte</p>
                    ';
              }
               
            }else{
                echo'
                 <p class="text-center message" style="color:red">Email ou mot de passe incorrecte</p>
                    ';
            }

            
           
        }
    }


    ?>

    <div class="container vh-100 d-flex justify-content-center align-items-center ">
        <div class="form-container p-4 rounded shadow-lg border-opacity-75 i ">
            <form class="form-container" action="" method='post'>
                <h2 class="text-center mb-4">Connectez Vous</h2>
                
                
    
                <!-- Email input -->
                <div class="form-outline mb-3 position-relative">
                    <i class="fas fa-envelope position-absolute" style="left: 10px; top: 12px;"></i>
                    <input type="email" id="form3Example3" name='email' class="form-control fw-bold" spellcheck="false" autocomplete="off" required placeholder="Adresse email" />
                </div>
               
    
                <!-- Password input -->
                <div class="form-outline mb-3 ">
                    <input type="password" id="myInput" name='password' class="form-control mb-2 fw-bold" spellcheck="false" autocomplete="off" required placeholder="Mot de passe" />
                    <input type="checkbox" class="me-2" onclick="myFunction()"> Afficher le password
                </div>
    
    
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-3">Envoyer</button>
                <p class="fs-12">Vous n'avez pas un compte <a href="inscription.php">Inscrivez vous</a></p>
               
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