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
//  ==================== start detail ======================
if($_GET['act']=='detail')
{
error_reporting(1);
session_start();


include "../../../koneksi.php";
include "../../../fungsi/fungsi_indotgl.php";
include "../../../fungsi/fungsi_rubah_tanda.php";

$date = date('Y-m-d');
$time = date('H:i:s');


$responden = mysql_fetch_array(mysql_query("SELECT * FROM pelayananofline WHERE id = '$_GET[id]'"));
$dateIndo = tgl_indo($responden['createdate']);

echo "<center><table border=0 cellpadding=10 cellspacing=3 bgcolor= #e6e6e6>
		<tr >
			<td colspan='8'  bgcolor=#337ab7 style='border: none ;color:white;'>
			<a href='../../master.php?module=hasil-offline&sub=all'>
			<button style='margin-right:220px;' class='btn'><span class='glyphicon glyphicon-arrow-left'></span> Kembali</button>
			</a>
			<b><font size=5>LAPORAN KUISIONER RESPONDEN</font></b>
			<a style='margin-left:300px;' href='exportExcelRespondenOffline.php?id=$_GET[id]'>
			</a>
			</td>
		</tr>
		<tr>
			<td >ID Responden</td> <td>:</td><td colspan='6'><b>$responden[id]</b></td>
		</tr>
		<tr>
			<td width=150>Tanggal Isi Survey</td> <td width=1>:</td><td > <b>$dateIndo </b></td>
		</tr>
		<tr>
			<td >Kepuasan</td> <td>:</td><td> <b>$responden[kepuasan]</b></td>
		</tr>
		<tr>
			<td >Pilihan</td> <td>:</td><td> <b>$responden[pilihan]</b></td>
		</tr>
		<tr>
			<td >Kritik dan Saran</td> <td>:</td><td> <b>$responden[komentar]</b></td>
		</tr>

	</table>
</center>";
}
//  ==================== end detail ======================

if($_GET['act']=='hapus')
{
	include "../../../koneksi.php";
	mysql_query("DELETE FROM pelayananofline WHERE id='$_GET[id]'");
	
	header('location:../../master.php?module=hasil-offline&sub=all');
	
}
?>
 