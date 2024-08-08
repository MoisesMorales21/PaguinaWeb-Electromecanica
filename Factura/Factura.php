<?php
	$id=$_REQUEST["idorden"];
	include ("../login_create/cn.php");
	# Incluyendo librerias necesarias #
	require "./code128.php";

	$pdf = new PDF_Code128('P','mm','Letter');
	$pdf->SetMargins(17,17,17);
	$pdf->AddPage();

	

	# Encabezado y datos de la empresa #
	$pdf->SetFont('Arial','B',16);
	$pdf->SetTextColor(32,100,210);
	$pdf->Cell(170,10,iconv("UTF-8", "ISO-8859-1",strtoupper("ESI- SERVICIOS INDUSTRIALES")),0,0,'C');



	# Logo de la empresa formato png #
	$pdf->Image('../Imagenes/Fondo2.png',15,12,35,35,'PNG');

	$pdf->Ln(9);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(147.5,9,iconv("UTF-8", "ISO-8859-1","RUC: 10157636893"),0,0,'R');

	$pdf->Ln(5);

	$pdf->Cell(183.5,9,iconv("UTF-8", "ISO-8859-1","Direccion: Huacho , Antonio Raymondi 378"),0,0,'R');

	$pdf->Ln(5);

	$pdf->Cell(149.5,9,iconv("UTF-8", "ISO-8859-1","Teléfono: 914320594"),0,0,'R');

	$pdf->Ln(5);

	$pdf->Cell(170.5,9,iconv("UTF-8", "ISO-8859-1","Email:  jmventocilla35@gmail.com"),0,0,'R');

	$pdf->Ln(6);

	$pdf->SetFont('Arial','',10);

	$pdf->Cell(145.5,7,iconv("UTF-8", "ISO-8859-1","Fecha de emisión:"),0,0,'R');
	

	//Sacamos los datos de la persona según la orden
		$persona=$mysql->query("SELECT o.fecha, p.nombre, p.apellido, p.dni, p.celular, p.direccion FROM orden o
		INNER JOIN usuario u ON o.idusuario=u.idusuario
		INNER JOIN persona p ON u.idpersona=p.idpersona
		WHERE o.idorden='$id'");


		foreach($persona as $pe)
            {


	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(116,7,iconv("UTF-8", "ISO-8859-1",
	$pe['fecha']),0,0,'L');
	/*$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(35,7,iconv("UTF-8", "ISO-8859-1",strtoupper("Factura Nro.")),0,0,'C');*/
	$pdf->Ln(10);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,iconv("UTF-8", "ISO-8859-1","Cliente:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,iconv("UTF-8", "ISO-8859-1",$pe['nombre']." ".$pe['apellido']),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(8,7,iconv("UTF-8", "ISO-8859-1","Dni: "),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,iconv("UTF-8", "ISO-8859-1",$pe['dni']),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(7,7,iconv("UTF-8", "ISO-8859-1","Tel:"),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,iconv("UTF-8", "ISO-8859-1",$pe['celular']),0,0);
	$pdf->SetTextColor(39,39,51);
	$pdf->Ln(7);

	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(16,7,iconv("UTF-8", "ISO-8859-1","Direccion:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(109,7,iconv("UTF-8", "ISO-8859-1",$pe['direccion']),0,0);
			}



	$pdf->Ln(9);

	# Tabla de productos #
	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(23,83,201);
	$pdf->SetDrawColor(23,83,201);
	$pdf->SetTextColor(255,255,255);
	
	$pdf->Cell(45,8,iconv("UTF-8", "ISO-8859-1","Servicio"),1,0,'C',true);
	$pdf->Cell(90,8,iconv("UTF-8", "ISO-8859-1","Subservico"),1,0,'C',true);

	$pdf->Cell(20,8,iconv("UTF-8", "ISO-8859-1","Cantidad"),1,0,'C',true);
	

	$pdf->Ln(8);

	$pdf->SetTextColor(39,39,51);

	$servicio=$mysql->query("SELECT se.descripcion as sedescripcion, su.descripcion as sudescripcion FROM detalleorden d
                                         INNER JOIN orden o ON d.idorden=o.idorden 
                                         INNER JOIN subservicio su ON d.idsubservicio=su.idsubservicio
                                         INNER JOIN servicio se ON su.idservicio=se.idservicio
                                         WHERE o.idorden='$id';");

	foreach($servicio as $sv)
            {
	/*----------  Detalles de la tabla  ----------*/
	$pdf->Cell(45,7,iconv("UTF-8", "ISO-8859-1",$sv['sedescripcion']),'L',0,'C');
	$pdf->Cell(90,7,iconv("UTF-8", "ISO-8859-1",$sv['sudescripcion']),'L',0,'C');
	$pdf->Cell(20,7,iconv("UTF-8", "ISO-8859-1","1"),'LR',0,'C');
	$pdf->Ln(7);
			}
	$pdf->Ln(12);

	$pdf->SetFont('Arial','',9);

	$pdf->SetTextColor(39,39,51);
	$pdf->MultiCell(0,9,iconv("UTF-8", "ISO-8859-1","*** Somos una empresa muy factible y eficaz. Para poder realizar un reclamo  debe de presentar esta factura ***"),0,'C',false);

	$pdf->Ln(9);

	# Codigo de barras #
	$pdf->SetFillColor(39,39,51);
	$pdf->SetDrawColor(23,83,201);
	$pdf->Code128(72,$pdf->GetY(),"COD000001V0001",70,20);
	$pdf->SetXY(12,$pdf->GetY()+21);
	$pdf->SetFont('Arial','',12);
	$pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","COD000001V0001"),0,'C',false);

	$pdf->Ln(20);
	$pdf->SetTextColor(255,0,0);
	$pdf->Cell(178,9,iconv("UTF-8", "ISO-8859-1","Nº de Factura: ".$id),0,0,'R');

	# Nombre del archivo PDF #
	$pdf->Output("I","Factura.pdf",true);

	
	?>