<?php

/**
 * [$firstAppRouting Closure to internal routing, needed in all internal routes]
 * To create a internal routing use $NAMERouting = function($router, $prefix){$router->addRoutes(array(array('GET','/'.$prefix, 'start.index')));}
 */
$AuthRouting = function($router, $prefix){

  $router->addRoutes(array(
    array('GET','/'.$prefix, 'auth.index','moonlight/auth/controllers')
  ));

}
?>
