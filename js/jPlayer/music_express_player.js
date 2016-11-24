var $playlist;
var myPlaylist;
var $i = 0;
var $img_player;

function addSong($title, $artist, $img, $url) {
    myPlaylist = new jPlayerPlaylist({
        jPlayer: "#jplayer_N",
        cssSelectorAncestor: "#jp_container_N"
    }, $playlist, {
        playlistOptions: {
            enableRemoveControls: true,
            autoPlay: true
        },
        swfPath: "js/jPlayer",
        supplied: "webmv, ogv, m4v, oga, mp3",
        smoothPlayBar: true,
        keyEnabled: true,
        audioFullScreen: false,
        play: function(e) {
            var span = document.getElementById('song-img');
            span.innerHTML = '';
            span.innerHTML = span.innerHTML + '' +
                '<img src="' + $img_player + '" class="dker" alt="...">';
        }
    });
    $img_player = $img;
    if(myPlaylist.playlist.length == 0) {
        myPlaylist = new jPlayerPlaylist({
            jPlayer: "#jplayer_N",
            cssSelectorAncestor: "#jp_container_N"
        }, $playlist, {
            playlistOptions: {
                enableRemoveControls: true,
                autoPlay: true
            },
            swfPath: "js/jPlayer",
            supplied: "webmv, ogv, m4v, oga, mp3",
            smoothPlayBar: true,
            keyEnabled: true,
            audioFullScreen: false,
            play: function(e) {
                var span = document.getElementById('song-img');
                span.innerHTML = '';
                span.innerHTML = span.innerHTML + '' +
                    '<img src="' + $img_player + '" class="dker" alt="...">';
            }
        });
    }

    var $flag = 1;

    myPlaylist.playlist.forEach(function(element) {
        if(element.title == $title) {
            $flag = 0;
        }
    });

    console.log();

    if($flag == 1) {

        myPlaylist.add({
            title: $title,
            artist: $artist,
            mp3: $url,
            poster: $img
        });

        myPlaylist.play();

        var div = document.getElementById('side-bar-content');

        console.log(myPlaylist.playlist);

        div.innerHTML = div.innerHTML +'' +
            '<a class ="clickabe" onclick="' + "play_song(" + $i++ + ")" + '" src="' + $img + '">' +
            '<li class="list-group-item">' +
            '<span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">' +
            '<img  src="' + $img + '" alt="..." class="img-circle">' +
            '<i class="on b-light right sm"></i>' +
            '</span>' +
            '<div class="clear">' +
            '<div><a class ="clickabe" onclick="' + "play_song(" + $i++ + ")" + '">' + $title + '</a></div>' +
            '<small class="text-muted">' + $artist + '</small>' +
            '</div>' +
            '</li>' +
            '</a>'
        ;
    }
}

function play_song($id) {
    myPlaylist.play($id);
}


$(document).ready(function(){

    myPlaylist = new jPlayerPlaylist({
        jPlayer: "#jplayer_N",
        cssSelectorAncestor: "#jp_container_N"
    }, $playlist, {
        playlistOptions: {
            enableRemoveControls: true,
            autoPlay: true
        },
        swfPath: "js/jPlayer",
        supplied: "webmv, ogv, m4v, oga, mp3",
        smoothPlayBar: true,
        keyEnabled: true,
        audioFullScreen: false,
        play: function(e) {
            var span = document.getElementById('song-img');
            span.innerHTML = '';
            span.innerHTML = span.innerHTML + '' +
                '<img src="' + $img_player + '" class="dker" alt="...">';
        }
    });

    $(document).on($.jPlayer.event.pause, myPlaylist.cssSelector.jPlayer,  function(){
        $('.musicbar').removeClass('animate');
        $('.jp-play-me').removeClass('active');
        $('.jp-play-me').parent('li').removeClass('active');
    });

    $(document).on($.jPlayer.event.play, myPlaylist.cssSelector.jPlayer,  function(){
        $('.musicbar').addClass('animate');
    });

    $(document).on('click', '.jp-play-me', function(e){
        e && e.preventDefault();
        var $this = $(e.target);
        if (!$this.is('a')) $this = $this.closest('a');

        $('.jp-play-me').not($this).removeClass('active');
        $('.jp-play-me').parent('li').not($this.parent('li')).removeClass('active');

        $this.toggleClass('active');
        $this.parent('li').toggleClass('active');
        if( !$this.hasClass('active') ){
            myPlaylist.pause();
        }else{
            var i = Math.floor(Math.random() * (1 + 7 - 1));
            myPlaylist.play(i);
        }

    });

});