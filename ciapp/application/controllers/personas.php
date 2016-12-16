<?php //Etiqueta de inicio de PHP

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."/third_party/fpdf.php";

/*
|--------------------------------------------------------------------------
| Controlador "PERSONAS"
|--------------------------------------------------------------------------
|
| "PERSONAS" es el controlador de modelos y vistas.
| modelos que interactuan directamente con la base de datos	
| vistas que el usuario puede ver según manipule la pagina web
|
*/
class Personas extends CI_Controller {//Se define la clase 'Personas' como un CONTROLADOR
	
	public function listar(){//Creación del método(función) "LISTAR PERSONA"

		$this->load->model('personas_model');//Llamamos e inicializamos al modelo "PERSONAS MODEL"
		$datos["resultado"]=$this->personas_model->listar();//Pedimos y guardamos la respuesta del método(función) "LISTAR" de "PERSONAS MODEL" en '$datos' 
		$this->load->view('personas',$datos);//Con '$datos' ya recibido llamamos e inicializamos a la vista "PERSONAS"
	}

	public function nueva_persona(){//Creación del método(función) "NUEVA PERSONA"

		$this->load->view('nueva_persona');//Llamamos e inicializamos a la vista "NUEVA PERSONA"
	}

	public function modificar(){//Creación del método(función) "MODIFICAR PERSONA"

		$datos=$this->uri->segment(4);//Pedimos y guardamos el "ID (Que se encuentra en el segmento 4)" de la persona a modificar en '$datos'
		$this->load->model("personas_model");//Llamamos e inicializamos al modelo "PERSONAS MODEL"
		$persona=$this->personas_model->modificar($datos);//Pedimos y guardamos la respuesta del método(función) "MODIFICAR" de "PERSONAS MODEL" en '$persona' 
		$this->load->view("actualizar_persona",$persona);//Con '$persona' ya recibido llamamos e inicializamos a la vista "ACTUALIZAR PERSONA"
	}

	public function guardar_persona(){//Creación del método(función) "GUARDAR PERSONA"

		$datos=$this->input->post();//Pedimos y guardamos los datos de la persona nueva que ingresamos en '$datos'
		$this->load->model("personas_model");//Llamamos e inicializamos al modelo "PERSONAS MODEL"
		if($this->personas_model->guardar_persona($datos)){//Preguntamos sí '$datos' fueron correctamente ingresados por el método(función) "GUARDAR PERSONA" de "PERSONAS MODEL"

			header("Location:listar");//Cargamos el método(función) "LISTAR" (si se insertó los datos de la persona)
		}else{

			header("Location:nueva_persona");//Cargamos el método(función) "NUEVA PERSONA" (si no se insertó los datos de la persona)
		}
	}

	public function guardar_cambios(){//Creación del método(función) "GUARDAR CAMBIOS"

		$datos=$this->input->post();//Pedimos y guardamos los datos de la persona a la que actualizamos sus datos '$datos'
		$this->load->model("personas_model");//Llamamos e inicializamos al modelo "PERSONAS MODEL"
		if ($this->personas_model->guardar_cambios($datos)) {//Preguntamos sí '$datos' fueron correctamente actualizados por el método(función) "GUARDAR CAMBIOS" de "PERSONAS MODEL"

			redirect ("personas/listar");//Nos redirigimos al método(función) "LISTAR" (si se insertó los datos de la persona)
		}else{

			redirect ("personas/listar");//Nos redirigimos al método(función) "LISTAR" (si no se insertó los datos de la persona)
		}
	}

	public function eliminar(){//Creación del método(función) "ELIMINAR PERSONA"

		$datos=$this->uri->segment(4);//Pedimos y guardamos el "ID (Que se encuentra en el segmento 4)" de la persona a modificar en '$datos'
		$this->load->model('personas_model');//Llamamos e inicializamos al modelo "PERSONAS MODEL"
		if ($this->personas_model->eliminar($datos)) {//Preguntamos sí '$datos' fueron correctamente eliminados por el método(función) "ELIMINAR" de "PERSONAS MODEL"

			redirect('personas/listar');//Nos redirigimos al método(función) "LISTAR" (si se eliminó los datos de la persona)
		}else{

			echo "error";//Mostramos "ERROR" (si no se eliminó los datos de la persona)
		}
	}

	public function imprimir(){////Creación del método(función) "IMPRIMIR PERSONA"

		$this->load->model('personas_model');
		$datos=$this->personas_model->listar();
		$pdf = new FPDF();
		$pdf->AddPage();		
		$pdf->SetFont('Arial','',10);
		foreach ($datos["items"] as $id => $persona) {

			$pdf->Cell(21,5,utf8_decode($persona["dni"]),1);
			$pdf->Cell(42,5,utf8_decode($persona["nombres"]),1);
			$pdf->Cell(33,5,utf8_decode($persona["paterno"]),1);
			$pdf->Cell(33,5,utf8_decode($persona["materno"]),1);
			$pdf->Cell(31,5,utf8_decode($persona["f_nac"]),1);
			$pdf->Cell(31,5,utf8_decode($persona["l_nac"]),1);
			$pdf->Ln();
		}
		$pdf->Output();
	}
}