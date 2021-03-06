<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class BlogRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'blog';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($blogTitle, $blogText, $blogPicturePath,$user_id)
    {

        $query = "INSERT INTO $this->tableName (blogTitle, blogText, blogPicturePath,user_id) VALUES (?, ?, ?,?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssi', $blogTitle, $blogText, $blogPicturePath,$user_id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }
    public function update($blogTitle, $blogText, $blogPicturePath)
    {
      $query = "UPDATE $this->tableName SET(blogTitle, blogText, blogPicturePath) VALUES (?, ?, ?)";
    }
    public function updateFilePath($id,$blogPicturePath)
    {
      $query = "UPDATE $this->tableName SET blogPicturePath = ? Where id = ?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('si',$blogPicturePath,$id);

      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }

      return $statement->insert_id;
    }
    public function delete()
    {

    }
    public function getByUsersID($id){
      $query = "SELECT * FROM {$this->tableName} WHERE user_id = ?";

      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('i', $id);

      $statement->execute();

      $result = $statement->get_result();
      if (!$result) {
          throw new Exception($statement->error);
      }

      // Ersten Datensatz aus dem Reultat holen
      $rows = array();
      while ($row = $result->fetch_object()) {
          $rows[] = $row;
      }

      $result->close();
      return $rows;
}
}
