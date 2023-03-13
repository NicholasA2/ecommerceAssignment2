<?php
namespace app\models;
class Search extends app\core\Model {

  public function searchPublications($searchEntry) {
    $searchEntry = '%' . $this->connection->escape_string($searchEntry) . '%';
    $SQL = "SELECT * FROM publications WHERE caption LIKE '$searchEntry'";
    $STMT = $this->db->query($sql);
    $publications = array();
    while ($row = $STMT->fetch_assoc()) {
      $publications[] = $row;
    }
    return $publications;
  }

}