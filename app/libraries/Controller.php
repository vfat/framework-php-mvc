<?php
/*
 * base controller
 * load models dan views
 */

class Controller{
	//load model
	public function model($model){

		if(file_exists('../app/models/'.$model.'.php')){
			//require model file
			require_once '../app/models/'.$model.'.php';

			//Instatiate model
			return new $model();
		}else{
			//view not exist
			die('Model does not exist');
		}		

	}

	//load view
	public function view($view, $data=[]){
		//cek file view
		if(file_exists('../app/views/'.$view.'.php')){
			require_once '../app/views/'.$view.'.php';
		}else{
			//view not exist
			die('View does not exist');
		}

	}

}


?>