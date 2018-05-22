
	<head>
	<meta charset="UTF-8">
		<style>
		
div#memory_board{
			background:url(<?php echo base_url('assets/images/black-background-images8.jpg');?>);
			border:#999 1px solid;
			width:800px;
			height:980px;
			padding:24px;
			margin:0px auto;
		}
		
		
		div#card > div{
			background: url(<?php echo base_url('assets/images/The_Spoils_back.jpg');?>) no-repeat center;
			background-size: 120px 160px;
			
			width:120px;
			height:160px;
			float:left;
			
			padding:20px;
			font-size:64px;
			cursor:pointer;
			text-align:center;
		}
		</style>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/functions.js');?>"></script>
		<script>
		var showimg = "";
var imageopen = "";
var pair = 0;
$(document).ready(function() {
    $("img").hide();
    shuffle();
    $("#card div").click(function()
    {
        id = $(this).attr("id");
        if ($("#"+id+" img").is(":hidden"))
        {
            $("#"+id+" img").show();
            if (imageopen == "")
            {
                showimg = id;
                imageopen = $("#"+id+" img").attr("src");
            }
            else
            {
                currentopened = $("#"+id+" img").attr("src");
                if (imageopen != currentopened)
                {
					setTimeout(flip2Back, 700);
                    
                }
                else
                {
                    $("#"+id+" img").show();
                    $("#"+showimg+" img").show();
                    showimg = "";
                    imageopen = "";
                    pair+=1;
                }
            }
            if(pair==12)
            {
                setTimeout('finish()', 400);
            }    
        }
    });
});
function finish()
{
    var cnt1 = $("#counting").val();
    var tim=$("#timecount").val();
    alert("Bravo ! vous avez gagné ...  Temps : "+tim+" seconds");
    if(confirm("Voulez-vous encore jouer ?"))
    {
        stopCount();
        window.location.href="JeuDeMemoireImg";
    }
}
function flip2Back(){
					$("#"+id+" img").hide();
                    $("#"+showimg+" img").hide();
                    showimg = "";
                    imageopen = "";
						}
		</script>
	</head>
<body>
<div style="text-align: center; margin-top: 30px; font-size: 27px; font-weight: bold;">Jeu de mémoire</div>
<div style="text-align: center; margin-top: 25px; margin-bottom: 25px; margin-left:600px">
    <table>
        <tr>
            
            <td>
                Temps: <input type="text" id="timecount" name="time" size="6" readonly />
            </td>
        </tr>
    </table>
</div>
<div id="memory_board">
<div id="card" onclick="count();" align="center"> 
    <div id="image1" onclick="doTimer();"><img src="<?php echo base_url('assets/images/A.jpg');?>" style='display: none; border: none;' id="im"></div>
    <div id="image2" onclick="doTimer();"><img src="<?php echo base_url('assets/images/B.jpg');?>" style='display: none; border: none;' id="im1"></div>
    <div id="image3" onclick="doTimer();"><img src="<?php echo base_url('assets/images/C.jpg');?>" style='display: none; border: none;' id="im2"></div>
    <div id="image4" onclick="doTimer();"><img src="<?php echo base_url('assets/images/D.jpg');?>" style='display: none; border: none;' id="im3"></div>
    <div id="image5" onclick="doTimer();"><img src="<?php echo base_url('assets/images/E.jpg');?>" style='display: none; border: none; ' id="im4"></div>
    <div id="image6" onclick="doTimer();"><img src="<?php echo base_url('assets/images/F.jpg');?>" style='display: none; border: none; ' id="im5"></div>
    <div id="image7" onclick="doTimer();"><img src="<?php echo base_url('assets/images/G.jpg');?>" style='display: none; border: none; ' id="im6"></div>
    <div id="image8" onclick="doTimer();"><img src="<?php echo base_url('assets/images/H.jpg');?>" style='display: none; border: none; ' id="im7"></div>
    <div id="image9" onclick="doTimer();"><img src="<?php echo base_url('assets/images/I.jpg');?>" style='display: none; border: none; ' id="im8"></div>
    <div id="image10" onclick="doTimer();"><img src="<?php echo base_url('assets/images/J.jpg');?>" style='display: none; border: none; ' id="im9"></div>
    <div id="image11" onclick="doTimer();"><img src="<?php echo base_url('assets/images/K.jpg');?>" style='display: none; border: none; ' id="im10"></div>
    <div id="image12" onclick="doTimer();"><img src="<?php echo base_url('assets/images/L.jpg');?>" style='display: none; border: none; ' id="im11"></div>
    <div id="image13" onclick="doTimer();"><img src="<?php echo base_url('assets/images/A.jpg');?>" style='display: none; border: none; ' id="im12"></div>
    <div id="image14" onclick="doTimer();"><img src="<?php echo base_url('assets/images/B.jpg');?>" style='display: none; border: none; ' id="im13"></div>
    <div id="image15" onclick="doTimer();"><img src="<?php echo base_url('assets/images/C.jpg');?>" style='display: none; border: none; ' id="im14"></div>
    <div id="image16" onclick="doTimer();"><img src="<?php echo base_url('assets/images/D.jpg');?>" style='display: none; border: none; ' id="im15"></div>
    <div id="image17" onclick="doTimer();"><img src="<?php echo base_url('assets/images/E.jpg');?>" style='display: none; border: none; ' id="im16"></div>
    <div id="image18" onclick="doTimer();"><img src="<?php echo base_url('assets/images/F.jpg');?>" style='display: none; border: none; ' id="im17"></div>
    <div id="image19" onclick="doTimer();"><img src="<?php echo base_url('assets/images/G.jpg');?>" style='display: none; border: none; ' id="im18"></div>
    <div id="image20" onclick="doTimer();"><img src="<?php echo base_url('assets/images/H.jpg');?>" style='display: none; border: none; ' id="im19"></div>
	<div id="image21" onclick="doTimer();"><img src="<?php echo base_url('assets/images/I.jpg');?>" style='display: none; border: none; ' id="im20"></div>
	<div id="image22" onclick="doTimer();"><img src="<?php echo base_url('assets/images/J.jpg');?>" style='display: none; border: none; ' id="im21"></div>
	<div id="image23" onclick="doTimer();"><img src="<?php echo base_url('assets/images/K.jpg');?>" style='display: none; border: none; ' id="im22"></div>
	<div id="image24" onclick="doTimer();"><img src="<?php echo base_url('assets/images/L.jpg');?>" style='display: none; border: none; ' id="im23"></div>
	
</div>
</div>
