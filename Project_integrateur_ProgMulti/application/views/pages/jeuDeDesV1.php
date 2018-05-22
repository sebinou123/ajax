<img id="image1" src="<?php echo base_url('assets/ImagesDes/1.gif');?>"> <img id="image2" src="<?php echo base_url('assets/ImagesDes/1.gif');?>">
<br/>
<br/>
<button type="button" onclick="LancerDes()">Lancez les dés !</button>
<br/>
<br/>
Total:<p id="total" style="border: 1px solid grey;"></p>Resultat:<p id="reponse" style="border: 1px solid grey;"></p>

<script>
function LancerDes() { 
document.getElementById("reponse").innerHTML  = "";
var de1 = Math.floor((Math.random() * 6 ) + 1);
var de2 = Math.floor((Math.random() * 6 ) + 1);
var total = de1 + de2;
document.getElementById("total").innerHTML  = total;
if(total == 12)
{
document.getElementById("reponse").innerHTML  = "Bravo! Vous avez le maximum possible!";
}
else if(de1 == de2)
{
document.getElementById("reponse").innerHTML  = "Bravo! Vous avez un double!";
}
else if(total == 7)
{
document.getElementById("reponse").innerHTML  = "Bravo! le 7 chanceux!";
}
afficherFace(de1,de2)
}

function afficherFace( x, y) 
{ 
switch(x)
{
case 1:
document.getElementById("image1").src = "<?php echo base_url('assets/ImagesDes/1.gif');?>";
break;
case 2:
document.getElementById("image1").src = "<?php echo base_url('assets/ImagesDes/2.gif');?>";
break;
case 3:
document.getElementById("image1").src = "<?php echo base_url('assets/ImagesDes/3.gif');?>";
break;
case 4:
document.getElementById("image1").src = "<?php echo base_url('assets/ImagesDes/4.gif');?>";
break;
case 5:
document.getElementById("image1").src = "<?php echo base_url('assets/ImagesDes/5.gif');?>";
break;
case 6:
document.getElementById("image1").src = "<?php echo base_url('assets/ImagesDes/6.gif');?>";
break;
}
switch(y)
{
case 1:
document.getElementById("image2").src = "<?php echo base_url('assets/ImagesDes/1.gif');?>";
break;
case 2:
document.getElementById("image2").src = "<?php echo base_url('assets/ImagesDes/2.gif');?>";
break;
case 3:
document.getElementById("image2").src = "<?php echo base_url('assets/ImagesDes/3.gif');?>";
break;
case 4:
document.getElementById("image2").src = "<?php echo base_url('assets/ImagesDes/4.gif');?>";
break;
case 5:
document.getElementById("image2").src = "<?php echo base_url('assets/ImagesDes/5.gif');?>";
break;
case 6:
document.getElementById("image2").src = "<?php echo base_url('assets/ImagesDes/6.gif');?>";
break;
}

}
</script>