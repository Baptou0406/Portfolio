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
    public function updateCroix($table, $id_real, $id_comp)
    {
        $this->connection();
        $sql = "INSERT INTO " . $table . " (`realisations_id`, `competences_id`) VALUES ('" . $id_real . "','" . $id_comp . "')";
        $sth = $this->dbh->query($sql);
        return $sth->fetch();
    }

    public function newRealisation($table, $realisation)
    {
        $this->connection();
        $sql = "INSERT INTO " . $table . " (`lib`) VALUES ('" . $realisation . "')";
        $sth = $this->dbh->query($sql);
        return $sth->fetch();
    }
    public function deleteCroix($table, $id_real, $id_comp)
{
    $this->connection();
    $sql = "DELETE FROM " . $table . " WHERE realisations_id = " . $id_real . " AND competences_id = " . $id_comp . "";
    $sth = $this->dbh->query($sql);
    return $sth->fetch();
}

    
}
