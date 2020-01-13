<?php 

include './db.php';
$datos =  empty( $_POST["titulo"] ) || empty( $_POST["descripcion"] );

if(  !$datos  ){
    //echo 'coon datos';

    $title = $_POST["titulo"];
    $descripcion =  $_POST["descripcion"];
    //insertar
    $query = "insert into tareas values(null,'$title','$descripcion',null)";

    $result = mysqli_query( $coneccion , $query );

    if(!$result){
        die("query failed");

    }
    else{
        header("Location:index.php");
        $_SESSION['mensaje'] = 'tarea guardada';
        $_SESSION['message_type'] = 'success';


    }

}else{
    //echo 'falto algun dato'; 
}


?>