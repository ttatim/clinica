<?php
require_once('vendor/tcpdf/tcpdf.php');
include 'conexao.php';

$paciente_id = $_GET['paciente_id'];

$sql = "SELECT nome_completo FROM pacientes WHERE id = $paciente_id";
$result = $conn->query($sql);
$paciente = $result->fetch_assoc();

$sql = "SELECT * FROM evolucoes WHERE paciente_id = $paciente_id ORDER BY data_evolucao DESC";
$evolucoes = $conn->query($sql);

class MYPDF extends TCPDF {
    public function Header() {
        $this->Image('imgs/carlasub.jpg', 10, 10, 30, 38, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->SetFont('helvetica', 'B', 20);
        $this->Cell(0, 15, 'Relatório de Evolução do Paciente', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }
    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Relatório de Evolução do Paciente');
$pdf->SetHeaderData('', '', '', '');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);
$pdf->Write(0, "Nome do Paciente: " . $paciente['nome_completo'], '', 0, 'L', true, 0, false, false, 0);

$pdf->Ln(10);
while ($row = $evolucoes->fetch_assoc()) {
    $pdf->Write(0, $row['data_evolucao'] . ": " . $row['descricao'], '', 0, 'L', true, 0, false, false, 0);
    $pdf->Ln(5);
}

$pdf->Output('relatorio_paciente.pdf', 'I');
?>
