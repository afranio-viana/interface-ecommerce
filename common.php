<?php

function perform_http_request($method, $url, $data = false) {
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                $headers = array(
                    "Content-Type: application/json",
                    "Accept: application/json",
                 );
                 curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			}
			
            break;
            case "POSTT":
                curl_setopt($curl, CURLOPT_POST, 1);
    
                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    $headers = array(
                        "Content-Type: application/json",
                        "Accept: application/json",
                        "authentication:6261b111340731c54a43751e",
                     );
                     curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                }
                
                break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            
            $headers = array(
                "Content-Type: application/json",
                "Accept: application/json",
                "authentication:6261b111340731c54a43751e",
             );
             curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            
			
            break;
        case "DELET":
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE"); 
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            
            $headers = array(
                "Content-Type: application/json",
                "Accept: application/json",
                "authentication:6261b111340731c54a43751e",
             );
             curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            
			
            break;
        default:
            if ($data) {
                $url = sprintf("%s?%s", $url, http_build_query($data));
			}
    }

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //If SSL Certificate Not Available, for example, I am calling from http://localhost URL

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}