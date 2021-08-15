 <!-- Se manda a llamar el helper del header -->
 <?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/header_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Acerca de nosotros');
?>
<hr style="border: none; border-bottom: 38px solid white;">
  <div class="container">
    <!-- Título del contenido principal -->
    <h3 class="center" id="title">¿Quienes Somos?</h3>
</div>
<h5 class="center">Cocina & Café Mamá Fina es una pequeña cafetería familiar con tradición salvadoreña que va de la
 mano con la instalación y que hace recordar la gastronomía del ayer y hoy <br>
 
 Es un pequeño lugar acogedor en el centro de Soyapango que es ideal para pasar una linda comida en familia, amigos o solo, acompañado de platos típicos y con su decoración combinada también, que hace recordar las tradiciones salvadoreñas.</h5>

 <hr style="border: none; border-bottom: 38px solid white;">
  <div class="container">
    <!-- Título del contenido principal -->
    <h3 class="center" id="title">¿Por qué el nombre de
Cocina & Café Mamá Fina?
</h3>
</div>
<h5 class="center">El nombre de Cocina & café Mamá Fina se le dio por el honor a la señora Josefina Guzmán Viuda de Bonilla que ha Sido madre emprendedora y visionaria como toda buena salvadoreña que busca salir a delante y es por eso que sus hijos
 decidieron llamar al lugar así.
 </h5>
 <hr style="border: none; border-bottom: 38px solid white;">
  <div class="container">
    <!-- Título del contenido principal -->
    <h3 class="center" id="title">Nuestra Historia
</h3>
</div>
<h6 class="center">Mamá fina nació como un billar que lo creo el esposo de la señora Josefina Guzmán Vda de Bonilla, quien lo administraba hasta el año 1995 que el falleció, posteriormente a la perdida ella tenía que salir adelante pero no quería ese tipo de negocio para administrar debido a que solo quedaba ella y sus dos hijos que ya estaban mayores. Así que en ese mismo año y parte de 1996 modificaron el lugar para dejar de ser un billar y crear una pequeña pupusería, pero al ver que la demanda iba creciendo los clientes le pedían que ofreciera Otros productos para variar y en 1998 empezaron a ofrecer tortas, pero eso les impulso para que poco a poco fueran colocando más productos y fue en el 2000 que el lugar se convirtió en un chalet donde había productos enlatados, paletas, churros, sándwiches y no dejando con los que se comenzó las pupusas y tortas; pero para brindar más comodidad decidieron acoplar el lugar para que fuese un comedor y esto llevo a proporcionar más alimentos.
Pero fue en el año 2005 que el gusto de los clientes por otros platillos exigió la diversificación de productos y a Su vez una remodelación del local, es por eso que construyeron para tener un local más acogedor, agradable y bonito en donde poder llegar a consumir los sagrados alimentos.
La construcción duro 3 meses para poder tener el local con el que hoy en día contamos que es Cocina & Café Mamá Fina, y degustar con desayunos típicos, almuerzos caseros y variados todos los días, tardes típicas, pupusas, postres, servicio a domicilio y brindamos banquetes para eventos como quince años, bodas, cumpleaños, baby showers, etc.
</h6>
 


<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('acerca.js');
?>