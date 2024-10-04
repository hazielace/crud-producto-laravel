# Proyecto CRUD Productos

Este proyecto es una aplicación Laravel para gestionar un CRUD (Crear, Leer, Actualizar, Eliminar) de productos. 

## Instalación
Clonar el repositorio o descarga el código.
Ejecutar `composer install` para instalar las dependencias.
Configurar el archivo `.env` con los datos de conexión a la base de datos.
Ejecutar las migraciones con `php artisan migrate`.
Generar clave de app `php artisan key:generate`.
Ejecutar el servidor de desarrollo con `php artisan serve`.

## Rutas
- `/productos` - Ver lista de productos.
- `/productos/add` - Crear un nuevo producto.
- `/productos/{id}` - Ver un producto específico.
- `/productos/edit/{id}` - Editar un producto.
- `/productos/delete/{id}` - Eliminar un producto.

##  Desarrollo
- Se utilizaron las validaciones de Laravel (Validate) para garantizar que los campos de precio y cantidad de stock sean positivos, también los campos de nombre y descripción se han requeridos.
- Se implementó el CRUD usando controladores, models y migrations.

## Se adjunta postman test-apis 

