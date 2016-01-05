<?php

/**
 * [$firstAppRouting Closure to internal routing, needed in all internal routes]
 * To create a internal routing use $NAMERouting = function($router, $prefix){$router->addRoutes(array(array('GET','/'.$prefix, 'start.index')));}
 */

$intRoute = function($router,$prefix){

  $router->addRoutes(array(
    array('GET','/'.$prefix, 'auth.index','moonlight/auth'),
    array('GET','/'.$prefix.'/signin', 'auth.signinTemp','moonlight/auth'),
    array('GET','/'.$prefix.'/login', 'auth.loginTemp','moonlight/auth'),
    array('POST','/'.$prefix.'/signin', 'auth.signin','moonlight/auth'),
    array('POST','/'.$prefix.'/login', 'auth.login','moonlight/auth')
  ));
}
?>
