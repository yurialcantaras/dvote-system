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

    public function sumVotes(){

        $query = "SELECT Vote, COUNT(*) as vote_count FROM votes GROUP BY Vote";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $votes = ['yes' => 0, 'no' => 0];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $votes[strtolower($row['Vote'])] = $row['vote_count'];
        }

        return $votes;

    }

}

?>
