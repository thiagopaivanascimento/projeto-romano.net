<?php
// Conexão com o banco de dados (alterar a senha para simonsen)
$conecta = pg_connect("host=localhost port=5432 dbname=romano user=postgres password=post");

function relatorio() {
global $retorno_name,$relatorio,$arquivorel,$nomeprograma,$conecta;
// Incluindo a bibliote pdf
require_once("pdf.php");
    $pdf = new PDF('P'); // Criando um relatório em orientação "paisagem" 	
	
    $pdf->SetName("Relatório de Estados","Aula de PHP");  // Cabeçalho do Relatório
	
    $pdf->Open();       // Abre um PDF
	
	$pdf->addpage();    // Abre uma página	
	
	$pdf->SetX($pdf->Getx()+10);   // Aumenta a coluna em 10 posições
	
	$pdf->SetTextColor(0,64,128);  // Altera a cor da fonte
	
    $pdf->SetFont('Arial', 'B', 9);  // Altera o formato e o tamanho da fonte
	
    // CABEÇALHO
	// Cell -> Na seguinte ordem, escreve no pdf : largura,altura,conteudo,borda,quebra de linha,alinhamento
	// Na 4a posição configura a borda da célula: 
	// 1 => Borda superior, inferior, esquerda, direita    0 => Sem borda
	// B => Borda inferior   L => Borda lado esquerdo   R => Borda Lado direito    T => Borda superior
	$pdf->Cell(25,6,'UF','B',0,'L');	    
    $pdf->Cell(80,6,'ESTADO','B',1,'L');	    

    $sql = "select * from estados";
	$res = pg_query($sql);
	
    $pdf->SetFont('Arial', '', 9);  // Altera o formato e o tamanho da fonte

	for ($i=0; $i < pg_num_rows($res); $i++) {
	    // CONTEÚDO DA TABELA
		// Na seguinte ordem, escreve no pdf : largura,altura,conteudo,borda,quebra de linha,alinhamento
		$pdf->Cell(25,6,pg_fetch_result($res,$i,'uf'),0,0,'L');	    
    	$pdf->Cell(80,6,pg_fetch_result($res,$i,'estado'),0,1,'L');	    
	}

	$pdf->Output($arquivorel);  // Saída do relatório

}


// Executa a função
relatorio();

?>