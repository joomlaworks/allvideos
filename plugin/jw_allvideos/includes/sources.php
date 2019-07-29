<?php
/**
 * @version    5.0.0
 * @package    AllVideos (plugin)
 * @author     JoomlaWorks - http://www.joomlaworks.net
 * @copyright  Copyright (c) 2006 - 2019 JoomlaWorks Ltd. All rights reserved.
 * @license    GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/* -------------------------------- Media Output Templates -------------------------------- */

$nativeVideo = "
<div id=\"avID_{SOURCEID}\" style=\"width:{WIDTH}px;height:{HEIGHT}px;\" title=\"JoomlaWorks AllVideos Player\">
    <video id=\"avID_{SOURCEID}\" style=\"width:{WIDTH}px;height:{HEIGHT}px;object-fit:contain;\" src=\"{SITEURL}/{FOLDER}/{SOURCE}.{FILE_EXT}\" autoplay=\"{PLAYER_AUTOPLAY}\" controls=\"controls\" preload=\"metadata\"></video>
</div>
";

$nativeVideoRemote = "
<div id=\"avID_{SOURCEID}\" style=\"width:{WIDTH}px;height:{HEIGHT}px;\" title=\"JoomlaWorks AllVideos Player\">
    <video id=\"avID_{SOURCEID}\" style=\"width:{WIDTH}px;height:{HEIGHT}px;object-fit:contain;\" src=\"{SOURCE}\" autoplay=\"{PLAYER_AUTOPLAY}\" controls=\"controls\" preload=\"metadata\"></video>
</div>
";

$nativeAudio = "
<div id=\"avID_{SOURCEID}\" style=\"width:{WIDTH}px;height:{HEIGHT}px;\" title=\"JoomlaWorks AllVideos Player\">
    <audio id=\"avID_{SOURCEID}\" style=\"width:{WIDTH}px;height:{HEIGHT}px;object-fit:contain;\" src=\"{SITEURL}/{FOLDER}/{SOURCE}.{FILE_EXT}\" autoplay=\"{PLAYER_AUTOPLAY}\" controls=\"controls\" preload=\"metadata\"></audio>
</div>
";

$nativeAudioRemote = "
<div id=\"avID_{SOURCEID}\" style=\"width:{WIDTH}px;height:{HEIGHT}px;\" title=\"JoomlaWorks AllVideos Player\">
    <audio id=\"avID_{SOURCEID}\" style=\"width:{WIDTH}px;height:{HEIGHT}px;object-fit:contain;\" src=\"{SOURCE}\" autoplay=\"{PLAYER_AUTOPLAY}\" controls=\"controls\" preload=\"metadata\"></audio>
</div>
";

$deprecated = "<a id=\"avID_{SOURCEID}\" class=\"avDeprecated\" href=\"{SITEURL}/{FOLDER}/{SOURCE}.{FILE_EXT}\" download><span>Download media file</span></a>";

$deprecatedRemote = "<a id=\"avID_{SOURCEID}\" class=\"avDeprecated\" href=\"{SOURCE}\" download><span>Download media file</span></a>";

$clapprEmbed = "
<div id=\"avID_{SOURCEID}\" style=\"width:{WIDTH}px;height:{HEIGHT}px;\" title=\"JoomlaWorks AllVideos Player\"></div>
<script type=\"text/javascript\">
    var player = new Clappr.Player({
        source: '{SITEURL}/{FOLDER}/{SOURCE}.{FILE_EXT}',
        poster: '{PLAYER_POSTER_FRAME}',
        height: '{HEIGHT}',
        width: '{WIDTH}',
        autoPlay: {PLAYER_AUTOPLAY},
        loop: {PLAYER_LOOP},
        parentId: '#avID_{SOURCEID}'
    });
</script>
";

$clapprEmbedRemote = "
<div id=\"avID_{SOURCEID}\" style=\"width:{WIDTH}px;height:{HEIGHT}px;\" title=\"JoomlaWorks AllVideos Player\"></div>
<script type=\"text/javascript\">
    var player = new Clappr.Player({
        source: '{SOURCE}',
        poster: '{PLAYER_POSTER_FRAME_REMOTE}',
        height: '{HEIGHT}',
        width: '{WIDTH}',
        autoPlay: {PLAYER_AUTOPLAY},
        loop: {PLAYER_LOOP},
        parentId: '#avID_{SOURCEID}'
    });
</script>
";

$clapprAudioEmbed = "
<div id=\"avID_{SOURCEID}\" style=\"width:{WIDTH}px;height:{HEIGHT}px;\" title=\"JoomlaWorks AllVideos Player\"></div>
<script type=\"text/javascript\">
    var player = new Clappr.Player({
        source: '{SITEURL}/{FOLDER}/{SOURCE}.{FILE_EXT}',
        poster: '{PLAYER_POSTER_FRAME}',
        height: '{HEIGHT}',
        width: '{WIDTH}',
        autoPlay: {PLAYER_AUTOPLAY},
        loop: {PLAYER_LOOP},
        hideMediaControl: {AUDIO_CONTROLS},
        parentId: '#avID_{SOURCEID}'
    });
</script>
";

$clapprAudioEmbedRemote = "
<div id=\"avID_{SOURCEID}\" style=\"width:{WIDTH}px;height:{HEIGHT}px;\" title=\"JoomlaWorks AllVideos Player\"></div>
<script type=\"text/javascript\">
    var player = new Clappr.Player({
        source: '{SOURCE}',
        poster: '{PLAYER_POSTER_FRAME_REMOTE}',
        height: '{HEIGHT}',
        width: '{WIDTH}',
        autoPlay: {PLAYER_AUTOPLAY},
        loop: {PLAYER_LOOP},
        hideMediaControl: {AUDIO_CONTROLS},
        parentId: '#avID_{SOURCEID}'
    });
</script>
";



/* -------------------------------- Tags & formats -------------------------------- */
$tagReplace = array(

    /* --- Audio/Video formats --- */

    "m4v"         => $nativeVideo,
    "m4vremote"   => $nativeVideoRemote,
    "mp4"         => $nativeVideo,
    "mp4remote"   => $nativeVideoRemote,
    "ogv"         => $nativeVideo,
    "ogvremote"   => $nativeVideoRemote,
    "webm"        => $clapprEmbed,
    "webmremote"  => $nativeVideoRemote,

    "flac"        => $nativeAudio,
    "flacremote"  => $nativeAudioRemote,
    "m4a"         => $nativeAudio,
    "m4aremote"   => $nativeAudioRemote,
    "mp3"         => $nativeAudio,
    "mp3remote"   => $nativeAudioRemote,
    "oga"         => $nativeAudio,
    "ogaremote"   => $nativeAudioRemote,
    "ogg"         => $nativeAudio,
    "oggremote"   => $nativeAudioRemote,
    "wav"         => $nativeAudio,
    "wavremote"   => $nativeAudioRemote,

    "3g2"         => $deprecated,
    "3g2remote"   => $deprecatedRemote,
    "3gp"         => $deprecated,
    "3gpremote"   => $deprecatedRemote,
    "aac"         => $deprecated,
    "aacremote"   => $deprecatedRemote,
    "avi"         => $deprecated,
    "aviremote"   => $deprecatedRemote,
    "divx"        => $deprecated,
    "divxremote"  => $deprecatedRemote,
    "f4v"         => $deprecated,
    "f4vremote"   => $deprecatedRemote,
    "flv"         => $deprecated,
    "flvremote"   => $deprecatedRemote,
    "mkv"         => $deprecated,
    "mkvremote"   => $deprecatedRemote,
    "mov"         => $deprecated,
    "movremote"   => $deprecatedRemote,
    "mpeg"        => $deprecated,
    "mpegremote"  => $deprecatedRemote,
    "mpg"         => $deprecated,
    "mpgremote"   => $deprecatedRemote,
    "swf"         => $deprecated,
    "swfremote"   => $deprecatedRemote,
    "wma"         => $deprecated,
    "wmaremote"   => $deprecatedRemote,
    "wmv"         => $deprecated,
    "wmvremote"   => $deprecatedRemote,



    /* --- 3rd party video providers --- */

    // youtube.com - https://www.youtube.com/watch?v=g5lGNkS5TE0 or https://www.youtube.com/playlist?list=PL0875C16C899A8DE6
    "YouTube" => "<iframe src=\"https://www.youtube.com/embed/{SOURCE}\" width=\"{WIDTH}\" height=\"{HEIGHT}\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"true\" frameborder=\"0\" scrolling=\"no\" title=\"JoomlaWorks AllVideos Player\"></iframe>",

    // dailymotion.com - https://www.dailymotion.com/featured/video/x35714_cap-nord-projet-1_creation
    "Dailymotion" => "<iframe src=\"https://www.dailymotion.com/embed/video/{SOURCE}\" width=\"{WIDTH}\" height=\"{HEIGHT}\" allowfullscreen=\"true\" frameborder=\"0\" scrolling=\"no\" title=\"JoomlaWorks AllVideos Player\"></iframe>",

    // facebook.com - https://www.facebook.com/Channel4News/videos/10155042102006939/
    "Facebook" => "<iframe src=\"https://www.facebook.com/plugins/video.php?href={SOURCE}&show_text=0&width={WIDTH}\" width=\"{WIDTH}\" height=\"{HEIGHT}\" allowfullscreen=\"true\" frameborder=\"0\" scrolling=\"no\" title=\"JoomlaWorks AllVideos Player\"></iframe>",

    // flickr.com - https://www.flickr.com/photos/bswise/5930051523/in/pool-726923@N23/
    "Flickr" => "
    <script type=\"text/javascript\">
        allvideos.ready(function(){
            allvideos.embed({
                'url': 'https://json2jsonp.com/?callback=flickr{SOURCEID}&url=https%3A%2F%2Fwww.flickr.com%2Fservices%2Foembed%2F%3Fformat%3Djson%26maxwidth%3D{WIDTH}%26maxheight%3D{HEIGHT}%26url%3D{SOURCE}',
                'callback': 'flickr{SOURCEID}',
                'playerID': 'avID_{SOURCEID}'
            });
        });
    </script>
    <div id=\"avID_{SOURCEID}\" title=\"JoomlaWorks AllVideos Player\">&nbsp;</div>
    ",

    // soundcloud.com - https://soundcloud.com/sebastien-tellier/look
    "SoundCloud" => "
    <script type=\"text/javascript\">
        allvideos.ready(function(){
            allvideos.embed({
                'url': 'https://soundcloud.com/oembed?format=js&iframe=true&callback=soundcloud{SOURCEID}&auto_play={PLAYER_AUTOPLAY}&maxwidth={WIDTH}&url={SOURCE}',
                'callback': 'soundcloud{SOURCEID}',
                'playerID': 'avID_{SOURCEID}'
            });
        });
    </script>
    <div id=\"avID_{SOURCEID}\" title=\"JoomlaWorks AllVideos Player\">&nbsp;</div>
    ",

    // vimeo.com - https://www.vimeo.com/1319796
    "Vimeo" => "<iframe src=\"https://player.vimeo.com/video/{SOURCE}\" width=\"{WIDTH}\" height=\"{HEIGHT}\" allowfullscreen=\"true\" frameborder=\"0\" scrolling=\"no\" title=\"JoomlaWorks AllVideos Player\"></iframe>"

);
