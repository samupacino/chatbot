<?php

require_once('Chatbot.php');
require_once('ValidadorPregunta.php');
require_once('RespuestaApiChatGPT.php');

try{
    $validador_pregunta = new ValidadorPregunta();
    $generador_respuesta = new RespuestaApiChatGPT();

    $preguntaUsuario = $_POST['userInput'];
    $chat_response =  new Chatbot( $validador_pregunta,$generador_respuesta);

    $respuestaChatbot = $chat_response->responderChatbot($preguntaUsuario);

    echo $respuestaChatbot;
}catch(Exception $e){
    echo json_encode(['status' => $e->getMessage()]);
}

?>