<?php
class VisitasControlador
{
    static public function ctrListarVisitasParam($fechaInicial, $fechaFinal)
    {
        $repuesta = VisitasModelo::mdlListarVisitasParam($fechaInicial, $fechaFinal);
        return $repuesta;
    }
}
