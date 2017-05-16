<?php
include "../conf/con.php";

$id = $_GET['id'];

$sql = $conn->prepare("DELETE FROM list_proker WHERE id_proker='$id'");
$sql->execute();

header('Location: ../ketuplak/index.php');
?>