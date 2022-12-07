<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Redes Sociais</title>


</head>

<body onload="abrirPagina()">
    <div id="whatsapp" value="{{$url}}" ></div>

    <script>
        function abrirPagina() {
            var elemento = document.getElementById("whatsapp").getAttribute('value');;
            window.open(elemento, target="_self");

        }
    </script>
</body>

</html>
