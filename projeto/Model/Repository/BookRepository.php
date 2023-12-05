<?php

namespace QI\SistemaDeChamados\Model\Repository;

use QI\SistemaDeChamados\Model\Call;
use PDO;

class BookRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connection::getConnection();
    }

    /**
     * Insert a new call in database
     * @param Call $call
     * @return bool
     */
    public function insert($call)
    {
        $stmt = $this->connection->prepare("insert into calls values (null,?,?,?,?,?,?,?);");
        $stmt->bindParam(1,$call->user->id);
        $stmt->bindParam(2,$call->book->id);
        $stmt->bindParam(3,$call->titlebook);
        $stmt->bindParam(4,$call->authorname);
        $stmt->bindParam(5,$call->numberchapters);
        $stmt->bindParam(6,$call->description);
        $stmt->bindParam(7,$call->genderbook);
        return $stmt->execute();
    }

    public function findAll(){
        $stmt = $this->connection->query("select c.*,u.name from calls c inner join users u on c.user_id = u.id;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

