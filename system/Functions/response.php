<?php

use Muffeen\Framework\Components\Container;

if (! function_exists('view')) {
    /**
     * Get view.
     *
     * @param  string $name
     * @param  array $data
     * @param  int $http_response_code
     * @return void
     */
    function view($name, $data = array(), $http_response_code = null)
    {
        extract($data);
        $full_path = Container::get('root_dir').DIRECTORY_SEPARATOR
            .config('view_path').str_replace('.', '/', $name).'.php';
        if ($http_response_code) {
            http_response_code($http_response_code);
        }
        require $full_path;
    }
}

if (! function_exists('json')) {
    /**
     * Echo json.
     *
     * @param  mixed $data
     * @param  int $http_response_code
     * @return void
     */
    function json($data, $http_response_code = null)
    {
        header('Content-Type: application/json');
        if ($http_response_code) {
            http_response_code($http_response_code);
        }
        if ($data !== null) {
            echo json_encode($data);
        }
    }
}

if (! function_exists('html')) {
    /**
     * Echo HTML.
     *
     * @param  string $html
     * @return void
     */
    function html($html)
    {
        echo $html;
    }
}

if (! function_exists('redirect')) {
    /**
     * Production redirection.
     *
     * @param  string $path
     * @param  int $http_response_code
     * @return void
     */
    function redirect($path = '/', $http_response_code = null)
    {
        header('Location: '.$path);
        exit();
    }
}

if (! function_exists('show_404')) {
    /**
     * Show 404 page.
     *
     * @return void
     */
    function show_404()
    {
        redirect(config('404_page'));
    }
}
