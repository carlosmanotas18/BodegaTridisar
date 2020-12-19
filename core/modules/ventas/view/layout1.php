<meta name="author" content="">

    <title>BODEGA TRIDISAR</title>

    <!-- Bootstrap core CSS -->
    <link href="res/bootstrap3/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="js/jquery-1.10.2.js"></script>


  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#E35F52; ">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" style="background-color:#E35F52">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./" style="font-size: 20px; color: black"> Bodega TRIDISAR<sup><small><span class="label label-danger">SAS</span></small> </a>

        </div>
        <center><h4 class="navbar-fixed-top" style="font-family: serif; font-size:20px; color: white ">CÚCUTA, NORTE DE SANTANDER, <?php 
        include "functions.php"; echo fechaColombia() ?></h4></center>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
<?php 

$u=null;
if(Session::getUID()!=""):
  $u = UserData::getById(Session::getUID());
?>
          <ul class="nav navbar-nav side-nav" style=" width: 16.8%">
          <li><a href="index.php?view=sell" style="color: #fff; border-bottom: white 1px solid"><i class="fa fa-usd"></i> Realizar Venta</a></li>
          
         
          <li><a href="index.php?view=products" style="color: #fff; border-bottom: white 1px solid"><i class="fa fa-glass"></i> Productos</a></li>
          <li><a href="index.php?view=categories" style="color: #fff; border-bottom: white 1px solid"><i class="fa fa-th-list"></i> Categorias </a></li>
          <li><a href="index.php?view=clients" style="color: #fff; border-bottom: white 1px solid"><i class="fa fa-smile-o"></i> Clientes </a></li>
          <li><a href="index.php?view=providers" style="color: #fff ; border-bottom: white 1px solid"><i class="fa fa-truck"></i> Proveedores </a></li>
          
          
          
          <?php if($u->is_admin):?>
            <li><a href="index.php?view=inventary" style="color: #fff;  border-bottom: white 1px solid "><i class="fa fa-area-chart"></i> Inventario</a></li>
            <li><a href="index.php?view=sells" style="color: #fff; border-bottom: white 1px solid"><i class="fa fa-shopping-cart"></i> Ver Ventas</a></li>
             <li><a href="index.php?view=boxhistory" style="color: #fff; border-bottom: white 1px solid"><i class="fa fa-archive"></i>Historial de caja </a></li>
          <li><a href="index.php?view=users" style="color: #fff; border-bottom: white 1px solid"><i class="fa fa-users"></i> Usuarios </a></li>
          <li><a href="index.php?view=re" style="color: #fff; border-bottom: white 1px solid"><i class="fa fa-refresh"></i> Reabastecer </a></li>
          <li><a href="index.php?view=res" style="color: #fff; border-bottom: white 1px solid"><i class="fa fa-th-list"></i> Reabastecimientos </a></li>
        <?php endif;?>
          </ul>
<?php endif;?>



<?php if(Session::getUID()!=""):?>
<?php 
$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID());
  $user = $u->name." ".$u->lastname;

  }?>
  
          <ul class="nav navbar-nav navbar-right navbar-user" style="background-color:#E35F52; ">
            <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white">
        <?php echo $user; ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=configuration">Cambiar contraseña</a></li>
          <li><a href="logout.php">Salir</a></li>
        </ul>
<?php else:?>
<?php endif; ?>




        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

<?php 
  // puedo cargar otras funciones iniciales
  // dentro de la funcion donde cargo la vista actual
  // como por ejemplo cargar el corte actual
  View::load("login");
?>


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->

<script src="res/bootstrap3/js/bootstrap.min.js"></script>
<script src="res/datepicker/js/bootstrap-datepicker.js"></script>
<script>
            $('.tip').tooltip();

            $('#alert').hide();
  var startDate = new Date();
      var endDate = new Date();
      $('#dp4').attr('data-date',startDate);
      $('#dp5').attr('data-date',endDate);

      $('#startDate').text($('#dp4').data('date'));
      $('#endDate').text($('#dp5').data('date'));
      $('#dp4').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() > endDate.valueOf()){
            $('#alert').show().find('strong').text('La fecha de inicio no debe ser mayor que la fecha de fin.');
          } else {
            $('#alert').hide();
            startDate = new Date(ev.date);
            $('#startDate').text($('#dp4').data('date'));
            $('#stdate').val($('#dp4').data('date'));
          }
          $('#dp4').datepicker('hide');
        });

      $('#dp5').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() < startDate.valueOf()){
            $('#alert').show().find('strong').text('La fecha de fin no debe ser menor que la fecha de inicio.');
          } else {
            $('#alert').hide();
            endDate = new Date(ev.date);
            $('#endDate').text($('#dp5').data('date'));
            $('#endate').val( $('#dp5').data('date') );
          }
          $('#dp5').datepicker('hide');
        });


</script>


  </body>
</html>
