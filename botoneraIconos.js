

function insertaBotonera(){

	document.write("<div class='btn-group'>");
	document.write("<button type='button' class='btn' onClick=\"insertaIcono('barbol.png')\"> <img src='./images/barbol.png' height='20'/></button>");
	document.write("<button type='button' class='btn' onClick=\"insertaIcono('bear.png')\"> <img src='./images/bear.png' height='20'/></button>");
	document.write("<button type='button' class='btn' onClick=\"insertaIcono('doctor.png')\"> <img src='./images/doctor.png' height='20'/></button>");
	document.write("<button type='button' class='btn' onClick=\"insertaIcono('gnomo.png')\"> <img src='./images/gnomo.png' height='20'/></button>");
	document.write("<button type='button' class='btn' onClick=\"insertaIcono('ligh.png')\"> <img src='./images/ligh.png' height='20'/></button>");
	document.write("<button type='button' class='btn' onClick=\"insertaIcono('moro.png')\"> <img src='./images/moro.png' height='20'/></button>");
	
	document.write("<button type='button' class='btn' onClick=\"insertaIcono('schooles.png')\"> <img src='./images/schooles.png' height='20'/></button>");
	document.write("<button type='button' class='btn' onClick=\"insertaIcono('trompetilla.png')\"> <img src='./images/trompetilla.png' height='20'/></button>");
	//document.write("</div>");
	//document.write("<div class='btn-group'>");
	document.write("<button type='button'  class='btn' onClick=\"insertaIcono('saco.png')\"> <img src='./images/saco.png' height='20'/></button>");
	document.write("<button type='button' class='btn' onClick=\"insertaIcono('toilet.png')\"> <img src='./images/toilet.png' height='20'/></button>");
	document.write("</div>");
}

		function insertaIcono(cadena){
			var formulario = document.getElementById("mensaje2");
			formulario.value += "<img src=\"./images/" + cadena +  "\"/>";
			formulario.focus();
		}
