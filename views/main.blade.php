<html>
    <head>
         <?php
          $c = new client();
          echo $c->getHeaderFiles();
         ?>
         @yield('extfiles')
        <title>Lite Framework - @yield('title')</title>
    </head>
    <body>
       @yield('content')
    </body>
</html>
