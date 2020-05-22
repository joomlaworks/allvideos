/**
 * @version    6.1.0
 * @package    AllVideos (plugin)
 * @author     JoomlaWorks - https://www.joomlaworks.net
 * @copyright  Copyright (c) 2006 - 2020 JoomlaWorks Ltd. All rights reserved.
 * @license    GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 */

var allvideos = {
    ready: function(cb) {
        /in/.test(document.readyState) ? setTimeout('allvideos.ready(' + cb + ')', 9) : cb();
    },

    getRemoteJson: function(url) {
        var remoteJsonScript = document.createElement('script');
        remoteJsonScript.setAttribute('charset', 'utf-8');
        remoteJsonScript.setAttribute('type', 'text/javascript');
        remoteJsonScript.setAttribute('async', 'true');
        remoteJsonScript.setAttribute('src', url);
        return remoteJsonScript;
    },

    embed: function(el) {
        var jsonpCallback = el.callback;
        var tempId = Math.floor(Math.random() * 1000) + 1;
        var responseContainer = [];
        window[jsonpCallback] = function(response) {
            responseContainer.tempId = [response];
        };
        var head = document.getElementsByTagName('head')[0];
        var jsonp = this.getRemoteJson(el.url);
        jsonp.onloadDone = false;
        jsonp.onload = function() {
            if (!jsonp.onloadDone) {
                jsonp.onloadDone = true;
                document.getElementById(el.playerID).innerHTML = responseContainer.tempId[0].html;
            }
        };
        jsonp.onreadystatechange = function() {
            if (("loaded" === jsonp.readyState || "complete" === jsonp.readyState) && !jsonp.onloadDone) {
                jsonp.onloadDone = true;
                document.getElementById(el.playerID).innerHTML = responseContainer.tempId[0].html;
            }
        }
        head.appendChild(jsonp);
    }
}

function allVideosMakeVideoPoster(source, container) {
    if (source.autoplay || source.poster) {
        return;
    }
    var videoClass = source.getAttribute('class');
    var videoStyle = source.getAttribute('style');
    var videoURL = source.getAttribute('src');
    var videoControls = (source.controls ? ' controls' : '');
    var videoControlsList = (source.controlsList ? ' controlsList="' + source.controlsList + '"' : '');
    var videoPoster = '';
    var secToSeek = 5;

    var v = document.createElement('video');
    v.setAttribute('preload', 'metadata');
    v.src = videoURL + '#t=' + secToSeek;
    v.onseeked = function(e) {
        var canvas = document.createElement('canvas');
        canvas.width = v.videoWidth;
        canvas.height = v.videoHeight;
        var ctx = canvas.getContext('2d');
        ctx.drawImage(v, 0, 0, canvas.width, canvas.height);
        videoPoster = canvas.toDataURL();
        container.innerHTML = '<video class="' + videoClass + '" style="' + videoStyle + '" src="' + videoURL + '" poster="' + videoPoster + '" preload="metadata"' + videoControls + '' + videoControlsList + '></video>';
    };
}

function allVideosHelper() {
    var i = 0,
        j = 0,
        deprecated = document.querySelectorAll(".avDeprecated"),
        deprecatedCount = deprecated.length,
        videos = document.querySelectorAll("video.avPlayer"),
        videosCount = videos.length;

    if (deprecatedCount) {
        for (j; j < deprecatedCount; j++) {
            var parent = deprecated[j].parentNode;
            parent.setAttribute('class', 'avPlayerBlockDisabled');
        }
    }

    if (videosCount) {
        for (i; i < videosCount; i++) {
            var container = videos[i].parentNode;
            allVideosMakeVideoPoster(videos[i], container);
        }
    }
}

if (window.addEventListener) {
    window.addEventListener("DOMContentLoaded", allVideosHelper, false);
} else if (window.attachEvent) {
    window.attachEvent("onload", allVideosHelper);
} else {
    window.onload = allVideosHelper;
}
