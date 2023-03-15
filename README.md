
# Tienda Online MyS Plantas y Suculentas Chillán

El siguiente proyecto es una tienda online desarrollada en Laravel. La tienda permite a los usuarios navegar por una lista de productos, agregarlos al carrito de compras y completar el proceso de pago utilizando diferentes métodos de pago. Además, los usuarios pueden crear una cuenta, ver su historial de compras y actualizar su información personal.

El proyecto utiliza una arquitectura de controlador de modelo de vista (MVC) y cuenta con características de seguridad implementadas, como autenticación de usuarios y protección contra ataques de falsificación de solicitudes en sitios cruzados (CSRF).

El sistema de pago se integra con API de Webpay. El panel de administración permite a los administradores agregar, editar y eliminar productos, así como ver información de ventas.

Este proyecto es altamente personalizable y puede ser utilizado como base para desarrollar cualquier tipo de tienda en línea.


## Requisitos e Instalación

Antes de comenzar, asegúrese de cumplir con los siguientes requisitos:

PHP 8.1
Servidor web como Apache o Nginx
MySQL o MariaDB
Extensiones de PHP:
php8.1-fpm
php8.1-cli
php8.1-curl
php8.1-zip
php8.1-mysql
php8.1-mbstring
php8.1-xml
php8.1-bcmath
php8.1-gd

Clonar el repositorio:
```bash
    git clone https://github.com/GastonTB/MySChillan.git
```

Moverse a la carpeta e instalar composer:
```bash
    cd MySChillan
    composer install
```

Crear un archivo .env a partir del archivo .env.example y configurar las variables de entorno para la base de datos:
```bash
    cp .env.example .env
```

Generar una nueva clave de aplicación:
```bash
    php artisan key:generate
```

Instalar npm:
```bash
    npm install
```

Ejecutar el comando npm run build para compilar los assets de la aplicación (si es necesario):
```bash
    npm run build
```
Crear base de datos con los parametros del archivo .env.

Instalar MailHog.

Ejecutar las migraciones de la base de datos y los seeders:
```bash
    php artisan migrate --seed
```

Copiar y reemplazar el archivo:
```bash
    cp app/Providers/AppServiceProvider\ copy.php app/Providers/AppServiceProvider.php
```

Ejecutar el servidor de desarrollo de Laravel:

```bash
   php artisan serve
```

Dejar corriendo las tareas programadas: 
```bash
   php artisan schedule:work
```

La aplicación estará disponible en http://localhost:8000.






## Autor

- [@Gastón Damián Toledo Becerra](https://github.com/GastonTB)

