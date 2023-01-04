<?php
error_reporting(0);
$namaFile = "all_responden_recap_report.xls";
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment; filename=$namaFile");
header("Content-Transfer-Encoding: binary ");

include "../../../koneksi.php";
include "../../../fungsi/fungsi_indotgl.php";

$hasil = mysql_query("SELECT * FROM pelayananofline");
$date = date('Y-m-d');
$time = date('H:i:s');
$dateIndo = tgl_indo($date);

echo "<table border=1 cellpadding=0 cellspacing=0>
		<tr>
			<td colspan=8 bgcolor=yellow style='border: none'; align='center'>Laporan Rekap Kuisioner Responden Offline</td>
		</tr>
		<tr>
			<td colspan=8>Dicetak : <b>$dateIndo $time</b></td>
		</tr>
		
		<tr>
		<td bgcolor=#c6e1f2 align=center><b>NO</b></td>
		<td bgcolor=#c6e1f2 align=center><b>ID</b></td>
		<td bgcolor=#c6e1f2 align=center><b>PILIHAN</b></td>
		<td bgcolor=#c6e1f2 align=center><b>KOMENTAR</b></td>
		<td bgcolor=#c6e1f2 align=center><b>JAWABAN BURUK</b></td>
		<td bgcolor=#c6e1f2 align=center><b>JAWABAN BIASA</b></td>
		<td bgcolor=#c6e1f2 align=center><b>JAWABAN BAIK</b></td>
		<td bgcolor=#c6e1f2 align=center><b>JAWABAN SANGAT BAIK</b></td>
		</tr>";
$no = 1;
while ($data = mysql_fetch_array($hasil)){ 
			echo "<tr valign=top>
			<td align='center'>$no</td>
			<td align='center'>$data[id]</td>
			<td align='center'>$data[pilihan]</td>
			<td align='center'>$data[komentar]</td>
			<td align='center'>".($data['kepuasan']=='buruk'?'1':'0')."</td>
			<td align='center'>".($data['kepuasan']=='biasa'?'1':'0')."</td>
			<td align='center'>".($data['kepuasan']=='baik'?'1':'0')."</td>
			<td align='center'>".($data['kepuasan']=='sangat baik'?'1':'0')."</td>
		  </tr>";	
		
		$no++;
}
$data_count = mysql_fetch_array(mysql_query("SELECT 
(SELECT COUNT(1) FROM pelayananofline WHERE kepuasan='buruk') as TotalBuruk,
(SELECT COUNT(1) FROM pelayananofline WHERE kepuasan='biasa') as TotalBiasa,
(SELECT COUNT(1) FROM pelayananofline WHERE kepuasan='baik') as TotalBaik,
(SELECT COUNT(1) FROM pelayananofline WHERE kepuasan='sangat baik') as TotalSangatBaik"));
echo "<tr align=center>
	
<td bgcolor=#c6e1f2 colspan='4'><b>Total</b></td>
<td bgcolor=#c6e1f2><b>$data_count[TotalBuruk]</b></td>
<td bgcolor=#c6e1f2><b>$data_count[TotalBiasa]</b></td>
<td bgcolor=#c6e1f2><b>$data_count[TotalBaik]</b></td>
<td bgcolor=#c6e1f2><b>$data_count[TotalSangatBaik]</b></td>
	</tr></table>";
?>