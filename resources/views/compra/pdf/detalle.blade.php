<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Orden de Compra</title>
    <style>
        /* Estilos para la orden de compra */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            /* width: 8.5in;
            height: 11in; */
            margin: 0 auto;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
        }


        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #7cb342;
            color: #fff;
        }

        .logo {
            top: 0;
            right: 0;
            height: 4rem;
            margin-bottom: 10%;
            display: flex;
            justify-content: flex-end;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 10px;
            background-color: #f2f2f2;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Encabezado de la orden de compra -->
    <img class="logo" src="data:image/png;base64,{{ $base64_image }}" alt="Logo">
    <h1>Orden de Compra N°{{ $ordenCompra->id }}</h1>
    <div class="container">
        <table>
            <tr>
                <th>Cliente:</th>
                <td><?php echo $usuario->name . ' ' . $meta->apellido_paterno . ' ' . $meta->apellido_materno; ?></td>
            </tr>
            <tr>
                <th>Número de orden:</th>
                <td><?php echo $ordenCompra->id; ?></td>
            </tr>
            <tr>
                <th>Fecha de emisión:</th>
                <td><?php echo date('d/m/Y', strtotime($ordenCompra->created_at)); ?></td>
            </tr>
            <tr>
                <th>Región:</th>
                <td><?php echo $region->nombre_region; ?></td>
            </tr>
            <tr>
                <th>Comuna:</th>
                <td><?php echo $comuna->nombre_comuna; ?></td>
            </tr>
            <tr>
                <th>Dirección:</th>
                <td><?php echo $ordenCompra->direccion; ?></td>
            </tr>
            <!-- Artículos -->
            <tr>
                <th>Artículos:</th>
                <td>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre del producto</th>
                                <th>Cantidad</th>
                                <th>Precio pagado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos as $producto): ?>
                            <tr>
                                <td><?php if (strlen($producto->nombre_producto) > 30): ?>
                                    <div><?php echo substr($producto->nombre_producto, 0, 30); ?><br><?php echo substr($producto->nombre_producto, 30); ?></div>
                                    <?php else: ?>
                                    <?php echo $producto->nombre_producto; ?>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $producto->pivot->cantidad_orden_compra; ?></td>
                                <td>$<?php echo number_format($producto->pivot->precio_orden_compra, 0, ',', '.'); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <th>Total:</th>
                <td>$<?php echo number_format($ordenCompra->total, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <th>Envío:</th>
                <td>
                    @if ($ordenCompra->envio == 1)
                        Retiro en Tienda
                    @else
                        Envío a Domicilio
                    @endif
                </td>
            </tr>
        </table>
    </div>
    <div class="footer" style="display: flex;">
        <div style="flex: 1;">
            <p>MyS Plantas y Suculentas Chillán</p>
            <p>Pasaje Ñiquen, 2795, Chillán Chile</p>
        </div>
        <div style="flex: 1;">
            <p>+569 66 419 506</p>
            <p>contacto@mysplantaschillan.cl</p>
        </div>
    </div>

    <div class="footer">
        <div style="display: flex;"">
            <div style="display: flex; justify-content: flex-start;">
                <p>MyS Plantas y Suculentas Chillán</p>
                <p>Pasaje Ñiquen, 2795, Chillán Chile</p>
            </div>
            <div style="display: flex; justify-content: flex-end;">
                <p>+569 66 419 506</p>
                <p>contacto@mysplantaschillan.cl</p>
            </div>
        </div>
    </div>

</body>

</html>
