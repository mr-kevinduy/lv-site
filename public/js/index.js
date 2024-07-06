(function($) {
    "use strict";

    var unloadFlg = false;

    var getVideo = function() {
        poster = "https://vjs.zencdn.net/v/oceans.png";
        videoPath = "rtmp://localhost/fms/videos_name/mp4/videos_name_speed.mp4";

        var flashvars = {
            src: videoPath,
            poster: poster,
            autoPlay: true,
            controlBarAutoHide: false,
            javascriptCallbackFunction: "onJavaScriptBridgeCreated"
        };

        var params = {
            quality: "high",
            bgcolor: "#000000",
            allowscriptaccess: "always",
            allowfullscreen: "true"
        };

        var attributes = {};

        swfobject.embedSWF(
            "/swf/StrobeMediaPlayback.swf",
            "player",
            "560",
            "356",
            "10.1.0",
            "/swf/expressInstall.swf",
            flashvars,
            params,
            attributes
        );

        swfobject.createCSS("#" + 'player', "display:inline-block;text-align:left;");

        $(window).on("beforeunload", beforeUnload);
    };

    var player = null;
    var started = false;

    var onBufferingChange = function (buffering) {
        if (buffering && !started) {
            started = true;
        }
    }

    var beforeUnload = function() {
        if (!unloadFlg) {
            unloadFlg = true;
            var flash = document.player || window.player;
            // flash.receiveMove();
        }
    };

    var onJavaScriptBridgeCreated = function(playerId, event, data) {
        if (player == null) {
            player = document.getElementById("player");
        }

        if (event === 'onJavaScriptBridgeCreated') {
            player.addEventListener("bufferingChange", "onBufferingChange");
        }

        if (
            event === 'timeupdate' &&
            ((Math.floor(data.currentTime) !== 0 && Math.floor(data.currentTime) === Math.floor(data.duration)) ||
            (Math.floor(data.currentTime) > Math.floor(data.duration)))
        ) {
            player.setCurrentTime(data.duration);
            player.setAutoPlay(false);
            player.load();

            return;
        }
    };

    var domReady = function() {
        getVideo();
    };

    $(document).on("ready", domReady);

    window.onJavaScriptBridgeCreated = onJavaScriptBridgeCreated;
    window.onBufferingChange = onBufferingChange;
})(jQuery);
