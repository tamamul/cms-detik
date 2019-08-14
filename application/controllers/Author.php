<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('article_api');
		
	}

	public function remove(){
		$articleId = $this->uri->segment(3);
		$authorId = $this->uri->segment(4);
		$removeAuthor=$this->article_api->removeAuthor($articleId,$authorId);
		if($removeAuthor==FALSE):
			redirect(base_url('article'));
			else:
			redirect(base_url('article/update/'.$articleId));
		endif;
	}
	public function add(){
		$data['_id'] = $this->input->post('article_id');
		$data['name'] = $this->input->post('authorName');
		$addAuthor=$this->article_api->addAuthor(json_encode($data));
		if($addAuthor==FALSE):
			redirect(base_url('article'));
			else:
			redirect(base_url('article/update/'.$data['_id']));
		endif;
	}
}