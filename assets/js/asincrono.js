/*$(
	function ()
	{
		$("body").append(
			$("<nav>").attr({"class":"navbar navbar-inverse navbar-fixed-top"}).append(
				$("<div>").attr({"class":"container"}).append(
					$("<div>").attr({"class":"navbar-header"}).append(
						$("<button>").attr({"type":"button", "class":"navbar-toggle collapsed", "data-toggle":"collapse", "data-target":"#navbar", "aria-expanded":"false", "aria-controls":"navbar"}).append(
							$("<span>").attr({"class":"sr-only"}).text("Toggle navigation"),
							$("<span>").attr({"class":"icon-bar"}),
							$("<span>").attr({"class":"icon-bar"}),
							$("<span>").attr({"class":"icon-bar"})
						),
						$("<a>").attr({"class":"navbar-brand", "href":"#"}).text("App Personas")
					),
					$("<div>").attr({"class":"collapse navbar-collapse", "id":"navbar"}).append(
						$("<ul>").attr({"class":"nav navbar-nav"}).append(
							$("<li>").attr({"class":"inicio"}).append( $("<a>").text("Inicio").attr({"id":"a-inicio"}) ),
							$("<li>").append( $("<a>").text( "Nuevo"     ).attr({"id":"a-nuevo"   }) ),
							$("<li>").append( $("<a>").text( "Contacto"  ).attr({"id":"a-contacto"}) ),
							$("<li>").append( $("<a>").text( "Servicio"  ).attr({"id":"a-servicio"}) ),
							$("<li>").append( $("<a>").text( "Productos" ).attr({"id":"a-producto"}) )
						)
					)
				)
			),
			$("<div>").attr({"class":"container"}).append(
				$("<div>").attr({"class":"row"}).append(
					$("<div>").attr({"class":"col-md-8"}).append(
						$("<h1>").text("Personas")
					),
					$("<div>").attr({"class":"col-md-4"})
				)
			)
		);

		$("#a-contacto").on("click", function(){
			alert("Contacto");
		});
		$("#a-servicio").on("click", function(){
			alert("Servicio");
		});
		$("#a-nuevo").on("click", function(){
			alert("Nuevo");			
		});
		$("#a-inicio").on("click", function(){
			//alert("Inicio");
			herramienta.saluda();
			herramienta.getNombre();	
			herramienta.input("body");
		});
		$("#a-producto").on("click", function(){
			alert("Productos");
		});
	}
);*/
$(
	function ()
	{
		$("body").append(
			$("<nav>").attr({"class":"navbar navbar-inverse navbar-fixed-top"}).append(
				$("<div>").attr({"class":"container"}).append(
					$("<div>").attr({"class":"navbar-header"}).append(
						$("<button>").attr({"type":"button", "class":"navbar-toggle collapsed", "data-toggle":"collapse", "data-target":"#navbar", "aria-expanded":"false", "aria-controls":"navbar"}).append(
							$("<span>").attr({"class":"sr-only"}).text("Toggle navigation"),
							$("<span>").attr({"class":"icon-bar"}),
							$("<span>").attr({"class":"icon-bar"}),
							$("<span>").attr({"class":"icon-bar"})
						),
						$("<a>").attr({"class":"navbar-brand", "href":"#"}).text("App Personas")
					),
					$("<div>").attr({"class":"collapse navbar-collapse", "id":"navbar"}).append(
						$("<ul>").attr({"class":"nav navbar-nav"}).append(
							$("<li>").attr({"class":"inicio"}).append( $("<a>").text("Inicio").attr({"id":"a-inicio"}) ),
							$("<li>").append( $("<a>").text( "Nuevo"     ).attr({"id":"a-nuevo"   }) ),
							$("<li>").append( $("<a>").text( "Listar"     ).attr({"id":"a-listar"   }) ),
							$("<li>").append( $("<a>").text( "Contacto"  ).attr({"id":"a-contacto"}) ),
							$("<li>").append( $("<a>").text( "Servicio"  ).attr({"id":"a-servicio"}) ),
							$("<li>").append( $("<a>").text( "Productos" ).attr({"id":"a-producto"}) )
						)
					)
				)
			),
			$("<div>").attr({"class":"container"}).append(
				$("<div>").attr({"class":"row"}).append(
					$("<div>").attr({"class":"col-md-8", "id":"div-principal"}).append(
						$("<h1>").text("Personas")
					),
					$("<div>").attr({"class":"col-md-4"}).append(
						$("<button>").attr({'type':'button','class':'btn btn-primary btn-lg btn-block', 'id':'crud-nuevo'}).text('Registrar Nueva Persona')
					)

				)
			)
		);

		$("#a-inicio").on("click", function(){
			alert("Inicio");
		});

		$("#a-nuevo, #crud-nuevo").on("click", function(e){
			$("#div-principal").empty().append(
				$("<h4>").attr({"class":"text-primary"}).text("Registrar Nueva Persona"),
				$("<form>").attr({"class":"form-horizontal"}).append(
					$("<div>").attr({"class":"form-group"}).append(
						$("<label>").attr({"for":"input-paterno", "class":"col-sm-2 control-label"}).text("Paterno"),
						$("<div>").attr({"class":"col-sm-10"}).append(
							$("<input>").attr({"type":"text", "class":"form-control", "id":"input-paterno", "placeholder":"Apellido Paterno"})
						)
					)
				),
				$("<form>").attr({"class":"form-horizontal"}).append(
					$("<div>").attr({"class":"form-group"}).append(
						$("<label>").attr({"for":"input-materno", "class":"col-sm-2 control-label"}).text("Materno"),
						$("<div>").attr({"class":"col-sm-10"}).append(
							$("<input>").attr({"type":"text", "class":"form-control", "id":"input-materno", "placeholder":"Apellido Materno"})
						)
					)
				),
				$("<form>").attr({"class":"form-horizontal"}).append(
					$("<div>").attr({"class":"form-group"}).append(
						$("<label>").attr({"for":"input-nombres", "class":"col-sm-2 control-label"}).text("Nombres"),
						$("<div>").attr({"class":"col-sm-10"}).append(
							$("<input>").attr({"type":"text", "class":"form-control", "id":"input-nombres", "placeholder":"Nombres"})
						)
					)
				),
				$("<form>").attr({"class":"form-horizontal"}).append(
					$("<div>").attr({"class":"col-md-2 col-md-offset-2"}).append(
						$("<input>").attr({"type":"submit", "class":"btn", "name":"submit-nuevo", "value":"Enviar"})
					)
				)
			);
			e.preventDefault();
		});

		$("#a-listar").on("click", function(e){
			$("#div-principal").empty().append(
				$("<h4>").attr({"class":"text-primary"}).text("Listado de Personas"),
				$("<table>").attr({"class":"table"}).append(
					$("<tr>").append(
						$("<th>").text("Paterno"),
						$("<th>").text("Materno"),
						$("<th>").text("Nombres")
					)
				)
			);
			e.preventDefault();
		});	
	}
);