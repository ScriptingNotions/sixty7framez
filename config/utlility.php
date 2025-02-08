<?php

/**
 * Get filtered $_POST values.
 * Return an array.
 */
function filter_post()
{
    $post = filter_input_array(INPUT_POST);
    $post = array_map('trim', $post);
    $post = array_map('htmlspecialchars', $post);

    return $post;
}

/**
 * Get filtered $_GET values.
 * Return an array.
 */
function filter_get()
{
    var_dump($_SERVER['REQUEST_URI']);
    var_dump($_GET);
    $get = filter_input_array(INPUT_GET);
    
    $get = array_map('trim', $get);
    $get = array_map('htmlspecialchars', $get);

    return $get;
}

/**
 * Get URI path.
 * Return a string.
 */
function getUri()
{

    $uri = htmlspecialchars($_SERVER['REQUEST_URI']);
    $uri = urldecode(trim(parse_url($uri, PHP_URL_PATH), '/'));

    return $uri;
}

/** Get request method.
 * Return a string.
 */
function getMethod()
{
    $method = $_SERVER['REQUEST_METHOD'];
    return $method;
}

function returnJsonHttpResponse($status, $data)
{
    // remove any string that could create an invalid JSON 
    // such as PHP Notice, Warning, logs...
    ob_clean();

    // this will clean up any previously added headers, to start clean
    header_remove(); 

    // Set the content type to JSON and charset 
    // (charset can be set to something else)
    header("Content-type: application/json; charset=utf-8");

    // Set your HTTP response code, 2xx = SUCCESS, 
    // anything else will be error, refer to HTTP documentation
    if ($status) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
    
    // encode your PHP Object or Array into a JSON string.
    // stdClass or array
    echo json_encode($data);

    // making sure nothing is added
    exit();
}

// function requireToVar($file, $data){
//     ob_start();
//     $data;
//     include($file);
//     return ob_get_clean();
// }

 function renderView(string $filePath, array $variables = []): string
{
    ob_start();
    extract($variables, EXTR_OVERWRITE);
    include($filePath);

    return ob_get_clean();
}

function isValidObjectId($id) {
    if(!is_null($id)) {
        return preg_match('/^[0-9a-fA-F]{24}$/', $id) === 1;
    } else {
        return false;
    }
    
}

function uid() {
    $uid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );

    return $uid;
}
