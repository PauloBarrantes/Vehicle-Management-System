<div class "navbar-fixed">
    <nav class=" navbar light-blue accent-3 z-depth-1">
            <div class="nav-wrapper container">
                <a href="#" class="center brand-logo ">   <span class="white-text text-darken-2"></span></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

            </div>

    </nav>
</div>
    <style>
    header, main, footer {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }
    </style>
  <ul id="mobile-demo" class="sidenav sidenav-fixed">
    <li><div class="user-view">
      <div class="background">
        <img src=" <?php echo base_url().'public/images/background.jpg' ?>" class="responsive-img">
      </div>
      <a href=" <?php echo base_url().'main/perfil' ?>"><img class="circle z-depth-5" src="<?php echo base_url().'public/images/chicken.png' ?>"></a>
      <a href=" <?php echo base_url().'main/perfil' ?>"><span class="white-text name">Paulo Barrantes</span></a>
      <a href=" <?php echo base_url().'main/perfil' ?>"><span class="white-text email">paulobarrantes98@gmail.com</span></a>
    </div></li>
        <li><a class="waves-effect" href=" <?php echo base_url().'' ?>"><i class="material-icons">home</i>Inicio</a></li>
        <li  class="active"><a href="#"><i class="material-icons ">bookmark</i>  Reservaciones</a></li>
        <li><a href="#"><i class="material-icons  ">assignment</i>  Control de Uso</a></li>
        <li><a href="#"><i class="material-icons ">settings</i>  Mantenimiento</a></li>
        <li><a href=" <?php echo base_url().'main/perfil' ?>"><i class="material-icons ">account_circle</i>  Perfil</a> </li>

    <li><div class="divider"></div></li>
        <li><a class="subheader">Administrador</a></li>
        <li><a class="waves-effect" href=" <?php echo base_url().'main/usuarios' ?>"><i class="material-icons ">people</i>Usuarios</a></li>
        <li><a href=" <?php echo base_url().'vehiculos' ?>"><i class="material-icons ">commute</i>  Vehículos</a> </li>
    <li><div class="divider"></div></li>

    <li><div class="divider"></div></li>

    <li><a class="waves-effect" href="<?php echo base_url().'main/logout' ?>"><i class="fa fa-sign-out-alt"></i>Cerrar Sesión</a></li>

  </ul>




<script>

      $(document).ready(function(){
        $('.sidenav').sidenav();
      });


</script>
