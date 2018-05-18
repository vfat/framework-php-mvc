<?php
/*
 * App core class
 * Create url n load core controller
 * Format url - /controller/method/param
 */

class Core{
	protected $currentController='Pages';
	protected $currentMethod='index';
	protected $param=[];

	public function __construct(){
		//print_r($this->getUrl());

		$url=$this->getUrl();

		//cari contoller
		if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
			//if exists, set jadi controller
			$this->currentController=ucwords($url[0]);
			//unset
			unset($url[0]);	
		}

		//require controller
		require_once '../app/controllers/'.$this->currentController.'.php';

		//instantiate controller class
		$this->currentController=new $this->currentController;

		//cari method
		if(isset($url[1])){
			if(method_exists($this->currentController, $url[1])){
				$this->currentMethod=$url[1];

				unset($url[1]);	
			}
		}

		//get param
		$this->params=$url?array_values($url):[];

		//callback url denan array parameter
		call_user_func_array([$this->currentController,$this->currentMethod], $this->params);

	}

	public function getUrl(){
		//echo $_GET['url'];
		if(isset($_GET['url'])){
			$url=rtrim($_GET['url'],'/');
			$url=filter_var($url,FILTER_SANITIZE_URL);
			$url=explode('/',$url);
			return $url;
		}
	}
}