
<?php

class App {
    private function show($e){
        echo '<pre>';
        print_r($e);
        echo '</pre>';
    }
    public function loadController(){
        $URL = explode('/', ($_GET['url'] ?? 'home'));

        $filename = '../app/controllers/'.ucfirst($URL[0]).'Controller.php';
        if(file_exists($filename)){
            require $filename;
        }
        else{
            require '../app/controllers/_404.php';
        }
    }
}