// # Page Transition Animation #
  // variables
  var transitionElements = document.querySelectorAll('.transition-wrapper')

  // helpers
  function delaying(n) {
    n = n || 2000;
    return new Promise(done => {
      setTimeout(() => {
        done()
      }, n);
    });
  }

  // anime transition

  function pageTransition () {
    var tl = anime.timeline({
      easing: 'linear',
    })
    tl.add({
      targets: '.transition-wrapper h1',
      opacity: [0, 1],
      easing: 'cubicBezier(1,.01,1,.06)'
    })
    tl.add({
      targets: transitionElements,
      scaleX: 1,
      duration: 400,
      delay: anime.stagger(200) 
    }, 0)
    tl.add({
      targets: transitionElements,
      scaleX: 0,
      duration: 400,
      delay: anime.stagger(200, {start: 1000, from: 'last'})
    })
    tl.add({
      targets: '.transition-wrapper h1',
      opacity: [1, 0],
      easing: 'cubicBezier(0,1.03,0,1.61)'
    }, '-=450')
  }

  // to-do implement content animation ##############

  function contentAnimation(params) {
    var tl = anime.timeline({
      easing: 'linear',
    })

    tl.add({
      targets: ['.initial-loader'],
      opacity: [1, 0],
      scaleY: [1, 0],
      easing: 'easeInOutExpo',
      delay: 1500
    })

    tl.add({
      targets: ".navigation-container",
      translateY: [-60, 0],
      duration: 400
    })

    tl.add({
      targets: ".img-fluid",
      clipPath: ['polygon(0 0, 100% 0, 100% 0, 0 0)', 'polygon(0 0, 100% 0, 100% 100%, 0 100%)'],
      duration: 200
    }, '-=300')
  }

  // Barba Init

  barba.init({
    sync: true,
    prevent: ({el}) => {
      return el.classList && el.classList.contains('prevent')
    },
    transitions: [{
      name: 'page-transition',
      async leave(data) {
        var done = this.async();
        pageTransition();
        await delaying(1600)
        done();
      },
      async enter(data) {
        contentAnimation();
        console.log(typeof data.trigger)
        if(typeof data.trigger === 'object') {
          navigationToggle();
          let url = window.location.href

          if (url.search('de') === -1) {
            url.replace('en', 'de')
          }

          if (url.search('en') === -1) {
            url.replace('de', 'en')
          }
          document.querySelector('.prevent').setAttribute('href', url)
        }
      },
      async once(data) {
        contentAnimation();
      }
    }],
    views: [{
        namespace: 'work',
        afterEnter(data) {
          // loadTracks
          const trackCards = document.querySelectorAll('.track-card')
          trackCards.forEach((cardEl) => {
            cardEl.addEventListener('click', () => {
              const trackId = cardEl.dataset.trackid
              if (uiPlayer.playingTrack.id.toString() === trackId) {
                uiPlayer.togglePlayPause()
              } else {
                uiPlayer.loadTrackfromSC(trackId, true)
              }
            })
          })
        }
      }
    ]
  })


// # End Page Transition Animation #


// # Navigation Animation #
  // viewport responsive
let vh = window.innerHeight;
let vw = window.innerWidth;
if (vw >= 768) {
  vw = 538;
  vh = 560;
}
  // icon
const bars = document.querySelectorAll(".bar");

  // timeline start #
var navAnimation = anime.timeline({
  easing: 'easeOutElastic(1, .8)',
  duration: 1000,
  autoplay: false
});

    // container
navAnimation.add({
  targets: ".navigation-container",
  keyframes: [{ width: vw }, { height: vh }],
  easing: "easeOutElastic(1, .8)",
})

    // icon bars
navAnimation.add({
  targets: bars[0],
  keyframes: [{ translateY: [-10, 0] }, { rotateZ: 45 }],
  easing: "easeOutElastic(1, .8)",
}, 0)
navAnimation.add({
  targets: bars[1],
  keyframes: [{ translateY: 0 }, { rotateZ: 45 }],
  easing: "easeOutElastic(1, .8)",
}, 0)
navAnimation.add({
  targets: bars[2],
  keyframes: [{ translateY: [10, 0] }, { rotateZ: -45 }],
  easing: "easeOutElastic(1, .8)",
}, 0)

  // animation trigger

function navigationToggle() {
  navAnimation.play();
  navAnimation.finished.then(() => {
    console.log('reverse')
    navAnimation.reverse();
  });
}
var button = document.getElementsByClassName("navbar-icon")[0];
button.onclick = navigationToggle;

// # End Navigation Animation #

// Initial Animation

anime({
  targets: ['.sound-effect'],
  opacity: [0, 1],
  translateX: [-5, 1],
  loop: true,
  direction: 'alternate',
  easing: 'easeInOutExpo',
  duration: 500,
  delay: anime.stagger(100) 
});