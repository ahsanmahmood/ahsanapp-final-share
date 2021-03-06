<?php

namespace App;
// Server file
class PushNotifications {
	// (Android)API access key from Google API's Console.
	private static $API_ACCESS_KEY = '';
	private static $API_ACCESS_KEY_HMH = '';
	// (iOS) Private key's passphrase.
	private static $passphrase = '';
	// (Windows Phone 8) The name of our push channel.
        private static $channelName = "";
	
	// Change the above three vriables as per your app.
	public function __construct() {
		//exit('Init function is not allowed');
	}
	
        // Sends Push notification for Android users
	public function android($data, $reg_id,$site_id = 1) {
        $url = 'https://fcm.googleapis.com/fcm/send';
        /*$message = array(
            'title' => $data['mtitle'],
            'message' => $data['mdesc'],
            'subtitle' => '',
            'tickerText' => '',
            'msgcnt' => 1,
            'vibrate' => 1,
            'data' => $data['required_data'],
        );*/
        $key = self::$API_ACCESS_KEY;
        if($site_id == 2)
        {
            $key = self::$API_ACCESS_KEY_HMH;
        }
        $headers = array(
            'Authorization:key='.$key,
            'Content-Type: application/json'
        );
        $fields = [
            "to" => $reg_id,
            /*"notification" => [
                "body" => $data['mdesc'],
                "title" => $data['mtitle'],
                "sound" => "default",
                'priority' => 'high',
                "badge" => $data['badge']
            ],*/
            "data" => $data['required_data']
        ];
        /*$fields = array(
            'registration_ids' => array($reg_id),
            'data' => $message,
        );*/
	    	return $this->useCurl($url, $headers, json_encode($fields));
    	}
	
	// Sends Push's toast notification for Windows Phone 8 users
	public function WP($data, $uri) {
		$delay = 2;
		$msg =  "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
		        "<wp:Notification xmlns:wp=\"WPNotification\">" .
		            "<wp:Toast>" .
		                "<wp:Text1>".htmlspecialchars($data['mtitle'])."</wp:Text1>" .
		                "<wp:Text2>".htmlspecialchars($data['mdesc'])."</wp:Text2>" .
		            "</wp:Toast>" .
		        "</wp:Notification>";
		
		$sendedheaders =  array(
		    'Content-Type: text/xml',
		    'Accept: application/*',
		    'X-WindowsPhone-Target: toast',
		    "X-NotificationClass: $delay"
		);
		
		$response = $this->useCurl($uri, $sendedheaders, $msg);
		
		$result = array();
		foreach(explode("\n", $response) as $line) {
		    $tab = explode(":", $line, 2);
		    if (count($tab) == 2)
		        $result[$tab[0]] = trim($tab[1]);
		}
		
		return $result;
	}
	
        // Sends Push notification for iOS users
	public function iOS($data, $devicetoken,$site_id = 1, $send_prod = 0) {
		$deviceToken = $devicetoken;
		$ctx = stream_context_create();
		// ck.pem is your certificate file
        stream_context_set_option($ctx, 'ssl', 'local_cert',  base_path('app').'/SibmePushProd.pem');
        if($site_id == 1)
        {
            //stream_context_set_option($ctx, 'ssl', 'local_cert',  base_path('app').'/SibmePushLive.pem');
        }
		else
        {
            stream_context_set_option($ctx, 'ssl', 'local_cert',  base_path('app').'/SibmePushLiveHMH.pem');
        }
		stream_context_set_option($ctx, 'ssl', 'passphrase', self::$passphrase);
		// Open a connection to the APNS server
		$fp = stream_socket_client(
        //'ssl://gateway.sandbox.push.apple.com:2195', $err,
            ($send_prod ? 'ssl://gateway.push.apple.com:2195' : 'ssl://gateway.sandbox.push.apple.com:2195'), $err,
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		if (!$fp)
                {
                exit("Failed to connect: $err $errstr" . PHP_EOL);
                }
		// Create the payload body
                if(empty($data['mtitle']) && empty($data['mdesc']))
                {
                  $body['aps'] = array(
                        'content-available' => 1 ,'alert'=>"",'badge'=>1,
//			'alert' => array(
//			    'title' => $data['mtitle'],
//                'body' => $data['mdesc'],
//			 ),
                    'data' => $data['required_data'],
                    //'sound' => 'default'
		);  
                }
                else
                {
		$body['aps'] = array(
                        'content-available' => 1 ,
			'alert' => array(
			    'title' => $data['mtitle'],
                'body' => $data['mdesc'],
			 ),
                    'data' => $data['required_data'],
                    //'sound' => 'default'
		);
                }
		// Encode the payload as JSON
		$payload = json_encode($body);
		// Build the binary notification
		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
		// Send it to the server
		$result = fwrite($fp, $msg, strlen($msg));
		// Close the connection to the server
		fclose($fp);
		if($send_prod ==0)
        {
            $this->iOS($data, $devicetoken,$site_id, 1);
        }
		if (!$result)
                {
			return 'Message not delivered' . PHP_EOL;
                }
		else
                {
			return 'Message successfully delivered' . PHP_EOL;
                }
	}
	
	// Curl 
	private function useCurl($url, $headers, $fields = null) {
	        // Open connection
	        $ch = curl_init();
	        if ($url) {
	            // Set the url, number of POST vars, POST data
	            curl_setopt($ch, CURLOPT_URL, $url);
	            curl_setopt($ch, CURLOPT_POST, true);
	            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	            // Disabling SSL Certificate support temporarly
	            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	            if ($fields) {
	                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	            }
	     
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
    
}
?>