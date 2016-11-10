window.onload = function(){

	var lower = document.getElementById("lower");
	var higher = document.getElementById("higher");
	var score = document.getElementById("score");
	var num = document.getElementById("num");
	var end = document.getElementById("end");
	var gameover = false;

	function start(choice){
		if(gameover === false){
			if(check(choice) === true){
				score.innerHTML = parseInt(score.innerHTML)+1;
			}else{
				end.innerHTML="GAME OVER";
				gameover=true;
			}
		}
	}

function check(choice){
	var current_value = parseInt(num.innerHTML);
	num.innerHTML=get_random_values();
	var next_value=parseInt(num.innerHTML);

	if(choice === "lower"){

		return(next_value < current_value) ? true : false;
	}else{

		return(current_value < next_value)? true : false;
	}

	}

	function get_random_values(){
		var current_value=parseInt(num.innerHTML);
		var next_value = Math.floor(Math.random()*100);
		return(current_value === next_value)? get_random_values (): next_value ;
	}

	lower.onclick=function(){
		start("lower");
	};

	higher.onclick=function(){
		start("higher");
	}
}
