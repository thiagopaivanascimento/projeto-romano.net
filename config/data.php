<?php

$meses = array ("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                  "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
                  
$semanas = array ("Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira",
                      "Quinta-feira", "Sexta-feira", "Sábado");
                      
$sem = date ("w", time());
$mes = date ("m", time());
$dia = date ("d", time());
$ano = date ("Y", time());

echo  $semanas[$sem] . ' , ' . $dia . ' de ' . $meses[$mes-1] . ' de ' . $ano;

?>
