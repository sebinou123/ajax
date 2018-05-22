<?php
class Pages extends CI_Controller {

        public function view($page = 'home')
        {
        	if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        	{
        		// Whoops, we don't have a page for that!
        		show_404();
        	}
        
        	$data['title'] = ucfirst($page); // Capitalize the first letter
        	
        	$this->load->view('templates/header', $data);
        	$this->load->view('pages/'.$page, $data);
        	$this->load->view('templates/footer', $data);
        }
        
        
        
        public function jeuDeDesV1()
        {
        	$this->load->view('templates/header');
        	$this->load->view('pages/jeuDeDesV1');
        	$this->load->view('templates/footer');
        }
        
        public function JeuDeMemoire()
        {
        	$this->load->view('templates/header');
        	$this->load->view('pages/JeuDeMemoire');
        	$this->load->view('templates/footer');
        }
        
        public function JeuDeMemoireImg()
        {
        	$this->load->view('templates/header');
        	$this->load->view('pages/JeuDeMemoireImg');
        	$this->load->view('templates/footer');
        }
        
        public function navigation()
        {
        	$this->load->view('templates/header');
        	$this->load->view('pages/navigation');
        	$this->load->view('templates/footer');
        }
        
        public function faq()
        {
        	$this->load->view('templates/header');
        	$this->load->view('pages/faq');
        	$this->load->view('templates/footer');
        }
        
        public function loisir()
        {
        	$this->load->view('templates/header');
        	$this->load->view('pages/loisir');
        	$this->load->view('templates/footer');
        }
        
        public function ping()
        {
        	$this->load->view('templates/header');
        	$this->load->view('pages/ping');
        	$this->load->view('templates/footer');
        }
        
        public function video()
        {
        	$this->load->model('Test_model');
        	
        	$data = array();
        	
        	$data['title'] = 'Question général jeux vidéo';
        	$data['list'] = $this->Test_model->get_data();
        	
        	
        	if($data['list'] != null)
        	{
        		$this->load->view('pages/sample_table', $data);
        	}
        	else
        	{
        		$this->load->view('templates/header');
        		$this->load->view('pages/video', $data);
        		$this->load->view('templates/footer');
        	}
        }
}
