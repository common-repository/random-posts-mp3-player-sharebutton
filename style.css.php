<?php
ob_start("ob_gzhandler");
ob_start("compress");
// required header info and character set
header("Content-type: text/css; charset: UTF-8");
// duration of cached content (Cache for 1 weeks)
$offset = 60 * 60 * 24 * 7;
$ts = gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
// cache control to process
header ('Cache-Control: max-age=' . $offset . ', must-revalidate');
//set etag-header
header('ETag: "'.md5($ts).'"');
// expiration header format
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s",time() + $offset) . " GMT";
// send cache expiration header to browser
header($ExpStr);
// initialize compress function for white-space removal
ob_start("compress");
// Begin function compress
function compress($buffer) {
// remove comments
$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
// remove tabs, spaces, new lines, etc.
$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
// remove unnecessary spaces
$buffer = str_replace('{ ', '{', $buffer);
$buffer = str_replace(' }', '}', $buffer);
$buffer = str_replace('; ', ';', $buffer);
$buffer = str_replace(', ', ',', $buffer);
$buffer = str_replace(' {', '{', $buffer);
$buffer = str_replace('} ', '}', $buffer);
$buffer = str_replace(': ', ':', $buffer);
$buffer = str_replace(' ,', ',', $buffer);
$buffer = str_replace(' ;', ';', $buffer);
return $buffer;}
//header("Content-Type:text/css");
echo"
/*
Random Post Scroller v.1.4
By DVS (Damns Virtual Studio)
Sep 21 2012
Author : Damn (Dean Adjie Minwarie)
Author URI : http://www.finderonly.net
*/
body,ul{margin:0;padding:0;}
#DVS_content { 
	width:1024px; margin:0;
	font:normal 12px Segoe UI !important;
	text-align:center;}
#DVS_content .social_share_dd {
	float:left;
	margin-left:5px;
	padding-top:4px;
	width:265px;}
#DVS_content .dvs_random_posts {
	float:left;
	margin-left:-5px;
	list-style:none;
	width: 450px;}
#DVS_content .dvs_cret{
	float: left;
	padding:0 4px 0 3px;
	width:20px;}
#DVS_content .dvs_mp3_player{
	float:left;
	padding-top:1px;
	/*margin-left:11px;*/
	width:233px;}
#DVS_content .go_up {
	float:left;
	padding:2px 0 0 0;
	width:20px;}
#DVS_content .tootoop {
	float:left;
	padding:3px 2px 0 0;}
.tootoop img:hover{width:15px;height:15px;}
.randpostscroll{height:25px;width:450px;margin:0px auto;zoom:1;overflow:hidden;clear:both;color:#000000;font-family:Segoe UI, Tahoma;}
/*.slidercontent{width:400px;height:15px;padding:2px;margin:0 auto;font:12px Segoe UI, Tahoma;border:#000 3px double;background:#00ff00 url(img/palastik.png);background-position:0px -186px;}*/
/*.slidercontent a{color:#fff!important;text-decoration:none!important}*/
.slidercontent a:hover{color:#ffff00}
ul{list-style:none;}
#recommend .boxBody{padding:0px;}
#scrollRow{MARGIN-LEFT:0px;ZOOM:1;POSITION:relative;HEIGHT:25px;}
#scrollRow .goLeft{POSITION:absolute;TOP:1px;LEFT:5px;}
#scrollRow .goRight{POSITION:absolute;TOP:1px;RIGHT:5px;}
#scrollRow UL{MARGIN:0px;overflow:hidden;}
#scrollRow LI{FLOAT:left;width:413px;POSITION:relative;HEIGHT:25px;TEXT-ALIGN:center;}
#gscroll{MARGIN-LEFT:20px;overflow:hidden;width:410px;POSITION:relative;HEIGHT:25px;}
#gsub{OVERFLOW:hidden;WIDTH:17436px;ZOOM:1;HEIGHT:25px;}
#holder1{FLOAT:left;}
#holder2{FLOAT:left;}
/*Notification style*/
.notif_bg{
	background: #25587E;background: -moz-linear-gradient(top, #25587E 0%, #387AAB 75%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#25587E), color-stop(75%,#387AAB));
	background: -webkit-linear-gradient(top, #25587E 0%,#387AAB 75%);
	background: -o-linear-gradient(top, #25587E 0%,#387AAB 75%);
	background: -ms-linear-gradient(top, #25587E 0%,#387AAB 75%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#25587E', endColorstr='#387AAB',GradientType=0 );
	background: linear-gradient(top, #25587E 0%,#387AAB 75%);height: 33px;}
#cus_cod{float:left;margin:5px 10px 0 10px;width:12%;color:white}
#notif_content{float:left;
	color:#FFF;font-family:Michroma,Comic Sans MS,calibri;
	font-size:12pt;
	padding-top:3px;
	width:82%;}
#notif_content a{text-decoration:none;color:#A1FEFF;border-bottom:thin dotted}
#notif_content a:hover{text-decoration:none;color:#52F3FF;}
#tootoop_env{float:left;margin:11px 0 0 9px;width:2%}";
ob_end_flush();
?>