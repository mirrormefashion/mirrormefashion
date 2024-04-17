
<div class="" id="mcontrols-wrap" >
    <div class="front-controls-full" id="m-modeller">
        <div id="head-class" class="feature-container">
            <div id="head-range" >
                <span >Head</span>
                <div class="range"> 
                    <div id="male-head-shape">
                        <label for="name">Head Shape:</label>
                        <input type="text" class="feature-val" id="label-head-shape" value="Oval Shape">
                    </div>
                    <input type="range" min="0" max="3" value="0" class="slide-full" id="slider-head-shape" onchange="mhead_shape(this.value)">
                    <div class="sliderticks">
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                    </div>
                </div> 
                <div class="range"> 
                    <div id="male-head-size">
                        <label for="name">Head Size:</label>
                        <input type="text" class="feature-val" id="label-head-size" value="20cm">
                    </div>
                    <input type="range" min="0" max="4" value="0" class="slide-full" id="slider-head-size" onchange="mhead_size(this.value)">
                    <div class="sliderticks">
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                    </div>
                </div> 
            </div>
        </div>
        <div id="neck-class" class="feature-container">
            <div id="neck-class-id">
                <span >Neck</span>
                <span id="neck-class-plus" >+</span>
            </div>
            <div id="neck-range">
                <span >Neck</span>
                <span id="neck-class-minus" >-</span>
                <div class="range">
                    <div id="male-neck-shape"> 
                        <label for="name">Neck Shape:</label>
                        <input type="text" class="feature-val" id="label-neck-shape" value="Average">
                    </div>                
                    <input type="range" min="0" max="1" value="0" class="slide-full" id="slider-neck-shape" onchange="mneck_shape(this.value)">
                    <div class="sliderticks">
                        <span class="tick"></span>
                        <span class="tick"></span>
                    </div>
                </div>  
                <div class="range">                             
                    <div id="male-neck-height">
                        <label for="name">Neck Height:</label>
                        <input type="text" class="feature-val" id="label-neck-height" value="Tall">
                    </div>
                    <input type="range" min="0" max="7" value="0" class="slide-full" id="slider-neck-height" onchange="mneck_height(this.value)">
                    <div class="sliderticks">
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                    </div>
                </div>  
                <div class="range">
                    <div id="male-neck-width"> 
                        <label for="name">Neck Width:</label>
                        <input type="text" class="feature-val" id="label-neck-width" value="Skinny">
                    </div>                
                    <input type="range" min="0" max="4" value="0" class="slide-full" id="slider-neck-width" onchange="mneck_width(this.value)">
                    <div class="sliderticks">
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                    </div>
                </div> 
            </div>
        </div> 
        <div id="shoulders-class" class="feature-container">
            <div id="shoulders-class-id">
                <span>Shoulders</span>
                <span id="shoulders-class-plus" >+</span>
            </div>
            <div id="shoulders-range" >
                <span>Shoulders</span>
                <span id="shoulders-class-minus" >-</span>
                <div class="range">
                    <div id="male-shoulders-height"> 
                        <label for="name">Shoulder Height:</label>
                        <input type="text" class="feature-val" id="label-shoulder-height" value="Strong">                        
                    </div>
                    <input type="range" min="0" max="2" value="0" class="slide-full" id="slider-shoulder-height" onchange="mshoulders_height(this.value)">
                    <div class="sliderticks">
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                    </div>
                </div> 
                <div class="range">
                    <div id="male-shoulders-width"> 
                        <label for="name">Shoulder Width:</label>
                        <input type="text" class="feature-val" id="label-shoulder-width" value="Narrow">
                    </div>
                    <input type="range" min="0" max="8" value="0" class="slide-full" id="slider-shoulder-width" onchange="mshoulders_width(this.value)">
                    <div class="sliderticks">
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                    </div>
                </div> 
                <div class="range">
                    <div id="male-arm-size"> 
                        <label for="name">Arm Size:</label>
                        <input type="text" class="feature-val" id="label-arm-size" value="60cm">
                    </div>  
                    <input type="range" min="0" max="4" value="0" class="slide-full" id="slider-arm-size" onchange="marms(this.value)">
                    <div class="sliderticks">
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                    </div>
                </div> 
            </div>
        </div>
        <div id="torso-class" class="feature-container">
            <div id="torso-class-id">
                <span>Torso</span>
                <span id="torso-class-plus" >+</span>
            </div>
            <div id="torso-range" >
                <span>Torso</span>
                <span id="torso-class-minus">-</span>
                <div class="range">
                    <div id="male-breasts-shape"> 
                        <label for="name">Chest Shape:</label>
                        <input type="text" class="feature-val" id="label-breast-shape"  value="Average">
                    </div>
                    <input type="range" min="0" max="1" value="0" class="slide-full" id="slider-breast-shape" onchange="mbreast_shape(this.value)">
                    <div class="sliderticks">
                        <span class="tick"></span>
                        <span class="tick"></span>
                    </div>
                </div> 
                <div class="range">
                    <div id="male-stomach-shape"> 
                        <label for="name">Stomach Shape:</label>
                        <input type="text" class="feature-val" id="label-stomach-shape" value="Average">
                    </div>
                    <input type="range" min="0" max="6" value="2" class="slide-full" id="slider-stomach-shape" onchange="mstomach_shape(this.value)">
                    <div class="sliderticks" id="male-stomach-ticks">
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                    </div>
                </div> 
                <div class="range">
                    <div id="male-torso-height"> 
                        <label for="name">Torso Height:</label>
                        <input type="text" class="feature-val" id="label-torso-height" value="Average">
                    </div>
                    <input type="range" min="0" max="1" value="0" class="slide-full" id="slider-torso-height" onchange="torso_height(this.value)">
                    <div class="sliderticks" id="male-stomach-ticks">
                        <span class="tick"></span>
                        <span class="tick"></span>
                    </div>
                </div> 
            </div>
        </div>
        <div id="legs-class" class="feature-container">
            <div id="legs-class-id">
                <span>Legs</span>
                <span id="legs-class-plus" >+</span>
            </div>
            <div id="legs-range" >
                <span id="legs-class-minus" >-</span>
                <div class="range">
                    <div id="male-legs-size"> 
                        <label for="name">Legs Size:</label>
                        <input type="text" class="feature-val" id="label-legs-size" value="120cm">
                    </div>
                    <input type="range" min="0" max="4" value="0" class="slide-full" id="slider-leg-size" onchange="mlegs(this.value)">
                    <div class="sliderticks" id="male-legs-ticks">
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                        <span class="tick"></span>
                    </div>
                </div> 
                <div class="range">
                    <div id="male-crotch-height"> 
                        <label for="name">Crotch Height:</label>
                        <input type="text" class="feature-val" id="label-crotch-height" value="Average">
                    </div>
                    <input type="range" min="0" max="2" value="0" class="slide-full" id="slider-crotch-height" onchange="mcrotch(this.value)">
                    <div class="sliderticks" id="male-legs-ticks">
                        <span class="tick"></span>
                        <span class="tick"></span>
                    </div>
                </div> 
                <div class="range">
                    <div id="male-hips-size"> 
                        <label for="name">Hips Size:</label>
                        <input type="text" class="feature-val" id="label-hips-size" value="None">
                    </div>
                    <input type="range" min="0" max="1" value="0" class="slide-full" id="slider-hip-size" onchange="mhips(this.value)">
                    <div class="sliderticks" id="male-hips-ticks">
                        <span class="tick"></span>
                        <span class="tick"></span>
                    </div>
                </div> 
            </div>
        </div>
    </div>               
</div><!---- end controls --->
              