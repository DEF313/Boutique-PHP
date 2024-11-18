<?php
require_once('connectbd.php');

$comment = $_POST['comment'];

$stmt = $pdo->prepare("INSERT INTO comments (comment) VALUES (:comment)");
$stmt->bindParam(':comment', $comment);
$stmt->execute();