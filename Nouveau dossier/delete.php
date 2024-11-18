<?php
require_once('connectbd.php');
try{
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $stmt = $pdo->prepare("SELECT image FROM article WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();

        if ($result) {
            $imagePath = $result['image'];
    
            if (file_exists($imagePath)) {
                unlink($imagePath); 
            }
        }
        
        $sup = $pdo->prepare("DELETE FROM article WHERE id = :id");
        $sup->execute(['id' => $id]);
    
        header('location:admin.php');
       
        exit();
    }

}catch(Exception $e){
    echo $e->getMessage();
}

?>
