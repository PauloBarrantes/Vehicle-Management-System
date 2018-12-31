

    <div class="container">

        <h1 class="text-center">Mantenimiento</h1>

        <div class="text-center">
            <h5 class="header col s12 light">Agrega un reporte de mantenimiento que se le hizo a un vehículo.</h5>
        </div>
        <?php $fattr = array('class' => 'form-signin');
         echo form_open(site_url().'main/login/', $fattr); ?>

                <div class="row justify-content-center">
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header card-header-success">
                        <h4 class="card-title">Mantenimiento</h4>
                        <p class="card-category">Llena los datos para reportar mantenimiento </p>
                      </div>

                      <div class="card-body">

                        <form class="login-form">
                          <div class="row justify-content-center">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label for="exampleFormControlSelect1">Seleccione el vehículo que desea reportar mantenimiento</label>
                                  <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Carro 1 - 123</option>
                                    <option>Carro 2 - 456</option>
                                  </select>
                                </div>
                              </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                  <label >Fecha de mantenimiento</label>
                                  <input type="text" id="datepicker" class="form-control floating-label" placeholder="Anote la fecha de salida">

                                  <script>
                                    $('#datepicker').datepicker();
                                  </script>
                                </div>
                              <div class="form-group">
                                  <label >Hora de mantenimiento</label>
                                  <input type="time" id="time1" class="form-control floating-label" placeholder="Anote la hora de salida">
                                  <script>
                                    $('#time1').timepicker();
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




                          <button class="btn btn-success centered btn-block" type="submit" name="action">Reportar</button>
                          <br>

                          <div class="clearfix"></div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Viejo-->


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
