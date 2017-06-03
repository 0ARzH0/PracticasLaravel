<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
</head>
<body>
    <form action="{{url('formulario/')}}" method="GET">
    <input type="text" name="saluda" placeholder="Saluda">
    <button type="submit">Enviar</button>
    {{csrf_field()}}
    </form>    
</body>
</html>