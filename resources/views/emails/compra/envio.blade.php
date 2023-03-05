<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Confirmación de compra</title>
    <style>
        table th {
            background-color: #48bb78;
            color: #fff;
            padding: 10px;
            text-align: left;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        table tfoot td {
            font-weight: bold;
            background-color: #e2e8f0;
        }
    </style>
</head>

<body>
    <h1>MyS Plantas y Suculentas Chillan</h1>
    <h3>Su compra ya ha sido enviada</h3>
    <p>El codigo de seguimiento de envio es: {{ $codigo }}<p>
    <p>Estos son los productos que compró:</p>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($productos); $i++)
                <tr>
                    <td>{{ $productos[$i]['nombre_producto'] }}</td>
                    <td>${{ number_format($productos[$i]['pivot']['precio_orden_compra'], 0, ',', '.') }}</td>
                    <td>{{ $productos[$i]['pivot']['cantidad_orden_compra'] }}</td>
                </tr>
            @endfor
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">Total:</td>
                <td>${{ number_format($total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
    <p>Estos son los datos de tu compra:</p>
    <ul>
        <li><strong>Nombre:</strong> {{ $orden->name }} </li>
        <li><strong>Apellido paterno:</strong> {{ $meta->apellido_paterno }} </li>
        <li><strong>Apellido materno:</strong> {{ $meta->apellido_materno }}</li>
        <li><strong>Región:</strong> {{ $region->nombre_region }}</li>
        <li><strong>Comuna:</strong> {{ $comuna->nombre_comuna }}</li>
        <li><strong>Dirección:</strong> {{ $user->direccion }}</li>
        <li><strong>Correo electrónico:</strong> {{ $user->correo }}</li>
        <li><strong>Teléfono:</strong> {{ $user->telefono }}</li>
    </ul>
    <p>Gracias de nuevo por tu compra en MyS Plantas y Suculentas Chillan. Esperamos que disfrutes tus nuevos productos.
        Si tienes alguna pregunta o inquietud, no dudes en contactarnos respondiendo este correo.</p>
    <p>Atentamente,<br />El equipo de MyS Plantas y Suculentas Chillan</p>
</body>

</html>