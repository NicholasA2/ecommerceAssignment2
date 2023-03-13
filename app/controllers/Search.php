<?php
namespace app\controllers;

class Search extends \app\core\Controller {

  public function searchPublications($searchEntry) {
    $publications = $this->connection->searchPublications($searchEntry);
    $search =new \app\models\Publication();
    $search->display_results($publications);
  }

}