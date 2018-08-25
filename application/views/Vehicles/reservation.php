

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
                        <h4 class="card-title">Reservación</h4>
                        <p class="card-category">Llena los datos para procesar la reservación</p>
                      </div>

                      <div class="card-body">

                        <form class="login-form">
                          <div class="row justify-content-center">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label for="exampleFormControlSelect1">Seleccione el vehículo que desea reservar</label>
                                  <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Carro 1 - </option>
                                    <option>Carro 2 - </option>
                                  </select>
                                </div>
                              </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                  <label for="exampleFormControlSelect1">Fecha de Salida</label>
                                  <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Carro 1 - </option>
                                    <option>Carro 2 - </option>
                                  </select>
                                </div>
                            </div>
                            <div>
                              <div class="form-check">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" value="">
                                      Más de un día
                                      <span class="form-check-sign">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label for="exampleFormControlSelect1">Fecha de Llegada</label>
                                  <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Carro 1 - </option>
                                    <option>Carro 2 - </option>
                                  </select>
                                </div>
                            </div>
                            <div>
                              <div class="form-check">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" value="">
                                      Todo el día
                                      <span class="form-check-sign">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                              </div>
                            </div>

                          <button class="btn btn-success centered btn-block" type="submit" name="action">Reservar</button>
                          <br>

                          <div class="clearfix"></div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Viejo-->


            </div>


    </div>
