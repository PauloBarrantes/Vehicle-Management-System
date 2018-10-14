<div class="container">

    <br/>
    <div class="card">
      <div class="card-header card-header-success">
        <h4 class="card-title "><?php echo $nombre?> - Mis reservas </h4>
      </div>
    <div class="card-body">
    <div class="table-responsive ">
        <table class="table hover responsive-table centered ">
        <thead class="grey lighten-2 z-depth 2">
          <tr>
              <th class="text-center">
                  Carro
              </th>
              <th class="text-center">
                  Fecha de Salida
              </th>
              <th class="text-center">
                 Hora de Salida
              </th>
              <th class="text-center">
                 Todo el Día
              </th>
              <th class="text-center">
                 Más de un día
              </th>
              <th class="text-center">
                 Fecha de Llegada
              </th>
              <th class="text-center">
                 Hora de Llegada
              </th>
              <th class="text-center">
                  Editar
              </th>
          </tr>
      </thead>
            <tbody>
                <?php
                   foreach($reservas as $row){
                       $fechaInicio = new DateTime ($row->FechaInicio);
                       $fechaFinal = new DateTime ($row->FechaFinalizacion);
                       $horaInicio = new DateTime ($row->HoraInicio);
                       $horaFinal = new DateTime ($row->HoraFinalizacion);

                       echo '<tr>';
                       echo '<td class = "text-center">'.$row->PlacaVehiculo.'</td>';
                       echo '<td class = "text-center">'.$fechaInicio->format('d/m/Y').'</td>';
                       echo '<td class = "text-center">'.$horaInicio->format('h:i a').'</td>';
                       echo '<td class = "text-right">'."1".'</td>';
                       echo '<td class = "text-right">'."1".'</td>';
                       echo '<td class = "text-center">'.$fechaFinal->format('d/m/Y').'</td>';

                       echo '<td class = "text-center">'.$horaFinal->format('h:i a').'</td>';
                       echo '<td class = "text-center">
                            <button class = "btn btn-danger">Eliminar</button>
                       </td>';

                       echo '</tr>';
                   }
                   ?>
            </tbody>
        </table>
    </div>
  </div>

</div>
</div>
