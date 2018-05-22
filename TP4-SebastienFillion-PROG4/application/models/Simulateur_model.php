<?php
class Simulateur_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_element($id)
	{
		$query = $this->db->get_where('element', array('pas_de_temps_pas_de_temps_id' => $id));
		
		return $query->result();
	}
	
	public function get_pas_de_temps_id($id, $pt)
	{
		$query = $this->db->get_where('pas_de_temps', array('scenario_scenario_id' => $id, 'pas_de_temps' => $pt));
	
		return $query->row_array();
	}
	
	public function get_pas_de_temps($id)
	{
		$query = $this->db->get_where('pas_de_temps', array('scenario_scenario_id' => $id));
		
		return $query->result();
	}

	public function get_simulation($sim)
	{
		if($sim == false)
		{
			$query = $this->db->get_where('scenario');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('scenario', array('scenario_nom' => $sim));
		
		return $query->row_array();
	}

	public function set_simulation($donne)
	{
		
		$query3 = $this->db->query('SELECT scenario_nom FROM scenario WHERE scenario_nom="'. $donne[0]['nom_scenario'] . '"');
		
		foreach ($query3->result() as $row2)
		{
			$name = $row2->scenario_nom;
		}
		
		if($name != $donne[0]['nom_scenario'])
		{
		$data = array(
				'scenario_nom' => $donne[0]['nom_scenario'],
				'size_x' => $donne[0]['sizeX'],
				'size_y' => $donne[0]['sizeY']
		);
		
		$this->db->insert('scenario', $data);
		}
		
		$query = $this->db->query('SELECT scenario_id FROM scenario WHERE scenario_nom="'. $donne[0]['nom_scenario'] . '"');
		foreach ($query->result() as $row)
		{
			$num = $row->scenario_id;
		}
		
		$data2 = array(
				'pas_de_temps' => $donne[0]['pas_de_temps'],
				'scenario_scenario_id' => $num
		);
		
		$this->db->insert('pas_de_temps', $data2);
		
		$query2 = $this->db->query('SELECT pas_de_temps_id FROM pas_de_temps WHERE scenario_scenario_id="'. $num . '"');
		
		foreach ($query2->result() as $row)
		{
			$pas = $row->pas_de_temps_id;
		}
		
		for($i = 0; $i < 3; $i++)
		{
		$data3 = array(
				'x' => $donne[$i]['x'],
				'y' => $donne[$i]['y'],
				'vie' => $donne[$i]['vie'],
				'element_nom' => $donne[$i]['name'],
				'discriminateur' => $donne[$i]['type'],
				'pas_de_temps_pas_de_temps_id' => $pas
				
		);
		
		$this->db->insert('element', $data3);
		}
		
		
		return true;
	}
}