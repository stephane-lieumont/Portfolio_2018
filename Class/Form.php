<?php
    class Form{
        private $data = [];

        public function __construct($data = []){
            $this->data = $data;
        }

        private function input($type, $name, $label){
            $value = "";

            if(isset($this->data[$name])){
                $value = $this->data[$name];
            }

            if($type == 'textarea'){
                $input = '<textarea name="'.$name.'" class="form-control" id="input'.$name.'">'.$value.'</textarea><span class="help-block"></span>';
            }else{
                $input = '<input type="'.$type.'" name="'.$name.'" class="form-control"  id="input'.$name.'" value="'.$value.'"><span class="help-block"></span>';
            }

            return '<div class="form-group"><label for="input'.$name.'">'.$label.'</label>'.$input.'</div>';
        }

        public function text($name, $label){
            return $this->input('text', $name, $label);
        }

        public function email($name, $label){
            return $this->input('email', $name, $label);
        }

        public function textarea($name, $label){
            return $this->input('textarea', $name, $label);
        }

        public function submit($label){
            return '<button type="submit" class="btn g-recaptcha"     
            data-sitekey="6LcqhfoUAAAAAGM-6MR-PRX9LEpc0fDjNFXkDF_Q"
            data-callback="onSubmit"
            data-action="submit" >'.$label.'</button>';
        }
    }