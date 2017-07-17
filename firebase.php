<?php

class Firebase{
    
    
    // enviar mensaje a los suscritos a un Tema
    public function sendToTopic($destinatarios, $mensaje) {
        $fields = array(
            'to' => '/topics/' . $destinatarios,
            'data' => $mensaje,
        );
        return $this->sendPushNotification($fields);
    }
    
    
    
    private function sendPushNotification($fields){
        
        require_once __DIR__ . '/config.php';        
        
        $url = 'https://fcm.googleapis.com/fcm/send';
        
        $headers = array(
               'Authorization: key=' . FIREBASE_API_KEY,
               'Content-Type: application/json'
        );
        
        
        // Open connection
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        
         // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        // Close connection
        curl_close($ch);
 
        return $result;
        
    }
    
    
}

?>