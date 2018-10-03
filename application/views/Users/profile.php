<div class=" row justify-content-center">
  <br>
<div class="col-md-6 align-center">
  <div class="card card-profile">
    <div class="card-avatar">
        <img class="img" src="<?php echo base_url().'public/images/chicken.png' ?>" />
    </div>
    <div class="card-body ">
      <h6 class="card-category text-gray">      <?php
        if ($rol == 1) {
            echo "Administrador";
        }else{
            echo "Usuario";
        }

       ?>
</h6>
      <h4 class="card-title">      <?php echo $nombre," " ,$apellido1; ?></h4>
      <p class="card-description">
          <?php echo $email  ?>
      </p>
      <a href="<?php echo site_url();?>/main/editarPerfil" class="btn btn-info btn-round">Editar Perfil</a>
      <a href="<?php echo site_url();?>/main/cambiarContrasena" class="btn btn-info btn-round">Cambiar Contraseña</a>

    </div>
  </div>
</div>


</div>
