

    <div class="container">

        <h1 class="text-center">¡Bienvenido!</h1>

        <div class="text-center">
            <h5 class="header col s12 light">Sistema de administración de vehículos del Programa de Desarrollo Urbano Sostenible</h5>
        </div>
        <?php $fattr = array('class' => 'form-signin');
         echo form_open(site_url().'main/login/', $fattr); ?>

                <div class="row justify-content-center">
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header card-header-success">
                        <h4 class="card-title">Iniciar Sesión</h4>
                        <p class="card-category">Programa de Investigación del Desarrollo Urbano Sostenible</p>
                      </div>

                      <div class="card-body">

                        <form class="login-form">
                          <div class="row justify-content-center">

                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">email</i>
                                    </span>
                                  </div>
                                  <input name="email"type="email" id="email"class="form-control" placeholder="Correo electrónico">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">vpn_key</i>
                                    </span>
                                  </div>
                                  <input name="password"type="password" id="password"class="form-control" placeholder="Contraseña">
                                </div>
                              </div>
                            </div>
                          </div>

                          <button class="btn btn-success centered btn-block" type="submit" name="action">Iniciar sesión</button>
                          <br>
                          <div>
                            <style media="screen">
                            .support {
                                position: fixed;
                                bottom: 20px;
                                right: 0px;
                                left: 2px;
                                text-transform: uppercase;
                                font-size: 12px;
                                letter-spacing: 1px;
                                text-align: left;
                                position: relative;
                                z-index: 10;
                                }
                                .support a {
                                color: black;
                                text-decoration: none;
                                position: relative;
                                display: inline-block;
                                margin-top: 10px;
                                }
                                .support a:before {
                                display: block;
                                position: absolute;
                                content: "";
                                bottom: -2px;
                                width: 0;
                                height: 1px;
                                background-color: rgba(0, 0, 0, 0.3);
                                transition: 0.3s;
                                }
                                .support a:hover:before {
                                width: 100%;
                                }
                            </style>
                            <div class="support">
                               <a href="#">Olvide mi contraseña</a><br>
                               <a href="#">Registrame</a>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Viejo-->


            </div>


    </div>
