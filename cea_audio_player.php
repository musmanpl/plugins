<?php
/*
    Plugin Name: CEA Audio Player
   	Description: This is our Custom Plugin For Audio Player.
    Author: Muhammad Usman
    Version: 2.0.0
	GitHub Plugin URI: musmanpl/plugins
	
    */
	

add_shortcode('audioPlayer', 'cea_shortcode_custom');


function cea_shortcode_custom($atts)
{
	wp_register_style('audioplayerstyle1', plugins_url('/css/html5audio_default.css', __FILE__));
	wp_register_style('audioplayerstyle2', plugins_url('/css/html5audio_full2.css', __FILE__));
	wp_register_style('audioplayerstyle3', plugins_url('/css/jquery.jscrollpane.css', __FILE__));
   
   
    wp_enqueue_style('audioplayerstyle1');
	wp_enqueue_style('audioplayerstyle2');
	wp_enqueue_style('audioplayerstyle3');
	
	//wp_enqueue_script('jquery-ui-sortable1', plugins_url('/js/sortable.min.js', __FILE__));
	wp_enqueue_script('jquery.html5audio.min1', plugins_url('/js/jquery.html5audio.min.js', __FILE__), array('jquery-ui-sortable'), '1.0.0', true);
    wp_enqueue_script('jquery.html5audio.func1', plugins_url('/js/jquery.html5audio.func.js', __FILE__), array('jquery.html5audio.min1'));
    wp_enqueue_script('jquery.html5audio.settings_full21', plugins_url('/js/jquery.html5audio.settings_full2.js', __FILE__), array('jquery.html5audio.func1'));
	
	wp_enqueue_script('jquery.html5audio.min1');
	wp_enqueue_script('jquery.html5audio.func1');
	wp_enqueue_script('jquery.html5audio.settings_full21');
	
	$src_array	=	explode(",",$atts['src']);
	$title_array	=	explode(",",$atts['name']);
	
	$return	=	'<div id="componentWrapper" class="audio_player">
<div class="playerHolder">


<div class="player_mediaName_Mask">
<div class="player_mediaName">.</div>
</div>
<div class="player_mediaTime">
<div class="player_mediaTime_current">0:00</div>
<div class="player_mediaTime_total">0:00</div>
</div>
<div class="player_controls">
<div class="controls_prev"><img src="'.plugins_url('media/data/icons/set1/prev.png', __FILE__).'" alt="controls_prev" /></div>
<div class="controls_toggle"><img src="'.plugins_url('media/data/icons/set1/play.png', __FILE__).'" alt="controls_toggle" /></div>
<div class="controls_next"><img src="'.plugins_url('media/data/icons/set1/next.png', __FILE__).'" alt="controls_next" /></div>
<div class="player_volume"><img src="'.plugins_url('media/data/icons/set1/volume.png', __FILE__).'" alt="player_volume" /></div>
<div class="volume_seekbar">
<div class="volume_bg"></div>
<div class="volume_level"></div>

<div class="player_volume_tooltip">
<p class="asd">.</p>

</div>
</div>

<div class="player_loop"><img src="'.plugins_url('media/data/icons/set1/loop.png', __FILE__).'" alt="player_loop" /></div>
</div>

<div class="player_progress">
<div class="progress_bg"></div>
<div class="load_progress"></div>
<div class="play_progress"></div>

<div class="player_progress_tooltip">
<p class="asd">.</p>

</div>
</div>
</div>
<div class="playlistHolder">
<div class="componentPlaylist">
<div class="playlist_inner"></div>
</div>
<div class="preloader"></div>
</div>
</div>
<div id="playlist_list">


<ul id="playlist1">';

$plist	=	"";
$a=0;
foreach($src_array as $src)
{
	
	$plist .= '<li class="playlistItem" data-type="local" data-mp3="'.$src.'" data-ogg="" data-download=""><a class="playlistNonSelected" href="#">'.$title_array[$a].' - Audio</a><a style="float: right;" href="'.$src.'" download="" data-dlink=""><img src="'.plugins_url('media/data/dlink.png', __FILE__).'" alt="" /></a></li>';
    $a++;
}

$return .= $plist."</ul></div>";
	return $return;
	
}


