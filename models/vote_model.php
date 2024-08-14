<?php

class VoteModel {
    private $conn;
    private $table_name = "votes"; // Nome da tabela

    public function __construct($db) {
        $this->conn = $db;
    }

    public function insertVote($hash, $vote) {
        $query = "INSERT INTO " . $this->table_name . " (Hash, Vote, insertion_date) VALUES (:hash, :vote, NOW())";

        $stmt = $this->conn->prepare($query);

        // Bind dos valores
        $stmt->bindParam(":hash", $hash);
        $stmt->bindParam(":vote", $vote);

        // Executa a query
        return $stmt->execute();
    }
}

?>
