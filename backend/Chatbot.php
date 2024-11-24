<?php

class Chatbot{

    protected $validador_pregunta;
    protected $generador_respuesta;

    public function __construct($validador, $generador)
    {
        $this->validador_pregunta = $validador;
        $this->generador_respuesta = $generador;
    }
    
    function responderChatbot($pregunta) {

        
        // Verifica si la pregunta es sobre seguridad en el trabajo
        if ($this->validador_pregunta->esTemaDeSeguridad($pregunta)) {
            // Respuesta si la pregunta es válida
            return $this->generador_respuesta->api_chatgpt($pregunta);
        } else {
            // Respuesta para preguntas fuera de tema
            
            $status = "Recuerda que este chatbot responde exclusivamente sobre temas de seguridad en el trabajo. Por favor, reformula tu pregunta para que esté relacionada con seguridad laboral.";
            return json_encode(['status' => $status]);
        }
    }

}
?>
