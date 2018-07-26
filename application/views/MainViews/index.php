<!-- Body Form-->

<div class="row">
        <div class="section no-pad-bot col s10 offset-s2" id="index-banner">
            <div class="container">
                <br><br>
                <h1 class="header center orange-text">¡Bienvenido!</h1>
                <div class="row center">
                    <h5 class="header col s12 light">Sistema para administrar el uso y mantenimiento de los vehículos del Programa de Investigación del Desarrollo Urbano Sostenible.</h5>
                </div>
                <div class="row">
                    <div class="card">
                        <div id="calendar" > </div>
                    </div>
                    <br>
                    <div class="row center">
                        <a href="/reservacion" id="download-button" class="btn-large waves-effect waves-light orange">Hacer Reservación</a>
                    </div>
                </div>
                <br><br>

            </div>
            <div class="fixed-action-btn">
                <a class="btn-floating btn-large blue">
                    <i class="large material-icons">mode_edit</i>
                </a>
                <ul>
                    <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
                    <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                    <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                    <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
                </ul>
            </div>
        </div>
</div>


<!--  Scripts-->

<script>

    $(function() {
        $('.fixed-action-btn').floatingActionButton();

        $('#calendar').fullCalendar({
            locale: 'es',
            header: {
                left: 'prev,next today myCustomButton',
                center: 'title',
                right: 'month,agendaWeek,agendaDay, list'
            }

        });


// when the selected option changes, dynamically change the calendar option
        $('#locale-selector').on('change', function() {
            if (this.value) {
                $('#calendar').fullCalendar('option', 'locale', this.value);
            }
        });
    });
</script>
