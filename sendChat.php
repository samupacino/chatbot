<?php
  function api_chatgpt($prompt){

    $ch = curl_init();
    $url = 'https://api.openai.com/v1/chat/completions';
    
    //$api_key = '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'; // replace with your key
    
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