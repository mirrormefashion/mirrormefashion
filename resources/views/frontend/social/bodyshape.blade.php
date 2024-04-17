@extends('frontend.layouts.app')
@section('content')

@include('frontend/social/partials/menu')
<main class="container col_2">
   @include('frontend/social/partials/left_sidebar')
    <!-- ================== Middle Section Start============= -->
   
    <div class="middle_side">
        <div class="body_shape_section">

            <div class="body_modeler_canvases">
                <!-- Repeated canvas structure, use a loop or function to generate -->
                <canvas id="canvas_head" class="canvas_head" width="500" height="107"></canvas>
                <canvas id="canvas_neck" class="canvas_neck" width="500" height="99"></canvas>
                <canvas id="canvas_breast" class="canvas_breast" width="500" height="230"></canvas>
                <canvas id="canvas_shoulders" class="canvas_shoulders" width="500" height="243"></canvas>
                <canvas id="canvas_stomach" class="canvas_stomach" width="500" height="262"></canvas>
                <canvas id="canvas_legs" class="canvas_legs" width="500" height="411"></canvas>
            </div>
            <div>
                <h2>Your Body Shape</h2>
                <p> <strong>Shape Classification</strong> Spoon Shape</p>
                <p>Height : 5.5 in</p>
                <p>Weight: 110lbs</p>
                <p>BMI : 20.9</p>
                <p>Gender: Female</p>
                <p>Shape Description : Oval Head</p>
                <p>Measurement: 20 cm</p>
                <p>Hat size: Us Mediumn 7</p>
                <a href="" class="btn">Update Body Shape</a>
            </div>
        </div>


    </div>
    
    <!-- ================== Right Section Side Start============= -->

    <!-- ================== Right Section Side End============= -->
</main>


@endsection
@section('script')
<script>
    bodyModelerInit()
</script>
@endsection
