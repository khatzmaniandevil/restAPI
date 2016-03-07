<?php
require_once 'restapi.class.php';
require_once 'person.php';
class Controller extends RestApi
{
protected $User;
public function __construct($request, $origin) {
	parent::__construct($request);
}
protected function person(){
	switch($this->method){
	case 'GET':
		if(!count($this->args)){
			return Person::getAll();
		}else{
			return Person::find($this->args[0]);
		}
	break;
	case 'POST':
		if(!count($this->args)){
			Person::create();
		}else{
			return Person::update($this->args[0]);
		}
	break;
	case 'DELETE':
		return Person::delete($this->args[0]);
	break;
	}
 }
 }