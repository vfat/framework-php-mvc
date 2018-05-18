<?php

class Pages extends Controller{
	public function __construct(){
		//echo "controller pages";
		//$this->tesModel=$this->model('Tes');//contoh load model
	} 	

	public function index(){
		$data=[
			'title'=>'hallo'
		];


		$this->view('pages/index',$data);

	}

	public function about($id){
		$data=[
			'title'=>'about us'
		];		
		$this->view('pages/about');
	}

}

?>