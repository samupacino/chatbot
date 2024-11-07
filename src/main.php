<?php

require_once('Chatbot.php');

try{

    $preguntaUsuario = $_POST['userInput'];
    $chat_response =  new Chatbot();

    $respuestaChatbot = $chat_response->responderChatbot($preguntaUsuario);

    echo $respuestaChatbot;
}catch(Exception $e){
    echo json_encode(['status' => $e->getMessage()]);
}

?>