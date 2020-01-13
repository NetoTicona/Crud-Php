<?php 
    include 'db.php';

    if(isset( $_GET['id'] )){
        $id = $_GET['id'];
        $query = "delete from tareas where id = '$id'";
        $resultadito = mysqli_query($coneccion,$query );
        if(!$resultadito){
            die("Query Failed");
        }else{
            header("Location: index.php");
            $_SESSION['mensaje'] = 'tarea borrada';
            $_SESSION['message_type'] = 'danger';
        }
    }


?>