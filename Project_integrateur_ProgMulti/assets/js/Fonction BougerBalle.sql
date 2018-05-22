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
		// Perte du joueur B, cela signifie que la balle passe à côté de la raquette		
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
		// Perte du joueur A		
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
