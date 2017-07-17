<?php

class Push{
    
    private $title;
    private $message;
    
    function __construct() {
         
    }
    
    public function setTitulo($title){
        $this->title = $title;
    }
    
    public function setMensaje($message){
        $this->message =$message;
    }
    
    public function getPush() {
        $res = array();
      /*  $res['data']['title'] = $this->title;
        $res['data']['message'] = $this->message;
        $res['data']['timestamp'] = date('Y-m-d G:i:s');*/
        $res['title'] = $this->title;
        $res['message'] = $this->message;
        $res['timestamp'] = date('Y-m-d G:i:s');        
        $res['timestamp'] = date('Y-m-d G:i:s');        
        return $res;
    }
    
    
}


?>