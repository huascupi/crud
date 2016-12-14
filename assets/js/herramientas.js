var herramienta={};
	herramienta.saluda=function(){
		alert("Hola, soy herramienta");
	};
	herramienta.nombre="Tolcito";
	herramienta.getNombre=function(){
		alert("Soy "+herramienta.nombre);
	}
	herramienta.input=function(lugar){
		$elemento=$("<div>").attr("class","form-group").append($("<label>").attr({"for":"_","class":"col-sm-2 control-label"}).text("Nombre"));
		$("body").empty().append($elemento);
	}