<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->library('session');
        }


        public function view($slug = NULL)
        {
              $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
        }
        
        public function index()
        {
        	$data['news'] = $this->news_model->get_news();
        	$data['title'] = 'News archive';
        
        	$this->load->view('templates/header', $data);
        	$this->load->view('news/index', $data);
        	$this->load->view('templates/footer');
        }
		
		public function create()
		{
			if(!$this->ion_auth->logged_in() )
			{
				$this->load->view('templates/header');
				redirect('auth/login', 'refresh');
				$this->load->view('templates/footer');
			}
			
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Create a news item';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'text', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('news/create');
				$this->load->view('templates/footer');

			}
			else
			{
				$this->news_model->set_news();
				$this->load->view('templates/header', $data);
				$this->load->view('news/success');
				$this->load->view('templates/footer');
			}
		}
		
		public function erase()
		{
			if(!$this->ion_auth->logged_in() )
			{          
				$this->load->view('templates/header');
				redirect('auth/login', 'refresh');  
				$this->load->view('templates/footer');
			}
			 
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$data['title'] = 'Delete a news item';
			
			$this->form_validation->set_rules('item', 'Item', 'required');
			
			$result = $this->news_model->get_news();
			
			foreach ($result as $single)
			{
				 $options [$single ['id']] = $single ['slug'];
			}
			
			
			if ($this->form_validation->run() === FALSE)
			{
				$data['options']= $options;
				$this->load->view('templates/header', $data);
				$this->load->view('news/erase', $data);
				$this->load->view('templates/footer');
			
			}
			else
			{
				$search = $this->input->post('item');
				if($search == "null")
				{
					$data['options']= $options;
					$this->load->view('templates/header', $data);
					$this->load->view('news/erase', $data);
					$this->load->view('templates/footer');
				}
				else {
			    $this->news_model->erase_news($search);
				$this->load->view('templates/header', $data);
				$this->load->view('news/success');
				$this->load->view('templates/footer');
				}
			}
			
		}
		public function loadXML()
		{
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
			$this->load->view('news/loadXML', $error);
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
				$this->load->view('news/loadXML', $error);
				$this->load->view('templates/footer');
			}else{
				$this->form_validation->reset_validation();
				$dataxml = array('texte' => $xml->nouvelle->texte, 'slug' => $xml->nouvelle->slug);
				$this->form_validation->set_data($dataxml);
				$this->form_validation->set_rules('texte', 'Texte', 'max_length[10]|callback_texte_check');
				$this->form_validation->set_rules('slug', 'Slug', 'min_length[3]|is_unique[news.slug]|callback_slug_check');
				
				if ($this->form_validation->run() === FALSE)
				{
					$this->load->view('templates/header');
					$this->load->view('news/loadXML');
					$this->load->view('templates/footer');
				}
				else 
				{
					$this->news_model->add_news($xml);
					$this->load->view('templates/header');
					$this->load->view('news/successXML');
					$this->load->view('templates/footer');
				}
				
			}
		}
		
		}
		
		public function slug_check($str)
		{
			if ($str == 'fuck' || $str == 'merde' || $str == 'slug' || $str == 'tata' || $str == 'test' || $str == 'zutisme' )
			{
				$this->form_validation->set_message('slug_check', 'The {field} field can not be these word');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		public function texte_check($str)
		{
			if ($str == 'fuck' || $str == 'merde' || $str == 'tarouin' || $str == 'tata' || $str == 'test' || $str == 'zutisme' )
			{
				$this->form_validation->set_message('texte_check', 'The {field} field can not be these word');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
}
