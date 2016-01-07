<html>
    <head>
         <?php
          $c = new client();
          echo $c->getHeaderFiles();
         ?>
         @yield('extfiles')
        <title>App Name - @yield('title')</title>
    </head>
    <body>
       @yield('content')
    </body>
</html>
