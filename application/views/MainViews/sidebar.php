<div class "navbar-fixed">
    <nav class=" navbar cyan">
            <div class="nav-wrapper container">
                <a href="#" class="center brand-logo "> Administrador de Vehículos</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

            </div>

    </nav>
</div>
    <style>
    header, main, footer {
      padding-left: 240px;
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
      <a href="#user"><img class="circle z-depth-5" src="<?php echo base_url().'public/images/chicken.png' ?>"></a>
      <a href="#name"><span class="white-text name">John Doe</span></a>
      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div></li>
        <li><a class="waves-effect" href="#"><i class="material-icons">home</i>Inicio</a></li>
        <li><a href="\reservaciones"><i class="material-icons ">bookmark</i>  Reservaciones</a></li>
        <li><a href="\control"><i class="material-icons  ">assignment</i>  Control de Uso</a></li>
        <li><a href="\mantenimiento"><i class="material-icons ">settings</i>  Mantenimiento</a></li>
        <li><a href="\mantenimiento"><i class="material-icons ">account_circle</i>  Perfil</a> </li>

    <li><div class="divider"></div></li>
        <li><a class="subheader">Administrador</a></li>
        <li><a class="waves-effect" href="/usuarios"><i class="material-icons ">people</i>Usuarios</a></li>
        <li><a href="\mantenimiento"><i class="material-icons ">commute</i>  Vehículos</a> </li>
    <li><div class="divider"></div></li>

    <li><div class="divider"></div></li>

    <li><a class="waves-effect" href="#!"><i class="material-icons ">account_circle</i>Cerrar Sesión</a></li>

  </ul>




<script>

      $(document).ready(function(){
        $('.sidenav').sidenav();
      });


</script>
