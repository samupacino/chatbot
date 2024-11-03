<?php
  function api_chatgpt($prompt){

    $ch = curl_init();
    $url = 'https://api.openai.com/v1/chat/completions';
    
    $api_key = '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'; 
    $data = [];
    $data["model"] = "gpt-3.5-turbo";
    $data['messages'] = array([
        "role"=> "user",
        "content"=> $prompt
    ])
    ;
    $data["temperature"] = 1.0;
    $data["max_tokens"] = 20;

    $header  = [
      'Content-Type: application/json',
      'Authorization: Bearer ' . $api_key
      
    ];

    
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);


    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
      $error =  'Error: ' . curl_error($ch);
      return json_encode(['error' => $error]);
    }
    curl_close($ch);

    $response = json_decode($result);
    header("Content-Type: application/json");
    return json_encode(['response' => $response]);

  }


?>