<?php /* This script is to prevent widget from showing on mobile browser since they don't support CSS fixed position*/
{
?>
<script type="text/javascript">if (screen.width >= 800) {document.write ("<style type='text/css' media='screen'>#DVS_notif_env{width:100%;height:33px;padding-top:4px;margin:0;background:aqua url(<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/bg.png) right top;position:fixed;<?php echo $notif_placement; ?>:0px;left:0px;z-index:99999;}#fatihah_env{position:fixed;right:1.7em;<?php echo $notif_placement; ?>:0px;margin:11px 0;font-weight:bold;}</style>");}else{document.write ("<style type='text/css'media='screen'>#DVS_notif_env, #fatihah_env{visibility:hidden;display:none}</style>");}</script>
<noscript><style type="text/css"media="screen">#DVS_notif_env{width:100%;height:33px;padding-top:4px;margin:0;background:aqua url(<?php echo WP_PLUGIN_URL."/".dirname( plugin_basename( __FILE__ ) ) ; ?>/img/bg.png) right top;position:fixed;<?php echo $notif_placement; ?>:0px;left:0px;z-index:99999;overflow:hidden}#fatihah_env{position:fixed;right:1.7em;<?php echo $notif_placement; ?>:0px;margin:11px 0;font-weight:bold;}</style></noscript>
<?php
}
?>