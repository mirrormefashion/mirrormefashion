

<script>
  
  function classify(){

    weightclass = document.getElementById("weightclass").value;
    stomach = document.getElementById("feature-stomach").value;
    stomachwidth = document.getElementById("feature-shoulder-wt").value;
    shoulders = document.getElementById("feature-shoulder-ht").value;
    bust = document.getElementById("bust_group").value;
    armclass = document.getElementById("feature-arm").value;
    armsplit = split.armclass(" ");
    arm = armsplit[1];
    hips = document.getElementById("hips_group").value;
    console.log("Arm: " + arm + ", Bust:" + bust)
    process();

    if (sex == "Female" || sex.match(/binary/g)) {
      if (weightclass == "Skinny") {
        if (stomach == "Muffintop" || stomach == "Rectangle") {
          if (bust != "3" || bust != "4") {
            document.getElementById("classification").setAttribute("value", ""+stomach+"");
            document.getElementById("variant").setAttribute("value", "Classic");
          } else {
            document.getElementById("classification").setAttribute("value", ""+stomach+"");
            document.getElementById("variant").setAttribute("value", "Busty");
          }          
        } else if (stomach == "Average" || stomach == "Curvy") {
          if (bust != "3" || bust != "4") {
            document.getElementById("classification").setAttribute("value", "Skinny");
            document.getElementById("variant").setAttribute("value", "Classic");
          } else {
            document.getElementById("classification").setAttribute("value", "Skinny");
            document.getElementById("variant").setAttribute("value", "Busty");
          }
        } else {
          document.getElementById("classification").setAttribute("value", "Skinny");
          document.getElementById("variant").setAttribute("value", "Classic");
        } //end skinny v
      } else if (stomach == "Average" || stomach == "Curvy" || stomach == "Pouch") {
        if (weightclass == "Average" || weightclass == "Above") {
          if ((bust == "3" && hip == "3") || (bust == "4" && hips == "4")) {
            document.getElementById("classification").setAttribute("value", "Hourglass");
            document.getElementById("variant").setAttribute("value", "Classic");
          } else {
            if (bust != "3" || bust != "4"){
              if (hip != "1" || hip != "2") {
                document.getElementById("classification").setAttribute("value", "Pear");
                document.getElementById("variant").setAttribute("value", "Classic");
              } else {
                document.getElementById("classification").setAttribute("value", "Average");
                document.getElementById("variant").setAttribute("value", "Classic");
              } 
            } else {
              if (hip != "1" || hip != "2"){
                document.getElementById("classification").setAttribute("value", "Pear");
                document.getElementById("variant").setAttribute("value", "Busty");
              } else {
                document.getElementById("classification").setAttribute("value", "Average");
                document.getElementById("variant").setAttribute("value", "Busty");
              }            
            }
          }
        } else if (weightclass == "OW" || weightclass == "Obese" || weightclass == "Morbid"){
          if ((bust == "3" && hip == "3") || (bust == "4" && hips == "4")) {
            document.getElementById("classification").setAttribute("value", "Curvy-Hourglass");
            document.getElementById("variant").setAttribute("value", "Classic");
          } else {
            if (bust != "3" || bust != "4"){
              if (hip != "1" || hip != "2") {
                document.getElementById("classification").setAttribute("value", "Curvy-Pear");
                document.getElementById("variant").setAttribute("value", "Classic");
              } else {
                document.getElementById("classification").setAttribute("value", "Average");
                document.getElementById("variant").setAttribute("value", "Curvy");
              } 
            } else {
              if (hip != "1" || hip != "2"){
                document.getElementById("classification").setAttribute("value", "Pear");
                document.getElementById("variant").setAttribute("value", "Busty-Curvy");
              } else {
                document.getElementById("classification").setAttribute("value", "Average");
                document.getElementById("variant").setAttribute("value", "Busty-Curvy");
              }            
            }
          }
        } else {
          document.getElementById("classification").setAttribute("value", "Undetermined");
        }    //end average/curvy/pouch
      } else if (stomach == "Muffintop") {
        if (bust != "3" || bust != "4") {
          document.getElementById("classification").setAttribute("value", "Muffintop");
          document.getElementById("variant").setAttribute("value", "Classic");
        } else {
          document.getElementById("classification").setAttribute("value", "Muffintop");
          document.getElementById("variant").setAttribute("value", "Busty");
        } 
      } else if (stomach == "Spoon") {
        if (bust != "3" || bust != "4") {
          document.getElementById("classification").setAttribute("value", "Spoon");
          document.getElementById("variant").setAttribute("value", "Classic");
        } else {
          document.getElementById("classification").setAttribute("value", "Spoon");
          document.getElementById("variant").setAttribute("value", "Busty");
        } 
      } else if (stomach == "Rectangle" || stomach == "Layered") {
        if (weightclass == "Average" || weightclass == "Above") {
          if (bust != "3" || bust != "4") {
            if (shoulder != "Dropped") {
              document.getElementById("classification").setAttribute("value", "Rectangle");
              document.getElementById("variant").setAttribute("value", "Classic");
            } else {
              document.getElementById("classification").setAttribute("value", "Rectangle");
              document.getElementById("variant").setAttribute("value", "Dropped");
            }
          } else {
            if (shoulderwidth == "Broad" && shoulder != "Dropped" && (arm == "2" || arm == "3") && (hip != "3" || hip != "4")) {
              document.getElementById("classification").setAttribute("value", "Diamond");
              document.getElementById("variant").setAttribute("value", "Classic");
            } else {
              document.getElementById("classification").setAttribute("value", "Rectangle");
              document.getElementById("variant").setAttribute("value", "Busty");            
            }
          }
        } else if (weightclass == "OW" || weightclass == "Obese" || weightclass == "Morbid"){ 
          if (shoulderwidth == "Broad" && shoulder != "Dropped" && (hip != "3" || hip != "4")) {
            document.getElementById("classification").setAttribute("value", "Diamond");
            document.getElementById("variant").setAttribute("value", "Classic");
          } else {
            document.getElementById("classification").setAttribute("value", "Rectangle");
            document.getElementById("variant").setAttribute("value", "Layered");            
          }              
        } else {
            document.getElementById("classification").setAttribute("value", "Rectangle");
            document.getElementById("variant").setAttribute("value", "Classic");
        }
      } else if (stomach == "Round") {
        if (hips == "1" || hips == "2"){
          if (bust != "3" || bust != "4") {
            document.getElementById("classification").setAttribute("value", "Apple");
            document.getElementById("variant").setAttribute("value", "Small-Busted");
          } else {
            document.getElementById("classification").setAttribute("value", "Apple");
            document.getElementById("variant").setAttribute("value", "Classic");          
          }
        } else if (hips == "3" || hips == "4"){
          if (bust != "3" || bust != "4") {
            document.getElementById("classification").setAttribute("value", "Applepear");
            document.getElementById("variant").setAttribute("value", "Classic"); 
          } else {
            document.getElementById("classification").setAttribute("value", "Apple");
            document.getElementById("variant").setAttribute("value", "Wide-Hipped"); 
          }
        } else {
          document.getElementById("classification").setAttribute("value", "Undetermined");
        }
    } else {
      //sex is male

    }
  } //end function







</script>