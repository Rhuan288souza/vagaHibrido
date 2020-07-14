<?php
    require_once "db.php";
    
    if(isset($_GET["id"])){
  
        $query = $db->prepare("DELETE FROM `dadosclientes` WHERE id=:id");
        $query->bindParam(":id", $_GET["id"]);

        $query->execute();

        header("location: index.php");
    }
?>
