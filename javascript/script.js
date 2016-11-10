document.getElementById("remove-child")
.addEventListener("click", function(){
	var container = document.getElementById("container");
	var children = container.children;
	//console.log(children);
	//container.removeChild(children[2]);
	var firstChild = container.firstChild;
	var lastChild = container.lastChild;
	if (lastChild){
	container.removeChild(lastChild);
}
});

document.getElementById("add-class")
.addEventListener("click",function(){
	var e = document.createElement("div");
	e.setAttribute("class","child");
	document.getElementById("container")
	.appendChild(e);
})
document.getElementById("add-child")
.addEventListener("click",function(){
	var e = document.createElement("div");
	document.getElementById("container")
	.appendChild(e);
});
var timerId, time = 0;
document.getElementById("start")
	.addEventListener("click", function(){
		if (!timerId){
		timerId = setInterval(function(){
			document.getElementById("timer").innerHTML = time;
			time++;
		}, 1000);
	}
	});
document.getElementById("stop")
	.addEventListener("click", function(){
		clearInterval(timerId);
		timerId = null;
	});
document.getElementById("interval")
	.addEventListener("click", function(){
		setInterval(function(){
			var div = document.getElementById("div3");
			if (div.style.backgroundColor == ""){
				div.style.backgroundColor = "blue";
			} else {
				div.style.backgroundColor = "";
			}
		}, 3000)
	});
document.getElementById("delay")
	.addEventListener("click", function(){
		setTimeout(function(){
			alert("maayon buntag");
		}, 1000);
	})
var imageIndex = 0;
document.getElementById("image")
	.addEventListener("click", function(){
		var images =
		["w650.jpg",
		"w650a.jpg",
		"w650b.jpg",
		"w800.jpg"];
		this.src = images[imageIndex];
		if (imageIndex < 3) {
			imageIndex++;
		} else {
			imageIndex = 0;
		}
	});
var oldColor;
var div1 = document.getElementById("div1")
	div1.addEventListener('mouseover',function(){
	/*var div = document.getElementById("div1");*/
	oldColor=this.style.backgroundColor;
	this.style.backgroundColor = "#ffcccc";
});
	div1.addEventListener("mouseout",function(){
		this.style.backgroundColor=oldColor;
	});

var div2 = document.getElementById("div2")
	div2.addEventListener("mouseover", function(){
		if (this.style.width == "300px"){
			this.style.width="100px";
		} else {
			this.style.width="300px";
		}
		if (this.style.fontSize=="8px"){
			this.style.fontSize="40px";
		} else {
			this.style.fontSize="8px";
		}
		if (!this.style.borderRadius){
			this.style.borderRadius="10px";
		} else {
			this.style.borderRadius=null;
		}
		oldColor=this.style.backgroundColor;
		this.style.backgroundColor="purple";
	});
	div2.addEventListener("mouseover", function(){
		this.style.backgroundColor=oldColor;
	});


document.getElementById("open-self").addEventListener('click',function(){
	location.href="http://yahoo.com";
});
document.getElementById("open-new").addEventListener('click',function(){
	window.open("http://www.apple.com/ph");
});
document.getElementById("btn-while").addEventListener('click',function(){
	var from = document.getElementById("from").value;
	var to = document.getElementById("to").value;
	if (from == "" || to == "") {
		alert("数値を入力してください");
		return;
	}
	if (from> to){
		var oldFrom = from;
		from=to;
		to=oldFrom;
	}
	var num = +from;
	var total = 0;
	while(num <= +to){
		total = total + num;
		num++;
	}
	alert(from + "から" + to + "までの合計は" + total + "です");
});
document.getElementById("btn-array").addEventListener('click',function(){
	var gender = new Array();
	gender[0] = "男";
	gender[1] = "女";
	gender[2] = "不明";
	document.getElementById("array").innerHTML=gender[2];	
	var month = ["jan","Feb","Mar","Apr","May","June","July","Aug","Sep","Oct","Nov","Dec"];
	document.getElementById("array").innerHTML=month[2];
	for(var i=month.length - 1; i>0; i--) {
		console.log(month[i]);
	}
});

document.getElementById("btn-fun").addEventListener('click',function(){
	var fun = ["a","b","c","d"];
	document.getElementById("array").innerHTML=fun[1];
	for(var i=0; i<fun.length; i++){
		
		if (i == 2){
			continue;
		}
		console.log(fun[i]);
	}
});

document.getElementById("btn2").addEventListener('click', function(){
	var val=document.getElementById("text1").value;
	switch(val) {
		case '0':
			alert("0です!");
			break;
		case '1':
			alert("1です!");
		case '2':
			alert("2です!");
			break;
		case 'ネコ':
			alert("ネコ好きもほどほどに。ここは数字を入力するところです。");
			break;
		default:
			alert("0,1,2以外です!");
	}
});

document.getElementById("btn1").addEventListener('click',function(){
	var val = document.getElementById("text1").value;
	if (val == ''){
		alert("ネコを入力してください");
	} else if (val == "ネコ") {
		alert("ネコが入力されました");
	} else if (val == "ねこ") {
		alert("カタカナで入力してください");
	} else if (val == "猫") {
		alert("カタカナで入力してください");
	} else if (val == "貓") {
		alert("您是中國人嗎？");
	}	else if (val == "neko"){
		alert("わかってますね^^;");
	} else if (val == "cat") {
		alert("メリケン気取りかワレ？");
	}
	else {
		alert("ネコ以外入力しないでください")
	}
});


var p1 = document.getElementById("p1");
console.log(p1);
var clz = document.getElementsByClassName("p");
console.log(clz[1].innerHTML);
var tags = document.getElementsByTagName("p");
console.log(tags[2].innerHTML);

/*function showP1() {
	var p1=document.getElementById("p1");
	p1.innerHTML="変更された段落１";
}*/

function showP3(message, message2, message3) {
	var p1=document.getElementById("p1");
	p1.innerHTML= message;
	document.getElementById("p2");
	p2.innerHTML= message2;
	document.getElementById("p3");
	p3.innerHTML= message3
}

document.getElementById("change-01").addEventListener('onmouseover', function(){
	document.getElementById("p1").innerHTML="イベントリスナから変更";
});

var btn = document.getElementById("change-p1");
btn.addEventListener('click', function(){
	var paragraph1=document.getElementById("p1");
	paragraph1.innerHTML="にゃん";
	var paragraph2=document.getElementById("p2");
	paragraph2.innerHTML="にゃあ";
	var paragraph3=document.getElementById("p3");
	paragraph3.innerHTML="बिल्ली मैं";
});

document.getElementById("alert").addEventListener('click',function(){
  alert("Hello JavaScript !");
});

document.getElementById("confirm").addEventListener('click',function(){
  var result = confirm("今日飲みに行きますか？");
  if (result == true) {
  	alert("良いですね");
  } else {
  	alert("駄目ですね");
  }
});

document.getElementById("catcat").addEventListener('click',function(){
	var result = confirm("お好きですよね、ネコ？");
	if (result == true){
		alert("╭( ･ㅂ･)و ̑̑ ぐッ！");
	} else {
		alert("またまたご冗談を");
	}
});

document.getElementById("prompt").addEventListener('click',function(){
	var response = prompt("あなたの名前を教えてください");
	alert("ようこそ" + response + "さん！");
});
