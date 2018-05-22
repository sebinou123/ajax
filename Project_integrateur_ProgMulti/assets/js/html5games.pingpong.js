var KEY = {
	UP: 38,
	DOWN: 40,
	W: 87,
	S: 83
}


// a global object to store all global variable we use for the game

var pingpong = {
	scoreA : 0,  // score pour le joueur A 
	scoreB : 0   // score pour le joueur B
}

// an array to remember which key is pressed and which is not.

pingpong.pressedKeys = [];

// Objet ball
pingpong.ball = {
	speed: 5,
	x: 150,
	y: 100,
	directionX: 1,
	directionY: 1
}

$(function(){
	//  ??
	pingpong.timer = setInterval(gameloop,30);
	
	//  ??
	$(document).keydown(function(e){
		pingpong.pressedKeys[e.which] = true;
    });
    $(document).keyup(function(e){
    	pingpong.pressedKeys[e.which] = false;
	});
});

// this function is called every 30 milliseconds 
function gameloop()
{
	moveBall(); 
	movePaddless();
}


function moveBall()
{
	// ??
	
	var playgroundHeight = parseInt($("#playground").height());
	var playgroundWidth = parseInt($("#playground").width());	
	var ball = pingpong.ball;
	
	// Vérifie les limites du terrain
	// Vérifie le bas
	if (ball.y +ball.speed*ball.directionY > playgroundHeight)
	{
		ball.directionY = -1;
	}
	
	// Vérifie le haut
	if (ball.y +ball.speed*ball.directionY < 0)
	{
		ball.directionY = 1;
	}
	
	// Vérifie le côté droit
	if (ball.x +ball.speed*ball.directionX > playgroundWidth)
	{
		// Perte du joueur A, cela signifie que la balle passe à côté de la raquette	
		pingpong.scoreA++;
		$("#scoreA").html(pingpong.scoreA);	
		
		// Reinitialisation de la balle
		ball.x = 250;
		ball.y = 100;
		$("#ball").css({
			"left": ball.x,
			"top" : ball.y
		});
		ball.directionX = -1;
	}
	// Vérifie le côté gauche
	if (ball.x  + ball.speed*ball.directionX < 0)
	{
		// Perte du joueur B		
		pingpong.scoreB++;
		$("#scoreB").html(pingpong.scoreB);

		// Reinitialisation de la balle
		ball.x = 150;
		ball.y = 100;
		$("#ball").css({
			"left": ball.x,
			"top" : ball.y
		});
		ball.directionX = 1;
	}
	
	// Du code 1.
	
	// Vérifie la raquette gauche
	var paddleAX = parseInt($("#paddleA").css("left"))+parseInt($("#paddleA").css("width"));
	var paddleAYBottom = parseInt($("#paddleA").css("top"))+parseInt($("#paddleA").css("height"));
	var paddleAYTop = parseInt($("#paddleA").css("top"));
	if (ball.x + ball.speed*ball.directionX < paddleAX)
	{
		if (ball.y + ball.speed*ball.directionY <= paddleAYBottom && 
			ball.y + ball.speed*ball.directionY >= paddleAYTop)
		{
			ball.directionX = 1;
		}
	}
	
	// Vérifie la raquette droite
	
	var paddleBX = parseInt($("#paddleB").css("left"));
	var paddleBYBottom = parseInt($("#paddleB").css("top"))+parseInt($("#paddleB").css("height"));
	var paddleBYTop = parseInt($("#paddleB").css("top"));
	if (ball.x + ball.speed*ball.directionX >= paddleBX)
	{
		if (ball.y + ball.speed*ball.directionY <= paddleBYBottom && 
			ball.y + ball.speed*ball.directionY >= paddleBYTop)
		{
			ball.directionX = -1;
		}
	}
	
	
	ball.x += ball.speed * ball.directionX;
	ball.y += ball.speed * ball.directionY;
	
	// faire bouger la balle avec vitesse en inclaunt la direction
	$("#ball").css({
		"left" : ball.x,
		"top" : ball.y
	});
}

	
function movePaddless()
{
	// use our custom timer to continuously check if a key is pressed. 
	if (pingpong.pressedKeys[KEY.UP])
	{
		// move the paddle B up 5 pixels
		var top = parseInt($("#paddleB").css("top"));
		$("#paddleB").css("top",top-5);	
	}
	if (pingpong.pressedKeys[KEY.DOWN])
	{
		// move the paddle B down 5 pixels
		var top = parseInt($("#paddleB").css("top"));
		$("#paddleB").css("top",top+5);
	}
	if (pingpong.pressedKeys[KEY.W])
	{
		// move the paddle A up 5 pixels
		var top = parseInt($("#paddleA").css("top"));
		$("#paddleA").css("top",top-5);
	}
	if (pingpong.pressedKeys[KEY.S])
	{
		// move the paddle A down 5 pixels
		var top = parseInt($("#paddleA").css("top"));
		$("#paddleA").css("top",top+5);			
	}
}