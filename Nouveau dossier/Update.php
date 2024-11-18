<?php



    $id = $_POST['id'];
    $libelle = htmlspecialchars($_POST['libelle']);
    $prix = htmlspecialchars($_POST['prix']);
    $quantite = htmlspecialchars($_POST['quantite']);
    $description = htmlspecialchars($_POST['description']);
    $fichier = null; // Initialise $fichier

   // Vérifie si un fichier a été téléchargé sans erreur
    if (isset($_FILES["fichier"]) && $_FILES["fichier"]["error"] == 0) {
        // Vérifie le type MIME du fichier
        $type = mime_content_type($_FILES["fichier"]["tmp_name"]);
        $typesAcceptes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/avif'];

        if (in_array($type, $typesAcceptes)) {
            // Définir le dossier de destination
            $dossier = "uploads/";
            
            // Extraire l'extension du fichier d'origine
            $extension = pathinfo($_FILES["fichier"]["name"], PATHINFO_EXTENSION);
            // Créer un nouveau nom de fichier unique
            $nouveauNom = uniqid('image_', true) . '.' . $extension;
            $fichier = $dossier . $nouveauNom;

            // Déplace le fichier téléchargé
            if (!move_uploaded_file($_FILES["fichier"]["tmp_name"], $fichier)) {
                echo "Problème lors de l'upload du fichier.";
            }
        } else {
            echo "Veuillez télécharger un fichier image valide (JPEG, PNG, GIF, WEBP).";
        }
    } 

    require_once('connectbd.php');
    if (!empty($libelle)) {
        try {
            if (!empty($fichier)) {
                // Met à jour avec l'image
                $stmt = $pdo->prepare("SELECT image FROM article WHERE id = :id");
                $stmt->execute(['id' => $id]);
                $ancienneImage = $stmt->fetchColumn();

                if ($ancienneImage && file_exists($ancienneImage)) {
                    unlink($ancienneImage);
                }
        


                $req = $pdo->prepare("UPDATE article SET libelle = :libelle, prix = :prix, quantite = :quantite, description = :description, image = :image WHERE id = :id");
                $req->execute(array(
                    'id' => $id,
                    'libelle' => $libelle,
                    'prix' => $prix,
                    'description' => $description,
                    'quantite' => $quantite,
                    'image' => $fichier
                ));
            } else {
                // Met à jour sans l'image
                $req = $pdo->prepare("UPDATE article SET libelle = :libelle, prix = :prix, quantite = :quantite, description = :description WHERE id = :id");
                $req->execute(array(
                    'id' => $id,
                    'libelle' => $libelle,
                    'prix' => $prix,
                    'description' => $description,
                    'quantite' => $quantite
                ));
            }

            header("location:admin.php");
            exit();
        } catch(Exception $error) {
            echo "Erreur: " . $error->getMessage();
        }
    }



?>
