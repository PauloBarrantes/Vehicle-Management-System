<div class="container">
    <h2 class="text-center">Lista de Vehículos</h2>
    <br> </br>

    <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title "> <i class="fas fa-car"></i> Vehículos</h4>
        </div>
        <div class="card-body">
    <div class="table-responsive ">
        <table class="table hover responsive-table centered ">
        <thead class="grey lighten-2 z-depth    2">
          <tr>
              <th class="text-center">
                  Placa
              </th>
              <th class="text-center">
                  Marca
              </th>
              <th class="text-center">
                  Modelo
              </th>
              <th class="text-center">
                  Kilometraje
              </th>
              <th class="text-center">
                  Cantidad de Combustible
              </th>
              <th  class="text-center">
                  Modificar
              </th>
              <th  class="text-center">
                  Eliminar
              </th>
          </tr>
      </thead>
      <tbody>
          <?php
             foreach($vehiculos as $row)
             {


             echo '<tr>';
             echo '<td class = "text-center">'.$row->placa.'</td>';
             echo '<td class = "text-center">'.$row->marca.'</td>';

             echo '<td class = "text-center">'.$row->modelo.'</td>';
             echo '<td class = "text-right">'.$row->kilometraje.'</td>';
             echo '<td  class = "text-center" >
                 <div class="progress" style = "margin-left: 15%;margin-right: 10%;">
                   <div class="progress-bar bg-info" style="width: '.$row->combustible.'%" role="progressbar" aria-valuenow=" '.$row->combustible. '" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
             </td>';
             echo '<td class = "text-center"><a href="'.site_url().'vehiculos/editVehicle/'.$row->placa.'"><button type="button" class="btn btn-warning btn-rounded">Editar</button></a></td>';
             echo '<td class = "text-center><a href="'.site_url().'vehiculos/deleteVehicle/'.$row->placa.'"><button type="button" class="btn btn-danger btn-rounded">Eliminar</button></a></td>';
             echo '</tr>';
             }
             ?>

            </tbody>
        </table>
    </div>
    </div>
    </div>

    <a href="<?php echo site_url();?>/vehiculos/agregarVehiculo"><button class="btn btn-success centered btn-block"><i class="material-icons">person_add</i> Añadir un vehículo</button><a>
</div>
