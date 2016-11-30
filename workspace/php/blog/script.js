var del = document.getElementById("delete");
if (del) {
	del.addEventListener("click", function(event){
		var result= confirm("削除してもよろしいですか？");
		if (result){
			// nop
		}else{
			event.preventDefault();
		}
	});
}
var imageIndex = 0;
document.getElementById("image")
	.addEventListener("click", function(){
		var images =
		["w650.jpg",
		"w650a.jpg",
		"w800.jpg"];
		this.src = images[imageIndex];
		if (imageIndex < 2) {
			imageIndex++;
		} else {
			imageIndex = 0;
		}
	});

document.getElementById("date").addEventListener("click", function(){
	
})