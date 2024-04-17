
 <style>
   

   
    .hidden {
        display: none;
    }

  .content-confetti {
    bottom: 50%;
    right: 50%;
    top: 40%;
    transform: translate(50%);
    position: fixed;
    border-radius: 10px;
    background: #900000;
    padding: 20px 30px;
    height: 300px;
    border: 1px solid #900000;
    z-index: 99;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 0.9;
}

   
    .btn {
 box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
 background-color: #fff; 
 border: none;
 text-transform: uppercase;
   
 padding: 15px 32px;
 text-align: center;
 text-decoration: none;
 display: inline-block;
 font-size: 16px;
 margin: 4px 2px;
 cursor: pointer;
 -webkit-transition-duration: 0.4s; /* Safari */
 transition-duration: 0.4s;

}
.confetti-btn {
    font-size: 20px;
    padding: 20px;
    margin: 7px;
    display: inline-block;
}
@media only screen and (max-width: 768px) {
    .content-confetti {
        height: 200px;
    }
    .confetti-header{
    font-size: 16px
}

    .confetti-btn {
    font-size: 10px;
    padding: 10px;
    margin: 7px;
    display: inline-block;
}
}

</style>

<div  id="confettiSection">
 <span id="confetti-btn"></span>

<div class="content-confetti">
    
        
        
  
    <div style="text-align: center">
     <h1 id="gh-project" class="confetti-header" style="color: #fff">Welcome to Mirror Me Fashion!</h1>
        <a href="{{route('home')}}" id="ProceedBtn" class="confetti-btn"  style="background: #fff; color: #900000;" class="btn">Proceed to the Site </a>
        <a href="{{url('companynews')}}" class="confetti-btn" style="background: #fff; color: #900000;" class="btn"> CEO's Message </a>
      
    </div>
</div> 

<script src="{{static_asset('assets/js/tsparticles.min.js')}}"></script>

</div>

<script>
    // Confetti
    const btnConfetti = document.getElementById("confetti-btn");

    let status = true;
    let particlesContainer;
    let particlesOptions;

   
    function toggleStatus(newStatus) {
        status = newStatus;

        if (status) {
            tsParticles.load(particlesOptions).then((container) => {
                particlesContainer = container;

                document.querySelector(".fa-play").classList.add("hidden");
                document.querySelector(".fa-pause").classList.remove("hidden");
            });
        } else {
            if (particlesContainer) {
                particlesContainer.destroy();
                particlesContainer = undefined;

                document.querySelector(".fa-play").classList.remove("hidden");
                document.querySelector(".fa-pause").classList.add("hidden");
            }
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        particlesOptions = {
            fpsLimit: 60,
            particles: {
                number: {
                    value: 0
                },
                color: {
                    value: "#f00"
                },
                shape: {
                    type: ["circle", "square", "polygon"],
                    options: {
                        polygon: {
                            sides: 6
                        }
                    }
                },
                opacity: {
                    value: {
                        min: 0,
                        max: 1
                    },
                    animation: {
                        enable: true,
                        speed: 1,
                        startValue: "max",
                        destroy: "min"
                    }
                },
                size: {
                    value: {
                        min: 3,
                        max: 7
                    }
                },
                life: {
                    duration: {
                        sync: true,
                        value: 7
                    },
                    count: 1
                },
                move: {
                    enable: true,
                    gravity: {
                        enable: true
                    },
                    drift: {
                        min: -2,
                        max: 2
                    },
                    speed: {
                        min: 10,
                        max: 30
                    },
                    decay: 0.1,
                    direction: "none",
                    random: false,
                    straight: false,
                    outModes: {
                        default: "destroy",
                        top: "none"
                    }
                },
                rotate: {
                    value: {
                        min: 0,
                        max: 360
                    },
                    direction: "random",
                    move: true,
                    animation: {
                        enable: true,
                        speed: 60
                    }
                },
                tilt: {
                    direction: "random",
                    enable: true,
                    move: true,
                    value: {
                        min: 0,
                        max: 360
                    },
                    animation: {
                        enable: true,
                        speed: 60
                    }
                },
                roll: {
                    darken: {
                        enable: true,
                        value: 25
                    },
                    enable: true,
                    speed: {
                        min: 15,
                        max: 25
                    }
                },
                wobble: {
                    distance: 30,
                    enable: true,
                    move: true,
                    speed: {
                        min: -15,
                        max: 15
                    }
                }
            },
            detectRetina: true,
            emitters: {
                direction: "none",
                spawnColor: {
                    value: "#ff0000",
                    animation: {
                        h: {
                            enable: true,
                            offset: {
                                min: -1.4,
                                max: 1.4
                            },
                            speed: 0.1,
                            sync: false
                        },
                        l: {
                            enable: true,
                            offset: {
                                min: 20,
                                max: 80
                            },
                            speed: 0,
                            sync: false
                        }
                    }
                },
                life: {
                    count: 0,
                    duration: 0.1,
                    delay: 0.6
                },
                rate: {
                    delay: 0.1,
                    quantity: 100
                },
                size: {
                    width: 0,
                    height: 0
                }
            }
        };

        toggleStatus(status);
    });

    //To Remove Confetti
    

function randimizeTime() {
   return String(Date.now());
}

function randomizeNumbers() {
   var text = String(Math.random());
   for (var i = text.length; i < 19; ++i) {
       text += '0';
   }
   return text.substring(2, 19);
}

var Generator = new function() {
   var counter = 0;
   var incrementCounter = function() {
       return String(++counter);
   };
   this.generateId = function() {
       var value = String(Math.random());
       return incrementCounter() + '-' + randimizeTime() + '-' + randomizeNumbers();
   };
};
// Set Cookie
function setCookie(cname,cvalue,exdays) {
 const d = new Date();
 d.setTime(d.getTime() + (exdays*24*60*60*1000));
 let expires = "expires=" + d.toUTCString();
 document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
 let name = cname + "=";
 let decodedCookie = decodeURIComponent(document.cookie);
 let ca = decodedCookie.split(';');
 for(let i = 0; i < ca.length; i++) {
   let c = ca[i];
   while (c.charAt(0) == ' ') {
     c = c.substring(1);
   }
   if (c.indexOf(name) == 0) {
     return c.substring(name.length, c.length);
   }
 }
 return "";
}

function checkCookie() {
 let confetti = getCookie("confetti");
 if (confetti != "") {
   document.querySelector('#confettiSection').style.display="none";
  
 } else {
   confetti = Generator.generateId();
    if (confetti != "" && confetti != null) {
      setCookie("confetti", confetti, 30);
    }
 }
}
let confetti = getCookie("confetti");
 if (confetti != "") {


   status = false;
  function removeAllChildNodes(parent) {
   while (parent.firstChild) {
       parent.removeChild(parent.firstChild);
   }
}
const container =  document.querySelector('#confettiSection');
removeAllChildNodes(container);
 }
 
var ProceedBtn = document.querySelector('#ProceedBtn');
if(ProceedBtn !=null){
 ProceedBtn.addEventListener("click", checkCookie);
}


</script> 