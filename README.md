# JIP - Proyecto GPI

## Antes de clonar:
-El repositorio funciona dentro de un stack WAMP (Windows, Apache, MySQL, PHP). Para evitar dificultades,
se recomienda descargar WAMP SERVER desde su página oficial: http://www.wampserver.com/en/

-IMPORTANTE: Instalar como administrador.

-Una vez instalado WAMPSERVER, ubicar la ruta de instalación, por defecto C://wamp64, y acceder a la carpeta www dentro
de esta (C://wamp64/www)  
-Aquí se debe realizar la clonación del repositorio, con lo que la carpeta del proyecto quedaría como: C://wamp64/www/GPI2

## Importar base de datos forma automática
-Iniciar WAMPSERVER (esperar a que el ícono esté de color verde).  
-Acceder a http://localhost/GPI2/proc/cargar_bd.php  
-Si sale el mensaje "Importación finalizada", entonces se importó correctamente la base de datos.

## Para ejecutar:
-Iniciar WAMPSERVER (esperar a que el ícono esté de color verde).  
-Luego, en el navegador acceder a http://localhost/GPI2/index.php

## Datos de inicio de sesión:
-Lista de usuarios: obra, bodega, adquisicion.  
-Todas las contraseñas son 123456.

##Flujo de funcionamiento:
-Acceso con usuario obra.  
-Crear una solicitud en el menú: generar solicitud.  
-En solicitudes se puede ver la solicitud creada si es que fue creada exitosamente.  

-Acceso con usuario bodega.  
-Se puede ver en el panel de notificaciones las ordenes no completadas que tienen fecha límite dentro de los siete días siguientes, al igual que las ya expiradas.  
-Se pueden responder solicitudes pinchando en la notificacion o accediendo desde el menú: responder solicitud.  
-Se selecciona la solicitud. Si contiene una cantidad de materiales fuera de stock, se dispone de un enlace para solicitar los materiales, además se puede cambiar el estado a solicitando materiales.  
-En el enlace se solicitan los materiales faltantes, lo que crea una solicitud de adquisicion que puede ser rastreada en estado de adquisiciones.  

-Acceso con usuario adquisicion.  
-Acceder a estado de adquisiciones para ver las solicitudes realizadas por los bodegueros.  
-Acceder a una en especifico para poder responderla.  
-Se puede cambiar el estado entre en revision y aprobado sin desencadenar otros actos.  
-Al seleccionar estado entregado, se asume el material entregado y se añade al stock.  

-Acceso con usuario bodega  
-Si la solicitud de adquisicion está en estado entregado, entonces ya no saldrá el mensaje de advertencia al responder la solicitud de la obra.  
-Cambiando al estado despachado, creará una orden de despacho asociada a la solicitud, y obra podrá responderla. (además resta del stock los materiales despachados).  

-Acceso con usuario obra  
-Una vez que se despachó la orden, obra puede decir si fue recibido exitosamente o tiene material defectuoso o falta de material (en la misma solicitud puede definir esto).  
-En el primer caso, la solicitud se completa y termina el flujo.  
-En el segundo caso, el material se devuelve a stock, se cambia el estado de la solicitud a pendiente nuevamente y se vuelve a iterar.  
