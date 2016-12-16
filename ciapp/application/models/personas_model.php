<?php //Etiqueta de inicio de PHP

/*
|--------------------------------------------------------------------------
| Modelo "PERSONA MODEL"
|--------------------------------------------------------------------------
|
| "PERSONA MODEL" es el modelos que interactua con la BASE DE DATOS (personas)
| y trabaja directamente respondiendo las instrucciones del controlador
| "PERSONAS"
|
*/
class Personas_model extends CI_Model {//Se define la clase personas como un MODELO

	public function listar(){//Creación del método(función) "LISTAR PERSONA"

		if ($consulta = $this->db->query("select * from personas")) {//Preguntamos si la consulta "SELECT" es correcta

			$response["success"]=TRUE;//Validamos la respuesta de la BASE DE DATOS
			$response["items"]=$consulta->result_array();//Guardamos en array la respuesta de la BASE DE DATOS
			return $response;//Devolvemos la respuesta de la BASE DE DATOS
		}
		return FALSE;//En caso contrario devolvemos FALSO
	}

	public function guardar_persona($datos){//Creación del método(función) "GUARDAR PERSONA"

		if($this->db->query("insert into personas set dni='{$datos["dni"]}',nombres='{$datos["nombres"]}',paterno='{$datos["paterno"]}',materno='{$datos["materno"]}',f_nac='{$datos["f_nac"]}',l_nac='{$datos["l_nac"]}'")){//Preguntamos si la consulta "INSERT" es correcta

			return TRUE;//Devolvemos TRUE
		}else{

			return FALSE;//En caso contrario devolvemos FALSE
		}
	}

	public function modificar($id){//Creación del método(función) "MODIFICAR PERSONA"
		if ($consulta = $this->db->query("select * from personas where id=$id")) {//Preguntamos si la consulta "SELECT (ID específico)" es correcta

			return $consulta->row_array();//Devolvemos en un array la respuesta de la BASE DE DATOS
		}
		return FALSE;//En caso contrario devolvemos FALSE
	}

	public function eliminar($id){//Creación del método(función) "ELIMINAR PERSONA"

		$sql="delete from personas where id=$id";//Pedimos y guardamos la consulta "DELETE (ID específico)" en '$sql'
		if ($this->db->query($sql)) {//Preguntamos si "DELETE" es correcto

			return TRUE;//Devolvemos TRUE
		}else{

			return FALSE;//En caso contrario devolvemos FALSE
		}
	}

	public function guardar_cambios($datos){//Creación del método(función) "GUARDAR CAMBIOS"

		$sql="update personas set dni='{$datos["dni"]}',nombres='{$datos["nombres"]}',paterno='{$datos["paterno"]}',materno='{$datos["materno"]}',f_nac='{$datos["f_nac"]}',l_nac='{$datos["l_nac"]}' where id={$datos['Id']}";//Pedimos y guardamos la consulta "UPDATE" en '$sql'
		if ($consulta = $this->db->query($sql)) {//Preguntamos si "UPDATE" es correcto

			return TRUE;//Devolvemos TRUE
		}
		return FALSE;//En caso contrario devolvemos FALSE
	}
}




