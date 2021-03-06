<?php
class SOGD {
    protected $curl;
    protected $token;
    protected $result;
    
    public function __construct($token){
        $this->curl = curl_init();
        $this->token = $token;
    }       
    
    protected function Request($api, $hash, $type){
        $url = $api;
        
        $param = null;
        foreach($hash as $key => $value){
            if($param){
                $param .= '&' . $key . '=' . $value;
            }else{
                $param = $key . '=' . $value;
            }
        }
        
        if($type == 'GET'){
            curl_setopt($this->curl, CURLOPT_URL, $url . '?' . $param);
        }else{
            curl_setopt($this->curl, CURLOPT_URL, $url);
        }
        
        $header = array();
        $header[] = "public-api-token: $this->token";
        
        if($type == 'POST'){
            curl_setopt($this->curl, CURLOPT_POST, true);
        }
        
        if($type == 'PUT'){
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "PUT");
            $header[] = 'X-HTTP-Method-Override: PUT';
        }
        if($type == 'DELETE'){
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            $header[] = 'X-HTTP-Method-Override: DELETE';
        }        
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $header);
        if($type != 'GET'){
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $param);
        }
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, TRUE);
        if(!$this->result = curl_exec($this->curl)){ 
            trigger_error(curl_error($this->curl)); 
        }
    }     
}

class Publishers extends SOGD {
    private $api = 'http://so.gd/api/publisher';  
    
    public function GET($shorten){        
        $hash = array();
        $hash['shorten'] = $shorten;
        $this->Request($this->api, $hash, 'GET');
        return json_decode($this->result);
    }
    
    public function POST(){
        $data = func_get_args();
        
        $hash = array();
        $hash['urlToShorten'] = $data[0]['urlToShorten'];
        if(isset($data[0]['domain'])){
            $hash['domain'] = $data[0]['domain'];
        }
        if(isset($data[0]['myFolder'])){
            $hash['myFolder'] = $data[0]['myFolder'];
        }
        if(isset($data[0]['alias'])){
            $hash['alias'] = $data[0]['alias'];
        }
        if(isset($data[0]['adType'])){
            $hash['adType'] = $data[0]['adType'];
        }
        $this->Request($this->api, $hash, 'POST');
        return json_decode($this->result);
    }
    
    public function PUT(){
        $data = func_get_args();
        
        $hash = array();
        $hash['shorten'] = $data[0]['shorten'];
        if(isset($data[0]['newUrl'])){
            $hash['newUrl'] = $data[0]['newUrl'];
        }
        if(isset($data[0]['myFolder'])){
            $hash['myFolder'] = $data[0]['myFolder'];
        }
        if(isset($data[0]['adType'])){
            $hash['adType'] = $data[0]['adType'];
        }
        $this->Request($this->api, $hash, 'PUT');
        return json_decode($this->result);        
    }
    
    public function DELETE($shorten){
        $hash = array();
        $hash['shorten'] = $shorten;
        $this->Request($this->api, $hash, 'DELETE');
        return json_decode($this->result);        
    }
}

class ProtectionIframe extends SOGD {
    private $api = 'http://so.gd/api/protection-iframe';   
    
    public function GET($shorten){        
        $hash = array();
        $hash['shorten'] = $shorten;
        $this->Request($this->api, $hash, 'GET');
        return json_decode($this->result);
    }
    
    public function POST(){
        $data = func_get_args();
        
        $hash = array();
        $hash['urlToShorten'] = $data[0]['urlToShorten'];
        if(isset($data[0]['domain'])){
            $hash['domain'] = $data[0]['domain'];
        }
        if(isset($data[0]['myFolder'])){
            $hash['myFolder'] = $data[0]['myFolder'];
        }
        if(isset($data[0]['alias'])){
            $hash['alias'] = $data[0]['alias'];
        }
        if(isset($data[0]['adType'])){
            $hash['adType'] = $data[0]['adType'];
        }
        if(isset($data[0]['name'])){
            $hash['name'] = $data[0]['name'];
        }        
        $this->Request($this->api, $hash, 'POST');
        return json_decode($this->result);
    }
    
    public function PUT(){
        $data = func_get_args();
        
        $hash = array();
        $hash['shorten'] = $data[0]['shorten'];
        if(isset($data[0]['newUrl'])){
            $hash['newUrl'] = $data[0]['newUrl'];
        }
        if(isset($data[0]['myFolder'])){
            $hash['myFolder'] = $data[0]['myFolder'];
        }
        if(isset($data[0]['adType'])){
            $hash['adType'] = $data[0]['adType'];
        }
        if(isset($data[0]['name'])){
            $hash['name'] = $data[0]['name'];
        }        
        $this->Request($this->api, $hash, 'PUT');
        return json_decode($this->result);        
    }
    
    public function DELETE($shorten){
        $hash = array();
        $hash['shorten'] = $shorten;
        $this->Request($this->api, $hash, 'DELETE');
        return json_decode($this->result);        
    }   
}
