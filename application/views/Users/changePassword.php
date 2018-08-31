<div class="container">


    <?php
        $fattr = array('class' => 'form-signin');
        echo form_open('/main/adduser', $fattr);
    ?>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title">Cambiar mi contraseña</h4>
          </div>

          <div class="card-body">

            <form class="login-form">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-group">

                      <input name="password"type="password" id="password"class="form-control" placeholder="Contraseña">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">

                      <input name="passwordCheck"type="password" id="passwordCheck"class="form-control" placeholder="Digite de nuevo la contraseña">
                    </div>
                  </div>
                </div>
                <br/>                <br/>

              <button class="btn btn-success centered btn-block" type="submit" name="action">Cambiar Contraseña</button>
              <br>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
      <!-- Viejo-->

</div>
