<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<!-- pop up jquery -->
<link rel="stylesheet" href="include/general.css" type="text/css" media="screen" />
<script src="include/jquery-1.2.6.min.js" type="text/javascript"></script>
<script src="include/popup.js" type="text/javascript"></script>
<script src="include/popup2.js" type="text/javascript"></script>
<!-- end pop up jquery-->


<!-- pop up windows-->
<script>
function PopupCenter(pageURL, title,w,h) {
//var left = (screen.width/2)-(w/2);
//var top = (screen.height/2)-(h/2);
var targetWin = window.open 
//(pageURL, title, 'toolbar=no, alwaysraised=yes, fullscreen=true location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=screen.availWidth.MAX_VALUE, height=screen.availHeight.MAX_VALUE, top='+top+', left='+left);
(pageURL, title, 'toolbar=no, alwaysraised='+1+', fullScreen=no, locationbar=no, location=0, directories=no, status=no, menubar=0, scrollbars=yes, resizable=0, copyhistory=0, width=300, height=300, top=100, left=400');
this.targetWin.focus();
}
</script>


</head>

<body>
<?php

$no_trans=$_GET['no_trans'];
$no_resep=$_GET['no_resep'];
$param_no=$_GET['param_no'];
$kd_obat=$_GET['kd_obat'];
$namapas=$_GET['namapas'];
$pasien_id=$_GET['pasien_id'];
$tgl=date("Y-m-d");


print "<script>location.href='home.php?hal=content/kasir_tes&no_trans=$no_trans&no_resep=$no_resep&namapas=$namapas&param_no=$param_no&pasien_id=$pasien_id'</script>";
?>
</body>
</html>
