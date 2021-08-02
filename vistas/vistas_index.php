<?php require_once "partes/head.php";?>

<div class="bg-light">
    <div class="container">
        <h1 class="display-3 py-5"><?php echo $pagina; ?></h1>
    </div>
</div>
<div class="container">
    <div class="group-form">
        <form action="" method="post">
            <div>
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ej: Fulanito.">
            </div>
            <div class="group-form">
                <label for="">Apellido</label>
                <input name="nombre" type="text" class="form-control" placeholder="Ej: Guayacan.">
            </div>
            <br>
            <div class= "guardar">
                <button name="guardar" class="btn btn-info">Guardar</button>
            </div>
        <br>
    </div>
    <div class="container">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Actor_id</th>
      <th scope="col">First_name</th>
      <th scope="col">Last_name</th>
      <th scope="col">Last_update</th>
    </tr>

</div>
    <div><?php echo $_SESSION['mensaje'] ?? ""; ?> </div>
</div>

<?php require_once "partes/foot.php";?>