<?php 
namespace ScriptingThoughts;

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
use Dotenv;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

class Routes {

    public function registerRoutes() {

        // Set up the dispatcher
        $dispatcher = simpleDispatcher(function(RouteCollector $r) {

            
            // Define the routes
            $r->addRoute('GET', '/', ['ScriptingThoughts\Controllers\RoutesController', 'home']);
            $r->addRoute('GET', '/process', ['ScriptingThoughts\Controllers\RoutesController', 'process']);
            $r->addRoute('GET', '/packages', ['ScriptingThoughts\Controllers\RoutesController', 'packages']);
            $r->addRoute('GET', '/about', ['ScriptingThoughts\Controllers\RoutesController', 'about']);
            $r->addRoute('GET', '/contact', ['ScriptingThoughts\Controllers\RoutesController', 'contact']);
            $r->addRoute('GET', '/booking', ['ScriptingThoughts\Controllers\RoutesController', 'booking']);
            $r->addRoute('POST', '/booking-payment', ['ScriptingThoughts\Controllers\RoutesController', 'bookingPayment']);
            $r->addRoute('POST',  '/verify-payment', ['ScriptingThoughts\Controllers\RoutesController', 'verifyPayment']);
            $r->addRoute('POST',  '/book-event', ['ScriptingThoughts\Controllers\RoutesController', 'bookEvent']);
            $r->addRoute('GET', '/events', ['ScriptingThoughts\Controllers\RoutesController', 'getEvents']);

            $r->addRoute('GET', '/booking/{customerDetails}', ['ScriptingThoughts\Controllers\RoutesController', 'booking']);

            $r->addRoute('GET', '/booking/package/{package}', ['ScriptingThoughts\Controllers\RoutesController', 'booking']);
            $r->addRoute('GET', '/booking/position/{bookingPosition}', ['ScriptingThoughts\Controllers\RoutesController', 'booking']);

            $r->addRoute('POST', '/booking', ['ScriptingThoughts\Controllers\RoutesController', 'booking']);

            $r->addRoute('GET', '/mobile-menu', ['ScriptingThoughts\Controllers\ComponentController', 'mobileMenu']);

            // Add route for /users/{id}, where {id} must be a number
            // $r->addRoute('GET', '/users/{id:\d+}', [$this, 'get_user_handler']);
            // $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', [$this, 'get_article_handler']);
        });
        
        // Fetch method and URI
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];
        
        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);
        
        // Dispatch the route
        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                // Handle 404 Not Found
                echo "404 Not Found";
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                // Handle 405 Method Not Allowed
                $allowedMethods = $routeInfo[1];
                echo "405 Method Not Allowed. Allowed methods: " . implode(', ', $allowedMethods);
                break;
            case \FastRoute\Dispatcher::FOUND:
                // Call the handler with any route variables
                $handler = $routeInfo[1];
                $params = $routeInfo[2];

                $params = array_map('trim', $params);
                $params = array_map('htmlspecialchars', $params);

                // If the handler is an array (i.e., a class and method)
                if (is_array($handler)) {
                   // $session = new Session();
           
                    // Create an instance of the class and call the method
                    $controller = new $handler[0](); // Instantiate the controller
                    call_user_func_array([$controller, $handler[1]], $params); // Call the method with params
                } else {
                    // If the handler is a function
                    call_user_func($handler, $params);
                }
                break;
        }
    }

    // Define handler functions as class methods
    // public function get_user_handler($params) {
    //     echo "User with ID: " . $params['id'];
    // }

    // public function get_article_handler($params) {
    //     $articleId = $params['id'];
    //     $title = isset($params['title']) ? $params['title'] : 'No Title';
    //     echo "Article with ID: $articleId, Title: $title";
    // }
}
