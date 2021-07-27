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
<?php require_once "vistas/partes/foot.php"; ?>