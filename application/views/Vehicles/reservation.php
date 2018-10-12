

    <div class="container">


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
                                  <select class="form-control" id="exampleFormControlSelect1" name="carros">
                                    <option>Carro 1 - 123</option>
                                    <option>Carro 2 - 456</option>
                                  </select>
                                </div>
                              </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                  <label >Fecha de Salida</label>
                                  <input type="text" id="datepicker" class="form-control floating-label" placeholder="Anote la fecha de salida" name="fechaSalida">

                                  <script>
                                    $('#datepicker').datepicker();
                                  </script>
                                </div>
                              <div class="form-group">
                                  <label >Hora de Salida</label>
                                  <input type="time" id="time1" class="form-control floating-label" placeholder="Anote la hora de salida" name="horaSalida">
                                  <script>
                                    $('#time1').timepicker();
                                  </script>
                                </div>
                            </div>
                            <div class="row col-md-12 ">
                              <div class="form-check col-md-6" >
                                  <label class="form-check-label">
                                      <input id="otherDaysCheck" class="form-check-input" type="checkbox" value="" name="masDias">
                                      Más de un día
                                      <span class="form-check-sign">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                              </div>
                              <div class="form-check col-md-6">
                                  <label class="form-check-label">
                                      <input id="allDay" class="form-check-input" type="checkbox" value="" name="todoDia">
                                      Todo el día
                                      <span class="form-check-sign">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                              </div>
                            </div>

                            <script>
                                $(document).ready(function(){
                                  $("#otherDaysCheck").click(function(){
                                    $("#otherDays").toggle("slow");
                                    $('#allDay  ').is('[disabled=disabled]')
                                  });
                                  $("#allDay").click(function(){
                                    $("#otherDays").toggle("slow");
                                  });
                              });

                            </script>

                            <div class="col-md-12" >
                                <div id = "otherDays" class="form-group" style="display:none">
                                  <label >Fecha de Llegada</label>
                                  <input type="text" id="datepicker2" class="form-control floating-label" placeholder="Anote la fecha de salida"/>

                                  <script>
                                    $('#datepicker2').datepicker();
                                  </script>
                                </div>
                                <div id="HoraLlegada" class="form-group">
                                  <label >Hora de Llegada</label>
                                  <input type="time" id="time2" class="form-control floating-label" placeholder="Anote la hora de salida"/>
                                  <script>
                                    $('#time2').timepicker();
                                  </script>
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
