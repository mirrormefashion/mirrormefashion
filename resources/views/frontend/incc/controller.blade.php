<p class="text-center" id="main-blurb">Move the sliders of each body feature to reshape the model. Click "Body Rear" to change the rear side of your model.</p>						
<div class="" id="mcontrols-wrap" >
    <div class="front-controls-full m-modeller">     
        <div id="head-group" > <!---- changed id's and classes: x-range, range to slider-wrap ----->
            <div class="feature-group-wrap" id="head-shape">
                <table>
                    <tr>
                        <th><label for="name">Head Shape:</label></th>
                        <th>
                            <div class="tick-slider">            
                     
                            
                              
                                <div id="sliderTicks_8" class="tick-slider-tick-container"></div>
                                <input
                                    
                                    id="slider-head-shape"
                                    onchange="mhead_shape(this.value)"
                                    class="tick-slider-input slide-full" 
                                    type="range" min="0" max="" step="1" 
                                    value="0"
                                    data-tick-step="1" 
                                    data-tick-id="sliderTicks_8"
                                    name="head_shape_val"
                                   />
                            </div>

                        </th>
                    </tr>
                </table>
            </div>
            <div class="feature-group-wrap" id="head-size">
                <table>
                    <tr>
                        <th><label for="name">Head Size:</label></th>
                        <th>
                            <div class="tick-slider">
                              
                                <div id="sliderTicks_9" class="tick-slider-tick-container"></div>
                                <input
                                    
                                id="slider-head-size" onchange="mhead_size(this.value)"
                                    class="tick-slider-input slide-full" 
                                    type="range" min="0" max="" step="1" 
                                    value="0"
                                    data-tick-step="1" 
                                    data-tick-id="sliderTicks_9"
                                    name="head_size_val"
                               />
                            </div>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <div id="neck-group" >
            <div class="feature-group-wrap" id="neck-shape">
                <table>
                    <tr>
                        <th><label for="name">Neck Shape:</label></th>
                        <th>
                            <div class="tick-slider">
                               
                                <div id="sliderTicks_10" class="tick-slider-tick-container"></div>
                                <input
                                    
                                    id="slider-neck-shape" 
                                    onchange="mneck_shape(this.value)"
                                    class="tick-slider-input slide-full" 
                                    type="range" min="0" max="" step="1" 
                                    value="0"
                                    data-tick-step="1" 
                                    data-tick-id="sliderTicks_10"
                                    name="neck_shape_val"
                                 />
                            </div>
                        </th>
                    </tr>
                </table> 
            </div>
            <div class="feature-group-wrap" id="neck-height"> 
                <table>
                    <tr>
                        <th><label for="name">Neck Height:</label></th>
                        <th>                    
                            <div class="tick-slider">
                              
                              
                                <div id="sliderTicks_11" class="tick-slider-tick-container"></div>
                                <input
                                    
                                    id="slider-neck-height"
                                    onchange="mneck_height(this.value)"
                                    class="tick-slider-input slide-full" 
                                    type="range" min="0" max="" step="1" 
                                    value="0"
                                    data-tick-step="1" 
                                    data-tick-id="sliderTicks_11"
                                    name="neck_height_val"
                               />
                            </div>
                        </th>
                    </tr>
                </table> 
            </div>
            <div class="feature-group-wrap" id="neck-width">
                <table>
                    <tr>
                        <th><label for="name">Neck Width:</label></th>
                        <th>
                            <div class="tick-slider">
                                <div class="tick-slider-value-container">
                             
                                <div id="sliderTicks_12" class="tick-slider-tick-container"></div>
                                <input
                                    
                                    id="slider-neck-width"
                                    onchange="mneck_width(this.value)"
                                    class="tick-slider-input slide-full" 
                                    type="range" min="0" max="" step="1" 
                                    value="0"
                                    data-tick-step="1" 
                                    data-tick-id="sliderTicks_12"
                                    name="neck_width_val"
                                />
                            </div>
                        </th>
                    </tr>
                </table> 
            </div>
        </div>
        <div id="shoulders-group" id="shoulder-height">   
            <div class="feature-group-wrap">
                <table>
                    <tr>
                        <th><label for="name">Shoulder Height:</label></th>
                        <th>
                            <div class="tick-slider">
                              
                                <div id="sliderTicks_13" class="tick-slider-tick-container"></div>
                                <input
                                    
                                    id="slider-shoulder-height" 
                                    onchange="mshoulders_height(this.value)"
                                    class="tick-slider-input slide-full" 
                                    type="range" min="0" max="" step="1" 
                                    value="0"
                                    data-tick-step="1" 
                                    data-tick-id="sliderTicks_13"
                                    name="shoulder_height_val"
                                />
                            </div>
                        </th>
                    </tr>
                </table> 
            </div>
            <div class="feature-group-wrap" id="shoulder-width">
                <table>
                    <tr>
                        <th><label for="name">Shoulder Width:</label></th>
                        <th>
                            <div class="tick-slider">
                             
                                <div id="sliderTicks_14" class="tick-slider-tick-container"></div>
                                <input
                                    
                                    id="slider-shoulder-width" 
                                    onchange="mshoulders_width(this.value)"
                                    class="tick-slider-input slide-full" 
                                    type="range" min="0" max="" step="1" 
                                    value="0"
                                    data-tick-step="1" 
                                    data-tick-id="sliderTicks_14"
                                    name="shoulder_width_val"
                                  />
                            </div>
                        </th>
                    </tr>
                </table> 
            </div>
            <div class="feature-group-wrap">
                <table>
                    <tr>
                        <th><label for="name">Arm Size:</label></th>
                        <th>
                            <div class="tick-slider">
                              
                              
                                <div id="sliderTicks_15" class="tick-slider-tick-container"></div>
                                <input
                                    
                                    id="slider-arm-size"
                                    onchange="marms(this.value)"
                                    class="tick-slider-input slide-full" 
                                    type="range" min="0" max="" step="1" 
                                    value="0"
                                    data-tick-step="1" 
                                    data-tick-id="sliderTicks_15"
                                    name="arm_size_val"
                                    />
                            </div>
                        </th>
                    </tr>
                </table> 
            </div>            
        </div>           
        <div id="torso-group" >            
            <div class="feature-group-wrap" id="breast-size">
                <table>
                    <tr>
                        <th><label for="name">Breast Size:</label></th>
                        <th>
                            <div class="tick-slider">
                              
                                <div id="sliderTicks_1" class="tick-slider-tick-container"></div>
                                <input
                                    id="slider-breasts-shape" 
                                    onchange="mbreast_shape(this.value)"
                                    class="tick-slider-input slide-full" 
                                    type="range" min="0" max="" step="1" 
                                    value="0"
                                    data-tick-step="1" 
                                    data-tick-id="sliderTicks_1"
                                    name="breasts_shape_val"
                                   />
                            </div>
                        </th>
                    </tr>
                </table> 
            </div>
            <div class="feature-group-wrap" id="stomach-shape">
                <table>
                    <tr>
                        <th><label for="name">Stomach Shape:</label></th>
                        <th>
                            <div class="tick-slider">
                             
                                <div id="sliderTicks_2" class="tick-slider-tick-container"></div>
                                <input
                                    id="slider-stomach-shape" 
                                    onchange="mstomach_shape(this.value)"
                                    class="tick-slider-input slide-full" 
                                    type="range" min="0" max="" step="1" 
                                    value="0"
                                    data-tick-step="1" 
                                    data-tick-id="sliderTicks_2"
                                 name="stomach_shape_val"
                                    />
                            </div>
                        </th>
                    </tr>
                </table> 
            </div>
            <div class="feature-group-wrap" id="torso-height">
                <table>
                    <tr>
                        <th><label for="name">Torso Height:</label></th>
                        <th>
                            <div class="tick-slider">
                             
                                <div id="sliderTicks_3" class="tick-slider-tick-container"></div>
                                <input
                                id="slider-torso-height"
                                onchange="torso_height(this.value)"
                                    class="tick-slider-input slide-full" 
                                    type="range" min="0" max="" step="1" 
                                    value="0"
                                    data-tick-step="1" 
                                    data-tick-id="sliderTicks_3"
                                    name="torso_height_val"
                                 />
                            </div>
                        </th>
                    </tr>
                </table> 
            </div>
        </div>   
        <div id="legs-group">
            <div class="feature-group-wrap" id="leg-size">
                <table>
                    <tr>
                        <th><label for="name">Leg Size:</label></th>
                        <th>
                            <div class="tick-slider">
                               
                                <div id="sliderTicks_4" class="tick-slider-tick-container"></div>
                                <input
                                
                                    id="slider-leg-size" 
                                    onchange="mlegs(this.value)"
                                    class="tick-slider-input slide-full" 
                                    type="range" min="0" max="" step="1" 
                                    value="0"
                                    data-tick-step="1" 
                                    data-tick-id="sliderTicks_4"
                                    name="leg_size_val"
                                    />
                            </div>
                        </th>
                    </tr>
                </table> 
            </div>
            <div class="feature-group-wrap" id="crotch-height">
                <table>
                    <tr>
                        <th><label for="name">Crotch Height:</label></th>
                        <th>
                            <div class="tick-slider">                              
                                <div id="sliderTicks_5" class="tick-slider-tick-container"></div>
                                <input
                                
                                    id="slider-crotch-height" 
                                    onchange="mcrotch(this.value)"
                                    class="tick-slider-input slide-full" 
                                    type="range" min="0" max="" step="1" 
                                    value="0"
                                    data-tick-step="1" 
                                    data-tick-id="sliderTicks_5"
                                    name="crotch_height_val"
                                     />
                            </div>
                        </th>
                    </tr>
                </table> 
            </div>
            <div class="feature-group-wrap" id="hip-size">

                <table>
                    <tr>
                        <th><label for="name">Hip Size:</label></th>
                        <th>
                            <div class="tick-slider">
                              
                                <div id="sliderTicks_6" class="tick-slider-tick-container"></div>
                                <input
                                
                                    id="slider-hip-size" 
                                    onchange="mhips(this.value)"
                                    class="tick-slider-input slide-full" 
                                    type="range" min="0" max="" step="1" 
                                    value="0"
                                    data-tick-step="1" 
                                    data-tick-id="sliderTicks_6"
                                    name="hip_size_val"
                                     />
                            </div>
                        </th>
                    </tr>
                </table> 
            </div>
            
        </div>     
    </div>         
</div><!---- end controls --->
<div class="modeller-button-wrap">
    <button class="btn12 anchor" id="reset" onclick="defaultModel()">Reset Model</button>
</div>
