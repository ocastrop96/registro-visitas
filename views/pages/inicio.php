<div class="content-wrapper">
    <section class="content">
        <div class="card card-info">
            <div class="card-header">
                <h5 class="card-title m-0 font-weight-bold">Registro de Visitas</h5>
            </div>
            <div class="card-body">
                <button type="btn" class="ml-2 btn btn-info float-right" id="deshacer"><i class="fas fa-undo-alt"></i> Deshacer filtro
                </button>
                <button type="button" class="btn btn-default float-right" id="daterange-btn">
                    <span>
                        <i class="fa fa-calendar"></i>
                        <?php

                        if (isset($_GET["fechaInicialV"])) {

                            echo $_GET["fechaInicialV"] . " - " . $_GET["fechaFinalV"];
                        } else {

                            echo 'Rango de fecha';
                        }

                        ?>
                    </span>
                    <i class="fas fa-caret-down"></i>
                </button>

            </div>
            <div class="card-body">
                <table id="tablaVisitas" class="table table-bordered table-hover dt-responsive tablaVisitas">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Fecha</th>
                            <th>H.Visita</th>
                            <th>Documento</th>
                            <th>Visitante</th>
                            <th>Entidad</th>
                            <th>Motivo</th>
                            <th>Empleado Público</th>
                            <th>Oficina/Cargo</th>
                            <th>Lugar</th>
                            <th>H.Salida</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET["fechaInicialV"])) {
                            $fechaInicial = $_GET["fechaInicialV"];
                            $fechaFinal = $_GET["fechaFinalV"];
                        } else {
                            $fechaInicial = null;
                            $fechaFinal = null;
                        }

                        $Ofi = 1;
                        $visitas = VisitasControlador::ctrListarVisitasParam($fechaInicial, $fechaFinal);
                        foreach ($visitas as $key => $value) {
                            if ($value["estadoV"] == 1) {
                                $estadoVisita = '<button type="button" class="btn btn-block btn-secondary btn-sm"><i class="fas fa-clock"></i>&nbsp;' . $value["descEstado"] . '</button>';
                            } else if ($value["estadoV"] == 2) {
                                $estadoVisita = '<button type="button" class="btn btn-block btn-success btn-sm"><i class="fas fa-check-circle"></i>&nbsp;' . $value['descEstado'] . '</button>';
                            } else if ($value["estadoV"] == 3) {
                                $estadoVisita = '<button type="button" class="btn btn-block btn-danger btn-sm"><i class="fas fa-times-circle"></i>&nbsp;' . $value['descEstado'] . '</button>';
                            } else if ($value["estadoV"] == 4) {
                                $estadoVisita = '<button type="button" class="btn btn-block btn-warning btn-sm"><i class="fas fa-user-times"></i>&nbsp;' . $value['descEstado'] . '</button>';
                            }
                            echo '<tr>
                                <td>' . ($key + 1) . '</td>
                                <td>' . $value["fVisita"] . '</td>
                                <td>' . $value["hEntrada"] . '</td>
                                <td>' . $value["descTDoc"] . '-' . $value["vstNdoc"] . '</td>
                                <td>' . $value["vstNombre"] . '</td>
                                <td>' . $value["descEntidad"] . '</td>
                                <td>' . $value["descMotivo"] . '</td>
                                <td>' . $value["nombresEmp"] . '</td>
                                <td>' . $value["descOficina"] . '-' . $value["cargoVisitado"] . '</td>
                                <td>' . $value["descLugar"] . '</td>
                                <td>' . $value["hSalida"] . '</td>
                                <td>' . $estadoVisita . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>