<?php namespace App\Models;

use CodeIgniter\Model;

class HomePostModel extends Model {
	public function agregarMueble($data) {
		$muesbles = $this->db->table("t_muebles");
		$muesbles->insert($data);
		return $this->db->insertID();
	}

	public function obtenerTodosLosMueblesModel(){
		$muesbles  = $this->db->query('SELECT * FROM t_muebles');
		return $muesbles->getResult();
	}

	public function eliminaMueble($data) {
		$muesbles = $this->db->table("t_muebles");
		$muesbles->where($data);
		$muesbles->delete();
		return json_encode(array("status" => TRUE));
	}

	public function obtenerDatosUpdate($data) {
		$muesbles = $this->db->table("t_muebles");
		$muesbles->where($data);
		return json_encode($muesbles->get()->getResultArray());
	}

	public function actualizarMueble($data) {
		$muesbles = $this->db->table("t_muebles");
		$datos = array(
					"id_mueble" => $data['id_mueble'],
					"nombre" => $data['nombre'],
					"tipo" => $data['tipo'],
					"costov" => $data['costov'],
					"costoc" => $data['costoc'],
					"fecha" => $data['fecha']
					);
		$idMueble = $data['id_mueble'];
		$muesbles->set($data);
		$muesbles->where('id_mueble', $idMueble);
		return $muesbles->update();
	}
}