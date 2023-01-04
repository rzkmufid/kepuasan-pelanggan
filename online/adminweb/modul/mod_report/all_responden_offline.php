<style>
	.btn {
  display: inline-block;
  padding: 6px 12px;
  font-size: 14px;
  font-weight: normal;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -ms-touch-action: manipulation;
      touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: #5cb85c; 
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
  margin-top:10px;
  margin-bottom: 10px;
  color: white;
}
@font-face {
  font-family: 'Glyphicons Halflings';

  src: url('../../../fonts/glyphicons-halflings-regular.eot');
  src: url('../../../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../../../fonts/glyphicons-halflings-regular.woff2') format('woff2'), url('../../../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../../../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../../../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
}
.glyphicon {
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: normal;
  line-height: 1;

  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.glyphicon-print:before {
  content: "\e045";
}
.glyphicon-arrow-left:before {
  content: "\e091";
}
</style>
<?php
error_reporting(0);


include "../../../koneksi.php";
include "../../../fungsi/fungsi_indotgl.php";

$hasil = mysql_query("SELECT * FROM pelayananofline");
$date = date('Y-m-d');
$time = date('H:i:s');
$dateIndo = tgl_indo($date);

echo "<center><table border=0 cellpadding=10 cellspacing=5 bgcolor= #e6e6e6>
		<tr >
			<td colspan='8'  bgcolor=#337ab7 style='border: none ;color:white;'>
			<a href='../../master.php?module=hasil-offline&sub=all'>
			<button style='margin-right:230px;' class='btn'><span class='glyphicon glyphicon-arrow-left'></span> Kembali</button>
			</a>
			<b><font size=5>REKAP KUISIONER RESPONDEN</font></b>
			<a href='exportExcelOffline.php'>
			<button style='margin-left:230px;' class='btn'><span class='glyphicon glyphicon-print'></span> Cetak</button></a>
			</td>
		</tr>
		<tr>
			<td colspan=2>Dicetak : <b>$dateIndo $time</b></td>
		</tr>
		
		<tr>
			<td>
				<table cellpadding=2 border=2 bgcolor='#fff'>
					<tr>
					<td bgcolor=#c6e1f2 align=center><b>NO</b></td>
					<td bgcolor=#c6e1f2 align=center><b>ID</b></td>
					<td bgcolor=#c6e1f2 align=center><b>PILIHAN</b></td>
					<td bgcolor=#c6e1f2 align=center><b>KOMENTAR</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN BURUK</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN BIASA</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN BAIK</b></td>
					<td bgcolor=#c6e1f2 align=center><b>JAWABAN SANGAT BAIK</b></td>
					<tr>
		";
$no = 1;
while ($data = mysql_fetch_array($hasil)){
		echo "<tr valign=top>
			<td align='center'>$no</td>
			<td align='center'>$data[id]</td>
			<td >$data[pilihan]</td>
			<td >$data[komentar]</td>
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
echo "<tr align='center'>
	
		<td bgcolor=#c6e1f2 colspan='4'><b>Total</b></td>
		<td bgcolor=#c6e1f2><b>$data_count[TotalBuruk]</b></td>
		<td bgcolor=#c6e1f2><b>$data_count[TotalBiasa]</b></td>
		<td bgcolor=#c6e1f2><b>$data_count[TotalBaik]</b></td>
		<td bgcolor=#c6e1f2><b>$data_count[TotalSangatBaik]</b></td>
		</tr>
	</table>
	</td>
	</tr>
	</table>
	<center>";
?>