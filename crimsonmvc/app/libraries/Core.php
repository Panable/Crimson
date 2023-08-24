<?php
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */

class Core
{
    protected $currentController = 'Pages'; //default controller
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        //print_r($this->getUrl());

        $url = $this->getUrl();
        if (is_null($url)) {
        goto a;
        }

        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            //set as current controller
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->currentController . '.php';

        $this->currentController = new $this->currentController;

        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];
        
        a:
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl()
    {
        //if url is not null
        if (isset($_GET['url'])) {
            //trim url of trailing '/' ex: /bing/chilling/ -> /bing/chilling
            $url = rtrim($_GET['url'], '/');

            //sanitizes the url of any unsafe stuff ex
            //ex before - https://example.com/page?param=<script>alert('xss')</script>
            //ex after - https://example.com/page?param=alert%28%27xss%27%29
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //splits the string into an array with delim /
            $url = explode('/', $url);
            return $url;
        }
    }
}
