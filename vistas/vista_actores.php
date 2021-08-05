<?php require_once "partes/head.php"; ?>

<input type="checkbox" id="menu-toggle"/>
  <label id="trigger" for="menu-toggle"></label>
  <label id="burger" for="menu-toggle"></label>
  <ul id="menu">
    <li><a href="actores.php">Actores</a></li>
    <li><a href="categoria.php">Categorias</a></li>
    <li><a href="pais.php">Pais</a></li>
    <li><a href="lenguaje.php">Idiomas</a></li>
  </ul>
<div class="web">
<div class="">
            <div class="container">
                <h1 class=""><?php echo $pagina; ?></h1>
            </div>
        </div>
        
        <form action="" method="post">
                    <div class="container">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ej: Fulanito.">
                    </div>
                    <div class="group-form container">
                        <label for="">Apellido</label>
                        <input name="apellido" type="text" class="form-control" placeholder="Ej: Guayacan.">
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
                        </tr>";
                }
              ?>
          </tbody>
        </table>
        </div>  
</div>
      
        

<?php require_once "vistas/partes/foot.php"; ?>