<?php

if (isset($_POST["valider"])) {

    $libelle = htmlspecialchars($_POST['libelle']);
    $prix = htmlspecialchars($_POST['prix']);
    $quantite = htmlspecialchars($_POST['quantite']);
    $description = htmlspecialchars($_POST['description']);

    // Vérifie si un fichier a été téléchargé sans erreur
    if (isset($_FILES["fichier"]) && $_FILES["fichier"]["error"] == 0) {
        // Vérifie le type MIME du fichier
        $type = mime_content_type($_FILES["fichier"]["tmp_name"]);
        $typesAcceptes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp' , 'image/avif'];

        if (in_array($type, $typesAcceptes)) {
            // Définir le dossier de destination
            $dossier = "uploads/";
            
            // Extraire l'extension du fichier d'origine
            $extension = pathinfo($_FILES["fichier"]["name"], PATHINFO_EXTENSION);
            // Créer un nouveau nom de fichier unique
            $nouveauNom = uniqid('image_', true) . '.' . $extension;
            $fichier = $dossier . $nouveauNom;

            // Déplace le fichier téléchargé
            if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $fichier)) {
                echo "Fichier uploadé avec succès sous le nom : " . htmlspecialchars($fichier);
            } else {
                echo "Problème lors de l'upload du fichier.";
            }
        } else {
            echo "Veuillez télécharger un fichier image valide (JPEG, PNG, GIF, WEBP).";
        }
    } else {
        echo "Aucun fichier téléchargé ou une erreur est survenue.";
    }


  require_once('connectbd.php');
  if (!empty($libelle)) {

    try{
        $req = $pdo->prepare("INSERT INTO article (libelle, prix, description, quantite,image) VALUES (:libelle, :prix, :description, :quantite, :image)");
        $req->execute(array(
        'libelle' => $libelle,
        'prix' => $prix,
        'description' => $description,
        'quantite' => $quantite,
        'image' => $fichier 
    ));

    header('location:admin.php');
    exit();
    }catch(Exception $error){
        echo"Erreur: ".$error->getMessage();
    }
    
} else {
    echo"non non";
}
}
?>
