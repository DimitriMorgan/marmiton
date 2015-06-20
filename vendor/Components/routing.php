<?php
namespace Vendor\Components;

use App\Controllers;

class Router
{
    const NAMESPACE_CONTROLLERS = 'App\Controllers\\';
    const CONTROLLER_PATH = '/../../app/Controllers';

    const METHOD_END_PATH = 'Action';
    const CONTROLLER_END_PATH = 'Controller';

    protected $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
        $this->getResponse();
    }

    private function validate()
    {
        if ($this->validateRoutingDefinition()) {
            return true;
        }
    }

    public function getResponse()
    {
        $this->validate();
    }

    private function validateRoutingDefinition()
    {
        $this->validateRootDefinition();
        return true;
    }

    private function validateRootDefinition()
    {
        if (!array_key_exists('root', $this->routes)) {
            throw new \Exception('Routing root is not defined');
        }

        if (empty($this->routes['root'])) {
            throw new \Exception('Routing root is empty');
        }

        $this->checkController($this->routes['root']);
        $this->checkMethod($this->routes['root']);

        return true;
    }

    private function checkController($route)
    {
        if (!array_key_exists('controller', $route)) {
            throw new \Exception('No controller set to this route');
        }

        if (!file_exists(__DIR__ . self::CONTROLLER_PATH . '/' . $route['controller'] . self::CONTROLLER_END_PATH .'.php')) {
            throw new \Exception('No controller file ' . $route['controller'] . 'Controller.php found, are you sure you created it ?');
        }
    }

    private function checkMethod($route)
    {
        $route['controller'] = ucfirst($route['controller']);

        $controller =  self::NAMESPACE_CONTROLLERS . $route['controller'] . self::CONTROLLER_END_PATH;

        if (!array_key_exists('method', $route)) {
            throw new \Exception('No controller set to this route');
        }

        if (empty($route['method']) || $route['method'] == 'index') {

            $indexMethodName = 'index' . self::METHOD_END_PATH;

            $this->loadController($route['controller']);

            $controller = new $controller;
            if (!method_exists($controller, $indexMethodName)) {
                throw new \Exception('No index action found in this class, are you sure you already created it ?');
            }

            return $controller->$indexMethodName();
        }

        if (!method_exists($route['method'], $route['method'])) {

            throw new \Exception('No index action found in this class, are you sure you already created it ?');
        }

        return $controller->$route['method'];
    }

    private function loadController($controller)
    {
        include_once(__DIR__ . self::CONTROLLER_PATH . '/' . $controller . self::CONTROLLER_END_PATH . ".php");
    }
}