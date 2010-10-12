<?php

// SinoShare
//
// Copyright (c)  http://www.patent-cn.com
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// This is an add-on for WordPress
// http://wordpress.org/
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// *****************************************************************

/*
Plugin Name: 中文分享/收藏插件
Plugin URI: http://www.patent-cn.com/2010/08/22/43630.shtml
Description:wordpress的日志文章分享收藏插件，网站的访问者可以通过这个插件分享文章至各大中文社交网站，帮您提高网站流量，并且支持后台统计。本插件是参考sharethis做的本土版本。英文原版：<a href="http://alexking.org/projects/share-this" target="_blank">http://alexking.org/projects/share-this</a>.
Version: 1.7
Author: 专利之家
Author URI: http://www.patent-cn.com
*/


@define('SNSHARE_ADDTOCONTENT', true);
//是否在文章中的显示 链接


@define('SNSHARE_ADDTOFOOTER', true);
//是否在文章的底部显示 对话框


@define('SNSHARE_ADDTOFEED', true);
//是否在feed页面显示

@define('SNSHARE_SHOWICON', true);
//是否显示图标

$social_sites = array( //最热门的网站，在鼠标滑过时出现的窗口中显示
	'bookmark' => array(
		'name' => '收藏夹'
		, 'url' => ''
	)
	/*,'print' => array(
		'name' => '打印本页'
		, 'url' => ''
	)*/
	,'email' => array(
		'name' => '发送邮件'
		, 'url' => ''
	)
	,'googlereader' => array(
		'name' => '谷歌Reader'
		, 'url' => 'javascript:var b=document.body;var GR________bookmarklet_domain=\'http://www.google.com\';if(b&&!document.xmlVersion){void(z=document.createElement(\'script\'));void(z.src=\'http://www.google.com/reader/ui/link-bookmarklet.js\');void(b.appendChild(z));}else{}'
	)
    ,'baidu' => array(
		'name' => '百度搜藏'
		, 'url' => 'http://cang.baidu.com/do/add?it={title}&iu={url}&dc=&fr=ien#nw=1'
	)
	,'qqzone' => array(
		'name' => 'QQ空间'
		, 'url' => 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url={url}'
	)
	,'sinaweibo'=>array(
		'name' => '新浪微博'
		, 'url' => 'http://v.t.sina.com.cn/share/share.php?title={title}&url={url}'
	)
	,'163'=>array(
		'name' => '网易微博'
		, 'url' => 'http://t.163.com/article/user/checkLogin.do?source=网易微博&info={title}{url}'
	)
	,'sohubai'=>array(
		'name' => '搜狐白社会'
		, 'url' => 'http://bai.sohu.com/share/blank/add.do?link={url}&title={title}'
	)
	, 'renren' => array(
		'name' => '人人网'
		, 'url' => 'http://share.renren.com/share/buttonshare.do?link={url}&title={title}'
	)
	, 'kaixin' => array(
		'name' => '开心网'
		, 'url' => 'http://www.kaixin001.com/repaste/share.php?rtitle={title}&rurl={url}'
	)
	, 'googlebuzz' => array(
		'name' => '谷歌Buzz'
		, 'url' => 'http://www.google.com/reader/link?url={url}'
	)
	, 'google_bmarks' => array(
		'name' => '谷歌收藏'
		, 'url' => 'http://www.google.com/bookmarks/mark?op=add&bkmk={url}&title={title}'
	)
	, 'douban' => array(
		'name' => '豆瓣网'
		, 'url' => 'http://www.douban.com/recommend/?url={url}&title={title}&sel=&v=1'
	)
	, 'taojianghu' => array(
		'name' => '淘江湖'
		, 'url' => 'http://share.jianghu.taobao.com/share/addShare.htm?url={url}'
	)
	, 'zhuaxia' => array(
		'name' => '抓虾'
		, 'url' => 'http://www.zhuaxia.com/add_channel.php?url={url}'
	)
	, 'xianguo' => array(
		'name' => '鲜果'
		, 'url' => 'http://xianguo.com/service/submitfav/?link={url}&title={title}'
	)
	, 'youdao' => array(
		'name' => '有道'
		, 'url' => 'http://shuqian.youdao.com/manage?a=popwindow&url={url}&title={title}'
	)
	, '9dian' => array(
		'name' => '九点'
		, 'url' => 'http://9.douban.com/recommend/?url={url}&title={title}'
	)

);


$social_sites_full = array(//所有网站，点“查看更多”后的窗口中显示
    'bookmark' => array(
		'name' => '收藏夹'
		, 'url' => ''
	)
	/*,'print' => array(
		'name' => '打印本页'
		, 'url' => ''
	)*/
	,'email' => array(
		'name' => '发送邮件'
		, 'url' => ''
	)
	,'googlereader' => array(
		'name' => '谷歌Reader'
		, 'url' => 'javascript:var b=document.body;var GR________bookmarklet_domain=\'http://www.google.com\';if(b&&!document.xmlVersion){void(z=document.createElement(\'script\'));void(z.src=\'http://www.google.com/reader/ui/link-bookmarklet.js\');void(b.appendChild(z));}else{}'
	)
    ,'baidu' => array(
		'name' => '百度搜藏'
		, 'url' => 'http://cang.baidu.com/do/add?it={title}&iu={url}&dc=&fr=ien#nw=1'
	)
	,'qqzone' => array(
		'name' => 'QQ空间'
		, 'url' => 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url={url}'
	)
	,'sinaweibo'=>array(
		'name' => '新浪微博'
		, 'url' => 'http://v.t.sina.com.cn/share/share.php?title={title}&url={url}'
	)
	,'163'=>array(
		'name' => '网易微博'
		, 'url' => 'http://t.163.com/article/user/checkLogin.do?source=网易微博&info={title}{url}'
	)
	,'sohubai'=>array(
		'name' => '搜狐白社会'
		, 'url' => 'http://bai.sohu.com/share/blank/add.do?link={url}&title={title}'
	)
	, 'renren' => array(
		'name' => '人人网'
		, 'url' => 'http://share.renren.com/share/buttonshare.do?link={url}&title={title}'
	)
	, 'kaixin' => array(
		'name' => '开心网'
		, 'url' => 'http://www.kaixin001.com/repaste/share.php?rtitle={title}&rurl={url}'
	)
	, 'googlebuzz' => array(
		'name' => '谷歌Buzz'
		, 'url' => 'http://www.google.com/reader/link?url={url}'
	)
	, 'google_bmarks' => array(
		'name' => '谷歌收藏'
		, 'url' => 'http://www.google.com/bookmarks/mark?op=add&bkmk={url}&title={title}'
	)
	, 'douban' => array(
		'name' => '豆瓣网'
		, 'url' => 'http://www.douban.com/recommend/?url={url}&title={title}&sel=&v=1'
	)
	, 'taojianghu' => array(
		'name' => '淘江湖'
		, 'url' => 'http://share.jianghu.taobao.com/share/addShare.htm?url={url}'
	)
	, 'zhuaxia' => array(
		'name' => '抓虾'
		, 'url' => 'http://www.zhuaxia.com/add_channel.php?url={url}'
	)
	, 'xianguo' => array(
		'name' => '鲜果'
		, 'url' => 'http://xianguo.com/service/submitfav/?link={url}&title={title}'
	)
	, 'youdao' => array(
		'name' => '有道'
		, 'url' => 'http://shuqian.youdao.com/manage?a=popwindow&url={url}&title={title}'
	)
	, '9dian' => array(
		'name' => '九点'
		, 'url' => 'http://9.douban.com/recommend/?url={url}&title={title}'
	)
	, 'twitter' => array(
		'name' => 'Twitter'
		, 'url' => 'http://twitter.com/home?status={title} {url}'
	)
	, 'facebook' => array(
		'name' => 'Facebook'
		, 'url' => 'http://www.facebook.com/share.php?u={url}&t={title}'
	)
	, 'yahoo_myweb' => array(
		'name' => '雅虎收藏'
		, 'url' => 'http://myweb.cn.yahoo.com/popadd.html?url={url}&title={title}'
	)
	, 'baidukongjian' => array(
		'name' => '百度空间'
		, 'url' => 'http://apps.hi.baidu.com/share/?url={url}&title={title}'
	)
	 , 'qqbookmark' => array(
		'name' => 'QQ书签'
		, 'url' => 'http://shuqian.qq.com/post?title={title}&uri={url}'
	)
	, 'sina-vivi' => array(
		'name' => '新浪收藏'
		, 'url' => 'http://vivi.sina.com.cn/collect/icollect.php?pid=28&title={title}&url={url}'
	)
	/*, '51kongjian' => array(
		'name' => '51社区'
		, 'url' => 'http://my.51.com/share/share_me.php?title={title}&shareText={url}'
	)
	, 'gmail' => array(
		'name' => 'Gmail'
		, 'url' => 'https://mail.google.com/mail/?ui=1&view=cm&fs=1&tf=1&su={title}&body={url}'
	)*/
	, '139shuo' => array(
		'name' => '139说客'
		, 'url' => 'http://www.139.com/share/share.php?url={url}&title={title}'
	)
	, 'digu' => array(
		'name' => '嘀咕'
		, 'url' => 'http://www.diguff.com/diguShare/bookMark_FF.jsp?title={title}&url={url} '
	)
	, 'zuosha' => array(
		'name' => '做啥'
		, 'url' => 'http://zuosa.com/collect/Collect.aspx?t={title}&u={url} '
	)
	, 'renjian' => array(
		'name' => '人间'
		, 'url' => 'http://renjian.com/outside/share_link.xhtml?link={url} '
	)
	, 'follow5' => array(
		'name' => 'Follow5'
		, 'url' => 'http://www.follow5.com/f5/jsp/plugin/5share/5ShareLogin.jsp?title={title}&url={url}'
	)
	, 'hexun' => array(
		'name' => '和讯网摘'
		, 'url' => 'http://bookmark.hexun.com/post.aspx?title={title}&url={url}'
	)
	, 'myspace' => array(
		'name' => 'Myspace'
		, 'url' => 'http://www.myspace.com/Modules/PostTo/Pages/default.aspx/?u={url}&t={title}'
	)
	, 'chuangye' => array(
		'name' => '创业邦'
		, 'url' => 'http://u.cyzone.cn/share.php?title={title}&url={url}'
	)
	, 'zhongjin' => array(
		'name' => '中金微博'
		, 'url' => 'http://t.cnfol.com/share.php?title={title}&url={url}'
	)
	, 'ruolin' => array(
		'name' => '若邻网'
		, 'url' => 'http://share.wealink.com/share/add/?title={title}&url={url}'
	)
	, 'leshou' => array(
		'name' => '乐收网'
		, 'url' => 'http://leshou.com/post?act=shou&reuser=&title={title}&url={url}&intro=&tags=&tool=1'
	)
	, 'qike' => array(
		'name' => '奇客发现'
		, 'url' => 'http://www.diglog.com/submit.aspx?url={url}&title={title}&description='
	)
	, 'tongxue' => array(
		'name' => '同学微博'
		, 'url' => 'http://share.tongxue.com/share/buttonshare.php?link={url}&title={title}'
	)
	, 'wake' => array(
		'name' => '挖客网'
		, 'url' => 'http://www.waakee.com/submit.php?url={url}&title={title}'
	)
	/*, 'shouke' => array(
		'name' => '收客网'
		, 'url' => ''
	)*/
	, 'jiuxihuan' => array(
		'name' => '就喜欢'
		, 'url' => 'http://www.9fav.com/profile/user_url/add?t={title}&u={url}&tag=&d='
	)
	/*, '114la' => array(
		'name' => '114啦'
		, 'url' => ''
	)
	, 'jiudiqiu' => array(
		'name' => '救救地球'
		, 'url' => ''
	)*/
	, '115shoucang' => array(
		'name' => '115收藏'
		, 'url' => 'http://fav.115.com/?ac=add&title={title}&url={url}'
	)
	, 'digg' => array(
		'name' => 'Digg'
		, 'url' => 'http://digg.com/submit?phase=2&url={url}&title={title}'
	)
	, 'delicious' => array(
		'name' => 'Delicious'
		, 'url' => 'http://del.icio.us/post?url={url}&title={title}'
	)
);

$PostID='';


// 以下内容不需要修改
// ============================================================

@define('SNSHARE_FILEPATH', '/wp-content/plugins/sinoshare/');
@define('SNSHARE_FILENAME', '/wp-content/plugins/sinoshare/sinoshare.php');


$snshare_action = '';


if (!function_exists('snshare_prototype')) {
	function snshare_prototype() {
		if (!function_exists('wp_enqueue_script')) {
			global $snshare_prototype;
			if (!isset($snshare_prototype) || !$snshare_prototype) {
				print('
		<script type="text/javascript" src="'.get_bloginfo('wpurl').'/wp-includes/js/prototype.js"></script>
				');
			}
			$snshare_prototype = true;
		}
	}
}

if (!function_exists('snshare_uuid')) {
	function snshare_uuid() {
		return sprintf( 
			'%04x%04x-%04x-%04x-%04x-%04x%04x%04x'
			, mt_rand( 0, 0xffff )
			, mt_rand( 0, 0xffff )
			, mt_rand( 0, 0xffff )
			, mt_rand( 0, 0x0fff ) | 0x4000
			, mt_rand( 0, 0x3fff ) | 0x8000
			, mt_rand( 0, 0xffff )
			, mt_rand( 0, 0xffff )
			, mt_rand( 0, 0xffff )
		);
	}
}

if (!empty($_REQUEST['snshare_action'])) {
	switch ($_REQUEST['snshare_action']) {
		case 'js':
			header("Content-type: text/javascript");
?>
function snshare_share(id, url, title, html_id) {
	var d = document;
    isStrict = d.compatMode == "CSS1Compat";
    dd = d.documentElement;
	db = d.body;
    m = Math.max;
	
	var form = $('snshare_form');
	

	if (form.style.display == 'block' ) {
		form.style.display = 'none';
		return;
	}
	
	var link = $('snshare_link_' + html_id);
	

	var offset = Position.cumulativeOffset(link);

	if (document.getElementById('snshare_social')) {

<?php
	foreach ($social_sites as $key => $data) {
		if($key=="bookmark" || $key=="print" || $key=="email")
			continue;
		else
			print('		$("snshare_'.$key.'").href = snshare_share_url("'.$data['url'].'", url, title);'."\n");
	}
?>
	}

	var title=$('snshare_form_title_td').innerHTML;
	if(title.indexOf("sicon.png")==-1)
		$('snshare_form_title_td').innerHTML="<img src=\"http://www.patent-cn.com/image/sicon.png\" width=\"16\" height=\"16\" border=\"0\">&nbsp;"+title;

	form.style.left = offset[0] + 'px';
	form.style.top = (offset[1] + link.offsetHeight + 3) + 'px';
	$('snshare_social_top').style.display = 'block';
	$('snshare_social_more').style.display = 'none';
	$('snshare_more').style.display = 'block';

	form.style.display = 'block';


	clientHeight=(isStrict ? dd : db).clientHeight;
	scrollTop=m(dd.scrollTop, db.scrollTop);


	if(offset[1] + link.offsetHeight + 3+form.offsetHeight>clientHeight+scrollTop)
		form.style.top =(offset[1]-form.offsetHeight) + 'px';

}
function snshare_share_more(id, url, title, html_id) {
	
	var d = document;
    isStrict = d.compatMode == "CSS1Compat";
    dd = d.documentElement;
	db = d.body;
    m = Math.max;

	
	var form = $('snshare_form');
	

	if (form.style.display == 'block' ) {
		form.style.display = 'none';
		return;
	}
	
	var link = $('snshare_link_' + html_id);
	

	var offset = Position.cumulativeOffset(link);

	if (document.getElementById('snshare_social_more')) {

<?php
	foreach ($social_sites_full as $key => $data) {
		if($key=="bookmark" || $key=="print" || $key=="email")
			continue;
		else
			print('		$("snshare_more_'.$key.'").href = snshare_share_url("'.$data['url'].'", url, title);'."\n");
	}
?>
	}


	$('snshare_social_top').style.display = 'none';
	$('snshare_social_more').style.display = 'block';
	$('snshare_more').style.display = 'none';

	form.style.display = 'block';

}
function snshare_share_url(base, url, title) {
	
    base = base.replace('{url}', url); 
    
    if(base.indexOf('vivi')==-1 && base.indexOf('hexun')==-1)
    {
			return base.replace('{title}', title);
    }
	else 
	{
		//针对vivi,hexun 标题乱码 先decodeURIComponent解码，然后用escape编码
        title=escape(decodeURIComponent(title));
        return base.replace('{title}', title);
	}
	
}

function snshare_createXMLHttpRequest(){
    var xmlhttp = null;
    try {
        // Moz supports XMLHttpRequest. IE uses ActiveX.
        // browser detction is bad. object detection works for any browser
        xmlhttp = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e) {
        // browser doesn't support ajax. handle however you want
        //document.getElementById("errormsg").innerHTML = "Your browser doesnt support XMLHttpRequest.";
        // This won't help ordinary users.  Turned off
        // alert("Your browser does not support the XMLHttpRequest Object!");
    }
    return xmlhttp;
}

var snshare_Xhr = snshare_createXMLHttpRequest();

function snshare_ajax(ajaxurl,title,url,addto)
{
	ajaxurl=ajaxurl+"?title="+title+"&url="+url+"&addto="+addto;
	snshare_Xhr.open('get', ajaxurl); 
	snshare_Xhr.send(null);
}


function snshare_addBookmark(ajaxurl,title,url,addto){
	snshare_ajax(ajaxurl,title,url,addto); 

	var sTitle=document.title;
	var sURL = location.href; 
	try 
    { 
        window.external.addFavorite(sURL, sTitle); 
    } 
    catch (e) 
    { 
        try 
        { 
            window.sidebar.addPanel(sTitle, sURL, ""); 
        } 
        catch (e) 
        { 
            alert("加入收藏失败，请使用Ctrl+D进行添加"); 
        } 
    } 
}

function mouseOut(){
	var form = $('snshare_form');
	form.style.display='none';
}



<?php
			die();
			break;
		case 'css':
			header("Content-type: text/css");
?>
html {
	scrollbar-face-color:#F2F2F2;
	scrollbar-highlight-color:#fff;
	scrollbar-shadow-color:#eeeeee;
	scrollbar-3dlight-color:#eeeeee;
	scrollbar-arrow-color:#000;
	scrollbar-track-color:#fff;
	scrollbar-darkshadow-color:#fff;
}
#snshare_form {
	background: #F2F2F2;
	border: 1px solid #E5E5E5;
	display: none;
	position: absolute;
	width: 270px;
	z-index: 999;
}

#snshare_social{
	background: #fff;
	border: 1px solid #fff;
	padding: 10px;
	overflow:auto;
}
#snshare_social ul {
	list-style: none;
	margin: 0;
	padding: 0;
}
#snshare_social ul li {
	float: left;
	margin: 0;
	padding: 0;
	width: 47%;
	display: block;
	text-align:left!important;
}
#snshare_social ul li a {
	background-position: 0px 3px;
	background-repeat: no-repeat;
	display: block;
	float: left;
	height: 24px;
	padding: 4px 0 0 22px;
}

<?php
foreach ($social_sites_full as $key => $data) {
	print(
'#snshare_'.$key.' {
	background-image: url('.$key.'.gif) !important;
}
');
	print(
'#snshare_more_'.$key.' {
	background-image: url('.$key.'.gif) !important;
}
');
}
?>
.overflow{
	height:auto;
	verflow:auto;
	zoom:1;
	/*设置滚动条
	
	_height:230px;
	min-height:230px;
	
	_overflow:visible; 
*/
}
* html .addlink{ /*ie6*/
	width:95%;
}
.addlink{
	width:75%;
	border:1px 	solid #ffffff;
	background:#ffffff;
	text-decoration:none;
}
.addlink:hover{
	background:#F2F2F2;
	border:1px solid #E5E5E5;
	text-decoration:none;
}


.snshare_form_title img
{
	vertical-align:middle;
}

#snshare_credit {
	background: #F2F2F2;
	border-top: 1px solid #ddd;
	padding: 3px;
	font-size: 10px;
}
<?php
if (SNSHARE_SHOWICON) {
?>
.snshare_share_link {
	background: 1px 0 url(share-icon-16x16.gif) no-repeat !important;
	padding: 1px 0 3px 22px;
}
<?php
}
			die();
			break;
	}
}


function snshare_init() {
	if (function_exists('wp_enqueue_script')) {
		wp_enqueue_script('prototype');
	}
}
add_action('init', 'snshare_init');			

function snshare_head() {
	$wp = get_bloginfo('wpurl');
	$url = $wp.SNSHARE_FILENAME;
	//snshare_prototype();  //比较大，暂不调用
	print('
	<script type="text/javascript" src="'.$url.'?snshare_action=js"></script>
	<link rel="stylesheet" type="text/css" href="'.$url.'?snshare_action=css" />
	');
	print('<!–[if IE 6]> <script type="text/javascript">document.execCommand("BackgroundImageCache", false, true);</script><![endif]–>');//ie6下css设置的链接背景图片，每次鼠标指向时会闪烁，加上这句，可以避免图片每次重新调用。
}
add_action('wp_head', 'snshare_head');



function snshare_share_link($action = 'print', $id_ext = '') {
	global $snshare_action, $post,$PostID;
	if (in_array($snshare_action, array('page'))) {
		return '';
	}
	if (is_feed() || (function_exists('akm_check_mobile') && akm_check_mobile())) {
		//$onclick = '';
		$onmouse="";
	}
	else {

       // $onclick = 'onclick="snshare_share(\''.$post->ID.'\', \''.urlencode(get_permalink($post->ID)).'\', \''.urlencode(get_the_title()).'\', \''.$post->ID.$id_ext.'\', \''.get_option('st_pubid').'\'); return false;"';
	   $onmouse='onmouseover="snshare_share(\''.$post->ID.'\', \''.urlencode(get_permalink($post->ID)).'\', \''.urlencode(get_the_title()).'\', \''.$post->ID.$id_ext.'\'); " onmouseout="timer=setTimeout(\'mouseOut()\',500)"';
	}
	global $post;
    $PostID=$post->ID;
	ob_start();

?>

<?php 
 if (is_feed() || (function_exists('akm_check_mobile') && akm_check_mobile())) { 
?>

<!--<a target="_blank"  href="<?php bloginfo('siteurl'); ?>/?p=<?php print($PostID); ?>&snshare_action=sinoshare" <?php print($onmouse); ?> title="<?php _e('收藏本文', 'sinoshare'); ?>" id="snshare_link_<?php print($post->ID.$id_ext); ?>"  rel="noindex nofollow">收藏本文</a>-->

 <?php
		
	} 
	elseif(is_single())
	{

?>
<a href="#" <?php print($onmouse); ?> title="<?php _e('收藏本文', 'sinoshare'); ?>" id="snshare_link_<?php print($post->ID.$id_ext); ?>" class="snshare_share_link" rel="noindex nofollow"><?php _e('分享收藏本文', 'sinoshare'); ?></a>
<?php
    }
	$link = ob_get_contents();
	ob_end_clean();
	switch ($action) {
		case 'print':
			print($link);
			break;
		case 'return':
			return $link;
			break;
	}
}

function snshare_add_share_link_to_content($content) {
	$doit = false;
	if (is_feed() && SNSHARE_ADDTOFEED) {
		$doit = true;
	}
	else if (SNSHARE_ADDTOCONTENT) {
		$doit = true;
	}
	
	if ($doit) {
		$content .= '<p class="snshare_link">'.snshare_share_link('return').'</p>';
	}
	return $content;
}
add_action('the_content', 'snshare_add_share_link_to_content');
add_action('the_content_rss', 'snshare_add_share_link_to_content');


function snshare_share_form() {
	global $post, $PostID,$social_sites,$social_sites_full, $current_user, $snshare_limit_mail_recipients;
	
	$wp = get_bloginfo('wpurl');
	$exitimage=$wp.SNSHARE_FILEPATH;

?>
	<!-- Share This BEGIN -->
	<div id="snshare_form" onmouseover="clearTimeout(timer);this.style.display='block'" onmouseout="this.style.display='none';" >
		<div class="snshare_form_title" ><table  width=100%><tr><td id="snshare_form_title_td" align="left"  valign="middle"><b style="font-size:12px">分享到...</b></td><td align="right"  valign="middle"><a href="javascript:void($('snshare_form').style.display='none');" ><img src="<?php  print($exitimage) ?>/exit.gif" border=0 width=8 height=9></a>&nbsp;</td></tr></table></div>
		
<?php
	ob_start();
?>
		<div id="snshare_social" class="overflow">
			<ul id="snshare_social_top">
<?php
	$moreclick='onclick="javascript:void($(\'snshare_form\').style.display=\'none\');snshare_share_more(\''.$post->ID.'\', \''.urlencode(get_permalink($post->ID)).'\', \''.urlencode(get_the_title()).'\', \''.$post->ID.$id_ext.'\'); return false;"';

	$wp = get_bloginfo('wpurl');
	$processfile=$wp.SNSHARE_FILEPATH."sinoshare-process.php";
	$title=urlencode(get_the_title());
	$url=urlencode(get_permalink($post->ID));
	

	foreach ($social_sites as $key => $data) {
		$addto=urlencode($social_sites[$key]["name"]);
		if($key=="bookmark")
			print('<li><a href="#" id="snshare_'.$key.'" onclick="javascript:snshare_addBookmark(\''.$processfile.'\',\''.$title.'\',\''.$url.'\',\''.$addto.'\');return false;" class=addlink>'.$data['name'].'</a></li>'."\n");
		else if($key=="print")
			print('<li><a href="#" id="snshare_'.$key.'" onclick="javascript:snshare_ajax(\''.$processfile.'\',\''.$title.'\',\''.$url.'\',\''.$addto.'\');window.print();return false;" class="addlink">'.$data['name'].'</a></li>'."\n");
		else if($key=="email") //utf-8在使用mailto调用outlook时，会出现乱码，需要先将title转成gb2312,再urlencode
			print('<li><a href="mailto:?subject='.urlencode(iconv('utf-8','gbk',get_the_title())).'&body='.urlencode(iconv('utf-8','gbk',get_the_title())).' '.urlencode(get_permalink($post->ID)).'" id="snshare_'.$key.'" onclick="javascript:snshare_ajax(\''.$processfile.'\',\''.$title.'\',\''.$url.'\',\''.$addto.'\');" class=addlink>'.$data['name'].'</a></li>'."\n");
		else
			print('<li><a href="#" target ="_blank" id="snshare_'.$key.'" onclick="javascript:snshare_ajax(\''.$processfile.'\',\''.$title.'\',\''.$url.'\',\''.$addto.'\');" class=addlink>'.$data['name'].'</a></li>'."\n");
	}
?>
			</ul>            
            <ul id="snshare_social_more">
<?php

	foreach ($social_sites_full as $key => $data) {
		$addto=urlencode($social_sites[$key]["name"]);
		if($key=="bookmark")
			print('<li><a href="#" id="snshare_more_'.$key.'" onclick="javascript:snshare_addBookmark(\''.$processfile.'\',\''.$title.'\',\''.$url.'\',\''.$addto.'\');return false;" class=addlink>'.$data['name'].'</a></li>'."\n");
		else if($key=="print")
			print('<li><a href="#" id="snshare_more_'.$key.'" onclick="javascript:snshare_ajax(\''.$processfile.'\',\''.$title.'\',\''.$url.'\',\''.$addto.'\');window.print();return false;" class=addlink>'.$data['name'].'</a></li>'."\n");
		else if($key=="email")
			print('<li><a href="mailto:?subject='.urlencode(iconv('utf-8','gbk',get_the_title())).'&body='.urlencode(iconv('utf-8','gbk',get_the_title())).' '.urlencode(get_permalink($post->ID)).'" id="snshare_more_'.$key.'" onclick="javascript:snshare_ajax(\''.$processfile.'\',\''.$title.'\',\''.$url.'\',\''.$addto.'\');" class=addlink>'.$data['name'].'</a></li>'."\n");
		else
			print('<li><a href="#" target ="_blank" id="snshare_more_'.$key.'" onclick="javascript:snshare_ajax(\''.$processfile.'\',\''.$title.'\',\''.$url.'\',\''.$addto.'\');" class=addlink>'.$data['name'].'</a></li>'."\n");
	}
?>
			</ul>    
            
			<div id="snshare_more" class="clear" align="right"><a href="#" <?php print($moreclick)?>  title="<?php _e('查看更多', 'sinoshare'); ?>" id="snshare_link_<?php print($post->ID.$id_ext); ?>"  rel="noindex nofollow">查看更多...</a></div>
		</div>
<?php
	$body_social = ob_get_contents();
	ob_end_clean();
	
	print($body_social);
	
	ob_start();
?>
		<div id="snshare_credit" align="right"><img align=absmiddle src="http://www.patent-cn.com/image/sicon.png" width="16" height="16" border="0">&nbsp;<a href="http://www.patent-cn.com" target="_blank" title="专利之家">Powered by patent-cn.com</a></div>
<?php
}
if (SNSHARE_ADDTOFOOTER) {
	add_action('wp_footer', 'snshare_share_form'); //如果没有get_footer，或者get_footer之前有错误，这个地方会失败。
}


function snshare_menu() {
	if (function_exists('add_submenu_page')) {
		add_submenu_page('index.php', 'sinoshare 统计', 'sinoshare 统计', 8,plugin_basename(__FILE__), 'snshare_log');
	}
}
function snshare_log() {
	global $table_prefix, $wpdb;

	$base_name = plugin_basename(__FILE__);
	$base_page = 'admin.php?page='.$base_name;
	$wp = get_bloginfo('wpurl');
	$exportfile=$wp.SNSHARE_FILEPATH."sinoshare-export.php";


	$table_name = $table_prefix . "sinoshare_log";
	$table_view= $table_prefix . "sinoshare_log_times_view";
	$snshare_log_perpage=10;

	if(!empty($_POST['snshare_dellog']))
	{
		$snshare_sql="DELETE FROM $table_name;";
		mysql_query($snshare_sql);
	}

	$total_shares = $wpdb->get_var("SELECT COUNT(sn_id) FROM $table_name;");


	if(empty($_REQUEST['snshare_page']) || $_REQUEST['snshare_page']<1)
		$snshare_page=1;
	else
		$snshare_page=$_REQUEST['snshare_page'];

	$offset = ($snshare_page-1) * $snshare_log_perpage;

				
	if(empty($_REQUEST['snshare_sortpage']) || $_REQUEST['snshare_sortpage']<1)
		$snshare_sortpage=1;
	else
		$snshare_sortpage=$_REQUEST['snshare_sortpage'];


	$total_pages = ceil($total_shares / $snshare_log_perpage);


	$snshare_sql="SELECT * FROM  $table_name   $snshare_condition ORDER BY sn_time DESC LIMIT $offset,$snshare_log_perpage;";
	$snshare_logs = $wpdb->get_results($snshare_sql);

?>
<div class="wrap">
	<h2>sinoshare 统计</h2><br />
	<table class="widefat">
		<thead>
			<tr>
			  <th width="20%">页面标题</th>
			  <th width="30%">页面网址</th>
			  <th width="15%">分享网站</th>
			  <th width="20%">分享者IP</th>
			  <th width="15%">分享时间</th>
			</tr>
		</thead>
		<tbody>
<?php
		if($snshare_logs) {
			$i = 0;
			foreach($snshare_logs as $snshare_log) {
				if($i%2 == 0) {
					$style = 'class="alternate"';
				}  else {
					$style = '';
				}

				$snshare_posttitle= $snshare_log->sn_posttitle;
				$snshare_posturl= $snshare_log->sn_posturl;
				$snshare_addto= $snshare_log->sn_addto;
				$snshare_ip = $snshare_log->sn_ip;
				$snshare_time= $snshare_log->sn_time;

				echo "<tr $style>\n";
				echo "<td><a href=\"".$snshare_posturl."\" target=\"_blank\">".$snshare_posttitle."</a></td>\n";
				echo "<td><a href=\"".$snshare_posturl."\" target=\"_blank\">".$snshare_posturl."</a></td>\n";
				echo "<td>".$snshare_addto."</td>\n";
				echo "<td>".$snshare_ip."</td>\n";
				echo "<td>".$snshare_time."</td>\n";
				echo "</tr>\n";
				$i++;
			}
			
		}
		else {
			echo '<tr><td colspan="5" align="center"><strong>'.__('没有相关记录', 'sinoshare').'</strong></td></tr>';
		}
?>
		</tbody>
	</table>
		<!-- <分页> -->
		<?php
			if($total_pages > 1) {
		?>
		<br />
		<table class="widefat">
			<tr>
				<td align="<?php echo ('rtl' == $text_direction) ? 'right' : 'left'; ?>" width="50%">
					<?php
						if($snshare_page > 1 && ((($snshare_page*$snshare_log_perpage)-($snshare_log_perpage-1)) <= $total_shares)) {
							echo '<strong>&laquo;</strong> <a href="'.$base_page.'&amp;snshare_page='.($snshare_page-1).'&amp;snshare_sortpage='.$snshare_sortpage.'" title="&laquo; '.__('前一页', 'sinoshare').'">'.__('前一页', 'sinoshare').'</a>';
						} else {
							echo '&nbsp;';
						}
					?>
				</td>
				<td align="<?php echo ('rtl' == $text_direction) ? 'left' : 'right'; ?>" width="50%">
					<?php
						if($snshare_page >= 1 && ((($snshare_page*$snshare_log_perpage)+1) <=  $total_shares)) {
							echo '<a href="'.$base_page.'&amp;snshare_page='.($snshare_page+1).'&amp;snshare_sortpage='.$snshare_sortpage.'" title="'.__('下一页', 'sinoshare').' &raquo;">'.__('下一页', 'sinoshare').'</a> <strong>&raquo;</strong>';
						} else {
							echo '&nbsp;';
						}
					?>
				</td>
			</tr>
			<tr class="alternate">
				<td colspan="2" align="center">
					<?php printf(__('总页数 (%s): ', 'sinoshare'), $total_pages); ?>
					<?php
						if ($snshare_page >= 4) {
							echo '<strong><a href="'.$base_page.'&amp;snshare_page=1'.'&amp;snshare_sortpage='.$snshare_sortpage.'" title="'.__('第一页', 'sinoshare').'">&laquo; '.__('第一页', 'sinoshare').'</a></strong> ... ';
						}
						if($snshare_page > 1) {
							echo ' <strong><a href="'.$base_page.'&amp;snshare_page='.($snshare_page-1).'&amp;snshare_sortpage='.$snshare_sortpage.'" title="&laquo; '.__('第', 'sinoshare').($snshare_page-1).__('页', 'sinoshare').'">&laquo;</a></strong> ';
						}
						for($i = $snshare_page - 2 ; $i  <= $snshare_page +2; $i++) {
							if ($i >= 1 && $i <= $total_pages) {
								if($i == $snshare_page) {
									echo '<strong>['.$i.']</strong> ';
								} else {
									echo '<a href="'.$base_page.'&amp;snshare_page='.($i).'&amp;snshare_sortpage='.$snshare_sortpage.'" title="'.__('第', 'sinoshare').$i.__('页', 'sinoshare').'">'.$i.'</a> ';
								}
							}
						}
						if($snshare_page < $total_pages) {
							echo ' <strong><a href="'.$base_page.'&amp;snshare_page='.($snshare_page+1).'&amp;snshare_sortpage='.$snshare_sortpage.'" title="'.__('第', 'sinoshare').($snshare_page+1).__('页', 'sinoshare').' &raquo;">&raquo;</a></strong> ';
						}
						if (($snshare_page+2) < $total_pages) {
							echo ' ... <strong><a href="'.$base_page.'&amp;snshare_page='.($total_pages).'&amp;snshare_sortpage='.$snshare_sortpage.'" title="'.__('最后一页', 'sinoshare').'">'.__('最后一页', 'sinoshare').' &raquo;</a></strong>';
						}
					?>
				</td>
			</tr>
		</table>
		<?php
			}
		?>
		<!-- </分页> -->
		<br />
		<br />
		<h3>最多分享</h3>
		<table class="widefat">
			<thead>
				<tr>
				  <th width="15%">No.</th>
				  <th width="30%">页面标题</th>
				  <th width="40%">页面网址</th>
				  <th width="15%">分享次数</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$total_sortshares = $wpdb->get_var("SELECT COUNT(1) FROM $table_view;");

				$sortoffset = ($snshare_sortpage-1) * $snshare_log_perpage;

				$total_sortpages = ceil($total_sortshares / $snshare_log_perpage);


		
				$snshare_sql="SELECT * FROM  $table_view ORDER BY sn_sharetmes DESC LIMIT $sortoffset,$snshare_log_perpage;";
				$snshare_tops = $wpdb->get_results($snshare_sql);
				
				if($snshare_tops) {
					$i = 0;
					$no=$sortoffset+1;
					foreach($snshare_tops as $snshare_top) {
						if($i%2 == 0) {
							$style = 'class="alternate"';
						}  else {
							$style = '';
						}

						$snshare_topposttitle= $snshare_top->sn_posttitle;
						$snshare_topposturl= $snshare_top->sn_posturl;
						$snshare_topsharetmes= $snshare_top->sn_sharetmes;

						echo "<tr $style>\n";
						echo "<td>".$no."</td>\n";
						echo "<td><a href=\"".$snshare_topposturl."\" target=\"_blank\">".$snshare_topposttitle."</a></td>\n";
						echo "<td><a href=\"".$snshare_topposturl."\" target=\"_blank\">".$snshare_topposturl."</a></td>\n";
						echo "<td>".$snshare_topsharetmes."</td>\n";
						echo "</tr>\n";
						$i++;
						$no++;
					}
					
				}
				else {
					echo '<tr><td colspan="5" align="center"><strong>'.__('没有相关记录', 'sinoshare').'</strong></td></tr>';
				}
			?>
			</tbody>
		</table>
		<!-- <排序分页> -->
		<?php
			if($total_sortpages > 1) {
		?>
		<br />
		<table class="widefat">
			<tr>
				<td align="<?php echo ('rtl' == $text_direction) ? 'right' : 'left'; ?>" width="50%">
					<?php
						if($snshare_sortpage > 1 && ((($snshare_sortpage*$snshare_log_perpage)-($snshare_log_perpage-1)) <= $total_sortshares)) {
							echo '<strong>&laquo;</strong> <a href="'.$base_page.'&amp;snshare_page='.$snshare_page.'&amp;snshare_sortpage='.($snshare_sortpage-1).'" title="&laquo; '.__('前一页', 'sinoshare').'">'.__('前一页', 'sinoshare').'</a>';
						} else {
							echo '&nbsp;';
						}
					?>
				</td>
				<td align="<?php echo ('rtl' == $text_direction) ? 'left' : 'right'; ?>" width="50%">
					<?php
						if($snshare_sortpage >= 1 && ((($snshare_sortpage*$snshare_log_perpage)+1) <=  $total_sortshares)) {
							echo '<a href="'.$base_page.'&amp;snshare_page='.$snshare_page.'&amp;snshare_sortpage='.($snshare_sortpage+1).'" title="'.__('下一页', 'sinoshare').' &raquo;">'.__('下一页', 'sinoshare').'</a> <strong>&raquo;</strong>';
						} else {
							echo '&nbsp;';
						}
					?>
				</td>
			</tr>
			<tr class="alternate">
				<td colspan="2" align="center">
					<?php printf(__('总页数 (%s): ', 'sinoshare'), $total_sortpages); ?>
					<?php
						if ($snshare_sortpage >= 4) {
							echo '<strong><a href="'.$base_page.'&amp;snshare_page='.$snshare_page.'&amp;snshare_sortpage=1" title="'.__('第一页', 'sinoshare').'">&laquo; '.__('第一页', 'sinoshare').'</a></strong> ... ';
						}
						if($snshare_page > 1) {
							echo ' <strong><a href="'.$base_page.'&amp;snshare_page='.$snshare_page.'&amp;snshare_sortpage='.($snshare_sortpage-1).'" title="&laquo; '.__('第', 'sinoshare').($snshare_sortpage-1).__('页', 'sinoshare').'">&laquo;</a></strong> ';
						}
						for($i = $snshare_sortpage - 2 ; $i  <= $snshare_sortpage +2; $i++) {
							if ($i >= 1 && $i <= $total_sortpages) {
								if($i == $snshare_sortpage) {
									echo '<strong>['.$i.']</strong> ';
								} else {
									echo '<a href="'.$base_page.'&amp;snshare_page='.$snshare_page.'&amp;snshare_sortpage='.($i).'" title="'.__('第', 'sinoshare').$i.__('页', 'sinoshare').'">'.$i.'</a> ';
								}
							}
						}
						if($snshare_sortpage < $total_sortpages) {
							echo ' <strong><a href="'.$base_page.'&amp;snshare_page='.$snshare_page.'&amp;snshare_sortpage='.($snshare_sortpage+1).'" title="'.__('第', 'sinoshare').($snshare_sortpage+1).__('页', 'sinoshare').' &raquo;">&raquo;</a></strong> ';
						}
						if (($snshare_sortpage+2) < $total_sortpages) {
							echo ' ... <strong><a href="'.$base_page.'&amp;snshare_page='.$snshare_page.'&amp;snshare_sortpage='.($total_sortpages).'" title="'.__('最后一页', 'sinoshare').'">'.__('最后一页', 'sinoshare').' &raquo;</a></strong>';
						}
					?>
				</td>
			</tr>
		</table>
		<?php
			}
		?>
		<!-- </排序分页> -->
		<br />
		<div align="center">
		  <form name="snshare_buttonform" method="post" action="<?php echo $base_page?>">
		   <input type="submit" name="snshare_export" value="<?php print('导出分享排名'); ?>" class="button" onclick="javascript:snshare_buttonform.action='<?php echo $exportfile?>';snshare_buttonform.target='_blank';"/>&nbsp;&nbsp;
		   <input type="submit" name="snshare_dellog" value="<?php print('清空全部记录'); ?>" class="button" onclick="javascript:snshare_buttonform.action='<?php echo $base_page?>';snshare_buttonform.target='';return confirm('真的要删除全部记录吗？');"/>
		   </form>
		</div>


</div>
<?php
}


add_action('admin_menu', 'snshare_menu');

function snshare_install() {
	global $table_prefix, $wpdb;
	
    $snshare_table_name = $table_prefix . "sinoshare_log";

	$snshare_sql = 'DROP TABLE `' . $snshare_table_name . '`';  // 删除现有数据表
	mysql_query($snshare_sql);
	$snshare_sql = 'CREATE TABLE `' . $snshare_table_name . '` (' //创建数据表
	  . ' `sn_id` INT(11) NOT NULL auto_increment, '
	  . ' `sn_posttitle`  TEXT NOT NULL, '
	  . ' `sn_posturl`  TEXT NOT NULL, '
	  . ' `sn_addto` varchar(50) NOT NULL, '
	  . ' `sn_ip` varchar(40) NOT NULL, '
	  . ' `sn_time` datetime NOT NULL,'
	  . '  PRIMARY KEY (sn_id) '
	  . ' )'
	  . ' ENGINE = myisam;';

	mysql_query($snshare_sql);

	$snshare_sql = 'ALTER TABLE `' . $snshare_table_name . '` ADD INDEX (`sn_time`);';  //加索引
	mysql_query($snshare_sql);

	$snshare_table_view=$table_prefix . "sinoshare_log_times_view";

	$snshare_sql = 'DROP VIEW `' . $snshare_table_view . '`';  // 删除现有视图
	mysql_query($snshare_sql);

	$snshare_sql='CREATE VIEW `' . $snshare_table_view . '` AS SELECT sn_posttitle, sn_posturl, count( 1 ) AS sn_sharetmes FROM `' . $snshare_table_name . '` GROUP BY sn_posturl ORDER BY sn_sharetmes DESC;';

	mysql_query($snshare_sql);

}

global $table_prefix, $wpdb;
$table_name = $table_prefix . "sinoshare_log";
if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
{
	snshare_install();
}
?>
