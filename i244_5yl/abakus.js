window.onload = function() {
	var b;
	b = document.getElementsByClassName("bead");
	for (var i = 0; i < b.length; i++) {
		b[i].onclick = function() {
			changeFloat(this);
		}
	}
	
	function changeFloat(c) {
		if (window.getComputedStyle(c).getPropertyValue("float")=="right") {
				c.style.cssFloat = "left";
		} else {
				c.style.cssFloat = "right";
		}
	}
};