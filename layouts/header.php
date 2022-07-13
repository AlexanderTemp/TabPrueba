<?php $user = current_user(); ?>
<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <meta name="keywords" content="" />

      <!-- favicon -->
      <link rel="shortcut icon" href="assets/img/nut.png" type="image/png" />

      <title>
        <?php if (!empty($page_title))
        echo remove_junk($page_title);
        elseif(!empty($user))
        echo ucfirst($user['name']);
        else echo "Easy Business v.1.0.2 - El asistente virtual para tu negocio -- By Yoel.";?>
      </title>
      
      <!-- import material bootstrap 2-->
      <link rel="stylesheet" href="lib/css/bootstrap2.min.css" />

      <!-- date picker -->
      <link rel="stylesheet" href="lib/css/datepicker3.min.css" />
      <link rel="stylesheet" type="text/css" href="lib/DataTables/datatables.min.css"/>

      <script type="text/javascript" src="lib/js/jquery-3.5.1.js"></script>

      <!-- main custom styles-->
      <link rel="stylesheet" href="lib/css/main.css" />
      <!-- panels, cards, forms -->
      <link rel="stylesheet" href="lib/css/panel.css"/>

    </head>
    <body>
      <?php if ($session->isUserLoggedIn(true)): ?>
        <header id="header">
          <div class="logo pull-left"> TAB Almacen </div>
          <div class="header-content">
          <div class="header-date pull-left">
            <select class="form-select" name="institucion" id="">
              <!-- TODO: Enlace con base de datos tabla "Institución" -->
              <option selected>Transportes Aéreos Bolivianos</option>
              <option value="Otro">Otro</option>
            </select>
            <select class="form-select" name="almacen" id="">
              <!-- TODO: Enlace con base de datos tabla "Institución" -->
              <option selected>Almacen General</option>
              <option value="Otro">Otro</option>1
            </select>
          </div>
          <div class="pull-right clearfix">
            <ul class="info-menu list-inline list-unstyled">
              <li class="profile">
                <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
                  <img src="uploads/users/<?php echo $user['image'];?>" alt="user-image" class="img-circle img-inline">
                  <span><?php echo remove_junk(ucfirst($user['name'])); ?> <i class="caret"></i></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                      <a href="profile.php?id=<?php echo (int)$user['id'];?>">
                          <i class="glyphicon glyphicon-user"></i>
                          Perfil
                      </a>
                  </li>
                 <li>
                     <a href="edit_account.php" title="edit account">
                         <i class="glyphicon glyphicon-cog"></i>
                         Configuración
                     </a>
                 </li>
                 <li class="last">
                     <a href="logout.php">
                         <i class="glyphicon glyphicon-log-out"></i>
                         Salir
                     </a>
                 </li>
               </ul>
              </li>
            </ul>
          </div>
         </div>
        </header>
        //TODO: Manejo de niveles de usuario ver SQL
        <div class="sidebar">
          <?php if($user['user_level'] === '1'): ?>
            <!-- admin menu -->
          <?php include_once('admin_menu.php');?>

          <?php elseif($user['user_level'] === '2'): ?>
            <!-- Special user -->
          <?php include_once('special_menu.php');?>

          <?php elseif($user['user_level'] >= '3'): ?>
            <!-- User menu -->
          <?php include_once('user_menu.php');?>

          <?php endif;?>
       </div>
      <?php endif;?>

      <div class="page">
        <div class="container-fluid">
