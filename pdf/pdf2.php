<?php 
# 
#   Grave esse script com o nome de pdf.php 
# 
define('FPDF_FONTPATH','http://127.0.0.1/folha/fpdf/fpdf151/');
require ("fpdf.php"); 
class PDF extends FPDF { 
    var $nome;          // nome do relatorio 
    var $cabecalho;     // cabecalho para as colunas 
	var $nommod;
	var $prog;
	var $sizeletra;
	var $semtitulo;
    function PDF($or = 'P',$unit = 'mm',$papersize = 'A4') { // Construtor: Chama a classe FPDF 
        $this->FPDF($or,$unit,$papersize); 
    } 
	function settitulo($bool) {
		$this->semtitulo = $bool;
	}
    function SetCabecalho($cab,$tamanholetra) { // define o cabecalho 
        $this->cabecalho = $cab; 
		$this->sizeletra = $tamanholetra;
    } 

    function SetName($nomerel,$nommod) { // nomeia o relatorio 
        $this->nome = $nomerel; 
		$this->modulo=$nommod;
    } 
	function MultiCell2($w,$h,$txt,$border=0,$align='J',$fill=0) {
			
	}
	function SetNomePrograma($programa) {
		$this->prog = $programa;
	}

    function Footer() { // Rodapé : imprime a hora de impressao e Copyright 
	   if (!($this->semtitulo)) {	
        $this->SetFont('Courier', 'BI', 8); 	
	    $this->SetXY(10, -5); 
        $this->Cell(0, 6,$this->prog, 0, 0, 'L'); 
        $this->SetXY(-10, -5); 
        $this->line(10, $this->GetY()-2, $this->GetX(), $this->GetY()-2); 
        $this->SetX(0); 
        $this->SetFont('Courier', 'BI', 8); 
        $data = strftime("%d/%m/%Y às %T"); 		
        $this->Cell(0, 6,$this->modulo, 0, 0, 'R'); 
	   }	
    } 
} 
?> 
