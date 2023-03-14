<?php
namespace app\controllers;

class Main extends \app\core\Controller {

    function index() {
        $publication = new \app\models\Publication();
        $publications = $publication->getAll();
        $this->view('Main/index', $publications);
    }

    public function search() {
    	$publication = new \app\models\Publication();
        $publications = $publication->search($_GET['search_term']);
        $this->view('Main/index', $publications);
  }

}