<?php require_once "vistas/partes/head.php"; ?>


<div class="bg-light">
    <div class="container">
        <h1 class="display-3 py-5"><?php echo $pagina; ?></h1>
    </div>
</div>

<div class="container">
    <div class="group-form">
    <form action="">
    <input name="nombre" type="text" class="form-control" placeholder="Write Here">
    <button name="buscar" class="btn btn-primary">Search</button>
    </form>
    </div>
</div>

<hr>

<div class="container">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Country_id</th>
      <th scope="col">Country</th>
      <th scope="col">Last_update</th>
    </tr>
  </thead>
  <tbody>
      <?php
        while($pais = mysqli_fetch_assoc($paises)){
          echo "<tr>
                    <th scope='row'>{$pais['country_id']}</th>
                    <td>{$pais['country']}</td>
                    <td>{$pais['last_update']}</td>
                </tr>";
        }
      ?>
  </tbody>
</table>
</div>
<?php require_once "vistas/partes/foot.php"; ?>