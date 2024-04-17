<?php

class Database
{
    private $dbh;

    public function connection()
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=baptiste_portfolio', 'baptiste', 'plop');
    }

    public function selectAll($table, $nb = 1000)
    {
        $this->connection();
        $sql = "SELECT * FROM " . $table . " LIMIT ".$nb;
        $sth = $this->dbh->query($sql);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}
