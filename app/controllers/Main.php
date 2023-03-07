<?php
namespace app\controllers;

class Main extends \app\core\Controller {

    function index() {
        $publication = new \app\models\Publication();
        $publications = $publication->getAll();
        $this->view('Main/index', $publications);
    }
}