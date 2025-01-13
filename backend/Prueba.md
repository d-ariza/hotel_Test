
Requisitos del Sistema:
Ingreso de Hoteles con Datos Básicos y Tributarios:

Nombre del Hotel: ✔️

Dirección: ✔️

Ciudad: ✔️

NIT: ✔️

Número de Habitaciones: ✔️

Asignación de Tipos de Habitación con Validación de Acomodaciones:

Estándar: Sencilla o Doble

Junior: Triple o Cuádruple

Suite: Sencilla, Doble o Triple

Verificación de Funcionalidades Implementadas
1. Modelo y Controlador de Hoteles
   Modelo Hotel:

Campos requeridos (nombre, direccion, ciudad, nit, numero_habitaciones) están definidos.

Controlador HotelController:

Métodos index, store, show, update y destroy están implementados para manejar operaciones CRUD.

2. Modelo y Controlador de Tipos de Habitación
   Modelo TipoHabitacion:

Campo tipo está definido.

Relación con Acomodacion está definida.

Controlador TipoHabitacionController:

Métodos index, store, show, update y destroy están implementados para manejar operaciones CRUD.

3. Modelo y Controlador de Acomodaciones
   Modelo Acomodacion:

Campos requeridos (tipo_habitacion_id, tipo) están definidos.

Relación con TipoHabitacion está definida.

Controlador AcomodacionController:

Métodos index, store, show, update y destroy están implementados para manejar operaciones CRUD.

Validaciones específicas para acomodaciones según el tipo de habitación están implementadas en store y update.


Criterios Técnicos de Aceptación

1. La aplicación debe ser totalmente RESTFULL
   Verificación: Hemos implementado controladores con métodos estándar para CRUD (Crear, Leer, Actualizar, Eliminar) y asegurado que las rutas sigan las convenciones RESTful.

Ejemplo: Métodos como index, store, show, update, y destroy en nuestros controladores cumplen con este criterio.

2. El back y el front deben estar desacoplados
   Verificación: desarrollando el backend en PHP con Laravel, y el frontend  desarrollado usando frameworks como React. Esto asegura que el backend y el frontend estén desacoplados.

3. El back debe ser en PHP
   Verificación:  backend está implementado en PHP utilizando Laravel.

4. Entregar la documentación del proyecto que considere importante (por ejemplo: diagramas UML)
   Verificación: Asegúrate de incluir documentación completa en el repositorio del proyecto, incluyendo diagramas UML, guías de configuración, y cualquier otra documentación relevante.

5. La base de datos debe ser postgresql
   Verificación: Esto se puede hacer en el archivo .env.
