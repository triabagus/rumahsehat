<?php require_once('../Connections/koneksi.php'); ?>
<?php

require('../fpdf17/fpdf.php');

//Menampilkan data dari tabel di database

$result=mysql_query("SELECT * FROM tb_pembayaran ORDER BY no_bayar ASC") or die(mysql_error());

//Inisiasi untuk membuat header kolom
//$column_id = "";
$column_noinduk = "";
$column_nama = "";
$column_jk = "";
$column_kelas = "";

//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
	//$id = $row["id"];
    $noinduk = $row["no_bayar"];
    $nama = $row["kd_pasien"];
    $jk = $row["tglbyr"];
    $kelas = $row["jmlbyr"];
    

	//$column_id = $column_id.$id."\n";
    $column_noinduk = $column_noinduk.$noinduk."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_jk = $column_jk.$jk."\n";
    $column_kelas = $column_kelas.$kelas."\n";
  
//Create a new PDF file
$pdf = new FPDF('P','mm',array(220,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../img/red.jpg',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'-- DATA PEMBAYARAN --',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,' RUMAH SEHAT ',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(20,8,'No Bayar',1,0,'C',1);
$pdf->SetX(25);
$pdf->Cell(55,8,'Kode Pasien',1,0,'C',1);
$pdf->SetX(80);
$pdf->Cell(35,8,'Tanggal Bayar',1,0,'C',1);
$pdf->SetX(115);
$pdf->Cell(90,8,'Jumlah Pembayaran',1,0,'C',1);
$pdf->SetX(110);

$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(20,6,$column_noinduk,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(25);
$pdf->MultiCell(55,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(80);
$pdf->MultiCell(35,6,$column_jk,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(90,6,$column_kelas,1,'C');


$pdf->Output();
?>
