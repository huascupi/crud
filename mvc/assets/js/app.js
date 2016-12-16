var app = {
	version: "0.0.1"
};

app.init = function(){
	alert("Hola App");
};

app.listado = function ()
{
	var personas = [];
	var $tabla = $("<table>").attr({class:"table table-condensed"}).append(
		$("<tr>").append(
			$("<th>").text("Id"),
			$("<th>").text("Paterno"),
			$("<th>").text("Materno"),
			$("<th>").text("Nombres"),
			$("<th>").text(""),
			$("<th>").text("")
		)
	);
	$("#div-contenido2").append(
		$("<h1>").text("CRUD Personas"),
		$tabla
	);
	$.ajax({
		type: "post",
		url: "getPersonas",
		dataType: 'json',
		success: function (response) {
			if (response.success) {
				$.each(response.items, function (id, tmp) {
					var $a_remove = $("<a>");
					$a_remove.attr({class:"a-remove", "data-id":tmp.personas_id}).append(
						$("<span>").attr({class:"glyphicon glyphicon-remove", "aria-hidden":"true"})
					);
					var $a_edit = $("<a>");
					$a_edit.attr({class:"a-edit", "data-id":tmp.personas_id}).append(
						$("<span>").attr({class:"glyphicon glyphicon-pencil", "aria-hidden":"true"})
					);
					$tabla.append(
						$("<tr>").attr({"id":"tr-" + tmp.personas_id}).append(
							$("<td>").text(tmp.personas_id),
							$("<td>").text(tmp.paterno),
							$("<td>").text(tmp.materno),
							$("<td>").text(tmp.nombres),
							$("<td>").append(
								$a_edit
							),
							$("<td>").append(
								$a_remove
							)
						)
					);
				});
				$("a.a-remove").on("click", function(e){
					$_id = $(this).data("id");
					$.ajax(
						{
							type: "post",
							url: "eliminar_asincrono",
							data:{id:$_id},
							dataType: 'json',
							success: function (response) {
								if (response.success) {
									$("#tr-"+$_id).fadeOut("slow");
								} else {
								}
							}
						}
					);
					e.preventDefault();
				});
				$("a.a-edit").on("click", function(e){
					$.ajax({
						type: "post",
						url: "modificar_asincrono",
						data: {id: $(this).data("id")},
						dataType: 'json',
						success: function (response) {
							if (response.success) {
								app.editar(response.persona);
							} else {
								$("#div-contenido2").html(
									$("<div>").attr({class:"alert alert-danger"}).text("No fue posible editar informacion")
								);
							}
						}
					});

					e.preventDefault();
				});

			} else {
			}
		}
	});

}

app.nuevo = function ()
{

	var $formulario = $("<form>").attr(
			{
				id: "frm-nuevo",
				name: "frm-nuevo",
				class:"form-horizontal"
			}
		);

	$formulario.append(
		$("<div>")
			.attr( { class:"form-group" } )
			.append(
				$("<label>").attr({for:"txtPaterno", class:"col-sm-2 control-label"}).text("Paterno"),
				$("<div>").attr({class:"col-sm-10"}).append(
					$("<input>").attr({type:"text", class:"form-control", id:"txtPaterno", placeholder:"Apellido Paterno", name:"txtPaterno"})
				)
			),
		$("<div>")
			.attr( { class:"form-group" } )
			.append(
				$("<label>").attr({for:"txtMaterno", class:"col-sm-2 control-label"}).text("Materno"),
				$("<div>").attr({class:"col-sm-10"}).append(
					$("<input>").attr({type:"text", class:"form-control", id:"txtMaterno", placeholder:"Apellido Materno", name:"txtMaterno"})
				)
			),
		$("<div>")
			.attr( { class:"form-group" } )
			.append(
				$("<label>").attr({for:"txtNombres", class:"col-sm-2 control-label"}).text("Nombres"),
				$("<div>").attr({class:"col-sm-10"}).append(
					$("<input>").attr({type:"text", class:"form-control", id:"txtNombres", placeholder:"Nombres", name:"txtNombres"})
				)
			),
		$("<div>")
			.attr( { class:"form-group" } )
			.append(
				$("<div>").attr({class:"col-sm-offset-2 col-sm-10"}).append(
					$("<button>").attr({class:"btn btn-primary", id:"btnGuardar", name:"btnGuardar"}).text("Guardar")
				)
			)
	);

	$("#div-contenido2").append(
		$("<h1>").text("Nueva Persona"),
		$formulario
	);


	$("#btnGuardar").on("click", function (e) {
		$.ajax({
			type: "post",
			url: "setPersonas",
			data: {
						txtPaterno: $("#txtPaterno").val(),
						txtMaterno: $("#txtMaterno").val(),
						txtNombres: $("#txtNombres").val()
				},
			dataType: 'json',
			success: function (a) {
				if (a.success) {
					$("#div-contenido2").html(
						$("<div>").attr({class:"alert alert-success"}).text("Nueva Persona Guardado Correctamente")
					);
				} else {
					$("#div-contenido2").html(
						$("<div>").attr({class:"alert alert-danger"}).text("No fue posible guardar informacion")
					);
				}
			}
		});
		e.preventDefault();
	});

}

app.editar = function (persona)
{

	var $formulario = $("<form>").attr(
			{
				id: "frm-editar",
				name: "frm-editar",
				class:"form-horizontal"
			}
		);

	$formulario.append(
		$("<input>").attr({type:"hidden",id:"txtId", name:"txtId", value:persona.personas_id}),
		$("<div>")
			.attr( { class:"form-group" } )
			.append(
				$("<label>").attr({for:"txtPaterno", class:"col-sm-2 control-label"}).text("Paterno"),
				$("<div>").attr({class:"col-sm-10"}).append(
					$("<input>").attr({type:"text", class:"form-control", id:"txtPaterno", placeholder:"Apellido Paterno", name:"txtPaterno", value:persona.paterno})
				)
			),
		$("<div>")
			.attr( { class:"form-group" } )
			.append(
				$("<label>").attr({for:"txtMaterno", class:"col-sm-2 control-label"}).text("Materno"),
				$("<div>").attr({class:"col-sm-10"}).append(
					$("<input>").attr({type:"text", class:"form-control", id:"txtMaterno", placeholder:"Apellido Materno", name:"txtMaterno", value:persona.materno})
				)
			),
		$("<div>")
			.attr( { class:"form-group" } )
			.append(
				$("<label>").attr({for:"txtNombres", class:"col-sm-2 control-label"}).text("Nombres"),
				$("<div>").attr({class:"col-sm-10"}).append(
					$("<input>").attr({type:"text", class:"form-control", id:"txtNombres", placeholder:"Nombres", name:"txtNombres", value:persona.nombres})
				)
			),
		$("<div>")
			.attr( { class:"form-group" } )
			.append(
				$("<div>").attr({class:"col-sm-offset-2 col-sm-10"}).append(
					$("<button>").attr({class:"btn btn-primary", id:"btnGuardar", name:"btnGuardar"}).text("Guardar")
				)
			)
	);

	$("#div-contenido2").append(
		$("<h1>").text("Nueva Persona"),
		$formulario
	);


	$("#btnGuardar").on("click", function (e) {
		$.ajax({
			type: "post",
			url: "guarda_asincrono",
			data: {
						txtId: $("#txtId").val(),
						txtPaterno: $("#txtPaterno").val(),
						txtMaterno: $("#txtMaterno").val(),
						txtNombres: $("#txtNombres").val()
				},
			dataType: 'json',
			success: function (a) {
				if (a.success) {
					$("#div-contenido2").empty();
					app.listado();
				} else {
					$("#div-contenido2").html(
						$("<div>").attr({class:"alert alert-danger"}).text("No fue posible guardar cambios")
					);
				}
			}
		});
		e.preventDefault();
	});

}


$(
	function () {
		app.listado();
	}
);