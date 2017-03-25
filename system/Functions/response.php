<?php

use Muffeen\Framework\Components\Container;

function view($name = 0, $data = array(), $http_response_code = null)
{
    extract($data);
    $full_path = 
    	Container::get('root_dir') . 
    	'/' .  
    	config('view_path') .
    	str_replace('.', '/', $name) .
    	'.php';
    if ($http_response_code) {
        http_response_code($http_response_code);
    }
    return require $full_path;
}

function json($data, $http_response_code = null)
{
	header('Content-Type: application/json');
    if ($http_response_code) {
        http_response_code($http_response_code);
    }
	if ($data !== null) echo json_encode($data);
}

function html($html)
{
    echo $html;
    return null;
}

function redirect($path = '/', $http_response_code = null)
{
    header("Location: " . $path);
    die();
}

function show_404()
{
    redirect(config('404_page'));
}