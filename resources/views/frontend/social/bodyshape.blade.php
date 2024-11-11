@extends('frontend.layouts.app')
@section('content')
<style>
    /* Base styles for desktop */
.container {
    display: flex;
    flex-direction: row;
    gap: 20px;
    padding: 20px;
}

.middle_side {
    flex: 1;
    padding: 10px;
}

.body_shape_section {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 10px;
}

.body_modeler_canvases {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 20px;
}

.body_modeler_canvases canvas {
    width: 100%;
    max-width: 500px;
    height: auto; /* Maintain aspect ratio */
}

.body_shape_section h2, .body_shape_section h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.body_shape_section p, .body_shape_section li {
    font-size: 1rem;
    margin: 5px 0;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 15px;
    font-size: 1rem;
    color: #fff;
    background-color: #007bff;
    border-radius: 5px;
    text-decoration: none;
}

/* Responsive styles for mobile */
@media (max-width: 768px) {
    /* Adjust layout for smaller screens */
    .container {
        flex-direction: column;
        padding: 10px;
    }

    .middle_side {
        padding: 5px;
    }

    .body_modeler_canvases {
        gap: 5px;
    }

    .body_shape_section h2, .body_shape_section h3 {
        font-size: 1.2rem;
    }

    .body_shape_section p, .body_shape_section li {
        font-size: 0.9rem;
    }

    .btn {
        font-size: 0.9rem;
        padding: 8px 15px;
    }

    .body_modeler_canvases canvas {
        max-width: 100%; /* Use full width of mobile screen */
    }
}

</style>
@include('frontend/social/partials/menu')
<main class="container col_2">
    @include('frontend/social/partials/left_sidebar')
 
     <!-- ================== Middle Section Start============= -->
     <div class="middle_side">
         <div class="body_shape_section">
            <div class="modeler_container">
                <div class="body_modeler modeler-heading">
                    <h1>ShapeMe® Body Modeler</h1>
                    <h5>by Mirror Me Fashion</h5>
                    <div class="body_modeler_canvases">
                        <canvas id="renderCanvas" style="height: 100vh; max-width: 100%;"></canvas>
                    </div>


                </div>
            </div>
             <div>
                 <h2>Your Body Shape</h2>
                 <p><strong>Shape Classification:</strong> Spoon Shape</p>
                 <p>Height: {{ $bodyData->height }} in</p>
                 <p>Weight: {{ $bodyData->weight }} lbs</p>
                 <p>BMI: {{ $bodyData->bmi }}</p>
                 <p>Gender: {{ ucfirst($bodyData->gender) }}</p>
                 <p>Shape Description: Oval Head</p>
                 <p>Measurement: 20 cm</p>
                 <p>Hat size: US Medium 7</p>
                 <a href="{{route('edit-body-shape')}}" class="btn">Update Body Shape</a>
                 
                 <h3>Shape Keyes Data:</h3>
                 <ul>
                     @foreach ($shape_keyes as $key => $value)
                         <li><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</li>
                     @endforeach
                 </ul>
             </div>
         </div>
     </div>
     <!-- ================== Right Section Side Start============= -->
     <!-- ================== Right Section Side End============= -->
 </main>
 


@endsection
@push('scripts')
<script>
  let gender = "{{$bodyData->gender}}";
  let shape ="{{$bodyData->shape}}";
  
  loadGLBFile("{{ static_asset('assets/modeler') }}"+`/${gender}_${shape}.glb` )
</script>
@endpush

