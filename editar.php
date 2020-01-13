<?php 

    include 'db.php';
    if( isset( $_GET['id'] ) ){
        $id = $_GET['id'];
        $query = "select * from tareas where id='$id'";

        $resultadito = mysqli_query($coneccion,$query );
        if( mysqli_num_rows($resultadito) == 1 ){
            //echo 'tu puede editar';
            $id = $_GET['id'];
            $query = "SELECT * FROM tareas WHERE id=$id";
            $result = mysqli_query($coneccion, $query);
            //echo var_dump($result);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $title = $row['titulo'];
                $description = $row['descripcion'];
              }

        }


    }


    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $title= $_POST['title'];
        $description = $_POST['description'];
        $query = "UPDATE tareas set titulo = '$title', descripcion = '$description' WHERE id=$id";
        $respuesta = mysqli_query($coneccion, $query);

        if(!$respuesta){
            die("query failed");
    
        }
        else{
            header("Location:index.php");
            $_SESSION['mensaje'] = 'tarea guardada';
            $_SESSION['message_type'] = 'success';
    
    
        }


       
    }
?>

<?php include('includes/header.php'); ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">

      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="title" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $description;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update</button>
      </form>

      </div>
    </div>
  </div>
</div>



<?php include('includes/footer.php'); ?>