<?php
// Conexão com o banco de dados (alterar a senha para simonsen)
$conexao = pg_connect("host=localhost user=postgres port=5433 dbname=bd_romano password=postgres");

function relatorio() {
global $retorno_name,$relatorio,$arquivorel,$nomeprograma,$conexao;

define("../pdf/fpdf/font/");
require_once("../pdf/pdf.php");
	
$pdf = new PDF('P'); // Criando um relatório em orientação "retrato" --- L=paisagem
$pdf->SetName("Relatório de Pedidos","ROMANO.NET - Pizzaria online"); // Cabeçalho do Relatório
$pdf->Open(); // Abre um PDF
$pdf->addpage(); // Abre uma página
$pdf->SetX($pdf->Getx()+10); // Aumenta a coluna em 10 posições
$pdf->SetTextColor(0,64,128); // Altera a cor da fonte
$pdf->SetFont('arial', 'B', 9); // Altera o formato e o tamanho da fonte
// CABEÇALHO
// Cell -> Na seguinte ordem, escreve no pdf : largura,altura,conteudo,borda,quebra de linha,alinhamento
// Na 4a posição configura a borda da célula:
// 1 => Borda superior, inferior, esquerda, direita 0 => Sem borda
// B => Borda inferior L => Borda lado esquerdo R => Borda Lado direito T => Borda superior
$pdf->Cell(40,6,'CLIENTE','B',0,'C');
$pdf->Cell(60,6,'ENDEREÇO','B',0,'C');
$pdf->Cell(25,6,'PIZZA','B',0,'C');
$pdf->Cell(40,6,'TAMANHO | PREÇO','B',0,'C');
$pdf->Cell(30,6,'REFRIGERANTE','B',1,'C');
$sql = "select * from pedidos";
$res = pg_query($sql);
$pdf->SetFont('arial', '', 7); // Altera o formato e o tamanho da fonte
for ($i=0; $i < pg_num_rows($res); $i++) {
// CONTEÚDO DA TABELA
// Na seguinte ordem, escreve no pdf : largura,altura,conteudo,borda,quebra de linha,alinhamento
$pdf->Cell(40,6,pg_fetch_result($res,$i,'cliente'),1,0,'C');
$pdf->Cell(60,6,pg_fetch_result($res,$i,'endereco'),1,0,'C');
$pdf->Cell(25,6,pg_fetch_result($res,$i,'sabor'),1,0,'C');
$pdf->Cell(40,6,pg_fetch_result($res,$i,'tamanho_preco'),1,0,'C');
$pdf->Cell(30,6,pg_fetch_result($res,$i,'refri'),1,1,'C');
}
$pdf->Output($arquivorel); // Saída do relatório
}
relatorio(); // Executa a função
?>