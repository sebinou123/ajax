<?php
class Simulation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Simulateur_model');
		$this->load->library('session');
	}
	
	public function loadXML()
	{
		
		if(!$this->ion_auth->logged_in() )
		{
			$this->load->view('templates/header');
			redirect('auth/login', 'refresh');
			$this->load->view('templates/footer');
		}
		
		$flag = false;
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->database();
		$config['upload_path'] = './input_xml/';
		$config['allowed_types'] = 'xml';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
		
			
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('templates/header');
			$this->load->view('simulation/loadXML', $error);
			$this->load->view('templates/footer');
		}
		else
		{
			$uploadData = $this->upload->data();
			$data = array('upload_data' => $this->upload->data());
			if(isset($_SESSION['nombre_fichiers']))
			{
				$_SESSION['nombre_fichiers']++;
			}
			else {
				$_SESSION['nombre_fichiers'] = 1;
			}
			$xml = simplexml_load_file ( "input_xml/" . $uploadData ['file_name'] );
			if($xml === false)
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('templates/header');
				$this->load->view('simulation/loadXML', $error);
				$this->load->view('templates/footer');
			}else{
				$this->form_validation->reset_validation();
				$num = substr($uploadData ['file_name'], 4, -4);
				$dataxml = array();
				for($i=0;$i<3;$i++)
				{
				$dataxml[$i] = array('name' => $xml->animaux->chose[$i]->name,
									 'type' => 'animal',
									 'x' => $xml->animaux->chose[$i]->coordonnees->x,
									 'y' => $xml->animaux->chose[$i]->coordonnees->y,
									 'vie' => $xml->animaux->chose[$i]->vie,
									 'pas_de_temps' => $xml->attributes()->pas_de_temps,
									 'sizeX' => $xml->sizeX,
									 'sizeY' => $xml->sizeY,
									 'nom_scenario' => $xml->attributes()->nom_scenario,
									 'num_step' => $num
				);
				}
				$this->form_validation->set_data($dataxml[0]);
				$this->form_validation->set_rules('nom_scenario', 'Nom_scenario', 'min_length[3]');
				$this->form_validation->set_rules('num_step', 'Num_step', 'callback_size');
				$this->form_validation->set_rules('sizeX', 'SizeX', 'callback_size');
				$this->form_validation->set_rules('sizeY', 'SizeY', 'callback_size');

				if ($this->form_validation->run() === FALSE)
				{
					$this->load->view('templates/header');
					$this->load->view('simulation/loadXML');
					$this->load->view('templates/footer');
					$flag = true;
				}
				else
				{
					$this->Simulateur_model->set_simulation($dataxml);
					$this->load->view('templates/header');
					$this->load->view('simulation/successXML');
					$this->load->view('templates/footer');
				}
				

			}
		}

	}
	
	public function visualiser()
	{
		$this->load->helper('form');
		$this->load->database();
		
		if($_SESSION['premiere_affichage'] == true)
		{
			$pasTemps = 0;
		}
		
			$result = $this->Simulateur_model->get_simulation($_SESSION['scenario']);
			$data['scenario'] = $result;
			
			$result = $this->Simulateur_model->get_pas_de_temps_id($_SESSION['scenario_id'], $pasTemps = 0);
			$data['pas'] = $result;
			
			$result = $this->Simulateur_model->get_element($data['pas']['pas_de_temps_id']);
			$data['element'] = $result;
		
		
		$this->load->view('templates/header');
		$this->load->view('simulation/visualiser',$data);
		$this->load->view('templates/footer');
	}
	
	public function scenario()
	{
		if(!$this->ion_auth->logged_in() )
				{          
					$this->load->view('templates/header');
					redirect('auth/login', 'refresh');  
					$this->load->view('templates/footer');
				}
				 
				$this->load->helper('form');
				$this->load->library('form_validation');
				
				$data['title'] = 'Choisir la simulation';
				
				$this->form_validation->set_rules('simulation', 'Scenario_nom', 'required');
				
				$result = $this->Simulateur_model->get_simulation(false);
	
				foreach ($result as $single)
				{
					 $options [$single ['scenario_id']] = $single ['scenario_nom'];
				}

				
				if ($this->form_validation->run() === FALSE)
				{
					$data['options']= $options;
					$this->load->view('templates/header', $data);
					$this->load->view('simulation/scenario', $data);
					$this->load->view('templates/footer');
				
				}
				else
				{
					$search = $this->input->post('simulation');
					if($search == "null")
					{
						$data['options']= $options;
						$this->load->view('templates/header', $data);
						$this->load->view('simulation/scenario', $data);
						$this->load->view('templates/footer');
					}
					else {
					$_SESSION['scenario'] = $options[$search];
					$_SESSION['scenario_id'] = $search;
					$_SESSION['premiere_affichage'] = true;
					$this->load->view('templates/header', $data);
					$this->load->view('simulation/success');
					$this->load->view('templates/footer');
					}
				}
	}

	public function size($str)
	{
		if (intval($str) < 0)
		{
			$this->form_validation->set_message('size', 'The {field} field can not under or == 0');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}