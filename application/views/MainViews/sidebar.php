
<style media="screen">
    hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
</style>
<div class="sidebar" data-color="danger" data-background-color="grey">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo">


    <a href="<?php echo site_url();?>main/perfil" class="simple-text logo-normal">
      <?php echo $nombre," " ,$apellido1; ?>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav" id = "nav">
      <li class="nav-item   ">
        <a class="nav-link" href="<?php echo site_url();?>">
          <i class="material-icons">home</i>
          <p >Inicio</p>
        </a>
      </li>
      <li class="nav-item  ">
        <a class="nav-link " href="<?php echo site_url();?>vehiculos/reservar">
          <i class="material-icons">bookmark</i>
          <p >Reservación</p>
        </a>
      </li>
      <li class="nav-item  ">
        <a class="nav-link " href="<?php echo site_url();?>vehiculos/misReservaciones">
          <i class="material-icons">book</i>
          <p >Mis Reservaciones</p>
        </a>
      </li>

      <li class="nav-item   ">
        <a class="nav-link" href="<?php echo site_url();?>vehiculos/controlDeUso">
          <i class="material-icons">local_gas_station</i>
          <p >Control de Uso</p>
        </a>
      </li>
      <li class="nav-item   ">
        <a class="nav-link" href="<?php echo site_url();?>vehiculos/mantenimiento">
          <i class="fas fa-wrench"></i>
          <p >Mantenimiento</p>
        </a>
      </li>
      <li class="nav-item   ">
        <a class="nav-link" href="<?php echo site_url();?>main/perfil">
          <i class="material-icons">person</i>
          <p >Perfil</p>
        </a>
      </li>
    </hr>
    <?php
        if ($rol == 1) {
            ?>
            <li class="nav-item separator  ">

            </li>
            <li class="nav-item   ">
              <a class="nav-link" href="<?php echo site_url();?>main/usuarios">
                <i class="material-icons">people</i>
                <p >Usuarios</p>
              </a>
            </li>


            <li class="nav-item   ">
              <a class="nav-link" href="<?php echo site_url();?>vehiculos/">
                <i class="material-icons">directions_car</i>
                <p >Vehículos</p>
              </a>
            </li>
        <?php

    } ?>


    <li class="nav-item   active-pro ">
      <a class="nav-link" href="<?php echo site_url();?>main/logout">
        <i class="fas fa-sign-out-alt"></i>
        <p >Cerrar sesión</p>
      </a>
    </li>

      <!-- your sidebar here -->
    </ul>
  </div>
</div>
<div class="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="<?php echo site_url();?>">Sistema de Administración de Vehículos</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#pablo">
              <i class="material-icons">notifications</i> Notificaciones
            </a>
          </li>
          <!-- your navbar here -->
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="content">
    <div class="container-fluid">
      <!-- your content here -->

    <script>

    $(document).ready(function () {
    	var url = window.location;
    	   $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
    	   $('ul.nav a').filter(function() {
      		 return this.href == url;
    	    }).parent().addClass('active');
        });

      $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();


    </script>
