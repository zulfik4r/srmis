<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>
<body>
<?php
	$cari = $_POST['cari'];
?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td>
		<table border="0" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td width="8px">&nbsp;</td>
				<td width="300px" bgcolor="#9b9999">&nbsp;&nbsp;<font style="font-size:14px; " color="#fefafa"><b>MR</b></font></td>
				<td></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td><img src="images/atas_isi.png"></td>
	</tr>
	<tr>
		<td id="tengah_isi" >
			<form method="post" action="home.php?hal=content/input_daftar_barang" enctype="multipart/form-data">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td width="15px">&nbsp;</td>
					<td valign="top">
					<font style="font-size:12px;">
					<table border="0" cellpadding="2" cellspacing="2" width="100%">
						<tr>
							<td align="left">No Request : <input type="text" size="20" name="no_req"></td>
							<td width="180px" align="right">
								<!--
								<input type="button" src="javascript:void(0);" onClick="PopupCenter('content/input_daftar_barang.php', 'myPop1',400,400);" value="Tambah Data">
								-->
							</td>
						</tr>
					</table>
					<hr>
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td>
							<?php
							$query2  = mysql_query ("SELECT * FROM ms_barang WHERE stok_min >= stok ORDER BY ex_year,ex_month,ex_date ASC");
																		
							echo '<table cellpadding=2 cellspacing=2 width=100% style="border:1px  solid  #CCCCCC; ">
									<tr bgcolor=#414141 align=center>
										<td><font color=#FFFFFF width=70px>Kode</font></td>
										<td><font color=#FFFFFF>Nama</font></td>
										<td><font color=#FFFFFF>Stok</font></td>
										<td><font color=#FFFFFF>H Beli</font></td>
										<td><font color=#FFFFFF width=70px>Expired</font></td>
										<td><font color=#FFFFFF width=140px>Action</font></td>
									</tr>';
									$no = 1;
									
									while ($result2 = mysql_fetch_array($query2))
									{
										if ($no%2)
										{
												echo "<tr valign=top>";
										}
										else
										{
											echo "<tr bgcolor=#CCCCCC valign=top style=font-color:#FF0000>";
										}
										
										
										echo "<td width=70px>$result2[kd_barang]</td>
											<td>$result2[nama]</td>
											<td align=right>$result2[stok]</td>
											<td align=right>";
											rupiah($result2[harga_dosp]);
											echo "</td>";
											if (($pmonth == $result2['ex_month']) AND ($pyear == $result2['ex_year']))
											{ 
												echo "<td width=70px align=center><font color=blue>$result[expire_date]</font></td>";
											}
											else if (($pmonth > $result2['ex_month']) AND ($pyear > $result2['ex_year']) AND ($pdate > $result2['ex_date'])) 
											{
												$qy = mysql_query("UPDATE ms_barang SET status='Non-Aktif' WHERE kd_barang='$result[kd_barang]'"); 
												echo "<td width=70px align=center><font color=red>$result2[expire_date]</font></td>";
											}
											else if (($ppmonth == $result2['ex_month']) AND ($pyear == $result2['ex_year']))
											{
												echo "<td width=70px align=center><font color=blue>$result2[expire_date]</font></td>";
											}
											else
											{
											 	echo "<td width=70px align=center>$result2[expire_date]</td>";
											}
											
											
											echo "<td align=center width=140px>";
											$date = date("d/m/Y");
											$qreq = mysql_query("SELECT * FROM req_pembelian WHERE kd_barang='$result2[kd_barang]'");
											$rreq = mysql_fetch_array($qreq);
											if ($rreq)
											{
												if ($rreq['aktivasi']="1")
												{
													echo "<input type=checkbox name='ap".$no."' value='".$result2['kd_barang']."' checked>";
												}
												else
												{
													echo "<input type=checkbox name='ap".$no."' value='".$result2['kd_barang']."'>";
												}
											}
											else
											{
												echo "<input type=checkbox name='ap".$no."' value='".$result2['kd_barang']."'>";
											}
											echo "</td></tr>";
										$no++;
									}
									$no_f=$no-1;
									echo "<input type=hidden name=param value='$no_f'>";
									echo "<tr><td colspan=6 align=right><input type=submit value='Buat Request' disabled></td></tr>";
									
									echo '</table>';
							?>
							</td>
						</tr>
					</table>
					</font>
					</form>
					</td>
					<td width="15px">&nbsp;</td>
				</tr>
			</table>
	</tr>
	<tr>
		<td><img src="images/bawah_isi.png"></td>
	</tr>
</table>
</body>
</html>
