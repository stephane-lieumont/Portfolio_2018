<?php
	class Validator{		
		private $data = array();
		private $errors = array();
		
		public function __construct($data){
			$this->data = $data;			
		}
		
		public function check($name, $rule, $err_mess){
			$validator = "validate_$rule";
			if(!$this->$validator($name)){
				$this->errors[$name] = $err_mess;	
			}
		}
		
		public function validate_required($name){
			return isset($this->data[$name]) && $this->data[$name] != '';
		}
		
		public function validate_email($name){
			return isset($this->data[$name]) && filter_var($this->data[$name], FILTER_VALIDATE_EMAIL);
		}
		
		public function errors(){
			return $this->errors;
		}
		
		public function pop_errors(){
			if(isset($this->data['errors'])){
			    $text = '';

                foreach ($this->data['errors'] as $value){
                    $text .= '<span class="help-block has-error">'.$value.'</span>';
                }

				return '<div>'.$text.'</div>';


			}else if(isset($this->data['success'])){
				return '<div><span class="help-block has-success">Votre Email a bien été envoyé</span></div>';
			}else{
			    return false;
            }
		}
	}