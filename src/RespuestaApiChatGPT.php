<?php
class RespuestaApiChatGPT{

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

}
?>