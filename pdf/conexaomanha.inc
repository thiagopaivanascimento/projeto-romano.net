<HTML>
<HEAD>
 <TITLE>Documento PHP</TITLE>
</HEAD>
<BODY>
<?php
$conecta = pg_connect("host=localhost port=5432 dbname=phpmanha user=postgres password=post");
if (!$conecta) { // Aqui testa se a conex�o foi estabelecida
die ('Falha na conex�o!!!');
}
?>
</BODY>
</HTML>
