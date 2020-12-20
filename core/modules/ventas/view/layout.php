<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/style2.css">

  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

  <!-- Ionic icons -->
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

  <title>BODEGA TRIDISAR</title>


</head>

<body>

  <div class="d-flex" id="content-wrapper">
    <?php 

    $u=null;
    if(Session::getUID()!=""):
      $u = UserData::getById(Session::getUID());
      ?>
      <!-- Sidebar -->
      <div id="sidebar-container" class="bg-primary">
        
        <div class="menu">
          <a href="index.php?view=home" class="d-block text-light p-3 border-0"><i class="icon ion-md-home lead mr-2"></i>
          Inicio</a>
          <a href="index.php?view=sell" class="d-block text-light p-3 border-0"><i class="icon ion-md-cash lead mr-2"></i>
          Realizar ventas</a>
          <a href="index.php?view=clients" class="d-block text-light p-3 border-0"><i class="icon ion-md-people lead mr-2"></i>
          Clientes</a>

          <a href="index.php?view=categories" class="d-block text-light p-3 border-0"><i class="icon ion-md-clipboard lead mr-2"></i>
          Categorias</a>
          <a href="index.php?view=products" class="d-block text-light p-3 border-0"><i class="icon ion-md-cart lead mr-2"></i>
          Productos</a>
          <a href="index.php?view=providers" class="d-block text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2"></i>
          Proveedores</a>


          <!-- SI ES ADMINISTRADOR-->
          
          <?php if($u->is_admin):?>
            <a href="index.php?view=inventary" class="d-block text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2"></i>
            Inventario</a>
          <?php endif;?>
          <?php if($u->is_admin):?>
            <a href="index.php?view=sells" class="d-block text-light p-3 border-0"><i class="icon ion-md-list lead mr-2"></i>
            Lista de ventas</a>
          <?php endif;?>
          <?php if($u->is_admin):?>
            <a href="index.php?view=users" class="d-block text-light p-3 border-0"><i class="icon ion-md-person lead mr-2"></i>
            Usuarios</a>
          <?php endif;?>
         <?php if($u->is_admin):?>
          <a href="index.php?view=box" class="d-block text-light p-3 border-0"><i class="icon ion-md-stats lead mr-2"></i>
          Caja</a>
        <?php endif;?>
        <?php if($u->is_admin):?>

          <a href="index.php?view=res" class="d-block text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2"></i>
          Reabastecimientos</a>
        <?php endif;?>
      </div>



    <?php endif;?>
  </div>
  <!-- Fin sidebar -->

  <div class="w-100">


    <?php if(Session::getUID()!=""):?>
      <?php 
      $u=null;
      if(Session::getUID()!=""){
        $u = UserData::getById(Session::getUID());
        $user = $u->name." ".$u->lastname;

      }?>

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container">

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="form-inline position-relative d-inline-block my-2">
            <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
            <button class="btn position-absolute btn-search" type="submit"><i class="icon ion-md-search"></i></button>
          </form>
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="assets/img/user-1.png" class="img-fluid rounded-circle avatar mr-2"
              alt="https://generated.photos/" />
              <?php echo $user; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php?view=configuration">Cambiar Contraseña</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php else:?>
  <?php endif; ?>
  <!-- Fin Navbar -->

  <?php 

  View::load("login");
  ?>

</div>
</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, { 
    type: 'bar',
    data: {
      labels: ['Feb 2020', 'Mar 2020', 'Abr 2020', 'May 2020'],
      datasets: [{
        label: 'Nuevos usuarios',
        data: [50, 100, 150, 200],
        backgroundColor: [
        '#12C9E5',  
        '#12C9E5',
        '#12C9E5',
        '#111B54'
        ],
        maxBarThickness: 30,
        maxBarLength: 2
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>

</body>
</html>
