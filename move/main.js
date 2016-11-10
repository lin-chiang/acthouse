window.onload = function(){

	var cv = document.getElementById("cv");

	if(cv && cv.getContext){
		var ctx = cv.getContext("2d");




		var Square = function(){
			return this.set();
		}

		Square.prototype.set = function(){
			var radian = Math.random()*(Math.PI * 360);
			this.x = cv.width*Math.random();
			this.y = cv.height*Math.random();
			this.to_x = Math.cos(radian);
			this.to_y = Math.sin(radian);
			this.speed = Math.random() * 3+2;
			this.size = Math.random()*4+1;
		}

		Square.prototype.move = function(){
			this.x += this.to_x * this.speed;
			this.y += this.to_y * this.speed;
			this.out_square_in();
		}

		Square.prototype.out_square_in = function(){
			if( this.x + this.size < 0 ) this.x = cv.width;
			if( cv.width < this.x ) this.x = 0 -this.size;
			if( this.y + this.size < 0) this.y = cv.height;
			if( cv.height < this.y) this.y = 0 -this.size;
		}





		var instances = [];

		for( var i = 1; i <= 100; i++){
			instances.push( new Square() );
		}

		function draw(){

			var p;
			ctx.fillStyle = "#000";
			ctx.fillRect( 0, 0, cv.width, cv.height);

			for (var i = 0; i < instances.length; i++){
				p = instances[i];
				ctx.fillStyle = "#FFF";
				ctx.fillRect( p.x, p.y, p.size, p.size);
				p.move();
			}
		
		}

		setInterval (draw, 30);



	}
}