<?php
namespace ScriptingThoughts;

use ScriptingThoughts\Routes;

class App
{
    // Like main
    public function run(): void
    {
        date_default_timezone_set('America/New_York');
        
        $routes = new Routes();

        $routes->registerRoutes();

    }
}
