<html>
<head>
    <title>Firebase Cloud Messaging</title>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        error_reporting(-1);
        ini_set('display_errors', 'On');
    
        require_once __DIR__ . '/firebase.php';
        require_once __DIR__ . '/push.php';
    
    
       $firebase = new Firebase();
       $push = new Push();
    
     // notification title
        $title = isset($_GET['title']) ? $_GET['title'] : '';
         
        // notification message
        $message = isset($_GET['message']) ? $_GET['message'] : '';
         
        // push type - single user / topic
        $push_type = isset($_GET['push_type']) ? $_GET['push_type'] : '';
    
        $push->setTitulo($title);
        $push->setMensaje($message);
        
        
    // lets add the json and response
        $json='';
        $response = '';
        
    
        if ($push_type == 'topic') {
            $json = $push->getPush();
            $response = $firebase->sendToTopic('global', $json);
        }
    
       
    ?>
    
     <form  method="get">
                <fieldset>
                    <legend>Send to Topic `global`</legend>
 
                    <label for="title1">Title</label>
                    <input type="text" id="title" name="title"  placeholder="Enter title">
 
                    <label for="message1">Message</label>
                    <textarea name="message" id="message" rows="5" placeholder="Notification message!"></textarea>
 
                   <input type="hidden" name="push_type" value="topic"/>
                    <button type="submit" class="pure-button pure-button-primary btn_send">Send to Topic</button>
                </fieldset>
    </form>
    
</body>
</html>