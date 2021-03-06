<?php
 class Validation
 {
 	private $_passsed = false,
 	        $_errors   = array(),
 	        $_db      = null;

 	public function __construct() {

 		$this->_db = DBHandler::getInstance();
 	}

 	public function check($source, $items = array()) {
         
         foreach ($items as $item => $rules) {
         	foreach($rules as $rule => $rule_value) {
         		
         		$value = trim($source[$item]);
         		$item  = escape($item);

         		if($rule == 'required' && empty($value)) {
         			$this->addError("{$item} field is required");
         		} else if(!empty($value)){
                     switch($rule) {

                     	case 'min':
	                     	 if(strlen($value) < $rule_value) {
	                     		$this->addError("{$item} must be a minimum of {$rule_value} characters");
	                     	 }
                     	break;

                     	case 'max':
	                          if(strlen($value) > $rule_value) {
	                     		$this->addError("{$item} can be a maximum of {$rule_value} characters");
	                     	}
                     	break;

                     	case 'matches':
                        	  if($value != $source[$rule_value]) {
                                 $this->addError("{$rule_value}s must match");

                        	  }	
                     	break;

                     	case 'unique':
                     	      $check = $this->_db->get($rule_value, array($item, '=', $value));

                     	      if($check->count()) {
                     	      	$this->addError("{$item} already exists");
                     	      }

                     	default:

                     	break;
                     }
         		}
         	}
         	
         }

         if(empty($this->_errors)) {

         	$this->_passsed = true;
         }

         return $this;
 	}
    
    private function addError($error) {
        $this->_errors[] = $error;
    }

    public function errors() {
    	return $this->_errors;
    }

 	public function passed() {
        return $this->_passsed;
    }
 }
?>