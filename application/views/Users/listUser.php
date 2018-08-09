<div class="container">
    <h2 class="center">Lista de Usuarios</h2>
    <br> </br>
    <div class="table-responsive ">
        <table class="table hover responsive-table centered ">
        <thead class="grey lighten-2 z-depth 2">
          <tr>
              <th >
                  Nombre
              </th>
              <th>
                  Apellido
              </th>
              <th>
                 Email
              </th>
              <th>
                  Rol asignado
              </th>
              <th>
                 Rol
              </th>
              <th colspan="2">
                  Editar
              </th>
          </tr>
      </thead>
            <tbody>
                <?php
                       foreach($usuarios as $row)
                       {
                       if($row->rol == 0){
                           $rolename = "Usuario";
                       }elseif($row->rol == 1){
                           $rolename = "Administrador";
                       }

                       echo '<tr>';
                       echo '<td>'.$row->nombre.'</td>';
                       echo '<td>'.$row->apellido1.'</td>';

                       echo '<td>'.$row->email.'</td>';
                       echo '<td>'.$rolename.'</td>';
                       echo '<td><a href="'.site_url().'main/changelevel"><button type="button" class="btn btn-primary">Rol</button></a></td>';
                       echo '<td><a href="'.site_url().'main/deleteuser/'.$row->email.'"><button type="button" class="btn red">Eliminar</button></a></td>';
                       echo '</tr>';
                       }
                   ?>

            </tbody>
        </table>
    </div>
</div>
