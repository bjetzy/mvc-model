<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'user';

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
    public function create($username, $password, $profilePicturePath)
    {
        $password = sha1($password);

        $query = "INSERT INTO $this->user (username, password, profilePicturePath) VALUES (?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssss', $username, $password, $profilePicturePath);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function isValidUser($username, $password)
    {
      $password = sha1($password);

      $query = "SELECT * $this->user WHERE 'username' = ? AND 'password' = ?";

      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('ss', $username, $password);

      if (!$statement->execute()) {
          throw new Exception($statement->error);
      }
      if (!is_null($statement)) {
        // code...
      }
      return $statement->
    }
}
