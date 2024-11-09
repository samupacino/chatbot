
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot de Seguridad en el Trabajo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
            margin: 0;
        }
        .chat-container {
            width: 100%;
            max-width: 600px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        .chat-box {
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #fafafa;
        }
        .message {
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .user-message {
            background-color: #d1e7ff;
            text-align: right;
        }
        .bot-message {
            background-color: #e2e3e5;
            text-align: left;
        }
        .input-container {
            display: flex;
        }
        .input-container input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .input-container button {
            padding: 10px 15px;
            margin-left: 5px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<form action="" method="post" id="form_seguridad">
    <div class="chat-container">
        <div class="chat-box" id="chatBox">
            <!-- Mensajes del chatbot aparecerán aquí -->
            <div class="message bot-message" id="welcomeMessage">
                ¡Hola! Soy tu asistente de seguridad en el trabajo. Estoy aquí exclusivamente para responder preguntas relacionadas con seguridad laboral. Puedes consultarme sobre procedimientos de seguridad, equipo de protección, prevención de accidentes, y temas relacionados.
            </div>
        </div>
        <div class="input-container">
            <input type="text" name = "userInput" id="userInput" placeholder="Escribe tu pregunta aquí...">
            <button type="submit" onclick="">Enviar</button>
        </div>
    </div>
</form>

<script>

    window.addEventListener('load', function(evento) {
        
        var form_seguridad = document.getElementById("form_seguridad");
        form_seguridad.addEventListener('submit',function(evento_form){
            
            evento_form.preventDefault();
            ///////////////////////
            const pregunta = new FormData(document.getElementById("form_seguridad"));
            const userInput = document.getElementById("userInput").value.trim();
            
            if (userInput === "") return;
            // Agregar el mensaje del usuario a la interfaz
            const chatBox = document.getElementById("chatBox");
            const userMessage = document.createElement("div");
            userMessage.className = "message user-message";
            userMessage.textContent = userInput;
            chatBox.appendChild(userMessage);

            // Limpiar el campo de entrada de texto
            document.getElementById("userInput").value = "";

            //////////////////////////
            
            var ajax_seguridad = new XMLHttpRequest();
        

            ajax_seguridad.addEventListener('readystatechange',function(evento){
            
                if(evento.target.readyState != 4){
                    //console.log(evento.target.readyState);
                    return;
                }
            
                if(evento.target.status >= 200 && evento.target.status < 300){
                    
                    // Agregar la respuesta del chatbot a la interfaz
                    /*console.log(evento.target.responseText);
                    return;
                    */
                    var resultado = JSON.parse(evento.target.responseText);

                    const botMessage = document.createElement("div");
                    botMessage.className = "message bot-message";
              
                    if(resultado.hasOwnProperty('response')){
             
                        botMessage.textContent = resultado['response']['choices'][0]['message']['content'];
                    }else if(resultado.hasOwnProperty('error')){
                        botMessage.textContent = resultado['error'];
                    }else if(resultado.hasOwnProperty('status')){
                        botMessage.textContent = resultado['status'];
                    }
                    
                    chatBox.appendChild(botMessage);

                    // Hacer scroll hacia abajo automáticamente
                    chatBox.scrollTop = chatBox.scrollHeight;
        
                }else{
                    console.log(evento.target.responseText);
                }
            });
            ajax_seguridad.open("POST","main.php");
            ajax_seguridad.send(pregunta);

        });
    });


    
</script>

</body>
</html>
