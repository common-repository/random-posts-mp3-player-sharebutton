<?php /* This script is to prevent widget from showing on mobile browser since they don't support CSS fixed position*/
{
?>
<script type="text/javascript">if (screen.width >= 800) {document.write ("<style type='text/css' media='screen'>#DVS_scroll_env{width:100%;height:29px;padding-top:4px;margin:0;background:<?php echo $base_color; ?> url(<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/bg.png) right top;position:fixed;<?php echo $position; ?>:0px;left:0px;z-index:99999;}.slidercontent{width:400px;height:15px;padding:2px;margin:0 auto;font:12px Segoe UI, Tahoma;border:#000 3px double;background:<?php echo $slide_color; ?> url(<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/palastik.png);background-position:0px -186px;}.slidercontent a{color:<?php echo $link_color; ?>!important;text-decoration:none!important}#fatihah{position:fixed;right:3em;<?php echo $position; ?>:0px;margin:11px 0;font-weight:bold;}</style>");}else{document.write ("<style type='text/css'media='screen'>#DVS_scroll_env, #fatihah{visibility:hidden;display:none}</style>");}</script>
<noscript><style type="text/css"media="screen">#DVS_scroll_env, #fatihah{visibility:hidden;display:none}</style><div style="text-align:center;font-weight:bold">Your browser does not support JavaScript!</div></noscript>
<?php
}
?>