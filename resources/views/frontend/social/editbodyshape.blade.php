{{-- @dd($shape_keyes['neckShape']) --}}

@php
$head_shape = 0;
$stomach_shape = 0;
$bottom_shape = 0;

if($shape_keyes['shape_head_oblong']==1){
    $head_shape = 1;
}elseif ($shape_keyes['shape_head_round']==1) {
    $head_shape = 2;
}


if ($shape_keyes['shape_stomach_curvy'] == 1) {
    $stomach_shape = 1;
} elseif ($shape_keyes['shape_stomach_MT'] == 1) {
    $stomach_shape = 2;
} elseif ($shape_keyes['shape_stomach_spoon'] == 1) {
    $stomach_shape = 3;
} elseif ($shape_keyes['shape_stomach_rectangle'] == 1) {
    $stomach_shape = 4;
} elseif ($shape_keyes['shape_stomach_pregnant'] == 1) {
    $stomach_shape = 5;
} 


if ($shape_keyes['bottom_shape_round']) {
    $bottom_shape = 1;
} elseif ($shape_keyes['bottom_shape_square']) {
    $bottom_shape = 2;
} elseif ($shape_keyes['bottom_shape_inverted']) {
    $bottom_shape = 3;
} elseif ($shape_keyes['bottom_shape_flat']) {
    $bottom_shape = 4;
} elseif ($shape_keyes['bottom_shape_heart']) {
    $bottom_shape = 5;
}


@endphp
   


@extends('frontend.layouts.app')
@section('content')
@include('frontend/social/partials/menu')
<section class="section" id="bodyModelerSection" >
    <div class="section_four">
        <div class="modeler_controller">
            <p>Move the sliders of each body feature to reshape the model. Click "Body Rear" to change the rear side
                of your model.</p>


            <div class="controls" style="display: block;">
                <div class="front-controls-full m-modeller">

                    <div class="head_and_neck">
                        <!-- Head Group -->
                        <div class="feature_group_wrap" id="head-shape">
                            <label for="slider-head-shape">Head Shape:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_8" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>

                                </div>
                                <input id="slider-head-shape" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="2" step="1" value="{{ $head_shape}}" data-tick-step="0.25"
                                    data-tick-id="sliderTicks_8" name="head_shape_val" />
                            </div>
                        </div>
                        <div class="feature_group_wrap ubiquitous" id="head-size">
                            <label for="slider-head-size">Head Size:</label>
                            <div class="tick-slider">

                                <div id="sliderTicks_9" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>

                                </div>
                                <input id="slider-head-size" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="1" step="0.25" value="{{$shape_keyes['head_size'] ?? 0}}" data-tick-step="0.25"
                                    data-tick-id="sliderTicks_9" name="head_size_val" />
                            </div>
                        </div>

                        <!-- Neck Group -->
                        <div class="feature_group_wrap ubiquitous" id="neck-height">
                            <label for="slider-neck-height">Neck Height:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_11" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                </div>
                                <input id="slider-neck-height" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="1" step="0.25" value="{{$shape_keyes['neck_height']}}" data-tick-step="1"
                                    data-tick-id="sliderTicks_11" name="neck_height_val" />
                            </div>
                        </div>
                        <div class="feature_group_wrap ubiquitous" id="neck-width">
                            <label for="name">Neck Width:</label>
                            <div class="tick-slider">
                                <div class="tick-slider-value-container">

                                    <div id="sliderTicks_12" class="tick-slider-tick-container">
                                        <span class="tick-slider-tick"></span>
                                        <span class="tick-slider-tick"></span>
                                        <span class="tick-slider-tick"></span>

                                    </div>
                                    <input id="slider-neck-width" class="tick-slider-input slide-full topmost"
                                        type="range" min="0" max="1" step="0.5" value="{{$shape_keyes['neck_width']}}" data-tick-step="1"
                                        data-tick-id="sliderTicks_12" name="neck_width_val" />
                                </div>

                            </div>
                        </div>
                        <div class="feature_group_wrap remove" id="trapezoidal-shape">
                            <label for="slider-neck-shape">Neck Shape:</label>
                            <div class="tick-slider">
                                <div class="tick-slider-value-container">

                                    <div id="sliderTicks_12" class="tick-slider-tick-container">
                                        <span class="tick-slider-tick"></span>
                                        <span class="tick-slider-tick"></span>
                                    </div>
                                    <input id="slider-neck-shape" class="tick-slider-input slide-full topmost"
                                        type="range" min="0" max="1" step="1" value="0" data-tick-step="1"
                                        data-tick-id="sliderTicks_12" name="neck_width_val" />
                                </div>

                            </div>
                        </div>
                        <div class="feature_group_wrap remove" id="trapezoidal-shape">
                            <label for="slider-chin-shape">Chin Shape :</label>
                            <div class="tick-slider">
                                <div class="tick-slider-value-container">

                                    <div id="sliderTicks_21" class="tick-slider-tick-container">
                                        <span class="tick-slider-tick"></span>
                                        <span class="tick-slider-tick"></span>
                                    </div>
                                    <input id="slider-chin-shape" class="tick-slider-input slide-full topmost"
                                        type="range" min="0" max="1" step="1" value="{{$shape_keyes['chin_shape']}}" data-tick-step="1"
                                        data-tick-id="sliderTicks_12" name="chin_shape_val" />
                                </div>

                            </div>
                        </div>
                        <div class="feature_group_wrap remove" id="trapezoidal-shape">
                            <label for="slider-neck-rolls">Neck Rolls:</label>
                            <div class="tick-slider">
                                <div class="tick-slider-value-container">

                                    <div id="sliderTicks_18" class="tick-slider-tick-container">
                                        <span class="tick-slider-tick"></span>
                                        <span class="tick-slider-tick"></span>
                                    </div>
                                    <input id="slider-neck-rolls" class="tick-slider-input slide-full topmost"
                                        type="range" min="0" max="1" step="1" value="{{$shape_keyes['neck_layers']}}" data-tick-step="1"
                                        data-tick-id="sliderTicks_12" name="neck_rolls_val" />
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="shoulder_and_arm">
                      
                      
                    </div>
                    <div class="breast_and_torso">
                        <!-- Torso Group -->
                            <!-- Shoulders Group -->
                            <div class="feature_group_wrap ubiquitous" id="shoulder-height">
                                <label for="slider-shoulder-height">Shoulder Height:</label>
                                <div class="tick-slider">
                                    <div id="sliderTicks_13" class="tick-slider-tick-container">
                                        <span class="tick-slider-tick"></span>
                                        <span class="tick-slider-tick"></span>
                                        <span class="tick-slider-tick"></span>
                                    </div>
                                    <input id="slider-shoulder-height" class="tick-slider-input slide-full topmost"
                                        type="range" min="0" max="1" step="0.5" value="{{$shape_keyes['shoulder_height']}}" data-tick-step="1"
                                        data-tick-id="sliderTicks_13" name="shoulder_height_val" />
                                </div>
                            </div>
                        <div class="feature_group_wrap ubiquitous" id="shoulder-width">
                            <label for="slider-shoulder-width">Shoulder Width:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_14" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                </div>
                                <input id="slider-shoulder-width" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="1" step="0.125" value="{{$shape_keyes['shoulder_width']}}" data-tick-step="1"
                                    data-tick-id="sliderTicks_14" name="shoulder_width_val" />
                            </div>
                        </div>
                         <div class="feature_group_wrap" id="stomach-width">
                            <label for="slider-stomach-width">Stomach Size:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_22" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                </div>
                                <input id="slider-stomach-width" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="1" step="0.125" value="{{$shape_keyes['stomach_width']}}" data-tick-step="1"
                                    data-tick-id="sliderTicks_2" name="stomach_width_val" />
                            </div>
                        </div>
                        <div class="feature_group_wrap" id="stomach-shape">
                            <label for="slider-stomach-shape">Stomach Shape:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_2" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                </div>
                                <input id="slider-stomach-shape" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="5" step="1" value="{{$stomach_shape}}" data-tick-step="1"
                                    data-tick-id="sliderTicks_2" name="stomach_shape_val" />
                            </div>
                        </div>
                  

                  
                        <div class="feature_group_wrap" id="pregnant-size">
                            <label for="slider-pregnant-size">Trimester:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_23" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                   
                                  
                                </div>
                                <input id="slider-pregnant-size" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="1" step="0.333" value="{{ $shape_keyes['trimester'] ?? 0 }}
" data-tick-step="0.334"
                                    data-tick-id="sliderTicks_23" name="pregnant_size_val" />
                            </div>
                        </div>
                          <!--   Arm  group -->
                          <div class="feature_group_wrap" id="breast-size">
                            <label for="slider-breast-size">Breast Size:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_1" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                </div>
                                <input id="slider-breast-size" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="1" step="0.125" value="{{ $shape_keyes['breasts'] ?? 0 }}" data-tick-step="1"
                                    data-tick-id="sliderTicks_1" name="breast_shape_val" />
                            </div>
                        </div>
                          <div class="feature_group_wrap" id="arm-size">
                            <label for="slider-arm-size">Arm Size:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_15" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                </div>
                                <input id="slider-arm-size" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="1" step="0.333" value="{{ $shape_keyes['arm_size'] ?? 0 }}" data-tick-step="1"
                                    data-tick-id="sliderTicks_15" name="arm_size_val" />
                            </div>
                        </div>
                        <div class="feature_group_wrap" id="arm-length">
                            <label for="slider-arm-length">Arm Length:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_10" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                </div>
                                <input id="slider-arm-length" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="1" step="1" value="{{ $shape_keyes['arms_distended'] ?? 0 }}" data-tick-step="1"
                                    data-tick-id="sliderTicks_10" name="arm_length_val" />
                            </div>
                        </div>
                        <div class="feature_group_wrap" id="torso-height">
                            <label for="slider-torso-height">Torso Height:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_3" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                </div>
                                <input id="slider-torso-height" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="1" step="0.5" value="{{ $shape_keyes['torso_distended'] ?? 0 }}" data-tick-step="1"
                                    data-tick-id="sliderTicks_3" name="torso_height_val" />
                            </div>
                        </div>
                    </div>
                    <div class="leg_and_hip d_none_md">
                        <!-- Leg Group -->
                        <div class="feature_group_wrap" id="leg-size">
                            <label for="slider-leg-size">Leg Size:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_4" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                </div>
                                <input id="slider-leg-size" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="1" step="0.25" value="{{ $shape_keyes['leg_size'] ?? 0 }}" data-tick-step="1"
                                    data-tick-id="sliderTicks_4" name="leg_size_val" />
                            </div>
                        </div>
                        <div class="feature_group_wrap" id="hip-size">
                            <label for="slider-hip-size">Hip Size:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_6" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                </div>
                                <input id="slider-hip-size" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="1" step="0.5" value="{{ $shape_keyes['hips_size'] ?? 0 }}" data-tick-step="1"
                                    data-tick-id="sliderTicks_6" name="hip_size_val" />
                            </div>
                        </div>
                        <div class="feature_group_wrap" id="crotch-height">
                            <label for="slider-crotch-height">Crotch Height:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_5" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                </div>
                                <input id="slider-crotch-height" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="1" step="0.5" value="{{ $shape_keyes['crotch_height'] ?? 0 }}" data-tick-step="1"
                                    data-tick-id="sliderTicks_5" name="crotch_height_val" />
                            </div>
                        </div>

                        <div class="feature_group_wrap" id="bottom-shape">
                            <label for="slider-bottom-shape">Bottom Shape:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_6" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>

                                </div>
                                <input id="slider-bottom-shape" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="5" step="1" value="{{$bottom_shape}}" data-tick-step="1"
                                    data-tick-id="sliderTicks_6" name="bottom_shape_val" />
                            </div>
                        </div>
                        <div class="feature_group_wrap" id="bottom-width">
                            <label for="slider-bottom-width">Bottom Width:</label>
                            <div class="tick-slider">
                                <div id="sliderTicks_19" class="tick-slider-tick-container">
                                    <span class="tick-slider-tick"></span>
                                    <span class="tick-slider-tick"></span>


                                </div>
                                <input id="slider-bottom-width" class="tick-slider-input slide-full topmost"
                                    type="range" min="0" max="1" step="1" value="{{ $shape_keyes['bottom_width'] ?? 0 }}" data-tick-step="1"
                                    data-tick-id="sliderTicks_19" name="bottom_width_val" />
                            </div>
                        </div>
                      
                    </div>
                </div>
          
                <div class="body_modeler_action_btn">
                    <button  id="bodyRearBtn" style="cursor: pointer;">Body Rear</button>
                    <button style="cursor: pointer; padding: 10px;"
                         id="submitRegBtn" onclick="goToRegisterSection('#registationSection')">Submit</button>
                </div>
            </div>
        </div>
        <div class="modeler_container">
            <div class="body_modeler modeler-heading">
                <h1>ShapeMe® Body Modeler</h1>
                <h5>by Mirror Me Fashion</h5>
                <div class="body_modeler_canvases">
                    <canvas id="renderCanvas" style="height: 100vh; max-width: 100%;"></canvas>
                </div>


            </div>
        </div>
    </div>


</section>


@endsection
@push('scripts')
<script>
   
  let gender = "{{$bodyData->gender}}";
  let shape ="{{$bodyData->shape}}";
  loadGLBFile("{{ static_asset('assets/modeler') }}"+`/${gender}_${shape}.glb` )
  handleHeadShapeChange("{{$shape_keyes['head_size'] ?? 0}}");

</script>
@endpush

