<?php require_once "partes/head.php"; ?>

<input type="checkbox" id="menu-toggle"/>
  <label id="trigger" for="menu-toggle"></label>
  <label id="burger" for="menu-toggle"></label>
  <ul id="menu">
    <li><a class="menu" href="index.php">Home</a></li>
    <li><a class="menu activo" href="actores.php">Actores</a></li>
    <li><a class="menu" href="categoria.php">Categorias</a></li>
    <li><a class="menu" href="pais.php">Pais</a></li>
    <li><a class="menu" href="lenguaje.php">Idiomas</a></li>
  </ul>
<div class="web">
<div class="">
            <div class="container">
                <h1 class="titulo-web"><?php echo $pagina; ?></h1>
            </div>
        </div>
        
        <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $info['actor_id'] ?? "";?>">
                    <div class="container">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" value="<?php echo $info['first_name'] ?? "";?>" class="form-control" placeholder="Ej: Fulanito.">
                    </div>
                    <div class="group-form container">
                        <label for="">Apellido</label>
                        <input name="apellido" type="text" value="<?php echo $info['last_name'] ?? "";?>" class="form-control" placeholder="Ej: Guayacan.">
                    </div>
                    <br>
                    <div class= "container">
                        <button name="guardar" class="adios">Guardar</button>
                    </div>
                </form>
                <div class = "bye container"><?php echo $_SESSION['mensaje'] ?? ""; ?> </div>
        <br>
        <div class="container">
            <div class="group-form">
            <form class="formBuscar" action="">
            <input name="nombre" type="text" class="hola" placeholder="Write Here">
            <button name="buscar" class="boton">Search</button>
            </form>
            </div>
            
        </div>
            </div>
        </div>
        
        <hr>
        
        <div class="container">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Actor_id</th>
              <th scope="col">First_name</th>
              <th scope="col">Last_name</th>
              <th scope="col">Last_update</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
              <?php
                while($actor = mysqli_fetch_assoc($actores)){
                  echo "<tr>
                            <th scope='row'>{$actor['actor_id']}</th>
                            <td>{$actor['first_name']}</td>
                            <td>{$actor['last_name']}</td>
                            <td>{$actor['last_update']}</td>
                            <td class ='holis'>
                              <a href='actores.php?editar={$actor['actor_id']}'><i class='far fa-edit'></i></a>
                              <a href='actores.php?eliminar={$actor['actor_id']}'><i class='fas fa-backspace'></i></a>
                            </td>
                        </tr>";
                }
              ?>
          </tbody>
        </table>
        </div>  
</div>
      
        

<?php require_once "vistas/partes/foot.php"; ?>