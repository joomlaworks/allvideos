<?php
/**
 * @version		4.7.1
 * @package		AllVideos (plugin)
 * @author    	JoomlaWorks - http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2015 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

$expires = 60; // Time in minutes to cache this file

ob_start("ob_gzhandler");

// Includes
echo "/* behaviour.js */\n";
include(dirname( __FILE__ ).DS."behaviour.js");
echo "/* silverlight.js */\n";
include(dirname( __FILE__ ).DS."wmvplayer".DS."silverlight.js");
echo "\n\n";
echo "/* wmvplayer.js */\n";
include(dirname( __FILE__ ).DS."wmvplayer".DS."wmvplayer.js");
echo "\n\n";
echo "/* ac_quicktime.js */\n";
include(dirname( __FILE__ ).DS."quicktimeplayer".DS."ac_quicktime.js");
echo "\n\n";

$bufferSize = ob_get_length(); // Required to close the connection

header("Content-type: text/javascript; charset=utf-8");
header("Cache-Control: max-age=".($expires*60));
header("Expires: ".gmdate("D, d M Y H:i:s", time() + ($expires*60))." GMT");
header("Content-Length: $bufferSize");
header("Connection: close");

ob_end_flush();
ob_flush();
flush();
