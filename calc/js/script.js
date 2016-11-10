$(function(){
	var maxLength=8;
	var memory = "";

$("#calc").on("click",".num", function(){
	var current=$(".result").val();
	var pushed=$(this).text();
	var lastCalc="";
		if(isOpeLastMemory()
			|| !hasMemory()){
			newValue = pushed;
		} else{
			newValue = current + pushed;
			if (newValue.startsWith("0")){
				newValue = newValue.substring(1);
			}
		}

		if (newValue.length <= maxLength){
			$(".result").val(newValue);
		}
		memory=memory+pushed;
		$("#calc .clear").text("C");
	}).on("click", ".clear",function(){
		var label = $(this).text();
			if (label == "AC"){
				memory="";
				lastCalc="";
			}else {
				memory=memory.replace(/[\d]+$/, "");
				$(this).text("AC");
			}
		$(".result").val(0);
		$("#last-answer").fadeOut().text();
	}).on("click",".ope", function(){
		var lastLetter = getLastMemory();
		if (hasMemory() && isNumber(lastLetter)){
			memory=memory+$(this).text();
		} else if(!hasMemory()){
			memory=$(".result").val()+$(this).text();
		} else{
			memory = memory.substring(0, memory.length -1);
			memory = memory + $(this).text();
		}
	}).on("click", ".eq", function(){
		console.log(memory);
		if (memory.search(/[\+\-\*\/\%]/)==-1){
			if (!lastCalc){
			return;
			}
		}
		var result;
		if (isNumber(getLastMemory())){
		 result= checkOverflow(eval(memory));

		var operators = ["+", "-", "*", "/", "%"];
		var lastIndex;
		$.each(operators, function(index, value){
			var tmp=memory.lastIndexOf(value);
			if  (tmp !=-1){
				lastIndex=tmp;
				return false;
			}
		});
		lastCalc=memory.substring(lastIndex);
		$(".result").val(result);
		memory="";
	}　else if(!hasMemory()){
		var formula=$(".result").val()+lastCalc;
		result=checkOverflow(eval(formula));
		$(".result").val(result);
	}
		$("#last-answer").text(result).fadeIn();
	});

	var checkOverflow = function(result){
		if(result &&
			result.toString().length >+ maxLength){
			var strResult= result.toString();
			if (result < 1){
				result=strResult.substring(0, strResult.length -1);
			}else{
			alert("桁オーバーフロー");
			return 0;
			}
		}
		return eval(result);
	};
	var hasMemory=function(){
		return memory.length > 0;
	};
	var isNumber=function(letter){
		return letter && !isNaN(letter);
	};

	function isOpeLastMemory(){
		var lastLetter=getLastMemory();
		return lastLetter.endsWith("+")
		|| lastLetter.endsWith("-")
		|| lastLetter.endsWith("*")
		|| lastLetter.endsWith("/")
		|| lastLetter.endsWith("%")


	}
	function getLastMemory(){
		return memory.substring(memory.length - 1);
	}

	$(document).on("keyup", function(e){
		var key = e.key;
		$("#calc button:contains('"+ key +"')")
		.trigger("click");
	});
$("#calc").on("click", ".trump", function(){
	$("#calc").find(".images").fadeIn(5000).fadeOut();
});
$("#calc").on("click",".news", function(){
	var url="https://ajax.googleapis.com/ajax/services/feed/load?v=1.0&q=https://goo.gl/qj6Xei"
	$.ajax({
		url: url, dataType:"jsonp", jsonpCallback: "cb"}
		).done(function(response, textStatus, jqXHR){
			console.log(response);
			$("#news").text(response
				.responseData.feed.entries[0].title)
			.fadeIn(3000).fadeOut();
		});

	
});
});

