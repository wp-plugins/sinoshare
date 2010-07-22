<?php 

require_once('../../../wp-config.php');
require_once('../../../wp-includes/functions.php');

$date=date("Ymd");
$table_view = $wpdb->prefix . "sinoshare_log_times_view";
$exportfilename="sinosharelog-$date.csv";

$snshare_exportsql="SELECT * FROM  $table_view ORDER BY sn_sharetmes DESC;";
$snshare_exporttops = $wpdb->get_results($snshare_exportsql);
		

header("Content-Type: application/vnd.ms-excel;");
header("Content-Disposition: attachment; filename=$exportfilename");
header("Pragma: no-cache");
header("Expires: 0");

$xls_header = '<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
</head>
<body>
<table border="1" align="center">';

$xls_footer ='</table>
</body>
</html>';

$col_title="<tr><td>No.</td><td>页面标题</td><td>页面网址</td><td>分享次数</td></tr>";
echo $xls_header.$col_title;
if($snshare_exporttops) {
	$i = 1;
	foreach($snshare_exporttops as $snshare_exporttop) {
		$snshare_exportposttitle= $snshare_exporttop->sn_posttitle;
		$snshare_exportposturl= $snshare_exporttop->sn_posturl;
		$snshare_exportsharetmes= $snshare_exporttop->sn_sharetmes;
		echo "<tr><td>$i</td><td>$snshare_exportposttitle</td><td>$snshare_exportposturl</td><td>$snshare_exportsharetmes</td></tr>";
		$i++;
	}
}

echo $xls_footer;
exit;

?>