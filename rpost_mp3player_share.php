<?php
/*
Plugin Name: Random Posts, Mp3 Player + ShareButton
Plugin URI: http://www.finderonly.net/projects/4-in-1-widget-by-dvs-must-used-plugin/
Description: The plugin has 4 powerful features, Random featured post, Share Button, Flash Mp3 Player, and Quick Notification that floats at top or botom of your page to help increase page visits, let visitors easily share your blog contents to popular social media networks, as well as entertains your visitors with mp3 songs of your choices. Also quick notification bar allows you to give a short announcement to your visitor. This plugin is also fully customized, easy and complete setting.
Author: D-Artchitext
Author URI: http://www.finderonly.net
Version: 1.4.1
*/ 

/*  Copyright 2012 Dean Adjie Minwarie (email : az.elminwarie@gmail.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
// DEFINE BASE PLUGIN URL
define('RPSBMP3_URL', WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) );

// SET DEFAULT OPTION
register_activation_hook(__FILE__,'rpsbMp3_option');

// KEEP YOUR DATABASE CLEAN WHEN DISABLED
register_deactivation_hook( __FILE__, 'rpsbMp3_option_remove' );

function rpsbMp3_option() {
	if (function_exists('current_user_can')) {
		if (!current_user_can('manage_options')) return;
	} else {
		global $user_level;
		get_currentuserinfo();
		if ($user_level < 8) return;
	}
	if (function_exists('add_options_page')) {
		add_options_page(__('Random Featured Posts, Mp3 Player + Social Button'), __('Random Posts, Mp3 Player + ShareButton'), 'manage_options', 'DVS-4-in-1', 'rpsbMp3_setting_page');
	}
}

function rpsbMp3_option_remove() {
delete_option('random_post_mp3');
}

add_action('admin_menu', 'rpsbMp3_option');
$default_options['show_Rpost_mp3'] = '';
$default_options['show_category'] = '';
$default_options['num_posts'] = '5';
$default_options['position'] = 'top';
$default_options['base_color'] = '#78BFFE';
$default_options['slide_color'] = '#00FF00';
$default_options['link_color'] = '#FFFFFF';
$default_options['target_url'] = 'http://example.com/music.mp3';
$default_options['target_url2'] = 'http://example.com/music2.mp3';
$default_options['target_url3'] = 'http://example.com/music3.mp3';
$default_options['addthis_ID'] = '';
$default_options['player_type'] = '1';
$default_options['credit'] = 'Y';
$default_options['autoplay'] = 'no';
$default_options['repeat'] = 'yes';
$default_options['shuffle'] = 'no';
$default_options['sound_volume'] = '75';
$default_options['show_notif'] = '';
$default_options['notif_instance'] = '';
$default_options['cus_cod'] = '';
$default_options['notif_placement'] = 'top';
add_option('random_post_mp3', $default_options);

function rpsbMp3_setting_page(){
	global $wpdb;
	if (isset($_POST['update_options'])) {
		$options['show_Rpost_mp3'] = trim($_POST['show_Rpost_mp3'],'{}');
        //$options['show_category'] = trim($_POST['show_category'],'{}');
		$options['num_posts'] = trim($_POST['num_posts'],'{}');
		$options['position'] = trim($_POST['position'],'{}');
		$options['base_color'] = trim($_POST['base_color'],'{}');
		$options['slide_color'] = trim($_POST['slide_color'],'{}');
		$options['link_color'] = trim($_POST['link_color'],'{}');
        $options['target_url'] = trim($_POST['target_url'],'{}');
		$options['target_url2'] = trim($_POST['target_url2'],'{}');
		$options['target_url3'] = trim($_POST['target_url3'],'{}');
		$options['addthis_ID'] = trim($_POST['addthis_ID'],'{}');
		$options['player_type'] = trim($_POST['player_type'],'{}');
		$options['credit'] = trim($_POST['credit'],'{}');
		$options['autoplay'] = trim($_POST['autoplay'],'{}');
		$options['repeat'] = trim($_POST['repeat'],'{}');
		$options['shuffle'] = trim($_POST['shuffle'],'{}');
		$options['sound_volume'] = trim($_POST['sound_volume'],'{}');
		$options['show_notif'] = trim($_POST['show_notif'],'{}');
		$options['notif_instance'] = trim($_POST['notif_instance'],'{}');
		$options['cus_cod'] = trim($_POST['cus_cod'],'{}');
		$options['notif_placement'] = trim($_POST['notif_placement'],'{}');
		$show_category = $_POST['show_category'];
            if (empty($show_category)) {
			$cats = "";
		} else {
			$cats = implode(" ", $show_category);
		}
		$options['show_category'] = $cats;

		update_option('random_post_mp3', $options);
		echo '<div class="updated"><p>' . __('Options saved') . '</p></div>';
	} else {
		$options = get_option('random_post_mp3');

		$show_category = explode(" ",$options['show_category']);
	}
	?>
		<!--KEEP THIS PLUGIN LOOK NEAT!!!-->
	<style type="text/css" media="screen">
#DVS_admin_env {
	margin:0 auto;
}
#DVS_content { 
	width:100%; margin:0 0 25px 0;
}
.dvs_word{
    margin:-5px 3px 3px 0px;
    padding:3px 3px 3px 10px !important;
    border:1px solid #dddddd;
	box-shadow:4px 5px 4px #eee;-moz-box-shadow:4px 5px 4px #eee;-webkit-box-shadow:4px 5px 4px #eee;background-image:-webkit-gradient(linear, left top, left bottom, color-stop(.6, white), color-stop(1, #9AC7EB) );
	border-radius: 5px;
    -moz-border-radius:5px;
    -webkit-border-radius:5px}
.hint{
	font-size:12px;
	margin:2px 10px 5px 0;
	font-style:italic;
	font-weight:normal;
}
.penting{color:red;}
#DVS_content .menu_left {
	width:51%;
	float:left;
}
#DVS_content .menu_center {
	float:left;
	width:20%;
}
#DVS_content .menu_right{
	float:right;
	padding-left:-10px;
	margin-right:5px;
	width:27%;
}
.menu_right_title{
	line-height:1.5em;
	font-family:Segoe UI;
    text-transform:uppercase;
    margin: 0 3px 5px 0px;
    padding: 3px 3px 3px 30px !important;
    border: 1px solid #dddddd;
	box-shadow:4px 5px 4px #eee;-moz-box-shadow:4px 5px 4px #eee;-webkit-box-shadow:4px 5px 4px #eee;background-image:-webkit-gradient(linear, left top, left bottom, color-stop(.2, white), color-stop(1, #9AC7EB) );
	border-radius: 5px;
    -moz-border-radius:5px;
    -webkit-border-radius:5px
}
ul.tablist li a{ 
	color: #333; 
}
ul.tablist li a:hover 	{ 
	color: #b30000;}
ul.tabbernav li a
{
 border: 1px solid #dddddd;
 background-image:-webkit-gradient(linear, left top, left bottom, color-stop(.2, white), color-stop(1, #3090c7) );
}
ul.tabbernav li a:link {color:#777; }

ul.tabbernav li a:hover
{
 color: #333;
 background-image:-webkit-gradient(linear, left top, left bottom, color-stop(.1, white), color-stop(1, #3090c7) );
}
ul.tabbernav li.tabberactive a
{
 background-color: #d8d7cc;
 border-bottom: 1px solid #d8d7cc;
 color:#30261e;
}
ul.tabbernav li.tabberactive a:hover
{
 color: #000;
  background-image:-webkit-gradient(linear, left top, left bottom, color-stop(.1, white), color-stop(1, #3090c7) );
 border-bottom: 1px solid white;
}
.tabberlive .tabbertab {
 border-top:1px solid #ddd;
 background:#fff;
}
.tabberlive .tabbertabhide {
 display:none;
}
.tabber {	
}
.tabberlive {
 margin:0 5px;
}
ul.tabbernav
{
 margin:0;
 padding: 3px 0;
 font: bold 12px Arial, Helvetica, sans-serif;
}
ul.tabbernav li
{
 list-style: none;
 margin: 0;
 display: inline;
}
ul.tabbernav li a
{
 padding: 3px 0.5em;
 margin-left: 3px;
 text-decoration: none;
}
.tabberlive .tabbertab {
 padding:5px;
}
.tabberlive .tabbertab h2 {
 display:none;}
div.feedburnerFeedBlock ul li {
    box-shadow:4px 5px 4px #eee;-moz-box-shadow:4px 5px 4px #eee;-webkit-box-shadow:4px 5px 4px #eee;background-image:-webkit-gradient(linear,right top,left top,color-stop(0.01,rgba(0,0,0,.1)),color-stop(0.07,rgba(0,0,0,0)));margin-bottom:10px;line-height:1.5em;
    list-style-type: none;
	font-size:12px;
	font-family:Segoe UI;
    margin: 0 5px 5px 0px;
    padding: 5px 5px 5px 10px !important;
    border: 1px solid #dddddd;
	text-decoration:none;
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
}
.feedburnerFeedBlock a{text-decoration:none;}
div.feedburnerFeedBlock ul li:hover{border:1px dotted #848484;}
div  #creditfooter{display:none;}
</style>
<script type="text/javascript" src="<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/js/tabber.js"></script>
	<!-- SETTING ICON -->
	<?php screen_icon(); ?>
<div id="DVS_admin_env">
	<div id="DVS_content">
		<h2><?php echo __('Random Featured Post Mp3 Player Setting'); ?></h2><br />
		<div class="updated"style="margin:-10px 0 11px 0"><p>For more information about this plugin, please visit <a href="http://www.finderonly.net/projects/" target="_blank">plugin projects page</a></p></div>
		<div class="menu_left">
		<form method="post" action="">
<div class="tabber"><noscript><b>Please enable javascript!</b></noscript>
	<div class="tabbertab">
	<h2>Featured Post</h2><br/>
  	<input type="checkbox" name="show_Rpost_mp3" value="show" <?php if ($options['show_Rpost_mp3'] == 'show') echo 'checked="checked"'; ?> />&nbsp;<b><?php _e('Display Random Featured Post') ?></b><br/>Check to activate! Please select at least 1 category to show the widget correctly.<br/>
	<b><?php _e('Number of posts to display: ') ?></b>
    <input type="text" name="num_posts" size="2" value="<?php if (is_numeric($options['num_posts'])) { echo $options['num_posts']; } else { echo '5'; } ?>" /><p class="hint">Maximum 21 posts <b style="cursor:help" title="Fixed">?</b></p>
	<b><?php _e('AddThis Analytic ID:') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="addthis_ID" size="17" value="<?php echo $options['addthis_ID']; ?>" />&nbsp;&nbsp;&nbsp;<b>ex: #pubid=yourid</b>
	<br /><p class="hint">You can track share count of your blog posts using your AddThis account. Register at <a href="http://www.addthis.com" target="_blank">www.AddThis.com</a> for free to get your Addthis account ID. <span class="penting">Leave it blank if You don't have one.</span></p>
	
  	</div>
					 
	<div class="tabbertab">
		<h2>Appearance</h2><br/>
	<b><?php _e('Widget Placement: ') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="position" size="9" value="<?php echo $options['position']; ?>" />
	<p class="hint">Use <span class="penting">top</span> or <span class="penting">bottom</span></span> only (No Case sensitive)</p>
	<b><?php _e('Background Color:') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="base_color" size="9" value="<?php echo $options['base_color']; ?>" /><div style="background:<?php echo $options['base_color']; ?> url(<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/bg.png);float:right;width:47%;height:22px;margin-top:2px">&nbsp;</div>
				<p class="hint">Default background uses a semi transparent image with glossy effect, you can choose the base color here using the <a href="http://blog.finderonly.net/2011/html-color-code-and-name.html" target="_blank"title="see html color code and name">hex color code </a>(#xxxxxx) or any popular html color name.</p><br/>
				<b><?php _e('Slide Color:') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="slide_color" size="9" value="<?php echo $options['slide_color']; ?>" /><br/>
				<b><?php _e('Link Color:') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="link_color" size="9" value="<?php echo $options['link_color']; ?>" /><br/>
				
				<div style="margin-top:-40px;border:double 3px #000; background:<?php echo $options['slide_color']; ?> url(<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/palastik.png);background-position:0px -184px;float:right;width:47%;height:17px;padding-top:-3px"><center><font color="<?php echo $options['link_color']; ?>"><b>Link Example</b></font></center></div>
				
				<center><b>Preview</b></center>
				<div style="background:<?php echo $options['base_color']; ?> url(<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/bg.png);background-position:-361px 0px;width:100%;height:29px;padding-top:4px"><center><div style="border:double 3px #000; background:<?php echo $options['slide_color']; ?> url(<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/palastik.png);background-position:0px -186px;width:47%;height:17px;padding-top:3px;"><font color="<?php echo $options['link_color']; ?>"><b>Link Example</b></font></div></center></div>
				
 			</div>
 					 
	<div class="tabbertab">
		<h2>Mp3 Player</h2><br/>
	<b><?php _e('Player Type: ') ?></b><br />
            <INPUT TYPE=RADIO NAME="player_type" VALUE="1" <?php if ($options['player_type'] != '2') echo 'CHECKED'; ?>> Type 1: Single Mp3 Player by <a href="http://wpaudioplayer.com" target="_blank" title="Thanks to Martin Laine">Audio Player</a>.<br />
			<center><object type="application/x-shockwave-flash" name="ap_player" style="outline: none" data="<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/player/player.swf?ver=2.0.4.1" width="230" height="22" id="ap_player"><param name="bgcolor" value="#FFFFFF"><param name="wmode" value="transparent"><param name="menu" value="false"><param name="flashvars" value="animation=yes&amp;initialvolume=61&amp;remaining=no&amp;noinfo=no&amp;buffer=5&amp;checkpolicy=no&amp;rtl=no&amp;bg=1e7cba&amp;text=333333&amp;leftbg=CDDFF3&amp;lefticon=4016b3&amp;volslider=8a8282&amp;voltrack=FFFFFF&amp;rightbg=22a6bd&amp;rightbghover=17aeb3&amp;righticon=333333&amp;righticonhover=FFFFFF&amp;track=FFFFFF&amp;loader=00EE00&amp;border=CCCCCC&amp;tracker=23deeb&amp;skip=050505&amp;soundFile=<?php echo $options['target_url']; ?>"></object></center>
			
            <INPUT TYPE=RADIO NAME="player_type" VALUE="2" <?php if ($options['player_type'] == '2') echo 'CHECKED'; ?>> Type 2: Multi Mp3 Player (<a href="http://www.finderonly.net/projects/stylish-embeddable-flash-mp3-player/" target="_blank" title="See details in player release page">Beta</a>).<br />
			<center><object id="DVS-Mp3Player" type="application/x-shockwave-flash" data="<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/player/DVS-Mp3Player.swf?soundFile=<?php echo $options['target_url']; ?>|<?php echo $options['target_url2']; ?>|<?php echo $options['target_url3']; ?>" width="233" height="27" align="middle">
			<param name="movie" value="<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/player/DVS-Mp3Player.swf?soundFile=<?php echo $options['target_url']; ?>|<?php echo $options['target_url2']; ?>|<?php echo $options['target_url3']; ?>" />
			<param name="flashvars" value="autoplay=<?php echo $options['autoplay']; ?>&loop=<?php echo $options['repeat']; ?>&volume=<?php echo $options['sound_volume']; ?>&shuffle=<?php echo $options['shuffle']; ?>" />
			<param name="wmode" value="transparent" />
			<param name="quality" value="high" />
			<param name="allowFullScreen" value="false" />
			</object></center>
			
			<b><i>First Mp3 URL </i></b>
			<input class="widefat" type="text" name="target_url" value="<?php echo $options['target_url']; ?>" /><br/><br/>
			<b><i>Second Mp3 URL</i></b> <span class="penting">(Multi Only)</span>
			<input class="widefat" type="text" name="target_url2" value="<?php echo $options['target_url2']; ?>" />
			<br/><br/>
			<b><i>Third Mp3 URL</i></b> <span class="penting">(Multi Only)</span>
			<input class="widefat" type="text" name="target_url3" value="<?php echo $options['target_url3']; ?>" />
			<p class="hint">You can put a link to any Mp3 file anywhere in the web. Make sure the URL entered correctly, it is wiser to know the file has <span class="penting">resume capability</span> from high bandwidth sites, so your MP3s will plays smoothly. Try to find it on <a href="http://mp3skull.com/" target="_blank">Mp3Skull</a>.<br/>
			<span class="penting">Tips:</span> Ever tried to multiply your affiliate or find a new marketing strategy? Well, this plugin has a powerful feature to do so. You can deliver your persuassive demo or presentation into an Mp3 file and let this plugin works for You.
			</p>
 	</div>

		<div class="tabbertab">
	<h2>Q-Notify</h2><br>
	<input type="checkbox" name="show_notif" value="show" <?php if ($options['show_notif'] == 'show') echo 'checked="checked"'; ?> />&nbsp; <b>Show Quick Notification</b><br/>
	<b><?php _e('Notification Placement: ') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="notif_placement" size="9" value="<?php echo $options['notif_placement']; ?>" />
	<p class="hint">The featured post placement is <span class="penting"><b><?php echo $options['position']; ?></b></span>, so set the notification placement as otherwise to avoid conflict if you want both widget appear together.</p>
	<b>Write your notification here</b><br/>
	<textarea name="notif_instance" rows="5" cols="77"><?php echo htmlspecialchars(stripcslashes($options['notif_instance'])); ?></textarea>Use plain text or any HTML code. To make it more attractive you can add special effects like smooth scrolling. <a href="http://www.finderonly.net/projects/4-in-1-widget-by-dvs-must-used-plugin/#scrollercode" target="_blank">Get scroller code...</a><br/><br/>
	<b>Custom Code</b><br/>
	<textarea name="cus_cod" rows="3" cols="77"><?php echo htmlspecialchars(stripcslashes($options['cus_cod'])); ?></textarea>Use this to show your facebook or twitter URL with icon, etc.
	</div>
	<div class="tabbertab">
		 <h2>Misc</h2><br/>
	<b>Playing Option</b> <span class="penting">(Multi Only)</span><br />
	<b><?php _e('Autoplay :') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="autoplay" size="2" value="<?php echo $options['autoplay']; ?>" />&nbsp;&nbsp;&nbsp;<b>yes</b> or <b>no</b><br/>
	<b><?php _e('Repeat :') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="repeat" size="2" value="<?php echo $options['repeat']; ?>" />&nbsp;&nbsp;&nbsp;<b>yes</b> or <b>no</b><br/>
	<b><?php _e('Shuffle :') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="shuffle" size="2" value="<?php echo $options['shuffle']; ?>" />&nbsp;&nbsp;&nbsp;<b>yes</b> or <b>no</b><br/>
	<b><?php _e('Volume :') ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="sound_volume" size="2" value="<?php echo $options['sound_volume']; ?>" />&nbsp;&nbsp;&nbsp;<b>0 - 100(%)</b><br/>
	<p class="hint">Case sensitive, use lower case only.</p>
	<input type="checkbox" name="credit" value="Y" <?php if ($options['credit'] == 'Y') echo 'checked="checked"'; ?> />&nbsp;<?php _e('<span title="In small icon, I&#039;m thanking You if you do.">Show credit</span>') ?><br/><br/>
	</div>
	<div class="tabbertab">
	<h2>Help</h2>
	<ol><li>Since from v1.0 to 1.4 there's always new feature added, try to deactivate and re-activate the plugin manually to let the plugin create new table to database (recommended).</li>
	<li>Since most of mobile browser doesn't support the float or CSS fixed position, the widget is disabled for mobile browser.</li>
	<li>If you're having trouble with CSS like problem with margin on widget appearance or "ob_gzhandler conflicts with zlib output compression" please <b>comment the second line</b> of <a href="<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/style.css.php" target="_blank">style.css.php</a>. It should look like this <font color="green">//ob_start(&quot;ob_gzhandler&quot;);</font>.</li>
	<li>You can also use my player <span class="penting">(Multi)</span> separately out of the widget and put it in the post, page or anywhere you like. See your source code and find code for this player, it started with &lt;object.... and ended with &lt;/object&gt;</li>
	<li>By default I provide only 3 Mp3 URLs, eventhough you can actually add Mp3 URL as many as You like, just use "|" as separator.</li>
	<li>Always use URL from resume capability server for better Mp3 Play.</li>
	</ol>
	For more info and details <a href="http://www.finderonly.net/projects/stylish-embeddable-flash-mp3-player/" target="_blank">see my player release page</a> or <a href="http://www.finderonly.net/projects/4-in-1-widget-by-dvs-must-used-plugin/" target="_blank">the plugin page</a>.
	</div>	
</div>
				
			<tr><td><input type="submit" name="update_options" value="<?php _e('Update Changes') ?>"  style="font-weight:bold;margin-bottom:5px" /></td></tr>
			<!-- DONATIONS -->
			<tr><td><div class="menu_right_title">DONATION & SuPPORT</div>
			I have spent hundreds of hours creating <font color="red">this free plugin</font>. If it satified You and pleased your visitors, please consider making a donation. $20, $10, $5, or $3,any small amount will be much appreciated, Thank you!
			<div style="text-align:center">
			<a style="cursor:pointer;" onclick="href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=PWTB4H5VHZUWE'" target="_blank"><img src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" width="160" height="47" alt="Donate via PayPal to support Plugin development"></a>
			</div>If you like this plugin, please show your appreciaton by giving your Good Rate for <a href="http://wordpress.org/extend/plugins/random-posts-mp3-player-sharebutton/" target="_blank">this plugin at wordpress.org</a>. Your smile is my satisfaction.</td></tr>    
		</div>
		<div class="menu_center">
<table border="0" align="right">
<?php
   echo '<tr><th>Show</th><th align="left">Category</th></tr>';
   $categories = mysql_query("
	SELECT t.term_id, t.name
	FROM $wpdb->terms t
	LEFT JOIN $wpdb->term_taxonomy tax ON tax.term_id = t.term_id
	WHERE tax.taxonomy = 'category'
	ORDER BY t.name
	", $wpdb->dbh) or die(mysql_error().' on line: '.__LINE__);
	
   if ($categories && mysql_num_rows($categories) > 0) {
	while ($category = mysql_fetch_object($categories)) {
		echo '<tr><td align="center"><input type="checkbox" name="show_category[ ]" value="'.$category->term_id.'"';
		if (sizeof($show_category) > 0) if (in_array(strval($category->term_id),$show_category)) echo ' CHECKED';
            echo '></td><td>'.$category->name.'&nbsp;</td></tr>';  
	}
   }	
?>
</table>	
		</div>
		</form>
		<div class="menu_right">
		<!-- FACEBOOK FAN PAGE -->
		<div class="menu_right_title">KEEP IN TOUCH WITH Me</div>
		<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffacebook.com%2FD.Artchitext&amp;layout=standard&amp;show_faces=false&amp;width=220&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=31" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:220px; height:31px;" allowTransparency="true"></iframe><br/>
		<a href="http://www.twitter.com/dlooperz" target="_blank"><img src="<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/twitter.png" width="51" height="47" alt="Follow me on twitter" title="Follow Me on Twitter"></a> 
		<a href="mailto:az.elminwarie@gmail.com"><img src="<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/gmail.png" width="46" height="45" alt="Email Me"title="Email Me"></a>
		<a href="http://www.facebook.com/D.Artchitext"><img src="<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/facebook.png" width="46" height="46" alt="Facebook Fan Page" title="Like us and get updates to your wall"></a>
		<a href="https://plus.google.com/107035667514865863477"><img src="<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/g+.png" width="46" height="46" alt="Google +" title="Join my Circle"></a>
				
				<!-- PROJECT INFO -->
				<div class="menu_right_title">info</div>
		<p class="dvs_word">I'm actively listening to your feedback and fixing problems, any suggestions are kindly welcome. Please let me know if you like the plugin too!<br/><br/>
		<b>More by this author</b>
		<a href="http://www.intert3chmedia.net/"target="_blank">www.intert3chmedia.net</a><br>
		<a href="http://www.finderonly.net/"target="_blank">www.finderonly.net</a></p>
		<!-- SITE FEEDS-->
		<div class="menu_right_title">OUR LATEST POSTS</div>
		<script language="JavaScript" src="http://feeds.feedburner.com/internet-multimedia-tips?format=sigpro&nItems=3&openLinks=new&displayDate=false&displayEnclosures=true" type="text/javascript"></script>
		<script language="JavaScript" src="http://feeds.feedburner.com/d-artchitextweblog?format=sigpro&nItems=2&openLinks=new" type="text/javascript"></script><br/>
		</div>
	</div>
  <div class="postbox-container" style="width: 98%;">
  <div class="metabox-holder">
       <div id="copyright" class="postbox">
          <div class="menu_right_title" style="text-align:center">
		  <p>Copyright &copy; 2011 - <script type="text/javascript" language="JavaScript">var today = new Date();document.write(today.getFullYear());</script> by D-Artchitext on DVS&trade; (Damn's Virtual Studio).<br/>Feel free to <a href="mailto:az.elminwarie@gmail.com">contact me</a> if you need help with the plugin.</p> </div>
      </div>
    </div>
  </div>
</div>
<?php	
}

function show_Rpost_mp3_post($AlwaysShow = false, $categoryID = 0, $NumberOfPosts = 0) {
   global $wpdb;
   
   $options = get_option('random_post_mp3');
   if (!$AlwaysShow) { if ($options['show_Rpost_mp3'] != 'show') return; }
   
   if ($categoryID == 0) {
	$show_category = explode(" ",$options['show_category']);
      if (sizeof($show_category) == 0) return;
   } else {
      if (!is_numeric($categoryID)) return;
      $show_category = explode(" ",$categoryID);
   }
   $sqlcat = "( ";
   $count = 0;
   foreach ($show_category as $cat) {
      if ($count > 0) $sqlcat = $sqlcat." OR ";
      $sqlcat = $sqlcat."$wpdb->term_taxonomy.term_id = ".$cat;
      $count = $count + 1;
   }
   $sqlcat = $sqlcat." )";

   if (!is_numeric($options['num_posts'])) {
	$num_posts = '5';
   } else {
      $num_posts = $options['num_posts'];
   }
   if ($NumberOfPosts > 0) $num_posts = $NumberOfPosts;

   if (empty($options['position'])) {
      $position = 'top';
   } else {
      $position = $options['position'];
   }
   if (empty($options['base_color'])) {
      $base_color = '#78BFFE';
   } else {
      $base_color = $options['base_color'];
   }
   if (empty($options['slide_color'])) {
      $slide_color = '#00FF00';
   } else {
      $slide_color = $options['slide_color'];
   }
   if (empty($options['link_color'])) {
      $link_color = '#FFFFFF';
   } else {
      $link_color = $options['link_color'];
   }      
   if (empty($options['target_url'])) {
      $target_url = 'http://example.com/music.mp3';
   } else {
      $target_url = $options['target_url'];
   }
   if (empty($options['target_url2'])) {
      $target_url2 = 'http://example.com/music2.mp3';
   } else {
      $target_url2 = $options['target_url2'];
   }
   if (empty($options['target_url3'])) {
      $target_url3 = 'http://example.com/music3.mp3';
   } else {
      $target_url3 = $options['target_url3'];
   }
   if (empty($options['addthis_ID'])) {
      $addthis_ID = '';
   } else {
      $addthis_ID = $options['addthis_ID'];
   }
   if (empty($options['autoplay'])) {
      $autoplay = 'no';
   } else {
      $autoplay = $options['autoplay'];
   }
   if (empty($options['repeat'])) {
      $repeat = 'yes';
   } else {
      $repeat = $options['repeat'];
   }
   if (empty($options['shuffle'])) {
      $shuffle = 'no';
   } else {
      $shuffle = $options['shuffle'];
   }
   if (empty($options['sound_volume'])) {
      $sound_volume = '75';
   } else {
      $sound_volume = $options['sound_volume'];
   }
	// end options
	echo"<!-- 4 in 1 plugin: Random Post Scroller, Mp3 Player, AddThis Button, Quick Notice v1.4.1 START -->\n";
	echo"<div id='DVS_scroll_env' align='center'><div id='DVS_content'>";
	echo"<div class='social_share_dd'>\n<!-- AddThis Button BEGIN -->
	<div class='addthis_toolbox addthis_default_style '>
	<a class='addthis_button_compact'></a>
	<a class='addthis_counter addthis_bubble_style'></a>
	<a class='addthis_button_preferred_3'></a>
	<a class='addthis_button_preferred_11'></a>
	<a class='addthis_button_preferred_12'></a>
	<a class='addthis_button_google_plusone' g:plusone:size='small'/></a>
	<a class='addthis_button_facebook_like' fb:like:layout='button_count'style='margin-left:-21px'></a>
	</div>
	<script type='text/javascript' src='http://s7.addthis.com/js/300/addthis_widget.js$addthis_ID'></script>
	<!-- AddThis Button END -->
	</div>";
	echo"\n<div class='dvs_random_posts'>
	<div class='randpostscroll' id='recommend'>
	<div class='boxBody'><div id='scrollRow'>
	<a class='goLeft' id='slide_left' href='javascript:void(0);'>
	<img src='",RPSBMP3_URL."/img/leftgree.png'width='13' height='17' alt='&laquo;' border='0' style='padding-top:3px'/></a>
	<a class='goRight' id='slide_right' href='javascript:void(0);'>
	<img src='",RPSBMP3_URL."/img/rightgree.png'width='13' height='17' alt='&raquo;' border='0' style='padding-top:3px'/></a>
	<div id='gscroll'><div id='gsub'><ul id='holder1'>";
   $posts = mysql_query("
		SELECT * FROM $wpdb->posts
		LEFT JOIN $wpdb->term_relationships ON
		($wpdb->posts.ID = $wpdb->term_relationships.object_id)
		LEFT JOIN $wpdb->term_taxonomy ON
		($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
		WHERE $wpdb->posts.post_status = 'publish'
		AND $wpdb->term_taxonomy.taxonomy = 'category'
		AND ".$sqlcat." ORDER BY RAND()
		LIMIT ".$num_posts, $wpdb->dbh) or die(mysql_error().' on line: '.__LINE__);
	
   if ($posts && mysql_num_rows($posts) > 0) {
	while ($thepost = mysql_fetch_object($posts)) {
		$myID = $thepost->ID;
   		//if ($myID == 0) return;
		$thepost = get_post($myID);
		setup_postdata($thepost);
   		echo "<li><div class='slidercontent'><a href=\"";
   		echo get_permalink($myID);
		//UNCOMMENT THESE TWO LINES TO DISPLAY TOOLTIPS, BUT BUY FEW MORE QUERIES
   		//echo "\" title=\"";
   		//echo apply_filters('the_title', $thepost->post_title);
   		echo "\">";
   		echo apply_filters('the_title', $thepost->post_title);
   		echo "</a></div></li>";
	}
   }  // else no posts
		echo "</ul><ul id='holder2'></ul></div></div></div></div></div></div>";
		if ($options['credit'] == 'Y') {	
			echo "<div class='dvs_cret'><script type='text/javascript' src='",RPSBMP3_URL."/js/scrollercontroll.js'></script><a title='4 in 1 plugin by DVS' href='http://blog.finderonly.net/2012/plugin-random-post-mp3-player-share-button-in-one.html' target='_blank'><img src='",RPSBMP3_URL."/img/cdt.png'width='20px' height='20px' border='0' style='padding-top:3px' alt='get'></a></div>";	
			} else {
			echo "<div class='dvs_cret' style='margin-left:-5px'><script type='text/javascript' src='",RPSBMP3_URL."/js/scrollercontroll.js'></script>\n<!-- Oops, no credit intact, FYI this plugin can be found at http://blog.finderonly.net/2012/plugin-random-post-mp3-player-share-button-in-one.html -->&nbsp;</div>\n";
   		}
		//PLAYER OPTIONS
		if ($options['player_type'] == '1') {	
			echo "<div class='dvs_mp3_player'><object type='application/x-shockwave-flash' name='ap_player' style='outline: none;margin-left:-2px' data='",RPSBMP3_URL."/player/player.swf?ver=2.0.4.1' width='225' height='22' id='ap_player'><param name='movie' value='",RPSBMP3_URL."/player/player.swf?ver=2.0.4.1' /><param name='bgcolor' value='#FFFFFF'/><param name='wmode' value='transparent'/><param name='menu' value='false'/><param name='flashvars' value='animation=yes&amp;initialvolume=71&amp;remaining=no&amp;noinfo=no&amp;buffer=5&amp;checkpolicy=no&amp;rtl=no&amp;bg=1e7cba&amp;text=333333&amp;leftbg=CDDFF3&amp;lefticon=4016b3&amp;volslider=8a8282&amp;voltrack=FFFFFF&amp;rightbg=22a6bd&amp;rightbghover=17aeb3&amp;righticon=333333&amp;righticonhover=FFFFFF&amp;track=FFFFFF&amp;loader=00EE00&amp;border=CCCCCC&amp;tracker=23deeb&amp;skip=050505&amp;soundFile=$target_url'/></object></div>";	
		} else {
		echo "\n<div class='dvs_mp3_player'><object id='DVS-Mp3Player' type='application/x-shockwave-flash' data='",RPSBMP3_URL."/player/DVS-Mp3Player.swf?soundFile=$target_url|$target_url2|$target_url3' width='233' height='27' align='middle' style='margin-top:-2px;margin-left:-4px'><param name='movie' value='",RPSBMP3_URL."/player/DVS-Mp3Player.swf?soundFile=$target_url|$target_url2|$target_url3'/><param name='flashvars' value='autoplay=$autoplay&loop=$repeat&volume=$sound_volume&shuffle=$shuffle'/><param name='wmode' value='transparent'/><param name='quality' value='high'/><param name='allowFullScreen' value='false'/></object></div>";
   		}
		echo"<div class='go_up'><a title='Go to Top' href='#' onclick='MGJS.goTop();return false;'><img class='go_up' border='0' width='19' height='18' src='",RPSBMP3_URL."/img/up2.png' alt='up' /></a></div>";
		echo"<div class='tootoop'><a href='#' onclick='document.getElementById(&quot;DVS_scroll_env&quot;).style.display=&quot;none&quot;;return false;'title='Close'><img class='tootoop' border='0' width='13' height='13' src='",RPSBMP3_URL."/img/close.png' alt='x' /></a></div>";
		echo"</div></div>";
		echo"<div id='fatihah'><a href='#' onclick='document.getElementById(&quot;DVS_scroll_env&quot;).style.display=&quot;block&quot;;return false;'>Show Widget</a></div>";
		include_once ('webvsmobile.php');
}

// Notif bar
function show_notif_bar($AlwaysShow = false) {
global $wpdb;
   $options = get_option('random_post_mp3');
   if (!$AlwaysShow) { if ($options['show_notif'] != 'show') return; }
   if (empty($options['notif_instance'])) {
      $notif_instance = '';
   } else {
      $notif_instance = $options['notif_instance'];
   }
   if (empty($options['cus_cod'])) {
      $cus_cod = '';
   } else {
      $cus_cod = $options['cus_cod'];
   }
   if (empty($options['notif_placement'])) {
      $notif_placement = 'top';
   } else {
      $notif_placement = $options['notif_placement'];
   }
   echo "<div id='DVS_notif_env' align='center'><div class='notif_bg'>";
   // custom code
   echo "<div id='cus_cod'>";
   echo stripcslashes($options['cus_cod']); 
   echo " </div>";
   echo "<div id='notif_content'>";
   echo stripcslashes($options['notif_instance']);
   echo "</div>";
   // close
   echo"<div id='tootoop_env'><a href='#' onclick='document.getElementById(&quot;DVS_notif_env&quot;).style.display=&quot;none&quot;;return false;'title='Close'><img width='13' height='13' src='",RPSBMP3_URL."/img/close.png' alt='x' /></a></div>";
   echo "</div></div>";
   echo "<div id='fatihah_env'><a href='#' onclick='document.getElementById(&quot;DVS_notif_env&quot;).style.display=&quot;block&quot;;return false;' >Show Notification</a></div>";
	include_once ('webvsmobile_notif.php');
}
/*default minified css with no white spaces*/
function dvs_RPSBMP_css() {
	echo "\n<!-- 4 in 1 Widget v1.4.1: Random Posts, Mp3 Player, Quick Notify + ShareButton by DVS- www.finderonly.net/projects/ -->\n<link rel='stylesheet' type='text/css' href='",RPSBMP3_URL."/style.css.php'/>\n<!--[if IE]>\n<link rel='stylesheet' href='",RPSBMP3_URL."/ie.css' type='text/css' media='screen' />\n<![endif]-->";
}
add_action('wp_head', 'dvs_RPSBMP_css',1);
add_action('wp_footer', 'show_Rpost_mp3_post');
add_action('wp_footer', 'show_notif_bar');
?>