<div class="" id="mcontrols-wrap">
    <div class="front-controls-full m-modeller">
        <div id="head-class" class="feature-container"> 
            <div id="head-range">  
                <div class="range">              
                    <div id="male-head-shape">
                        <label for="name">Head Shape:</label>
                        <input type="text" name="head_shape" class="feature-val" id="label-head-shape" value="Oval Shape">
                    </div>
                    
                    <div class="tick-slider">
            
                        <div class="tick-slider-value-container">
                            <div id="labelMin_8" class="tick-slider-label"></div>
                            <div id="labelMax_8" class="tick-slider-label"></div>
                            <div id="sliderValue_8" class="tick-slider-value"></div>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="sliderProgress_8" class="tick-slider-progress"></div>
                        <div id="sliderTicks_8" class="tick-slider-tick-container"></div>
                        <input
                            
                            id="slider-head-shape"
                            onchange="mhead_shape(this.value)"
                            class="tick-slider-input slide-full" 
                            type="range" min="0" max="1" step="1" 
                            value="0"
                            data-tick-step="1" 
                            data-tick-id="sliderTicks_8"
                            data-value-id="sliderValue_8"
                            data-progress-id="sliderProgress_8"
                            data-min-label-id="labelMin_8"
                            data-max-label-id="labelMax_8" />
                    </div>
                </div>
                <div class="range">
                    <div id="male-head-size">
                        <label for="name">Head Size:</label>
                        <input type="text" name="head_size" class="feature-val" id="label-head-size" value="20cm">
                    </div>
                    <div class="tick-slider">
            
                        <div class="tick-slider-value-container">
                            <div id="labelMin_9" class="tick-slider-label"></div>
                            <div id="labelMax_9" class="tick-slider-label"></div>
                            <div id="sliderValue_9" class="tick-slider-value"></div>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="sliderProgress_9" class="tick-slider-progress"></div>
                        <div id="sliderTicks_9" class="tick-slider-tick-container"></div>
                        <input
                            
                        id="slider-head-size" onchange="mhead_size(this.value)"
                            class="tick-slider-input slide-full" 
                            type="range" min="0" max="4" step="1" 
                            value="0"
                            data-tick-step="1" 
                            data-tick-id="sliderTicks_9"
                            data-value-id="sliderValue_9"
                            data-progress-id="sliderProgress_9"
                            data-min-label-id="labelMin_9"
                            data-max-label-id="labelMax_9" />
                    </div>
                </div>
          </div>
        </div>
        <div id="neck-class" class="feature-container">
            <div id="neck-range">
                <div class="range">
                    <div id="male-neck-shape">
                        <label for="name">Neck Shape:</label>
                        <input type="text" name="neck_shape" class="feature-val" id="label-neck-shape" value="Average">
                    </div>
                    <div class="tick-slider">
            
                        <div class="tick-slider-value-container">
                            <div id="labelMin_10" class="tick-slider-label"></div>
                            <div id="labelMax_10" class="tick-slider-label"></div>
                            <div id="sliderValue_10" class="tick-slider-value"></div>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="sliderProgress_10" class="tick-slider-progress"></div>
                        <div id="sliderTicks_10" class="tick-slider-tick-container"></div>
                        <input
                            
                            id="slider-neck-shape" 
                            onchange="mneck_shape(this.value)"
                            class="tick-slider-input slide-full" 
                            type="range" min="0" max="3" step="1" 
                            value="0"
                            data-tick-step="1" 
                            data-tick-id="sliderTicks_10"
                            data-value-id="sliderValue_10"
                            data-progress-id="sliderProgress_10"
                            data-min-label-id="labelMin_10"
                            data-max-label-id="labelMax_10" />
                    </div>               
                </div>
                <div class="range">
                    <div id="male-neck-height">
                        <label for="name">Neck Height:</label>
                        <input type="text" name="neck_height" class="feature-val" id="label-neck-height" value="Tall">
                    </div>
                    <div class="tick-slider">
            
                        <div class="tick-slider-value-container">
                            <div id="labelMin_11" class="tick-slider-label"></div>
                            <div id="labelMax_11" class="tick-slider-label"></div>
                            <div id="sliderValue_11" class="tick-slider-value"></div>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="sliderProgress_11" class="tick-slider-progress"></div>
                        <div id="sliderTicks_11" class="tick-slider-tick-container"></div>
                        <input
                            
                            id="slider-neck-height"
                            onchange="mneck_height(this.value)"
                            class="tick-slider-input slide-full" 
                            type="range" min="0" max="7" step="1" 
                            value="0"
                            data-tick-step="1" 
                            data-tick-id="sliderTicks_11"
                            data-value-id="sliderValue_11"
                            data-progress-id="sliderProgress_11"
                            data-min-label-id="labelMin_11"
                            data-max-label-id="labelMax_11" />
                    </div>
                </div>
                <div class="range">
                    <div id="male-neck-width">
                        <label for="name">Neck Width:</label>
                        <input type="text"  name="neck_width" class="feature-val" id="label-neck-width" value="Skinny">
                    </div>
                    <div class="tick-slider">
            
                        <div class="tick-slider-value-container">
                            <div id="labelMin_12" class="tick-slider-label"></div>
                            <div id="labelMax_12" class="tick-slider-label"></div>
                            <div id="sliderValue_12" class="tick-slider-value"></div>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="sliderProgress_12" class="tick-slider-progress"></div>
                        <div id="sliderTicks_12" class="tick-slider-tick-container"></div>
                        <input
                            
                            id="slider-neck-width"
                            onchange="mneck_width(this.value)"
                            class="tick-slider-input slide-full" 
                            type="range" min="0" max="4" step="1" 
                            value="0"
                            data-tick-step="1" 
                            data-tick-id="sliderTicks_12"
                            data-value-id="sliderValue_12"
                            data-progress-id="sliderProgress_12"
                            data-min-label-id="labelMin_12"
                            data-max-label-id="labelMax_12" />
                    </div>
                </div>
            </div>
        </div>
        <div id="shoulders-class" class="feature-container">
            <div id="shoulders-range">
                <div class="range">
                    <div id="male-shoulders-height">
                        <label for="name">Shoulder Height:</label>
                        <input type="text" name="shoulder_height" class="feature-val" id="label-shoulder-height" value="Strong">
                    </div>
                    <div class="tick-slider">
            
                        <div class="tick-slider-value-container">
                            <div id="labelMin_13" class="tick-slider-label"></div>
                            <div id="labelMax_13" class="tick-slider-label"></div>
                            <div id="sliderValue_13" class="tick-slider-value"></div>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="sliderProgress_13" class="tick-slider-progress"></div>
                        <div id="sliderTicks_13" class="tick-slider-tick-container"></div>
                        <input
                            
                            id="slider-shoulder-height" 
                            onchange="mshoulders_height(this.value)"
                            class="tick-slider-input slide-full" 
                            type="range" min="0" max="4" step="1" 
                            value="0"
                            data-tick-step="1" 
                            data-tick-id="sliderTicks_13"
                            data-value-id="sliderValue_13"
                            data-progress-id="sliderProgress_13"
                            data-min-label-id="labelMin_13"
                            data-max-label-id="labelMax_13" />
                 </div>
 
                    <div class="sliderticks" id="ticks-shoulder-height">
                    </div>
                </div>
                <div class="range">
                    <div id="male-shoulders-width">
                        <label for="name">Shoulder Width:</label>
                        <input type="text" class="feature-val" id="label-shoulder-width" value="Narrow">
                    </div>
                    <div class="tick-slider">
            
                        <div class="tick-slider-value-container">
                            <div id="labelMin_14" class="tick-slider-label"></div>
                            <div id="labelMax_14" class="tick-slider-label"></div>
                            <div id="sliderValue_14" class="tick-slider-value"></div>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="sliderProgress_14" class="tick-slider-progress"></div>
                        <div id="sliderTicks_14" class="tick-slider-tick-container"></div>
                        <input
                            
                            id="slider-shoulder-width" 
                            onchange="mshoulders_width(this.value)"
                            class="tick-slider-input slide-full" 
                            type="range" min="0" max="8" step="1" 
                            value="0"
                            data-tick-step="1" 
                            data-tick-id="sliderTicks_14"
                            data-value-id="sliderValue_14"
                            data-progress-id="sliderProgress_14"
                            data-min-label-id="labelMin_14"
                            data-max-label-id="labelMax_14" />
                 </div>

                   
                </div>
                <div class="range">
                    <div id="male-arm-size">
                        <label for="name">Arm Size:</label>
                        <input type="text" name="arm_size" class="feature-val" id="label-arm-size" value="60cm">
                    </div>
                    <div class="tick-slider">
            
                        <div class="tick-slider-value-container">
                            <div id="labelMin_15" class="tick-slider-label"></div>
                            <div id="labelMax_15" class="tick-slider-label"></div>
                            <div id="sliderValue_15" class="tick-slider-value"></div>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="sliderProgress_15" class="tick-slider-progress"></div>
                        <div id="sliderTicks_15" class="tick-slider-tick-container"></div>
                        <input
                            
                            id="slider-arm-size"
                            onchange="marms(this.value)"
                            class="tick-slider-input slide-full" 
                            type="range" min="0" max="4" step="1" 
                            value="0"
                            data-tick-step="1" 
                            data-tick-id="sliderTicks_15"
                            data-value-id="sliderValue_15"
                            data-progress-id="sliderProgress_15"
                            data-min-label-id="labelMin_15"
                            data-max-label-id="labelMax_15" />
                 </div>
                  
                    
                </div>
            </div>
        </div>
        <div id="torso-class" class="feature-container">
            <div id="breast-range">
                <div class="range">
                    <div id="male-breasts-shape"> 
                        <label for="name">Breasts Shape:</label>
                        <input type="text" name="breasts_shape" class="feature-val"  id="label-breast-shape"  value="Average">
                    </div>
                    <div class="tick-slider">            
                        <div class="tick-slider-value-container">
                            <div id="labelMin_1" class="tick-slider-label"></div>
                            <div id="labelMax_1" class="tick-slider-label"></div>
                            <div id="sliderValue_1" class="tick-slider-value"></div>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="sliderProgress_1" class="tick-slider-progress"></div>
                        <div id="sliderTicks_1" class="tick-slider-tick-container"></div>
                        <input
                            id="slider-breasts-shape" 
                            onchange="mbreast_shape(this.value)"
                            class="tick-slider-input slide-full" 
                            type="range" min="0" max="4" step="1" 
                            value="0"
                            data-tick-step="1" 
                            data-tick-id="sliderTicks_1"
                            data-value-id="sliderValue_1"
                            data-progress-id="sliderProgress_1"
                            data-min-label-id="labelMin_1"
                            data-max-label-id="labelMax_1" />
                    </div>   
                </div>                
            </div>               
            <div class="stomach-range">
                <div class="range">
                    <div id="male-stomach-shape"> 
                        <label for="label-stomach-shape">Stomach Shape:</label>
                        <input type="text" name="stomach_shape" class="feature-val" id="label-stomach-shape" value="Average">
                    </div>
                    <div class="tick-slider">
            
                        <div class="tick-slider-value-container">
                            <div id="labelMin_2" class="tick-slider-label"></div>
                            <div id="labelMax_2" class="tick-slider-label"></div>
                            <div id="sliderValue_2" class="tick-slider-value"></div>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="sliderProgress_2" class="tick-slider-progress"></div>
                        <div id="sliderTicks_2" class="tick-slider-tick-container"></div>
                        <input
                            id="slider-stomach-shape" 
                            onchange="mstomach_shape(this.value)"
                            class="tick-slider-input slide-full" 
                            type="range" min="0" max="3" step="1" 
                            value="0"
                            data-tick-step="1" 
                            data-tick-id="sliderTicks_2"
                            data-value-id="sliderValue_2"
                            data-progress-id="sliderProgress_2"
                            data-min-label-id="labelMin_2"
                            data-max-label-id="labelMax_2" />
                    </div>
                </div>                            
            </div>   
            <div class="torso-range">
                <div class="range">
                    <div id="male-torso-height"> 
                        <label for="label-torso-height">Torso Height:</label>
                        <input type="text" name="torso_height" class="feature-val" id="label-torso-height" value="Average">
                    </div>
                    <div class="tick-slider">
            
                        <div class="tick-slider-value-container">
                            <div id="labelMin_3" class="tick-slider-label"></div>
                            <div id="labelMax_3" class="tick-slider-label"></div>
                            <div id="sliderValue_3" class="tick-slider-value"></div>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="sliderProgress_3" class="tick-slider-progress"></div>
                        <div id="sliderTicks_3" class="tick-slider-tick-container"></div>
                        <input
                        id="slider-torso-height"
                            onchange="torso_height(this.value)"
                            class="tick-slider-input slide-full" 
                            type="range" min="0" max="3" step="1" 
                            value="0"
                            data-tick-step="1" 
                            data-tick-id="sliderTicks_3"
                            data-value-id="sliderValue_3"
                            data-progress-id="sliderProgress_3"
                            data-min-label-id="labelMin_3"
                            data-max-label-id="labelMax_3" />
                    </div>  
                </div>     
            </div>
        </div>
        <div id="legs-class" class="feature-container">            
            <div class="leg-range">
                <div class="range">
                    <div id="male-legs-size"> 
                        <label for="name">Legs Size:</label>
                        <input type="text" name="legs_size" class="feature-val" id="label-legs-size" value="120cm">
                    </div>

                    <div class="tick-slider">
            
                        <div class="tick-slider-value-container">
                            <div id="labelMin_4" class="tick-slider-label"></div>
                            <div id="labelMax_4" class="tick-slider-label"></div>
                            <div id="sliderValue_4" class="tick-slider-value"></div>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="sliderProgress_4" class="tick-slider-progress"></div>
                        <div id="sliderTicks_4" class="tick-slider-tick-container"></div>
                        <input
                        
                            id="slider-leg-size" 
                            onchange="mlegs(this.value)"
                            class="tick-slider-input slide-full" 
                            type="range" min="0" max="4" step="1" 
                            value="0"
                            data-tick-step="1" 
                            data-tick-id="sliderTicks_4"
                            data-value-id="sliderValue_4"
                            data-progress-id="sliderProgress_4"
                            data-min-label-id="labelMin_4"
                            data-max-label-id="labelMax_4" />
                    </div>
                </div>
            </div> 
            <div class="crotch-range">
                <div class="range">
                    <div id="male-crotch-height"> 
                        <label for="name">Crotch Height:</label>
                        
                        <input type="text"  name="cortch_height" class="feature-val" id="label-crotch-height" value="Average">
                    </div>
                    
                    <div class="tick-slider">
            
                        <div class="tick-slider-value-container">
                            <div id="labelMin_5" class="tick-slider-label"></div>
                            <div id="labelMax_5" class="tick-slider-label"></div>
                            <div id="sliderValue_5" class="tick-slider-value"></div>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="sliderProgress_5" class="tick-slider-progress"></div>
                        <div id="sliderTicks_5" class="tick-slider-tick-container"></div>
                        <input
                        
                            id="slider-crotch-height"
                            onchange="mcrotch(this.value)"
                            class="tick-slider-input slide-full" 
                            type="range" min="0" max="4" step="1" 
                            value="1"
                            data-tick-step="1" 
                            data-tick-id="sliderTicks_5"
                            data-value-id="sliderValue_5"
                            data-progress-id="sliderProgress_5"
                            data-min-label-id="labelMin_5"
                            data-max-label-id="labelMax_5" />
                    </div>
                </div>
            </div> 
            <div class="hip-range">
                <div class="range">
                    <div id="male-hips-size"> 
                        <label for="name">Hips Size:</label>
                        <input type="text"  name="hips_size" class="feature-val" id="label-hips-size" value="None">
                    </div>
                        
                    <div class="tick-slider">
            
                        <div class="tick-slider-value-container">
                            <div id="labelMin_6" class="tick-slider-label"></div>
                            <div id="labelMax_6" class="tick-slider-label"></div>
                            <div id="sliderValue_6" class="tick-slider-value"></div>
                        </div>
                        <div class="tick-slider-background"></div>
                        <div id="sliderProgress_6" class="tick-slider-progress"></div>
                        <div id="sliderTicks_6" class="tick-slider-tick-container"></div>
                        <input
                        
                            id="slider-hip-size" 
                            onchange="mhips(this.value)"
                            class="tick-slider-input slide-full" 
                            type="range" min="0" max="2" step="1" 
                            value="0"
                            data-tick-step="1" 
                            data-tick-id="sliderTicks_6"
                            data-value-id="sliderValue_6"
                            data-progress-id="sliderProgress_6"
                            data-min-label-id="labelMin_6"
                            data-max-label-id="labelMax_6" />
                    </div>
                </div>
            </div>         
        </div>
    </div>
</div>
<div class="modeller-button-wrap">
    <a href="#conclusion" id="submit-model">Submit</a>
</div>
<!---- end controls --->


