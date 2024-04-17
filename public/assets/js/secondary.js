(function($) {
    $(document).ready(function() {
        $(".menu-activated").meanmenu({
            meanMenuContainer: '.mobile-menu',
            meanScreenWidth: "767"
        });
        $('#chat-btn').click(function() {
            let sex = $('#sex').val();
            $('#mshape').addClass(sex);
        });
    });
})(jQuery);

/*gsap.registerPlugin(ScrollTrigger);

let sections = gsap.utils.toArray('.st--horizontal  > div');
let scrollTween = gsap.to(sections, {
  xPercent: -100 * (sections.length - 1),
  ease: "none",
  scrollTrigger: {
    trigger: ".first",
    start: "left left",
    pin: true,
    scrub: 1,
    snap: 1 / (sections.length - 1),
    // base vertical scrolling on how wide the container is so it feels more natural
    endTrigger: '.last',
    end: () => "+=" + document.querySelector(".viewport").offsetWidth
  }
});




//of old 
gsap.to(".st--piston-even, .st--piston-odd", {
    // odd goes -100%, even goes 100%
    
    ease: "none",
    yoyo: true,
    repeat: 3,
    scrollTrigger: {
      trigger: ".st--section-c",
      containerAnimation: scrollTween,

      scrub: true
      // markers: true,
      // id: 'piston--odd',
    }
  });
//const sections = gsap.utils.toArray('section')

ScrollTrigger.create({
  
  trigger: '.first',
  start: 'top top',
  endTrigger: '.last',
  end: 'bottom bottom',
  
  //snap: 1 / (sections.length - 1)

  snap: {
    snapTo: 1 / (sections.length - 1),
    duration: {min: 0.25, max: 0.75}, // the snap animation should be at least 0.25 seconds, but no more than 0.75 seconds (determined by velocity)
    delay: 0.125, // wait 0.125 seconds from the last scroll event before doing the snapping
    ease: "power1.inOut" // the ease of the snap animation ("power3" by default)
  }
  
})
console.log('firing');*/