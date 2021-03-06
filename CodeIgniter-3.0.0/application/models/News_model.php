<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_news($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('news');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}
	
	public function set_news()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text')
		);

		return $this->db->insert('news', $data);
	}
	
		public function erase_news($id)
		{
			$this->db->delete('news', array('id' => $id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
		}
		
		public function add_news($obj)
		{
			$_SESSION['nombre_nouvelle_lues']++;
			$data = array(
					'title' => $obj->nouvelle->texte,
					'slug' => $obj->nouvelle->slug,
					'text' => $obj->nouvelle->texte
			);
		
			return $this->db->insert('news', $data);
		}
}