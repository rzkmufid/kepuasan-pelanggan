
<script type="text/javascript" src="fusion/JS/jquery-1.4.js"></script>
<script type="text/javascript" src="fusion/JS/jquery.fusioncharts.js"></script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-new-window"></i> Hasil Kuisioner Offline
        </h1>
        <ol class="breadcrumb">
        	<li class="active">
                 <a href="master.php?module=hasil-offline&sub=all">Hasil Kuisioner</a>
            </li>
        	<?php if ($_GET['sub']=='all'){ ?>
            <li class="active">
                 <a href="master.php?module=hasil-offline&sub=all">Laporan</a>
            </li>
            <?php } ?>
        </ol>
    </div>
</div>

 <?php if ($_GET['sub']=='all')
 { ?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="panel-title">
						<b>Daftar Responden</b><button style="margin-left:710px;"  class='btn btn-sm btn-success' value='Print All to Excel' onclick=location.href='modul/mod_report/all_responden_offline.php'><span class="glyphicon glyphicon-zoom-in"></span> Rekap Semua Kuisioner</button>
					</div>
				</div>
				
				<div class="panel-body">
					<div class="row">
						<div class="col-md-5">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-title"> Tampilkan Berdasarkan Tanggal</div>
								</div>
								<div class="panel-body">
									<form action="?module=hasil-offline&sub=all&tampilkan=pertanggal" method="post" class="form-horizontal">
									<?php include "../fungsi/fungsi_combobox.php"; include "../fungsi/library.php";?>
										<div class="form-group">
											<label for="tanggal1" class="control-label col-sm-4">Dari tanggal</label>
											<div class="col-sm-7">
											
											<?php	combotgl(01,31,'tgl_mulai',$tgl_skrg);
											combobln(01,12,'bln_mulai',$bln_sekarang);
											combothn(2000,$thn_sekarang,'thn_mulai',$thn_sekarang); 
											?>
					 						</div>
										</div>
										<div class="form-group">
											<label for="tanggal2" class="control-label col-sm-4">s/d Tanggal</label>
											<div class="col-sm-7">
												
												<?php	combotgl(01,31,'tgl_selesai',$tgl_skrg);
												combobln(01,12,'bln_selesai',$bln_sekarang);
												combothn(2000,$thn_sekarang,'thn_selesai',$thn_sekarang); 
												?>
						 					</div>
						 				</div>
						 				<div class="col-sm-4">
						 				<input type="hidden" name="pertanggal" value="pertanggal">
						 				</div>
						 				<div class="col-sm-4">
						 					<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span>  Oke</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<?php if($_GET['tampilkan']=='pertanggal'){ 
							$tgl_awal= $_POST['thn_mulai']."-".$_POST['bln_mulai']."-".$_POST['tgl_mulai'];
							$tgl_akhir= $_POST['thn_selesai']."-".$_POST['bln_selesai']."-".$_POST['tgl_selesai'];
							$awalindo=tgl_indo($tgl_awal);
							$akhirindo=tgl_indo($tgl_akhir);

						?>
							<div class="alert alert-info" role="alert">
 								 Menampilkan data dari tanggal <b><?php echo $awalindo." Sampai dengan ".$akhirindo ?><b/> 
							</div>
							<table id="tablekonten" class="table table-striped table-bordered">
						         <th><div id='kontentd'>ID</div>
						         </th>
						         <th>Tanggal Isi Survey</th>
						         <th><div id='kontentd'>Aksi</div></th></tr>
									<?php
									include "../../koneksi.php";
									include "../../fungsi/fungsi_indotgl.php";
									error_reporting(1);
										$jumlahdata = mysql_num_rows(mysql_query("SELECT * FROM pelayananofline WHERE createdate BETWEEN '$tgl_awal' AND '$tgl_akhir'"));
										$sql = mysql_query("SELECT * FROM pelayananofline WHERE createdate BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER by id ");
										$no =1;
									while ($data = mysql_fetch_array($sql)){
										$dateIndo = tgl_indo($data['createdate']);
										?>
										<tr><td><div id='kontentd'><?php echo $data[id];?></div></td>
												 <td><?php echo $dateIndo ?></td>
												 <td><div id='kontentd'><a target='_blank' href='modul/mod_report/responden-offline.php?act=detail&id=<?php echo $data[id];?>' >
												 <button class='btn btn-sm btn-success'><span class=\"glyphicon glyphicon-zoom-in\"></span> Detail</button></a>
												 <?php if($_SESSION['level']=="Super"){?><a href='modul/mod_report/responden-offline.php?act=hapus&id=<?php echo $data[id]?>'>
												 <button class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus Deskripsi?')\"><span class=\"glyphicon glyphicon-trash\"></span> Hapus</button></a><?php } ?>
												 </div>
									   </td></tr>
											<?php
										$no++;
									}
									?>
									
							</table>
							<div class="col-md-12">
								<div class="well">
									<?php echo "Jumlah Responden : <font face='tahoma' size='3'><b>$jumlahdata </b> Responden</font>"; ?>
								</div>
							</div>
							<?php	
							}
							else
							{ ?>
							<div class="alert alert-info" role="alert">
 								 <strong>Menampilkan semua hasil survey</strong> 
							</div>
									<table id="tablekonten" class="table table-striped table-bordered">
						         <th><div id='kontentd'>ID</div>
						         </th>
						         <th>Tanggal Isi Survey</th>
						         <th><div id='kontentd'>Aksi</div></th></tr>
									<?php
											include "../../koneksi.php";
											include "../../fungsi/fungsi_indotgl.php";
											error_reporting(1);
											
											
												$jumlahdata = mysql_num_rows(mysql_query("SELECT * FROM pelayananofline "));
												$p      = new PagingHasil;
												$batas  = 10;
												$posisi = $p->cariPosisi($batas);
												$sql = mysql_query("SELECT * FROM pelayananofline  ORDER by id ASC LIMIT $posisi,$batas");
												$no = $posisi+1;
											while ($data = mysql_fetch_array($sql)){
												$dateIndo = tgl_indo($data['createdate']);
												?>
												<tr><td><div id='kontentd'><?php echo $data[id];?></div></td>
														 <td><?php echo $dateIndo ?></td>
														 <td><div id='kontentd'><a target='_blank' href='modul/mod_report/responden-offline.php?act=detail&id=<?php echo $data[id];?>' >
														 <button class='btn btn-sm btn-success'><span class=\"glyphicon glyphicon-zoom-in\"></span> Detail</button></a>
														 <?php if($_SESSION['level']=="Super"){?><a href='modul/mod_report/responden-offline.php?act=hapus&id=<?php echo $data[id]?>'>
														 <button class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus Deskripsi?')\"><span class=\"glyphicon glyphicon-trash\"></span> Hapus</button></a><?php } ?>
														 </div>
											   		</td>
											   </tr>
													<?php
												$no++;
											}
											?>
									</table>
									<div class="col-md-12">
										<div class="well">
											<?php echo "Jumlah Responden : <font face='tahoma' size='3'><b>$jumlahdata </b> Responden</font>"; ?>
										</div>
									</div>
							<?php

								$jmldata = mysql_num_rows(mysql_query("SELECT * FROM pelayananofline "));
								$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
								$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
							
								echo "<ul class='pagination'>$linkHalaman</ul> ";
							
							}
						?>
				</div>
			</div>
 <?php 
 } ?>



	

