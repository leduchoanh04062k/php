<?php
namespace Commons;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

class Routing
{
    public static function index($url){


        $router = new RouteCollector();

        $router->get('/', ["Controllers\HomeController", "index"]);

        $router->get('brands', ["Controllers\BrandController", "index"]);
         $router->get('cars', ["Controllers\CarController", "index"]);
        $router->get('brands/add-brand', ["Controllers\BrandController", "addForm"]);
        $router->get('brands/edit/{id}', ["Controllers\BrandController", "editForm"]);
        $router->post('brands/save-add', ["Controllers\BrandController", "saveAdd"]);
        $router->post('brands/save-edit', ["Controllers\BrandController", "saveEdit"]);
        $router->get('cars/add-car', ["Controllers\CarController", "addForm"]);
        $router->get('cars/edit/{id}', ["Controllers\CarController", "editForm"]);
        $router->post('cars/save-add', ["Controllers\CarController", "saveAdd"]);
        $router->post('cars/save-edit', ["Controllers\CarController", "saveEdit"]);

        // {id} => tham số trên đường dẫn
        $router->get('brands/remove/{id}', ["Controllers\BrandController", "remove"]);
        $router->get('cars/remove/{id}', ["Controllers\CarController", "remove"]);
        $router->post('brands/check-name', ["Controllers\BrandController", "checkNameExisted"]);
        $router->post('cars/check-name', ["Controllers\CarController", "checkNameExisted"]);
        $router->get('admin', ["Controllers\HomeController", "dashboard"]);

        $dispatcher = new Dispatcher($router->getData());

        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url,
            PHP_URL_PATH));

        echo $response;
    }
}