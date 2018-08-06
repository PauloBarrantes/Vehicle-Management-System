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
                <br>

        <div id="login-page" class="row">
            <div class=" offset-l3 offset-xl4 col s12 m12 l6 xl4 z-depth-3 card-panel">

                <br>
                <form class="login-form">
                    <div class="input-field  col s8 offset-s2">
                        <img  src=" <?php echo base_url().'public/images/logo.png' ?>"> </img>
                        <p class="center">Programa de Investigación de Desarrollo Urbano Sostenible </p>
                    </div>
                    <!--Input Field Email -->
                    <div class="input-field  col s8 offset-s2">
                        <i class="material-icons prefix">email</i>
                        <input id="email_inline" type="email" class="validate">
                        <label for="email_inline">Email</label>
                    </div>
                    <!--Input Field Password -->
                    <div class="input-field center col s8 offset-s2">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>

                        <div class="input-field center col s12 ">
                            <button class="btn btn-large waves-effect waves-light" type="submit" name="action">Iniciar sesión
                            </button>
                        </div>
                            <br><br>

                    </form>

            </div>


    </div>

</div>
