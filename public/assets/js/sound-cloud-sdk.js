const clientId = "95f22ed54a5c297b1c41f72d713623ef";

SC.initialize({
    client_id: clientId
});

class UiPlayer {
    // Html Elements
    playerState = document.querySelector('.audio-player span');
    songTitle = document.querySelector('.audio-player .song-title');
    songFeaturing = document.querySelector('.audio-player .audio-feat');
    playbtn = document.querySelector('.audio-controls .play');
    nextBtn = document.querySelector('.audio-controls .next');
    prevbtn = document.querySelector('.audio-controls .prev');
    loader = document.querySelector('.player-loader');

    // dfsf
    scPlayer;
    playingTrack;
    playlist = [];

    // Track from SC.RESOLVE 
    // Player from SC.STREAM
    constructor () {
        this.playbtn.onclick = () => {
            this.togglePlayPause()
        }
        this.nextBtn.onclick = () => {
            this.nextTrack()
        }
        this.prevbtn.onclick = () => {
            this.previousTrack()
        }
    }

    togglePlayPause() {
        if (this.scPlayer.getState() === 'playing') {
            this.scPlayer.pause()
        } else {
            this.scPlayer.play().then((pb) => {
                console.log(pb)
            }).catch((err) => {
                console.log(err)
            })
        }
    }

    updateUi(state, playingTrack) {
        const playIconUrl = '/assets/icons/play-icon-circle.svg';
        const pauseIconUrl = '/assets/icons/pause-icon-circle.svg';
        this.songTitle.innerHTML = playingTrack.title
        this.songFeaturing.innerHTML = playingTrack.genre
        if (state === 'playing') {
            const icon = this.playbtn.children[0];
            icon.setAttribute('src', pauseIconUrl)
            this.playerState.innerHTML = 'Now playing..'
        } else if (state === 'paused'){
            this.playerState.innerHTML = state === 'paused' ? 'Paused' : ''
            const icon = this.playbtn.children[0];
            icon.setAttribute('src', playIconUrl)
        }
    }

    playTrack (track) {
        SC.stream('/tracks/' + track.id).then((player) => {
            this.loader.classList.add('loading')
            this.playingTrack = track
            this.scPlayer = player
            this.scPlayer.on('state-change', (state) => {
                console.log(state)
                this.updateUi(state, this.playingTrack)
            })
            this.scPlayer.play().then((pb) => {
                console.log(pb)
                this.loader.classList.remove('loading')
            })
            // this.updateUi(this.scPlayer.getState(), track)
        }).catch((error) => {
            console.log(error)
        });
    }

    nextTrack() {
        const tracksCount = this.playlist.length
        const currentIdx = this.playlist.findIndex((track) => track.id === this.playingTrack.id)
        console.log(currentIdx)
        if (currentIdx + 1 === tracksCount) {
            this.playTrack(this.playlist[0])
        } else {
            this.playTrack(this.playlist[currentIdx + 1])
        }
    }

    previousTrack() {
        const tracksCount = this.playlist.length
        const currentIdx = this.playlist.findIndex((track) => track.id === this.playingTrack.id)
        if (currentIdx === 0) {
            this.playTrack(this.playlist[tracksCount - 1])
        } else {
            this.playTrack(this.playlist[currentIdx - 1])
        }
    }

    load(track, playOnLoad) {
        this.playlist.push(track);
        if (playOnLoad) {
            this.playTrack(track);
        }
    }

    loadTrackfromSC(trackId, play) {
        SC.get('/tracks/' + trackId).then((track) => {
            if (!this.playlist.find(t => t.id === track.id)) {
                this.playlist.push(track)
                console.log('not in')
            }
            if (play) {
                this.playTrack(track)
            }
        })
    }
}

let uiPlayer = new UiPlayer();



function getTracks() {
    // 550345083 763848805
    const SCUid = '550345083' 
    SC.get('/users/' + SCUid + '/tracks')
    .then((tracks) => {
        tracks.forEach((track, index) => {
            uiPlayer.load(track, index === 0 ? true : false)
        })
    }).catch((err) => console.log(err))
}

getTracks()









