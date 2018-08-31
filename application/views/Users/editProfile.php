<div class="container">


    <?php
        $fattr = array('class' => 'form-signin');
        echo form_open('/main/adduser', $fattr);
    ?>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title">Editar mi perfil</h4>
          </div>

          <div class="card-body">

            <form class="login-form">

                <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-group">

                      <input name="name"type="text" id="name"class="form-control" placeholder="Nombre">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-group">

                      <input name="lastName"type="text" id="lastName"class="form-control" placeholder="Apellido">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-group">

                      <input name="email"type="email" id="email"class="form-control" placeholder="Correo electrónico">
                    </div>
                  </div>
                </div>
        
                <br/>                <br/>

              <button class="btn btn-success centered btn-block" type="submit" name="action">Editar Perfil</button>
              <br>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
      <!-- Viejo-->

</div>
