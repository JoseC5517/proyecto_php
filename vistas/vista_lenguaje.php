<?php require_once "vistas/partes/head.php"; ?>


<input type="checkbox" id="menu-toggle"/>
  <label id="trigger" for="menu-toggle"></label>
  <label id="burger" for="menu-toggle"></label>
  <ul id="menu">
    <li><a href="index.php">Home</a></li>
    <li><a href="actores.php">Actores</a></li>
    <li><a href="categoria.php">Categorias</a></li>
    <li><a href="pais.php">Pais</a></li>
    <li><a class="activo" href="lenguaje.php">Idiomas</a></li>
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
                        <input type="text" name="nombre" class="form-control" placeholder="Ej: Patua.">
                    </div>
                    <br>
                    <div class= "container">
                        <button name="guardar" class="adios">Guardar</button>
                    </div>
                </form>
                <div class = "bye container">
                  <?php echo $_SESSION['mensaje'] ?? ""; ?> </div>
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
              <th scope="col">Languaje_id</th>
              <th scope="col">Name</th>
              <th scope="col">Last_update</th>
            </tr>
          </thead>
          <tbody>
              <?php
                while($lenguaje = mysqli_fetch_assoc($lenguajes)){
                  echo "<tr>
                            <th scope='row'>{$lenguaje['language_id']}</th>
                            <td>{$lenguaje['name']}</td>
                            <td>{$lenguaje['last_update']}</td>
                        </tr>";
                }
              ?>
          </tbody>
        </table>
        </div>  
</div>
<?php require_once "vistas/partes/foot.php"; ?>