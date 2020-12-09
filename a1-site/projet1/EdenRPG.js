	class Perso {
		
		constructor(type){
			this.div = document.createElement('div');
			this.div.setAttribute("class","hero");
			this.div.style.backgroundImage =`url("./img/${type}.png")`;
			this.div.style.zIndex = 999;
			document.body.appendChild(this.div);
			this.x = 0;
			this.y = 0;
		}
		
		moveLeft(){
			this.div.setAttribute("class","hero move-left");
			this.x = this.div.offsetLeft-1*speed;
			this.div.style.marginLeft = this.x+"px";
		}
		
		moveRight(){
			this.div.setAttribute("class","hero move-right");
			this.x = this.div.offsetLeft+1*speed;
			this.div.style.marginLeft = this.x+"px";
		}
		
		moveUp(){
			this.div.setAttribute("class","hero move-up");
			this.y = this.div.offsetTop-1*speed;
			this.div.style.marginTop = this.y+"px";
		}
		
		moveDown(){
			this.div.setAttribute("class","hero move-down");
			this.y = this.div.offsetTop+1*speed;
			this.div.style.marginTop = this.y+"px";
		}
		
		stopMove(){
			this.div.setAttribute("class","hero");
		}
		
	}
	
	class Mur {
		constructor(x,y,width,height, shadow){
			this.x = x;
			this.y = y;
			this.width = width;
			this.height = height;
			
			this.div = document.createElement("div");
			this.div.setAttribute("class","mur");
			this.div.style.marginLeft = x+"px";
			this.div.style.marginTop = y+"px";
			this.div.style.width = width+"px";
			this.div.style.height = height+"px";
			this.div.style.position = "absolute";
			this.div.style.backgroundImage = "url(mur.png)";
			if (shadow){
				this.div.style.boxShadow = '-5px -5px 10px black';
			}
			
			
		}
		
		charge(){
			document.body.appendChild(this.div);
		}
		
		decharge(){
			this.div.remove();
		}
		
		//Retourne vrai si le perso est en collision avec le mur faux sinon
		collision(perso){
			var p1x = perso.x;
			var p1y = perso.y+48;
			
			var p2x = perso.x+52;
			var p2y = perso.y+48;
			
			var p3x = perso.x+52;
			var p3y = perso.y+72;
			
			var p4x = perso.x;
			var p4y = perso.y+72;
			
			return  rectangleContient(this,p1x,p1y)
				 || rectangleContient(this,p2x,p2y)
				 || rectangleContient(this,p3x,p3y)
				 || rectangleContient(this,p4x,p4y);
		}
	}
	
	class Map {
	
		constructor(texture, repeat, obstacles){
			this.texture = texture;
			this.repeat = repeat;
			this.obstacles = obstacles;
		}
		
		ajouterObstacle(o){
			this.obstacles.push(o);
			o.charge();
		}
		
		charge(){
			document.body.style.backgroundImage = "url('./map/"+this.texture+".png')";
			if (this.repeat)
			document.body.style.backgroundRepeat = 'repeat';
			else document.body.style.backgroundRepeat = 'no-repeat'; 
			
			this.obstacles.forEach(function(o){
				o.charge();
			})
		}
		
		decharge(){
			this.obstacles.forEach(function(o){
				o.decharge();
			})
		}
		
		heroCanMoveLeft(hero){
			var hero2 = {x : hero.x-3, y : hero.y};
			for (var i =0;i<this.obstacles.length;i++){
				var o = this.obstacles[i];
				if (o.collision(hero2)) {
					return false;
				}
			}

			return true;
		}
		
		heroCanMoveRight(hero){
			var hero2 = {x : hero.x+3, y : hero.y};
			for (var i =0;i<this.obstacles.length;i++){
				var o = this.obstacles[i];
				if (o.collision(hero2)) {
					return false;
				}
			}

			return true;
		}	
		
		heroCanMoveUp(hero){
			var hero2 = {x : hero.x, y : hero.y-3};
			for (var i =0;i<this.obstacles.length;i++){
				var o = this.obstacles[i];
				if (o.collision(hero2)) {
					return false;
				}
			}

			return true;
		}
		
		heroCanMoveDown(hero){
			var hero2 = {x : hero.x, y : hero.y+3};
			for (var i =0;i<this.obstacles.length;i++){
				var o = this.obstacles[i];
				if (o.collision(hero2)) {
					return false;
				}
			}

			return true;
		}
	
	}
	
	//Retourne vrai si le point (px,py) est dans le rectangle faux sinon
	function rectangleContient(rect,px,py){
		return px>rect.x && px<(rect.x+rect.width) && py>rect.y && py<(rect.y+rect.height);
	}