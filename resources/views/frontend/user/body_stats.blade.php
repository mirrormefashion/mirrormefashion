<div class="bodystats-wrapper">

    <div class="flex justify-content-between" id="form-data-left">
        <div class="form-group" id="bust-wrap">
            <label for="bust">Bust</label>
            <input type="text" class="form-control" id="bust" name="bust" value="0">
        </div>

        <div class="form-group" id="weight-wrap">
            <label for="weight">Weight</label>
            <input type="text" class="form-control" id="weight" name="weight" value="0">
        </div>

        <div class="form-group" id="height-wrap">
            <label for="height">Height</label>
            <input type="text" class="form-control" id="height" name="height" value="0">
        </div>
    </div>


    <div class="flex justify-content-between" id="form-data-right">
        <div class="form-group" id="mass-wrap">
                <label for="body_mass">BMI</label>
                <input type="text" class="form-control" id="mass" name="mass" value="0">
            </div>
            <div class="form-group" id="age-wrap">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" name="age" value="">
            </div>
        <label class="block text-lg" for="gender">Gender</label>
        <div class="mb-3 form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female" checked>
            <label class="mr-2 form-check-label" for="genderFemale">
                Female
            </label>

            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male">
            <label class="mr-2 form-check-label" for="genderMale">
                Male
            </label>

            <input class="form-check-input" type="radio" name="gender" id="genderNonBinary" value="male">
            <label class="mr-2 form-check-label" for="genderNonBinary">
                Non-Binary
            </label>
        </div>        
    </div>
</div>

    <!--- START Body Data - Hidden/No Styling Required ----->
    <div id="bodyform" class="flex flex-wrap justify-content-between" style="display:none">
        <div class="form-group flex-gap" id="head-value">
            <label for="">Head Shape</label>
            <input type="text" class="form-control features-input" id="feature-head-shape" name="head" value="Rectangle" required readonly>
        </div>
        <div class="form-group flex-gap" id="head-value">
            <label for="">Head Size</label>
            <input type="text" class="form-control features-input" id="feature-head-size" name="headShape" value="1" required readonly>
        </div>

        <!--- newly created form field ---->
        <div class="form-group flex-gap" id="neck_shape-value">
            <label for="">Neck Shape</label>
            <input type="text" class="form-control features-input" id="feature-neck-shape" name="neckShape" value="4" required readonly>
        </div>
        <div class="form-group flex-gap" id="neck_ht-value">
            <label for="">Neck Height</label>
            <input type="text" class="form-control features-input" id="feature-neck-ht" name="neckHeight" value="Average" required readonly>
        </div>

        <div class="form-group flex-gap" id="neck_wt-value">
            <label for="">Neck Width</label>
            <input type="text" class="form-control features-input" id="feature-neck-wt" name="neckWidth" value="Thin" required readonly>
        </div>

        <div class="form-group flex-gap" id="shoulder_ht-value">
            <label for="">Shoulders Height</label>
            <input type="text" class="form-control features-input" id="feature-shoulder-ht" name="shoulderHeight" value="Strong" required readonly>
        </div>

        <div class="form-group flex-gap" id="shoulder_wt-value">
            <label for="">Shoulders Width</label>
            <input type="text" class="form-control features-input" id="feature-shoulder-wt" name="shoulderWidth" value="Narrow" required readonly>
        </div>

        <div class="form-group flex-gap" id="arm-value">
            <label for="">Arms</label>
            <input type="text" class="form-control features-input" id="feature-arm" name="arms" value="Arm 1" required readonly>
        </div>

        <div class="form-group flex-gap" id="breasts-value">
            <label for="">Breasts</label>
            <input type="text" class="form-control features-input" id="feature-breasts" name="breasts" value="36C" required readonly>
        </div>

        <div class="form-group flex-gap" id="stomach-value">
            <label for="">Stomach</label>
            <input type="text" class="form-control features-input" id="feature-stomach" name="stomach" value="Rectangle" required readonly>
        </div>

        <div class="form-group flex-gap" id="hips-value">
            <label for="">Hips</label>
            <input type="text" class="form-control features-input" id="feature-hips" name="hips" value="No hips" required readonly>
        </div>

        <div class="form-group flex-gap" id="legs-value">
            <label for="">Legs</label>
            <input type="text" class="form-control features-input" id="feature-legs" name="legs" value="Leg 1"  required readonly>
        </div>

        <div class="form-group flex-gap" id="spoon_legs-value">
            <label for="">Spoon Legs</label>
            <input type="text" class="form-control features-input" id="feature-spoon" name="spoonLegs" value="false" required readonly>
        </div>

        <div class="form-group flex-gap" id="back-value">
            <label for="">Back</label>
            <input type="text" class="form-control features-input" id="feature-back" name="back" value="Rectangle"  required readonly>
        </div>

        <div class="form-group flex-gap" id="bottom-value">
            <label for="">Bottom</label>
            <input type="text" class="form-control features-input" id="feature-bottom" name="bottom" value="Average"  required readonly>
        </div>

        <div class="form-group flex-gap" id="variant-value">
            <label for="">Variant</label>
            <input type="text" class="form-control features-input" id="variant" name="variant" value="" required readonly>
        </div>

        <div class="form-group flex-gap" id="class-value">
            <label for="">Weight Class</label>
            <input type="" class="form-control features-input" id="weightclass" name="weightclass" value="" required readonly>
        </div>

        <!---- sets position ---->
        <div class="form-group flex-gap" id="head-position">
            <label for="">Head</label>
            <input type="" class="form-control features-input" id="head-pos" name="headPos" value="" required readonly>
        </div>
        
        <!--- newly created form field ---->
        <div class="form-group flex-gap" id="neckshape-position">
            <label for="">Neck Height</label>
            <input type="" class="form-control features-input" id="neckshape-pos" name="neckShapePos" value="" required readonly>
        </div>

        <div class="form-group flex-gap" id="neckheight-position">
            <label for="">Neck Height</label>
            <input type="" class="form-control features-input" id="neckheight-pos" name="neckHeightPos" value="" required readonly>
        </div>

        <div class="form-group flex-gap" id="neckwidth-position">
            <label for="">Neck Width</label>
            <input type="" class="form-control features-input" id="neckwidth-pos" name="neckWidthPos" value="" required readonly>
        </div>

        <div class="form-group flex-gap" id="bust-position">
            <label for="">Bust</label>
            <input type="" class="form-control features-input" id="bust-pos" name="bustPos" value="" required readonly>
        </div>

        <div class="form-group flex-gap" id="shoulders-position">
            <label for="">Shoulder Height</label>
            <input type="" class="form-control features-input" id="shoulders-pos" name="shouldersPos"  value="" required readonly>
        </div>

        <div class="form-group flex-gap" id="shoulderwidth-position">
            <label for="">Shoulder Width</label>
            <input type="" class="form-control features-input" id="shoulderwidth-pos" name="shoulderWidthPos" value="" required readonly>
        </div>

        <div class="form-group flex-gap" id="stomach-position">
            <label for="">Stomach</label>
            <input type="" class="form-control features-input" id="stomach-pos" name="stomachPos" value="" required readonly>
        </div>

        <div class="form-group flex-gap" id="arms-position">
            <label for="">Arms</label>
            <input type="" class="form-control features-input" id="arms-pos" name="armsPos" value="" required readonly>
        </div>

        <div class="form-group flex-gap" id="legs-position">
            <label for="">Legs</label>
            <input type="" class="form-control features-input" id="legs-pos" name="legsPos" value="" required readonly>
        </div>

        <div class="form-group flex-gap" id="legs-position">
            <label for="">Hips</label>
            <input type="" class="form-control features-input" id="hips-pos" name="hipsPos" value="" required readonly>
        </div>

        <div class="form-group flex-gap" id="spoon-position">
            <label for="">Spoon</label>
            <input type="" class="form-control features-input" id="spoonlegs-pos" name="spoonLegsPos" value="" required readonly>
        </div>

        <div class="form-group flex-gap" id="bottom-position">
            <label for="">Bottom</label>
            <input type="" class="form-control features-input" id="bottom-pos" name="bottomPos" value="" required readonly>
        </div>

        <div class="form-group flex-gap" id="back-position">
            <label for="">Back</label>
            <input type="" class="form-control features-input" id="back-pos" name="backPos" value="" required readonly>
        </div>

      
    </div>