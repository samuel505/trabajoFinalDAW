<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Ajax</title>

    <!-- Libreria de JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <button onclick="ajax()">CLICK</button>

    <script>
        function ajax() {


            //funcion de ajax en JQuery
            $.ajax({

                //url que pones para ir al controlador (usando front controller)
                url: '/testRecogida',

                //metodo con el que enviar los datos (GET / POST) 
                type: 'POST',

                // contenido que envias por ajax
                data: {
                    datos: "contenido" //array, variable etc.
                },


                //si la respuesta es correcta (200) (lo que recibe del controller)
                success: function(response) {
                    console.log(response); //el mensaje que recibe de ajax (No es JSON) (array, string etc.)

                },

                //si la respuesta no es correcta (400) (lo que recibe del controller)
                error: function(error) {
                    error = JSON.parse(error.responseText);  //El mensaje que recibe de ajax (Es un JSON) (array, string etc.) 
                    
                    console.log(error);
                }

                //PD: los mensajes que sean de 'error' estan en JSON, tienes que hacerles un JSON.parse(), los de 'success' no tienes que hacerlo, los puedes usar sin JSON.parse()
            });

        }
    </script>

</body>

</html>