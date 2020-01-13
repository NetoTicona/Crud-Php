
<?php include "db.php"; ?>



<?php include './includes/header.php'  ?>

<!-- body -->

<div class="container">
    <div class="row">
        <div class="col-md-4">

            

            <?php if(isset( $_SESSION['mensaje'] )) : ?>
            <div class="alert alert-<?php echo $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['mensaje'] ; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset();  ?>
            <?php endif  ?>
           

            <div class="card card-body">
                <form action="guardar.php"  method="post">
                    <div class="form-group">

                        <input type="text" name="titulo" class="form-control" placeholder="titulo de la tarea" autofocus >

                    </div>
                    
                    <div class="form-group">

                    <textarea type="textarea" name="descripcion" rows="2" class="form-control" placeholder="descripcion de la tarea" autofocus ></textarea>

                    </div>
                  

                    <input type="submit" name="guardarTarea" class="btn btn-success btn-block " value="guradar" >

                   
                                    
                
                </form>
            
            
            </div>
        
        </div>

        <div class="col-md-8">
                <table class="table table-bordered" >
                    <tr>
                        <th>titulo</th>
                        <th>DEscripcion</th>
                        <th>creae en</th>
                        <th>acciones</th>  
                        <tbody>
                           <?php  
                           $query = "select * from tareas";
                           $resultadito = mysqli_query($coneccion,$query );
                           
                            ?> 
                           <?php while( $row = mysqli_fetch_array($resultadito) ): ?>
                            <tr>
                                <td> <?php echo $row["titulo"]   ?> </td>
                                <td> <?php echo $row["descripcion"]   ?> </td>
                                <td> <?php echo $row["fechaCreado"]   ?> </td>
                                <td> 
                                <a href="editar.php?id=<?php echo $row["id"] ?> ">
                                    <button type="button" class="btn btn-primary"> <i class="fa fa-marker"></i> editar</button>
                                </a>
                                <a href="borrar.php?id=<?php echo $row["id"] ?> ">
                                    <button type="button" class="btn btn-danger"> <i class="far fa-trash-alt"></i> Borrar</button>
                                </a>
                                
                                
                                </td>
                            </tr>
                           <?php endwhile  ?>
 
                        
                        </tbody>

                    </tr>
                
                </table>
        </div>
    
    </div>

</div>

    
<?php include './includes/footer.php'  ?>

