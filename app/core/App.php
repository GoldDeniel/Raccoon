
<?php

class App {
    // default, hogy ha nincs megadva controller vagy method
    private $controller = 'HomeController';
    private $method = 'index';
    public function loadController(){
        $URL = explode('/', ($_GET['url'] ?? 'home'));
        
        $filename = '../app/controllers/'.ucfirst($URL[0]).'Controller.php';
        if(file_exists($filename)){
            require $filename;
            $this->controller = ucfirst($URL[0]).'Controller'; // ha létezik a fájl, akkor a controller neve lesz az első elem
        }
        else{
            require '../app/controllers/_404.php';
            $this->controller = '_404';
        }
        $controller = new $this->controller; // aszerint jon letre, hogy milyen controllerrol beszelunk, ha _404, akkor _404(Controller), ha home, akkor HomeController
        // kerdes a tanar urtol: a php szovegkent ertelmezi a $this->controller-t, nem referencia szerint?
        if(isset($URL[1]) && $URL[1] != ''){
            if(method_exists($controller, $URL[1])){
                $this->method = $URL[1];
            }
            else{
                require '../app/controllers/_404.php';
                $this->controller = '_404';
                $controller = new $this->controller;
            }
        }
        call_user_func_array([$controller, $this->method], []);

    }
}