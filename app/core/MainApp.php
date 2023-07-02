<?php

namespace App\core;

/**
 * Summary of MainApp
 */
class MainApp
{
    /**
     * Summary of controller
     * @var string
     */
    private $controller = 'Home';
    /**
     * Summary of method
     * @var string
     */
    private $method = 'index';
    private const CONTROLLER_DIR = "../app/controllers/";
    private const APP_NAMESPACE = 'App\\controllers\\';

    /**
     * Summary of loadController
     * @return void
     */
    public function loadController()
    {
        try {
            $URL = $this->splitURL();

            // Select controller
            $controllerFolder = self::CONTROLLER_DIR;
            $controllerNamespace = self::APP_NAMESPACE;
            $controllerName = ucfirst($URL[0]);
            $filename = $controllerFolder . $controllerName . ".php";

            if (file_exists($filename)) {
                require_once $filename;
                $this->controller = $controllerNamespace . $controllerName;
                unset($URL[0]);
            } else {
                require_once $controllerFolder . "_404.php";
                $this->controller = $controllerNamespace . '_404';
            }

            $controller = new $this->controller();

            if (!empty($URL[1]) && method_exists($controller, $URL[1])) {
                $this->method = $URL[1];
                unset($URL[1]);
            }

            call_user_func_array([$controller, $this->method], []);
        } catch (\Exception $e) {
            // Handle the exception
            echo "An error occurred: " . $e->getMessage();
        }
    }

    /**
     * Summary of splitURL
     * @return array
     */
    private function splitURL(): array
    {
        $URL = $_GET['url'] ?? 'home';
        return explode("/", trim($URL, "/"));
    }
}
