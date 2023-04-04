<?php
/**
 * Description of Department
 *
 * @author Teriaca Mattia
 */

 class Classe{
    //connessione database
    private $conn;
    private $table_name = "CLASSE";

    //proprietà classe
    public $id;
    public $anno;
    public $classe;
    public $indirizzo;

    //database function connect
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //funzione READ
    function read(){
        $sql = "SELECT *
            FROM
                " . $this->table_name . " c
            ORDER BY
                c.id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    //funzione CREATE
    function create(){
        $sql = "INSERT INTO
        " . $this->table_name . "
    SET
        anno=:anno,
        classe=:classe,
        indirizzo=:indirizzo";


    $stmt = $this->conn->prepare($sql);
    $this->anno = htmlspecialchars(strip_tags($this->anno));
    $this->classe = htmlspecialchars(strip_tags($this->classe));
    $this->indirizzo = htmlspecialchars(strip_tags($this->indirizzo));

    $stmt->bindParam(":anno", $this->anno);
    $stmt->bindParam(":classe", $this->classe);
    $stmt->bindParam(":indirizzo", $this->indirizzo);

    // execute query
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
   
    }

    //function UPDATE
    function update(){
        $sql = "UPDATE
                " . $this->table_name . "
            SET
                anno=:anno,
                spec=:spec,
                classe=:classe
            WHERE
                id=:id";

        // prepare query statement
        $stmt = $this->conn->prepare($sql);

        // sanitize
        $this->anno = htmlspecialchars(strip_tags($this->anno));
        $this->indirizzo = htmlspecialchars(strip_tags($this->indirizzo));
        $this->classe = htmlspecialchars(strip_tags($this->classe));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(':anno', $this->anno);
        $stmt->bindParam(':indirizzo', $this->indirizzo);
        $stmt->bindParam(':classe', $this->classe);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Funzione DELETE
    function delete()
    {
        // delete query
        $sql = "DELETE FROM " . $this->table_name . " WHERE id= ?";

        // prepare query
        $stmt = $this->conn->prepare($sql);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

 }