<?php 

# 
#   Grave esse script com o nome de pdf.php 
# 
//define('FPDF_FONTPATH','/srv/www/default/html/fpdf/fpdf151/font/');
//define("FPDF_FONTPATH", "http://127.0.0.1/fpdf/fpdf151/font/");
//define('FPDF_FONTPATH','C:\Arquivos de programas\Apache Group\Apache2\htdocs\fpdf\fpdf151\font\'); 

define('FPDF_FONTPATH', 'fpdf/font/');
require ("fpdf.php"); 

class PDF extends FPDF { 
	
    var $nome;          // nome do relatorio 
    var $cabecalho;     // cabecalho para as colunas 
	var $nommod;
	var $prog;
	var $sizeletra;
	var $semtitulo;
	var $instituicao;
	var $angle=0;	

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
	function barcode($valor) {
		$upx = 0.258; //0.258
		$altura = $upx*50;

$numeroso = array ("0" => "AABBA", 
"1" => "BAAAB",
"2" => 'ABAAB',
"3" => 'BBAAA',
"4" => 'AABAB',
"5" => 'BABAA',
"6" => 'ABBAA',
"7" => 'AAABB',
"8" => 'BAABA',
"9" => 'ABABA');
$duplas = array("AB" => "N", "BB" => "W", "AA" => "n" , "BA" => "w");

//$codigo = '39991100100000530003169774000000032093025202';





		$numeros = array("01" => "NnwwN", "02" => "nNwwN", "03" => "NNwwn", "04" => "nnWwN", "05" => "NnWwn",
				 "06" => "nNWwn", "07" => "nnwWN", "08" => "NnwWn", "09" => "nNwWn", "10" => "wnNNw",
				 "11" => "WnnnW", "12" => "wNnnW", "13" => "WNnnw", "14" => "wnNnW", "15" => "WnNnw",
				 "16" => "wNNnW", "17" => "wnnNW", "18" => "WnnNw", "19" => "wNnNw", "20" => "nwNNw",
				 "21" => "NwnnW", "22" => "nWnnW", "23" => "NWnnw", "24" => "nwNnW", "25" => "NwNnW",
				 "26" => "nWNnw", "27" => "nwnNW", "28" => "NwnNw", "29" => "nWnNw", "30" => "wwNNn",
				 "31" => "WwnnN", "32" => "wWnnN", "33" => "WWnnn", "34" => "wwNnN", "35" => "WwNnn",
				 "36" => "wWNnn", "37" => "wwnNN", "38" => "WwnNn", "39" => "wWnNn", "40" => "nnWNw",
				 "41" => "NnwnW", "42" => "nNwnW", "43" => "NNwnw", "44" => "nnWnW", "45" => "NnWnw",
				 "46" => "nNWnw", "47" => "nnwNW", "48" => "NnwNw", "49" => "nNwNw", "50" => "wnWNn",
				 "51" => "WnwnN", "52" => "wNwnN", "53" => "WNwnn", "54" => "wnWnN", "55" => "WnWnn",
				 "56" => "wNWnn", "57" => "wnwNN", "58" => "WnwNn", "59" => "wNwNn", "60" => "nwWNn",
				 "61" => "NwwnN", "62" => "nWwnN", "63" => "NWwnn", "64" => "nwWnN", "65" => "NwWnn",
				 "66" => "nWWnn", "67" => "nwwNN", "68" => "NwwNn", "69" => "nWwNn", "70" => "nnNWw",
				 "71" => "NnnwW", "72" => "nNnwW", "73" => "NNnww", "74" => "nnNwW", "75" => "NnNww",
				 "76" => "nNNww", "77" => "nnnWW", "78" => "NnnWw", "79" => "nNnWw", "80" => "WnNWn",
				 "81" => "WnnwN", "82" => "wNnwN", "83" => "WNnwn", "84" => "wnNwN", "85" => "WnNwn",
				 "86" => "wNNwn", "87" => "wnnWN", "88" => "WnnWn", "89" => "wNnWn", "90" => "nwNWn",
				 "91" => "NwnwN", "92" => "nWnwN", "93" => "NWnwn", "94" => "nwNwN", "95" => "NwNwn",
				 "96" => "nWNwn", "97" => "nwnWN", "98" => "NwnWn", "99" => "nWnWn", "00" => "nnWWn");

		// IMAGENS USADAS PARA A CRIA��O DAS BARRAS
		$pe = "<img src=\"preto.gif\" width=\"1\" height=\" $altura \">";
		$pl = "<img src=\"preto.gif\" width=\"3\" height=\" $altura \">";
		$be = "<img src=\"branco.gif\" width=\"1\" height=\" $altura \">";
		$bl = "<img src=\"branco.gif\" width=\"3\" height=\" $altura \">";
		$barras = array("W" => $pl . $bl, "w" => $pl . $be, "N" => $pe . $bl, "n" => $pe . $be);


		$retorno = $barras["n"];
		$retorno .= $barras["n"];
		$this->image('/srv/www/default/html/simonsen/preto.jpg',$this->Getx(),$this->Gety(),1*$upx,$altura);			
		$this->Setx($this->Getx()+1*$upx);										
		$this->image('/srv/www/default/html/simonsen/branco.jpg',$this->Getx(),$this->Gety(),1*$upx,$altura);
		$this->Setx($this->Getx()+1*$upx);
		$this->image('/srv/www/default/html/simonsen/preto.jpg',$this->Getx(),$this->Gety(),1*$upx,$altura);			
		$this->Setx($this->Getx()+1*$upx);										
		$this->image('/srv/www/default/html/simonsen/branco.jpg',$this->Getx(),$this->Gety(),1*$upx,$altura);
		$this->Setx($this->Getx()+1*$upx);

//		echo $retorno;
		for ($i=0;$i<43;$i=$i+2)
		{
/*		if ($i<10) {		
			$numDUPLA = "0".$i;
		//substr($codigo,$i,2);
		} else {
			$numDUPLA = (string) $i;		
		} */
		$num1 = substr($valor,$i,1);
		$num2 = substr($valor,$i+1,1);		
		$combina1 = $numeroso[$num1];
		$combina2 = $numeroso[$num2];
		$combinadupla="";
			for($x=0;$x<=4;$x++) {
				$dupla = substr($combina1,$x,1).substr($combina2,$x,1);
				$nw = $duplas[$dupla];
				$combinadupla .= $nw;
			}
//			$combinabarcode = $numeros[$num1.$num2];
//			echo $num1.$num2." - ".$combinadupla."-".$combinabarcode."<br>";
//			if ($combinadupla<>$combinabarcode) {
//				echo "<b>".$numDUPLA."</b> Meu: ".$combinadupla." &nbsp;&nbsp;&nbsp;&nbsp;Barcode :".$combinabarcode."<br>";
//			}

			// VERIFICA O NUMERO (00 A 99) E IMPRIME A BARRA CORRESPONDENTE
//			$num = substr($valor,$i,2);

			$cod = $combinadupla;

			for ($j=0;$j<= 4;$j++)
			{
		//			$retorno .= $barras[substr($cod,$j,1)];
				if (substr($cod,$j,1) == "W") {
					$this->image("/srv/www/default/html/simonsen/preto.jpg",$this->Getx(),$this->Gety(),3*$upx,$altura);			
					$this->Setx($this->Getx()+3*$upx);				
					$this->image("/srv/www/default/html/simonsen/branco.jpg",$this->Getx(),$this->Gety(),3*$upx,$altura);
					$this->Setx($this->Getx()+3*$upx);								
				}
				if (substr($cod,$j,1) == "w") {
					$this->image("/srv/www/default/html/simonsen/preto.jpg",$this->Getx(),$this->Gety(),3*$upx,$altura);			
					$this->Setx($this->Getx()+3*$upx);								
					$this->image("/srv/www/default/html/simonsen/branco.jpg",$this->Getx(),$this->Gety(),1*$upx,$altura);
					$this->Setx($this->Getx()+1*$upx);								
				}
				if (substr($cod,$j,1) == "N") {
					$this->image("/srv/www/default/html/simonsen/preto.jpg",$this->Getx(),$this->Gety(),1*$upx,$altura);			
					$this->Setx($this->Getx()+1*$upx);								
					$this->image("/srv/www/default/html/simonsen/branco.jpg",$this->Getx(),$this->Gety(),3*$upx,$altura);
					$this->Setx($this->Getx()+3*$upx);								
				}
				if (substr($cod,$j,1) == "n") {
					$this->image("/srv/www/default/html/simonsen/preto.jpg",$this->Getx(),$this->Gety(),1*$upx,$altura);			
					$this->Setx($this->Getx()+1*$upx);								
					$this->image("/srv/www/default/html/simonsen/branco.jpg",$this->Getx(),$this->Gety(),1*$upx,$altura);
					$this->Setx($this->Getx()+1*$upx);								
				}
			
			}

		}

 // IMPRIME BARRAS DO FIM
 				$this->image("/srv/www/default/html/simonsen/preto.jpg",$this->Getx(),$this->Gety(),3*$upx,$altura);			
				$this->Setx($this->Getx()+3*$upx);												
				$this->image("/srv/www/default/html/simonsen/branco.jpg",$this->Getx(),$this->Gety(),1*$upx,$altura);
				$this->Setx($this->Getx()+1*$upx);												
				$this->image("/srv/www/default/html/simonsen/preto.jpg",$this->Getx(),$this->Gety(),1*$upx,$altura);			
				$this->Setx($this->Getx()+1*$upx);																
				$this->image("/srv/www/default/html/simonsen/branco.jpg",$this->Getx(),$this->Gety(),1*$upx,$altura);
				$this->Setx($this->Getx()+1*$upx);																

	$retorno .= $barras["w"];
	$retorno .= $barras["n"];
//	echo $retorno;
//	return($retorno);

	}
	
	function MultiCell2($w,$h,$txt,$border=0,$align='J',$fill=0) {
			
	}
	function SetNomePrograma($programa) {
		$this->prog = $programa;
	}
    function Header() { 
	   if (!($this->semtitulo)) {
        $this->AliasNbPages(); // Define o numero total de paginas para a macro {nb} 
//        $this->Image('.jpg', 10, $this->Gety()-6,22); // importa uma imagem 
        $this->SetFont('Arial', '', 10);   		
		$this->SetTextColor(0,0,256);
        $data = strftime("%d/%m/%Y �s %T"); 
//		$this->SetX(-63); 												
        $this->Cell(60, 5, "Emiss�o: ".$data, 0, 1);				
		$this->instituicao = $_SESSION["c_nomins"];			
        $this->SetFont('Arial', '', 7);   				
//		$this->cell(0,5,$this->instituicao,0,0,'C');
		
		$this->SetTextColor(0,0,256);		
        $this->SetFont('Arial', '', 10);   				

//		$this->Sety($this->Gety()+5);				
//        $this->SetX(10); 		
		$this->Cell(0, 5, $this->modulo,0,0,'C'); 
		
//		$this->Cell(0, 10, $this->modulo,0,0,'C'); 		
        $this->SetX(-40); 						
        $this->SetFont('Arial', '', 10);   		
		$this->SetTextColor(0,0,0);
        $this->Cell(40, 5, "P�gina: ".$this->PageNo()." de {nb}", 0, 0);
		$this->SetY($this->GetY()+5);		
//        $data = strftime("%d/%m/%Y �s %T"); 
//		$this->SetX(-63); 												
//        $this->Cell(60, 10, "Emiss�o: ".$data, 0, 0);				
        $this->SetFont('Arial', 'B', 12);   		
		$this->SetTextColor(0,0,0);
        $this->SetX(0);		
		$this->Cell(0, 10, $this->nome,0,1,'C'); 
//		$this->SetY($this->GetY()+10);
		$this->SetTextColor(0,0,0);		

        $this->SetX(-10); 
        $this->line(10, $this->GetY(), $this->GetX(), $this->GetY()); // Desenha uma linha 
				

        if ($this->cabecalho) { // Se tem o cabecalho, imprime 
			$this->SetTextColor(0,64,128);		
            $this->SetFont('Arial', 'B', $this->sizeletra); 
            $this->SetX($this->GetX+10); 
            $this->Cell($this->GetStringWidth($this->cabecalho), 5, $this->cabecalho, 0, 1); 
        } 
        $this->SetX(-10); 
        $this->line(10, $this->GetY(), $this->GetX(), $this->GetY()); // Desenha uma linha 
		
        $this->SetXY(0, $this->GetY()+2); 
		}
    } 

    function Footer() { // Rodap� : imprime a hora de impressao e Copyright 
	   if (!($this->semtitulo)) {	
        $this->SetFont('Courier', 'BI', 8); 	
	    $this->SetXY(10, -5); 
        $this->Cell(0, 6,$this->prog, 0, 0, 'L'); 
        $this->SetXY(-10, -5); 
        $this->line(10, $this->GetY()-2, $this->GetX(), $this->GetY()-2); 
        $this->SetX(0); 
        $this->SetFont('Courier', 'BI', 8); 
        $data = strftime("%d/%m/%Y �s %T"); 		
        $this->Cell(0, 6,$this->modulo, 0, 0, 'R'); 
	   }	
    } 
	

	function Rotate($angle,$x=-1,$y=-1){
		if($x==-1)
			$x=$this->x;
		if($y==-1)
			$y=$this->y;
		if($this->angle!=0)
			$this->_out('Q');
		$this->angle=$angle;
		if($angle!=0)
		{
			$angle*=M_PI/180;
			$c=cos($angle);
			$s=sin($angle);
			$cx=$x*$this->k;
			$cy=($this->h-$y)*$this->k;
			$this->_out(sprintf('q %.5f %.5f %.5f %.5f %.2f %.2f cm 1 0 0 1 %.2f %.2f cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
		}
	}
	
	function RotatedText($x,$y,$txt,$angle){
		//Text rotated around its origin
		$this->Rotate($angle,$x,$y);
		$this->Text($x,$y,$txt);
		$this->Rotate(0);
	}
	
	function RotadedImage($file,$x,$y,$w,$h,$angle){
		//Image rotated around its upper-left corner
		$this->Rotate($angle,$x,$y);
		$this->Image($file,$x,$y,$w,$h);
		$this->Rotate(0);
	}
} 
?>