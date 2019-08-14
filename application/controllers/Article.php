<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('article_api');
		
	}

	public function index(){
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'article/index';
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;	

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$getData=$this->article_api->getList($data['page'],$config['per_page']);	
		if($getData==FALSE):
			$getData['response']=[];
		else:
		$getData=JSON_DECODE($getData,TRUE);
		$config['total_rows'] = $getData['row'];
		endif;
		
		$this->pagination->initialize($config);		
		$data  = array ('isi'			=> 'article/list',
						'number'		=> $data['page'],
						'item'			=> $getData['response'],
						'pagination'	=> $this->pagination->create_links());
		
		$this->load->view('template/wrapper',$data);
	}
	public function add(){
		if(isset($_POST['submit'])):
		$this->form_validation->set_rules('title', 'title', 'trim|required|min_length[10]|max_length[100]');
		$this->form_validation->set_rules('subtitle', 'subtitle', 'trim|required|min_length[10]|max_length[100]');
		$this->form_validation->set_rules('summary', 'summary', 'trim|required|min_length[20]|max_length[200]');
		$this->form_validation->set_rules('detail', 'detail', 'trim|required|min_length[50]');
		$this->form_validation->set_rules('author[]', 'author[]', 'trim|required');
		if ($this->form_validation->run() == FALSE):
		$data  = array ('isi'			=> 'article/add',
						'validation'	=> false);
		$this->load->view('template/wrapper',$data);
		else:
			$data['title'] = $this->input->post('title');
			$data['subtitle'] = $this->input->post('subtitle');
			$data['summary'] = $this->input->post('summary');
			$data['detail'] = $this->input->post('detail');
			foreach ($this->input->post('author') as $key => $value) {
				$data['author'][$key]['name']= $value;
			};
			$saveData=$this->article_api->save(json_encode($data));
			if($saveData==FALSE):
			$data  = array ('isi'			=> 'article/add',
							'status'	    => false);
			$this->load->view('template/wrapper',$data);
			else:
			$this->session->set_flashdata('success', "Data Saved !");
			redirect(base_url('/article'));
			endif;
		endif;
      
		else:
		$data  = array ('isi'			=> 'article/add');
		$this->load->view('template/wrapper',$data);
	endif;
	}

	public function delete(){
		$id = $this->uri->segment(3);
		$delData=$this->article_api->deleteArt($id);	
			if($delData==FALSE):
			$this->session->set_flashdata('failed', "Article Cant Delete !");
			else:
			$this->session->set_flashdata('success', "Article Deleted !");
			endif;
			redirect(base_url('/article'));
	}
	public function update(){
		if(isset($_POST['submit'])):
			$this->form_validation->set_rules('title', 'title', 'trim|required|min_length[10]|max_length[100]');
			$this->form_validation->set_rules('subtitle', 'subtitle', 'trim|required|min_length[10]|max_length[100]');
			$this->form_validation->set_rules('summary', 'summary', 'trim|required|min_length[20]|max_length[200]');
			$this->form_validation->set_rules('detail', 'detail', 'trim|required|min_length[50]');
			if ($this->form_validation->run() == FALSE):
			$data  = array ('isi'			=> 'article/add',
						'validation'	=> false);
			$this->load->view('template/wrapper',$data);
			else:
			$id = $this->input->post('articleid');
			$data['title'] = $this->input->post('title');
			$data['subtitle'] = $this->input->post('subtitle');
			$data['summary'] = $this->input->post('summary');
			$data['detail'] = $this->input->post('detail');
			$updateArticle=$this->article_api->updateArticle(json_encode($data),$id);
			if($updateArticle==FALSE):
			redirect(base_url('/article/update/'.$id));;
			else:
			$this->session->set_flashdata('success', "Data Saved !");
			redirect(base_url('/article'));
			endif;
		endif;
		else:
		$id = $this->uri->segment(3);
		$viewData=$this->article_api->detail($id);	
			if($viewData==FALSE):
			$this->session->set_flashdata('failed', "Article Not Found !");
			redirect(base_url('/article'));
			else:
			$data  = array ('isi'		=> 'article/update',
							'item'	    => JSON_DECODE($viewData,TRUE));
			$this->load->view('template/wrapper',$data);
			endif;
		endif;
	}

}
