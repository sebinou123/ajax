<?php
class Test_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function get_data(){

		$type = $this->input->post('type');

		if($type == 1){
		return array(
						'rep' => 'La ps1, qui est sortie en 1994.',
				)
		;
		}
		elseif ($type == 2)
		{
			return array(
					'rep' => 'La xbox, qui est sortie en 2001.',
			)
			;
		}
		elseif ($type == 3)
		{
		return array(
						'rep' => 'Le jeu est sorti en 2009.',
				)
		;
		}
		else {
			return array()
		;
		}
	}

}