<?php

/**
 * App core class
 * Created URL & loads core controller
 * URL FORMAT - /controller/method/params
 */
class Core
{
    protected $currentController = 'Products';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
        // var_dump($url);

        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->currentController . '.php';

        $this->currentController = new $this->currentController;

        if(isset($url[0])){
            if(method_exists($this->currentController, $url[0])){
                $this->currentMethod = $url[0];
                unset($url[0]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl()
    {
        // var_dump($_GET);

        if (isset($_GET['q'])) {
            $url = rtrim($_GET['q'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }      
    }
}
