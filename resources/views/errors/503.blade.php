@extends('backend.layouts.layout')

@section('content')

<style>




	.container {
	
	
	 
	  color: #333;
	  margin: 0 auto;
	  text-align: center;
	}
	
	h1 {
	  font-weight: normal;
	  letter-spacing: .125rem;
	  text-transform: uppercase;
	}
	
	li {
	  display: inline-block;
	  font-size: 1.5em;
	  list-style-type: none;
	  padding: 1em;
	  text-transform: uppercase;
	}
	
	li span {
	  display: block;
	  font-size: 4.5rem;
	}
	
	.emoji {
	  display: none;
	  padding: 1rem;
	}
	
	.emoji span {
	  font-size: 4rem;
	  padding: 0 .5rem;
	}
	
	@media all and (max-width: 768px) {
	  h1 {
		font-size: calc(1.5rem * var(--smaller));
	  }
	  
	  li {
		font-size: calc(1.125rem * var(--smaller));
	  }
	  
	  li span {
		font-size: calc(3.375rem * var(--smaller));
	  }
	}
	</style>
	<script>
		(function () {
	  const second = 1000,
			minute = second * 60,
			hour = minute * 60,
			day = hour * 24;
	
	  //I'm adding this section so I don't have to keep updating this pen every year :-)
	  //remove this if you don't need it
	  
	  
	  const countDown = new Date("Jun 8, 2022 22:49:00").getTime(),
		  x = setInterval(function() {    
	
			const now = new Date().getTime(),
				  distance = countDown - now;
	
			document.getElementById("days").innerText = Math.floor(distance / (day)),
			  document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
			  document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
			  document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
	
			//do something later when date is reached
			
			if (distance < 0) {
				
           $.get('{{ route('update.maintenance_mode') }}', function(data){
            clearInterval(x);
          location.reload()
           });
			
			 
			
			}
			//seconds
		  }, 0)
	  }());
	</script>
<section class="align-items-center d-flex" style="height: 100vh; ">
	
	<div class="container-fluid">
		<h1 id="headline">Countdown to the Official Mirror Me Fashion Launch</h1>
		<div id="countdown">
		  <ul>
			<li><span id="days"></span>days</li>
			<li><span id="hours"></span>Hours</li>
			<li><span id="minutes"></span>Minutes</li>
			<li><span id="seconds"></span>Seconds</li>
		  </ul>
		</div>
		
	  </div>

</section>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>