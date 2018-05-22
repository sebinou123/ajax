
<head>
	<meta charset="utf-8">
	<title>Ping Pong</title>
	<style>
		#playground{
			background: #e0ffe0 url(images/pixel_grid.jpg);
			width: 400px;
			height: 200px;
			position: relative;
			overflow: hidden;
		}
		#ball {
			background: #fbb;
			position: absolute;
			width: 20px;
			height: 20px;
			left: 150px;
			top: 100px;
			border-radius: 10px;
		}
		.paddle {
			background: #bbf;
			left: 50px;
			top: 70px;
			position: absolute;
			width: 30px;
			height: 70px;
		}
		#paddleB {
			left: 320px;
		}
		
		

	</style>	
</head>

	<header>
			<h1>Ping Pong</h1>
	</header>
	<div id="game">
		<div id="playground">
		<div id="scoreboard">
			<div class="score">Player A : <span id="scoreA">0</span></div>
			<div class="score">Player B : <span id="scoreB">0</span></div>
		</div>
			<div id="paddleA" class="paddle"></div>
			<div id="paddleB" class="paddle"></div>
			<div id="ball"></div>
		</div>
		<div id="spectators"></div>
	</div>
	<footer>
		Un jeu de ping pong.
	</footer>
	
	<script src="<?php echo base_url('assets/js/jQuery 1.11.0.js');?>"></script>	
	<script src="<?php echo base_url('assets/js/html5games.pingpong.js');?>"></script>