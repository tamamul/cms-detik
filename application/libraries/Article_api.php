<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_api {

	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();

	}
	public $url_api ='http://localhost:4009/api/article';
	public $url_author ='http://localhost:4009/api/author';
		
	public function getList($start,$limit) {
	$url = $this->url_api.'?start='.$start.'&limit='.$limit;	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	$result = curl_exec($ch);
	$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if($response==200):
		return $result;
	endif;
	return FALSE;

	}

	public function save($data) {
	$url = $this->url_api.'/add';	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$data); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	$result = curl_exec($ch);
	$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if($response==200):
		return $result;
	endif;
	return FALSE;
	}

	public function deleteArt($id) {
	$url = $this->url_api.'/delete?_id='.$id;	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, DELETE);
	$result = curl_exec($ch);
	$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if($response==200):
		return $result;
	endif;
	return FALSE;
}

	public function detail($id) {
	$url = $this->url_api.'/detail?_id='.$id;	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	$result = curl_exec($ch);
	$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if($response==200):
		return $result;
	endif;
	return FALSE;
}

	public function removeAuthor($id,$author_id){
	$url = $this->url_author.'/delete?_id='.$id.'&author_id='.$author_id;	
	// print_r($url);die();
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, DELETE);
	$result = curl_exec($ch);
	$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if($response==200):
		return $result;
	endif;
	return FALSE;

	}

	public function updateArticle($data,$id){
	$url = $this->url_api.'/update?_id='.$id;	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$data); 
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, PUT);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	$result = curl_exec($ch);
	$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if($response==200):
		return $result;
	endif;
	return FALSE;

	}

	
	public function addAuthor($data){
	$url = $this->url_author.'/add';	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$data); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	$result = curl_exec($ch);
	$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if($response==200):
		return $result;
	endif;
	return FALSE;
	}
}