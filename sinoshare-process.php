<?php 

require_once('../../../wp-config.php');
require_once('../../../wp-includes/functions.php');

if (!empty($_REQUEST['title']) && !empty($_REQUEST['url'])  && !empty($_REQUEST['addto'])) {
		$table_name = $wpdb->prefix . "sinoshare_log";

		$title=urldecode($_REQUEST['title']);
		$url=urldecode($_REQUEST['url']);
		$addto=urldecode($_REQUEST['addto']);
		$ip=getenv("REMOTE_ADDR");
		$date=date("Y-m-d H:i:s");

		$sql="INSERT INTO $table_name (sn_posttitle, sn_posturl, sn_addto, sn_ip,sn_time) VALUES ('" . $title . "','" . $url . "','" . $addto . "','" . $ip . "','" . $date . "')";

		mysql_query($sql);
}
?>