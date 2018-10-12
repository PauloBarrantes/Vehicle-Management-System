<div class="container">
    <div class="row justify-content-center">
        <h2 class="text-center">Control de uso</h2>
        <div class="text-center">
            <p class="h5 col s12 light">Seleccione la reserva a la cuál le va corresponder este control de uso</p>
            <p class="h5 col s12 light">Complete los datos en las salidas y llegadas de la reserva</p>
        </div>
        <div class="col-lg-10 col-md-10">
                  <div class="card">
                    <div class="card-header card-header-tabs card-header-success">
                      <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                          <span class="nav-tabs-title">Control de Uso:</span>
                          <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                              <a class="nav-link active" href="#salidas" data-toggle="tab">
                                <i class="material-icons">arrow_upward</i> Salida
                                <div class="ripple-container"></div>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#llegadas" data-toggle="tab">
                                <i class="material-icons">arrow_downward</i> Llegada
                                <div class="ripple-container"></div>
                              </a>
                            </li>

                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="tab-pane active" id="salidas">
                         <!--Inician las salidas -->
                         <form class="login-form">

                            <div class="col-md-12">
                               <div class="form-group">
                                   <label for="reservacionSalida">Seleccione la reserva a la que corresponde el reporte</label>
                                   <select class="form-control" id="reservacionSalida">
                                     <option>28/08/2018 - Paulo</option>
                                     <option>01/09/2018 - Paulo</option>
                                   </select>
                                 </div>
                            </div>
                            <div class="col-md-12">
                                <div id="FechaSalida" class="form-group">
                                         <label >Fecha de Salida</label>
                                         <input type="text" id="datepicker" class="form-control floating-label" placeholder="Anote la fecha de salida">

                                         <script>
                                           $('#datepicker').datepicker();
                                         </script>
                                      </div>
                            </div>
                            <div class="col-md-12">
                                <div id="HoraSalida" class="form-group">
                                         <label >Hora de Salida</label>
                                         <input type="text" id="tiempoSalida" name="tiempoSalida"class="form-control floating-label" placeholder="Anote la hora de salida">
                                         <script>
                                           $('#tiempoSalida').timepicker();
                                         </script>
                                      </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">Km</div>
                                        </div>
                                      <input name="kmSalida" id="kmSalida"type="number" min="0"class="form-control" placeholder="Kilometraje">
                                    </div>
                                  </div>
                            </div>



                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="input-group  ">
                                    <span class="input-group-text">
                                        <i class="material-icons">local_gas_station</i>
                                    </span>
                                    <label> Combustible </label>

                                  <div class="col-md-12 range-slider">
                                    <input id = "combustibleSalida" name="combustibleSalida" class="range-slider__range" type="range" value="0" min="0" max="100">
                                    <span class="range-slider__value"></span>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <script>
                            var rangeSlider = function(){
                              var slider = $('.range-slider'),
                                  range = $('.range-slider__range'),
                                  value = $('.range-slider__value');

                              slider.each(function(){

                                value.each(function(){
                                  var value = $(this).prev().attr('value');
                                  $(this).html(value);
                                });

                                range.on('input', function(){
                                  $(this).next(value).html(this.value+"%");
                                });
                              });
                            };

                            rangeSlider();
                            </script>
                            <div class="col-md-12">
                                <div class="form-group">
                                   <label for="observacionesSalida">Observaciones</label>
                                   <textarea name="observacionesSalida" class="form-control" id="observacionesSalida" rows="4"></textarea>
                                 </div>
                            </div>


                             <br/>

                           <button class="btn btn-success centered btn-block" type="submit" name="action">Enviar</button>
                           <br>
                           <div class="clearfix"></div>
                         </form>
                         <!--Acaban las salidas -->

                        </div>
                        <div class="tab-pane" id="llegadas">
                        <!--Inician las llegadas -->
                        <form class="login-form">

                           <div class="col-md-12">
                              <div class="form-group">
                                  <label for="reservacionLlegada">Seleccione la reserva a la que corresponde el reporte</label>
                                  <select class="form-control" id="reservacionLlegada" name="reservacionLlegada">
                                    <option>28/08/2018 - Paulo</option>
                                    <option>01/09/2018 - Paulo</option>
                                  </select>
                                </div>
                           </div>
                           <div class="col-md-12">
                               <div id="FechaLlegada" class="form-group">
                                        <label >Fecha de Llegada</label>
                                        <input type="text" id="datepicker2" class="form-control floating-label" placeholder="Anote la fecha de llegada">

                                        <script>
                                          $('#datepicker2').datepicker();
                                        </script>
                                     </div>
                           </div>
                           <div class="col-md-12">
                               <div id="HoraLlegada" class="form-group">
                                        <label >Hora de Llegada</label>
                                        <input type="text" id="timeLlegada" class="form-control floating-label" placeholder="Anote la hora de llegada">
                                        <script>
                                          $('#timeLlegada').timepicker();
                                        </script>
                                     </div>
                               </div>

                           <div class="col-md-12">
                             <div class="form-group">
                                   <div class="input-group">
                                     <div class="input-group-prepend">
                                       <div class="input-group-text">Km</div>
                                       </div>
                                     <input name="kmLlegada" id="kmLlegada"type="number" min="0"class="form-control" placeholder="Kilometraje">
                                   </div>
                                 </div>
                           </div>



                           <div class="col-md-12">
                             <div class="form-group">
                               <div class="input-group  ">
                                   <span class="input-group-text">
                                       <i class="material-icons">local_gas_station</i>
                                   </span>
                                   <label> Combustible </label>

                                 <div class="col-md-12 range-slider">
                                   <input id="combustibleLlegada"name="combustibleLlegada"class="range-slider__range" type="range" value="0" min="0" max="100">
                                   <span class="range-slider__value"></span>
                                 </div>
                               </div>
                             </div>
                           </div>

                           <script>
                           var rangeSlider = function(){
                             var slider = $('.range-slider'),
                                 range = $('.range-slider__range'),
                                 value = $('.range-slider__value');

                             slider.each(function(){

                               value.each(function(){
                                 var value = $(this).prev().attr('value');
                                 $(this).html(value);
                               });

                               range.on('input', function(){
                                 $(this).next(value).html(this.value+"%");
                               });
                             });
                           };

                           rangeSlider();
                           </script>
                           <div class="col-md-12">
                               <div class="form-group">
                                  <label for="observacionesLlegada">Observaciones</label>
                                  <textarea name="observacionesLlegada" class="form-control" id="observacionesLlegada" rows="4"></textarea>
                                </div>
                           </div>


                            <br/>

                          <button class="btn btn-success centered btn-block" type="submit" name="action">Enviar</button>
                          <br>
                          <div class="clearfix"></div>
                        </form>                        <!--Acaban las llegadas -->

                        </div>

                      </div>
                    </div>
                  </div>
                </div>

    </div>


</div>

<style media="screen">

  .range-slider {
  margin: 60px 0 0 0%;
  }

  .range-slider {
  width: 100%;
  }

  .range-slider__range {
  -webkit-appearance: none;
  width: calc(100% - (73px));
  height: 10px;
  border-radius: 5px;
  background: #d7dcdf;
  outline: none;
  padding: 0;
  margin: 0;
  }
  .range-slider__range::-webkit-slider-thumb {
  -webkit-appearance: none;
          appearance: none;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: #2c3e50;
  cursor: pointer;
  transition: background .15s ease-in-out;
  }
  .range-slider__range::-webkit-slider-thumb:hover {
  background: #1abc9c;
  }
  .range-slider__range:active::-webkit-slider-thumb {
  background: #1abc9c;
  }
  .range-slider__range::-moz-range-thumb {
  width: 20px;
  height: 20px;
  border: 0;
  border-radius: 50%;
  background: #2c3e50;
  cursor: pointer;
  transition: background .15s ease-in-out;
  }
  .range-slider__range::-moz-range-thumb:hover {
  background: #1abc9c;
  }
  .range-slider__range:active::-moz-range-thumb {
  background: #1abc9c;
  }
  .range-slider__range:focus::-webkit-slider-thumb {
  box-shadow: 0 0 0 3px #fff, 0 0 0 6px #1abc9c;
  }

  .range-slider__value {
  display: inline-block;
  position: relative;
  width: 60px;
  color: #fff;
  line-height: 20px;
  text-align: center;
  border-radius: 3px;
  background: #2c3e50;
  padding: 5px 10px;
  margin-left: 8px;
  }
  .range-slider__value:after {
  position: absolute;
  top: 8px;
  left: -7px;
  width: 0;
  height: 0;
  border-top: 7px solid transparent;
  border-right: 7px solid #2c3e50;
  border-bottom: 7px solid transparent;
  content: '';
  }

  ::-moz-range-track {
  background: #d7dcdf;
  border: 0;
  }

  input::-moz-focus-inner,
  input::-moz-focus-outer {
  border: 0;
  }

</style>
