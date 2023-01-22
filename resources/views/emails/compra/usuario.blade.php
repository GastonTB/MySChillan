<html>
<head>
    <style>
        /* Estilos para la tabla */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            background-color: rgb(132 204 22);
            color: #ffffff;
        }
        
        th, td {
            border: 1px solid #000000;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #F7FAFC;
        }

        /* Estilos para el encabezado */
        h1 {
            text-align: center;
            font-family: Arial, sans-serif;
            color: #333333;
        }

        /* Estilos para el mensaje de agradecimiento */
        .thank-you {
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333333;
            margin-bottom: 20px;
        }

        .space-y-2 {
        margin-top: 8px;
        margin-bottom: 8px;
    }

    .break-all {
        word-break: break-all;
    }

    .font-bold {
        font-weight: bold;
    }

    .mr-2 {
        margin-right: 8px;
    }

    .flex {
        display: flex;
        align-items: center;
    }

    .space-x-2 {
        margin-left: 8px;
        margin-right: 8px;
    }

    .flex {
        display: flex;
        align-items: center;
    }
    /* tailwind font-black to css */
    .font-black {
        font-weight: 900;
    }
    </style>
</head>
<body>

    
    <p class="thank-you">
        Estimado cliente,
        <br>
        <br>
        Gracias por realizar tu compra en nuestra tienda en línea. A continuación encontrarás el detalle de tu compra:
    </p>

<table>
    <tr>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
    </tr>
    {{-- for loop from 0 to less than productos array lengt --}}
    @for ($i = 0; $i < count($productos); $i++)
        <tr>
            <td>{{$productos[$i]['nombre_producto']}}</td>
            <td>${{number_format($productos[$i]['pivot']['precio_orden_compra'], 0, ",", ".")}}</td>
            <td>{{$productos[$i]['pivot']['cantidad_orden_compra']}}</td>
        </tr>
    @endfor
    {{-- total --}}
    <tr>
        <td>Total</td>
        <td>${{number_format($total, 0, ",", ".")}}</td>
    </tr>
</table>

<br>
<h3 class="font-black border-b border-black border-opacity-10 pb-2">
    Detalles de Facturación
</h3>
<div class="break-all">
    <div class="flex">
        <p class="font-bold mr-2">
           Nombre:
        </p>
        <div class="mspace-x-2 flex break-all">
           <p> {{$orden->name}}</p> <p>&nbsp;
            {{$meta->apellido_paterno}}</p>&nbsp;
            <p>{{$meta->apellido_materno}}</p>
        </div>
    </div>
    <div class="flex">
        <p class="font-bold mr-2">
            Región: 
        </p>
        <p>
            {{$region->nombre_region}}
        </p>
    </div>
    <div class="flex">
        <p class="font-bold mr-2">
            Comuna: 
        </p>
        <p>
            {{$comuna->nombre_comuna}}
        </p>
    </div>
    <div class="flex">
        <p class="font-bold mr-2">
            Dirección: 
        </p>
        <p>
            {{$meta->direccion}}
        </p>
    </div>
    <div class="flex">
        <p class="font-bold mr-2">
            Télefono: 
        </p>
        <p>
            {{$meta->telefono}}
        </p>
    </div>
    <div class="flex break-words" style="word-wrap:break-word">
        <p class="font-bold mr-2">
            Email:
        </p>
        <p class="break-all">
            {{$orden->email}}
        </p>
    </div>
    <div class="flex break-words" style="word-wrap:break-word">
        <p class="font-bold mr-2">
            Tipo de envio:
        </p>
        <p class="break-all">
            @if($user->envio ===1)
                Retiro en tienda
            @else
                Envío a domicilio
            @endif
        </p>
    </div>
    <div class="flex break-words" style="word-wrap:break-word">
        @if($user->envio ==1)
            Retire su Compra en Pasaje Ñiquen 2795, Chillan.
            Horario de Atención: Lunes a Viernes de 10:00 a 18:00 hrs.
        @else
        El envio será manejado por Starken a la dirección que nos proporciona, el valor del envio será manejado por Starken
        @endif
    </div>
</div>

<p class="thank-you">
    Gracias por tu compra en MyS Plantas y Suculentas.</p>
</body>