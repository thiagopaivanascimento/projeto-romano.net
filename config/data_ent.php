<?php

$meses = array ("Janeiro", "Fevereiro", "Mar�o", "Abril", "Maio", "Junho",
                  "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
              
$mes = date ("m", time());
$dia = date ("d", time());
$ano = date ("Y", time());

echo  $dia . ' / ' . $meses[$mes-1] . ' / ' . $ano;

?>