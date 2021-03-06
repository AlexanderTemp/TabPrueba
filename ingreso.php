<?php
$page_title = 'Lista de grupos';
require_once('include/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
$all_groups = find_all('user_groups');
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-9">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-16">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row d-flex">
          <label for="numeroIngreso" class=>Número: </label>
          <input type="text" class="form-control" name="numeroIngreso" id="numeroIngreso" value="8">
        </div>
        <div class="row d-flex lg">
          <label for="fechaIngreso">Fecha: </label>
          <!-- TODO: Tipo de dato fecha seleccionar -->
          <input type="text" class="form-control" name="fechaIngreso" id="fechaIngreso">
        </div>
        <div class="row d-flex lg">
          <label for="numeroIngreso">Moneda: </label>
          <input type="text" class="form-control" name="monedaIngreso" id="monedaIngreso" value="Dolares" readonly>
        </div>
        <div class="row d-flex lg">
          <label for="numeroIngreso">Referencia: </label>
          <input type="text" class="form-control" name="referenciaIngreso" id="referenciaIngreso" value="">
        </div>
        <div class="row d-flex lg">
          <label for="personaIngreso">Persona: </label>
          <!-- TODO: Conexión con tabla encargados-->
          <select class="form-select form-select-lg" name="personaIngreso" id="personaIngreso">
            <option selected>Campos Rodriguez Ambar Rocio </option>
            <option value="Otro">Otro</option>
          </select>
        </div>
        <div class="row d-flex lg">
          <label for="numeroIngreso">Número: </label>
          <input type="text" class="form-control" name="numeroIngreso" id="numeroIngreso" value="8">
        </div>
        <div class="row d-flex lg">
          <label for="numeroIngreso">Número: </label>
          <input type="text" class="form-control" name="numeroIngreso" id="numeroIngreso" value="8">
        </div>

      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <i class="glyphicon glyphicon-th"></i>
          <span>Grupos</span>
        </strong>
        <a href="add_group.php" class="btn btn-info pull-right btn-sm"><i class="glyphicon glyphicon-plus"></i>Nuevo</a>
      </div>
      <div class="panel-body">
        <table class="table table-striped" id="tbl-groups">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;"></th>
              <th>Nombre del grupo</th>
              <th class="text-center" style="width: 20%;">Nivel del grupo</th>
              <th class="text-center" style="width: 15%;">Estado</th>
              <th class="text-center" style="width: 100px;">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($all_groups as $a_group) : ?>
              <tr>
                <td class="text-center"><?php echo count_id(); ?></td>
                <td><?php echo remove_junk(ucwords($a_group['group_name'])) ?></td>
                <td class="text-center">
                  <?php echo remove_junk(ucwords($a_group['group_level'])) ?>
                </td>
                <td class="text-center">
                  <?php if ($a_group['group_status'] === '1') : ?>
                    <span class="label label-success"><?php echo "Activo"; ?></span>
                  <?php else : ?>
                    <span class="label label-danger"><?php echo "Inactivo"; ?></span>
                  <?php endif; ?>
                </td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_group.php?id=<?php echo (int)$a_group['id']; ?>" data-toggle="tooltip" data-placement="left" title="Editar">
                      <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a href="delete_group.php?id=<?php echo (int)$a_group['id']; ?>" data-toggle="tooltip" data-placement="left" title="Eliminar">
                      <i class="glyphicon glyphicon-trash"></i>
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Mas de 10 se realiza corte -->
<?php if (count_id() > 10) : ?>
  <script type="text/javascript" src="lib/js/groups.js"></script>
<?php endif; ?>

<?php include_once('layouts/footer.php'); ?>