/*--------------------- Process Modeler  ----------------------*/

<script>
  
function process(){

var position = document.getElementById("female-OW-head").style.backgroundPosition;
var split = position.split(" ");
a = split[0];
b = split[1];
xpos = parseInt(a);
ypos = parseInt(b);

var neck_pos = document.getElementById("female-OW-neck").style.backgroundPosition;
var splitneck = neck_pos.split(" ");
c = splitneck[0];
d = splitneck[1];
k_xpos = parseInt(c);
c_xpos = parseInt(d);      
 
var sh_po = document.getElementById("female-OW-shoulders").style.backgroundPosition;
var splitsh_po = sh_po.split(" ");
g = splitsh_po[0];
h = splitsh_po[1];
xpos = parseInt(g);
ypos = parseInt(h);  

var stomach_pos = document.getElementById("female-OW-stomach").style.backgroundPosition;
var splitstomach = stomach_pos.split(" ");
i = splitstomach[0];
k = splitstomach[1];
o_xpos = parseInt(i);
o_ypos = parseInt(k);  

var breasts1_pos = document.getElementById("female-OW-breasts").style.backgroundPosition;
var splitbreasts1 = breasts1_pos.split(" ");
e = splitbreasts1[0];
f = splitbreasts1[1];
e_xpos = parseInt(e);
xpos = parseInt(f); 

var legs_pos = document.getElementById("female-OW-legs").style.backgroundPosition;
var splitlegs = legs_pos.split(" ");
l = splitlegs[0];
m = splitlegs[1];
z_xpos = parseInt(l);
z_ypos = parseInt(m);  
head = document.getElementById('female-OW-head').style.top; //head pos
heap = parseInt(head);


document.getElementById("head-pos").setAttribute("value", ""+xpos+ ", " +ypos+"");  
document.getElementById("neckheight-pos").setAttribute("value", "top: " +heap+""); 
document.getElementById("neckwidth-pos").setAttribute("value", ""+k_xpos+ ", " +k_xpos+"");   
document.getElementById("neckshape-pos").setAttribute("value", ""+k_xpos+ ", " +k_xpos+"");   
document.getElementById("bust-pos").setAttribute("value", ""+e_xpos+ ", " +xpos+"");   
document.getElementById("arms-pos").setAttribute("value", ""+xpos+ ", " +ypos+"");  
document.getElementById("shoulders-pos").setAttribute("value", ""+xpos+ ", " +ypos+"");    
document.getElementById("shoulderwidth-pos").setAttribute("value", ""+xpos+ ", " +ypos+"");
document.getElementById("stomach-pos").setAttribute("value", ""+o_xpos+ ", " +o_ypos+"");    
document.getElementById("legs-pos").setAttribute("value", ""+z_xpos+ ", " +z_ypos+""); 
document.getElementById("hips-pos").setAttribute("value", ""+z_xpos+ ", " +z_ypos+"");     
//document.getElementById("bottom-pos").setAttribute("value", ""+p_xpos+ ", " +p_ypos+"");  
}
</script>