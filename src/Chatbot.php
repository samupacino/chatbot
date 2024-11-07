<?php

require_once('ValidadorPregunta.php');
require_once('RespuestaApiChatGPT.php');

class Chatbot{


    function responderChatbot($pregunta) {

        $validando = new ValidadorPregunta();
        
        // Verifica si la pregunta es sobre seguridad en el trabajo
        if ($validando->esTemaDeSeguridad($pregunta)) {
            // Respuesta si la pregunta es válida
            $API = new RespuestaApiChatGPT(); 
            return $API->api_chatgpt($pregunta);
        } else {
            // Respuesta para preguntas fuera de tema
            
            $status = "Recuerda que este chatbot responde exclusivamente sobre temas de seguridad en el trabajo. Por favor, reformula tu pregunta para que esté relacionada con seguridad laboral.";
            return json_encode(['status' => $status]);
        }
    }

}
?>
