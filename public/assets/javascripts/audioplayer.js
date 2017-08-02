/*
 By Osvaldas Valutis, www.osvaldas.info
 Available for use under the MIT License
 */



;(function( $, window, document, undefined )
{
    var isTouch		  = 'ontouchstart' in window,
        eStart		  = isTouch ? 'touchstart'	: 'mousedown',
        eMove		  = isTouch ? 'touchmove'	: 'mousemove',
        eEnd		  = isTouch ? 'touchend'	: 'mouseup',
        eCancel		  = isTouch ? 'touchcancel'	: 'mouseup',
        secondsToTime = function( secs )
        {
            var hoursDiv = secs / 3600, hours = Math.floor( hoursDiv ), minutesDiv = secs % 3600 / 60, minutes = Math.floor( minutesDiv ), seconds = Math.ceil( secs % 3600 % 60 );
            if( seconds > 59 ) { seconds = 0; minutes = Math.ceil( minutesDiv ); }
            if( minutes > 59 ) { minutes = 0; hours = Math.ceil( hoursDiv ); }
            return ( hours == 0 ? '' : hours > 0 && hours.toString().length < 2 ? '0'+hours+':' : hours+':' ) + ( minutes.toString().length < 2 ? '0'+minutes : minutes ) + ':' + ( seconds.toString().length < 2 ? '0'+seconds : seconds );
        },
        canPlayType	  = function( file )
        {
            var audioElement = document.createElement( 'audio' );
            return !!( audioElement.canPlayType && audioElement.canPlayType( 'audio/' + file.split( '.' ).pop().toLowerCase() + ';' ).replace( /no/, '' ) );
        };

    $.fn.audioPlayer = function( params )
    {
        var params		= $.extend( { classPrefix: 'audioplayer', strPlay: 'Play', strPause: 'Pause', strVolume: 'Volume', playlist: false }, params ),
            cssClass	= {},
            cssClassSub =
                {
                    playPause:	 	'playpause',
                    playing:		'playing',
                    stopped:		'stopped',
                    time:		 	'time',
                    timeCurrent:	'time-current',
                    timeDuration: 	'time-duration',
                    bar: 			'bar',
                    barLoaded:		'bar-loaded',
                    barPlayed:		'bar-played',
                    volume:		 	'volume',
                    volumeButton: 	'volume-button',
                    volumeAdjust: 	'volume-adjust',
                    noVolume: 		'novolume',
                    muted: 			'muted',
                    mini: 			'mini'
                };

        for( var subName in cssClassSub )
            cssClass[ subName ] = params.classPrefix + '-' + cssClassSub[ subName ];

        this.each( function()
        {
            if(params.playlist == true){
                var $this = $(this);
                var $playlistHolder = $($this.data('playlist'));
                var $elements = $playlistHolder.children();
                var tracks = new Array();

                $elements.each(function(index, data){
                    var data = $(data);
                    tracks.push({id: data.data('index'), file: data.data('file')});
                });

                $this.html('<audio src="' + tracks[0].file +  '"></audio>');
                // $playlistHolder.find('[data-index="0"]').addClass('active');
                isSupport = true;

            }else{
                if( $( this ).prop( 'tagName' ).toLowerCase() != 'audio' )
                    return false;

                var $this	   = $( this ),
                    audioFile  = $this.attr( 'src' ),
                    isAutoPlay = $this.get( 0 ).getAttribute( 'autoplay' ), isAutoPlay = isAutoPlay === '' || isAutoPlay === 'autoplay' ? true : false,
                    isLoop	   = $this.get( 0 ).getAttribute( 'loop' ),		isLoop	   = isLoop		=== '' || isLoop	 === 'loop'		? true : false,
                    isSupport  = false;

                if( typeof audioFile === 'undefined' ){
                    $this.find( 'source' ).each( function()
                    {
                        audioFile = $( this ).attr( 'src' );
                        if( typeof audioFile !== 'undefined' && canPlayType( audioFile ) )
                        {
                            isSupport = true;
                            return false;
                        }
                    });
                }else if( canPlayType( audioFile ) ){
                    isSupport = true;
                }else{
                    //This will work for now, but its needs attention;
                    isSupport = true;
                }
            }

            var thePlayer = $( '<div class="' + params.classPrefix + '">' + ( isSupport ? $( '<div>' ).append( $this.eq( 0 ).clone() ).html() : '<embed src="' + audioFile + '" width="0" height="0" volume="100" autostart="' + isAutoPlay.toString() +'" loop="' + isLoop.toString() + '" />' ) + '<div class="' + cssClass.playPause + '"><a href="#">' + params.strPlay + '</a></div></div>' ),
                theAudio  = isSupport ? thePlayer.find( 'audio' ) : thePlayer.find( 'embed' ), originalAudioElement = theAudio, theAudio = theAudio.get( 0 );

            if( isSupport )
            {
                thePlayer.find( 'audio' ).css( { 'width': 0, 'height': 0, 'visibility': 'hidden' } );
                thePlayer.append( '<div class="' + cssClass.time + ' ' + cssClass.timeCurrent + '"></div><div class="' + cssClass.bar + '"><div class="' + cssClass.barLoaded + '"></div><div class="' + cssClass.barPlayed + '"></div></div><div class="' + cssClass.time + ' ' + cssClass.timeDuration + '"></div><div class="' + cssClass.volume + '"><div class="' + cssClass.volumeButton + '"><a href="#">' + params.strVolume + '</a></div><div class="' + cssClass.volumeAdjust + '"><div><div></div></div></div></div>' );

                var theBar			  = thePlayer.find( '.' + cssClass.bar ),
                    barPlayed	 	  = thePlayer.find( '.' + cssClass.barPlayed ),
                    barLoaded	 	  = thePlayer.find( '.' + cssClass.barLoaded ),
                    timeCurrent		  = thePlayer.find( '.' + cssClass.timeCurrent ),
                    timeDuration	  = thePlayer.find( '.' + cssClass.timeDuration ),
                    volumeButton	  = thePlayer.find( '.' + cssClass.volumeButton ),
                    volumeAdjuster	  = thePlayer.find( '.' + cssClass.volumeAdjust + ' > div' ),
                    volumeDefault	  = 0,
                    adjustCurrentTime = function( e )
                    {
                        theRealEvent		 = isTouch ? e.originalEvent.touches[ 0 ] : e;
                        theAudio.currentTime = Math.round( ( theAudio.duration * ( theRealEvent.pageX - theBar.offset().left ) ) / theBar.width() );
                    },
                    adjustVolume = function( e )
                    {
                        theRealEvent	= isTouch ? e.originalEvent.touches[ 0 ] : e;
                        theAudio.volume = Math.abs( ( theRealEvent.pageY - ( volumeAdjuster.offset().top + volumeAdjuster.height() ) ) / volumeAdjuster.height() );
                    },
                    updateLoadBar = function()
                    {
                        var interval = setInterval( function()
                        {
                            if( theAudio.buffered.length < 1 ) return true;
                            barLoaded.width( ( theAudio.buffered.end( 0 ) / theAudio.duration ) * 100 + '%' );
                            if( Math.floor( theAudio.buffered.end( 0 ) ) >= Math.floor( theAudio.duration ) ) clearInterval( interval );
                        }, 100 );
                    },
                    getFileFromTracklistByIndex = function(index)
                    {
                        return tracks[index].file;
                    },
                    changeTrack = function(trackIndex)
                    {
                        thePlayer.find( 'div.audioplayer-playpause > a' ).html( params.strPlay );
                        thePlayer.removeClass( cssClass.playing ).addClass( cssClass.stopped );
                        isSupport ? theAudio.pause() : theAudio.Stop();
                        theAudio.currentTime = 0;
                        $playlistHolder.find('.active').removeClass('active').find('li.play > span').text('play');
                        originalAudioElement.attr('src', getFileFromTracklistByIndex(trackIndex));
                        thePlayer.find( 'div.audioplayer-playpause > a' ).html( params.strPause );
                        thePlayer.addClass( cssClass.playing ).removeClass( cssClass.stopped );
                        isSupport ? theAudio.play() : theAudio.Play();
                        $playlistHolder.find('[data-index="' + trackIndex + '"]').addClass('active').find('li.play > span').text('stop');
                        thePlayer.data('index', trackIndex);
                    },
                    playNextTrack = function()
                    {
                        var currentTrack = $playlistHolder.find('.active').data('index');
                        var nextTrack = currentTrack + 1;

                        if(tracks[nextTrack] != undefined){
                            changeTrack(nextTrack);
                        }
                    },
                    trackClick = function($triggerTrack)
                    {
                        if($triggerTrack.hasClass('active')){
                            theAudio.currentTime = 0;
                        }else{
                            changeTrack($triggerTrack.data('index'));
                        }
                    };

                var volumeTestDefault = theAudio.volume, volumeTestValue = theAudio.volume = 0.111;
                if( Math.round( theAudio.volume * 1000 ) / 1000 == volumeTestValue ) theAudio.volume = volumeTestDefault;
                else thePlayer.addClass( cssClass.noVolume );

                timeDuration.html( '00:00' );
                timeCurrent.html( secondsToTime( 0 ) );

                theAudio.addEventListener( 'loadeddata', function()
                {
                    updateLoadBar();
                    timeDuration.html( $.isNumeric( theAudio.duration ) ? secondsToTime( theAudio.duration ) : '00:00' );
                    volumeAdjuster.find( 'div' ).height( theAudio.volume * 100 + '%' );
                    volumeDefault = theAudio.volume;
                });

                theAudio.addEventListener( 'timeupdate', function()
                {
                    timeCurrent.html( secondsToTime( theAudio.currentTime ) );
                    barPlayed.width( ( theAudio.currentTime / theAudio.duration ) * 100 + '%' );
                });

                theAudio.addEventListener( 'volumechange', function()
                {
                    volumeAdjuster.find( 'div' ).height( theAudio.volume * 100 + '%' );
                    if( theAudio.volume > 0 && thePlayer.hasClass( cssClass.muted ) ) thePlayer.removeClass( cssClass.muted );
                    if( theAudio.volume <= 0 && !thePlayer.hasClass( cssClass.muted ) ) thePlayer.addClass( cssClass.muted );
                });

                theAudio.addEventListener( 'ended', function()
                {
                    thePlayer.removeClass( cssClass.playing ).addClass( cssClass.stopped );
                    thePlayer.find('.audioplayer-playpause span.fa').removeClass('fa-pause').addClass('fa-repeat');
                    if(params.playlist == true){
                        playNextTrack();
                    }
                });

                theBar.on( eStart, function( e )
                {
                    adjustCurrentTime( e );
                    theBar.on( eMove, function( e ) { adjustCurrentTime( e ); } );
                })
                    .on( eCancel, function()
                    {
                        theBar.unbind( eMove );
                    });

                $('li.track a.name').on('click', function(event){
                    event.preventDefault();
                    var $trackHolder = $(this).parent();
                    trackClick($trackHolder);
                });

                $('li.track li.play').on('click', function(event){
                    event.preventDefault();
                    var $trackHolder = $(this).closest('li.track');
                    var trackIndex = $trackHolder.data('index');

                    var playerTrackIndex = thePlayer.data('index') ? thePlayer.data('index') : 0;

                    if(playerTrackIndex == trackIndex){
                        if($trackHolder.hasClass('active')){
                            thePlayer.find( 'div.audioplayer-playpause > a' ).html( params.strPlay );
                            thePlayer.removeClass( cssClass.playing ).addClass( cssClass.stopped );
                            isSupport ? theAudio.pause() : theAudio.Stop();
                            $playlistHolder.find('.active').removeClass('active').find('li.play > span').text('play');
                        }else{
                            thePlayer.find( 'div.audioplayer-playpause > a' ).html( params.strPause );
                            thePlayer.addClass( cssClass.playing ).removeClass( cssClass.stopped );
                            isSupport ? theAudio.play() : theAudio.Play();
                            $playlistHolder.find('[data-index="' + trackIndex + '"]').addClass('active').find('li.play > span').text('stop');
                        }
                    }else{
                        trackClick($trackHolder);
                    }



                    // trackClick($trackHolder);
                });

                volumeButton.on( 'click', function()
                {
                    if( thePlayer.hasClass( cssClass.muted ) )
                    {
                        thePlayer.removeClass( cssClass.muted );
                        theAudio.volume = volumeDefault;
                    }
                    else
                    {
                        thePlayer.addClass( cssClass.muted );
                        volumeDefault = theAudio.volume;
                        theAudio.volume = 0;
                    }
                    return false;
                });

                volumeAdjuster.on( eStart, function( e )
                {
                    adjustVolume( e );
                    volumeAdjuster.on( eMove, function( e ) { adjustVolume( e ); } );
                })
                    .on( eCancel, function()
                    {
                        volumeAdjuster.unbind( eMove );
                    });
            }
            else thePlayer.addClass( cssClass.mini );

            thePlayer.addClass( isAutoPlay ? cssClass.playing : cssClass.stopped );

            thePlayer.find( '.' + cssClass.playPause ).on( 'click', function()
            {
                if( thePlayer.hasClass( cssClass.playing ) )
                {
                    $( this ).find( 'a' ).html( params.strPlay );
                    thePlayer.removeClass( cssClass.playing ).addClass( cssClass.stopped );
                    isSupport ? theAudio.pause() : theAudio.Stop();

                    if(params.playlist == true){
                        $playlistHolder.find('.active').removeClass('active').find('li.play > span').text('play');
                    }

                }
                else
                {
                    $( this ).find( 'a' ).html( params.strPause );
                    thePlayer.addClass( cssClass.playing ).removeClass( cssClass.stopped );
                    isSupport ? theAudio.play() : theAudio.Play();

                    if(params.playlist == true){
                        var trackIndex = thePlayer.data('index') ? thePlayer.data('index') : 0;
                        $playlistHolder.find('[data-index="' + trackIndex + '"]').addClass('active').find('li.play > span').text('stop');
                    }

                }
                return false;
            });

            $this.replaceWith( thePlayer );
        });
        return this;
    };
})( jQuery, window, document );