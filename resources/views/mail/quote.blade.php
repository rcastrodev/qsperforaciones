<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, th, td{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Solicitud de cotización desde el sitio web</h2>
    <div>
        <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Teléfono:</strong> {{ $data['telefono'] }}</p>
        @isset($data['trabajo'])
            <p><strong>trabajo:</strong> {{ $data['trabajo'] }}</p>
        @endisset
        @isset($data['tipo_trabajo'])
            <p><strong>Trabajo:</strong> {{ $data['tipo_trabajo'] }}</p>
        @endisset
        @isset($data['cantidad'])
            <p><strong>Cantidad:</strong> {{ $data['cantidad'] }}</p>
        @endisset
        @isset($data['diametro'])
            <p><strong>Diametro:</strong> {{ $data['diametro'] }}</p>
        @endisset
        @isset($data['longitud'])
            <p><strong>Longitud:</strong> {{ $data['longitud'] }}</p>
        @endisset
        @isset($data['descripcion'])
            <p><strong>Descripción:</strong> {{ $data['descripcion'] }}</p>
        @endisset
    </div>     
</body>
</html>