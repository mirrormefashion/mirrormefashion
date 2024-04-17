<style>
    .timer-section {
        color: #33254c;
        text-align: center;
        background: #ffeb3b;
        padding: 100px 0;
    }
    .timer-section h1 {
        letter-spacing: .125rem;
        text-transform: uppercase;
        max-width: 900px;
        margin: auto;
    }

    .timer-section ul li {
        display: inline-block;
        font-size: 1.5em;
        list-style-type: none;
        padding: 1em;
        text-transform: uppercase;
    }

    .timer-section ul li span {
        display: block;
        font-size: 4.5rem;
    }

    .modeler-container {
        display: block;
    }

    @media all and (max-width: 768px) {
        .timer-section ul h1 {
            font-size: calc(1.5rem * var(--smaller));
        }

        .timer-section ul li {
            font-size: calc(1.125rem * var(--smaller));
        }

        .timer-section ul li span {
            font-size: calc(3.375rem * var(--smaller));
        }
    }
</style>
<div class="timer-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Countdown to the Official Mirror Me Fashion Launch</h1>
                <div id="countdown">
                    <ul>
                        <li><span id="days"></span>days</li>
                        <li><span id="hours"></span>Hours</li>
                        <li><span id="minutes"></span>Minutes</li>
                        <li><span id="seconds"></span>Seconds</li>
                    </ul>
                </div>
                <div id="content" class="emoji">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //  Get EST date object
    function changeTimeZone(date, timeZone) {

        return new Date(
            date.toLocaleString('en-US', {
                timeZone,
            }),
        );
    }
    (function() {
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

       


        const countDown = new Date("Aug 23, 2022 8:00:00").getTime(),
            x = setInterval(function() {

                const now = changeTimeZone(new Date(), 'America/New_York'),
                    distance = countDown - now;

                document.getElementById("days").innerText = Math.floor(distance / (day)),
                    document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                //do something later when date is reached
                if (distance < 0) {
                    document.getElementById("days").innerText = 0,
                        document.getElementById("hours").innerText = 0,
                        document.getElementById("minutes").innerText = 0,
                        document.getElementById("seconds").innerText = 0;
                       
                    clearInterval(x);
                }
                //seconds
            }, 0)
    }());
</script>
