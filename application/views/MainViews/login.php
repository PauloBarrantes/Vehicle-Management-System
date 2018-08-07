<style>
 .col.s12 > .btn {
       width: 50%;
    }
</style>

    <div class="container">

        <h1 class="header center orange-text">¡Bienvenido!</h1>
        <div class="row center">
            <h5 class="header col s12 light">Sistema de administración de vehículos del Programa de Desarrollo Urbano Sostenible</h5>
            <h6 class="header col s12 light">Por favor inicia sesión</h6>
        </div>
        <?php $fattr = array('class' => 'form-signin');
         echo form_open(site_url().'main/login/', $fattr); ?>
        <br>


        <div id="login-page" class="row">
            <div class=" offset-l3 offset-xl4 col s12 m12 l6 xl4 z-depth-3 card-panel">
                <div class=" input-field center col s4 ">
                    <img  src=" <?php echo base_url().'public/images/garage.png' ?>" class="responsive-img">
                </div>
                <div class=" input-field center col s4  ">
                    <img class="" src=" <?php echo base_url().'public/images/control.png' ?>" class="responsive-img">
                </div>
                <div class="  input-field center col s4 ">
                    <img class="" src=" <?php echo base_url().'public/images/mantenimiento.png' ?>" class="responsive-img">
                </div>
                <br>
                <form class="login-form">

                    <div class="input-field  col s10 offset-s1">
                        <p class="center">Programa de Investigación de Desarrollo Urbano Sostenible </p>
                    </div>

                    <br></br>
                    <div class="col s12     divider"></div>
                    <!--Input Field Email -->
                    <div class="form-group input-field  col s10 offset-s1">
                        <i class="material-icons prefix">email</i>
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email_inline">Email</label>
                    </div>
                    <!--Input Field Password -->
                    <div class="form-group input-field center col s10 offset-s1">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>

                    <br></br>

                        <div class="input-field center col s12 ">
                            <button class="btn btn-large waves-effect waves-light" type="submit" name="action">Iniciar sesión
                            </button>
                        </div>
                            <br><br>
                        <div class="input-field center col s12">
                            <p>Olvido su contraseña? <a href="<?php echo site_url();?>main/forgot">Recuperar contraseña</a></p>
                        </div>
                    </form>

            </div>


    </div>
<script>window.Materialize.toast('I am a toast!', 4000)</script>

</div>
