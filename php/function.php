<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 14.03.2017
 * Time: 09:30
 */

class dbfunction
{

// constantes pour la BD
    const STR_DB_NAME = "db_cmsuniversal";


    /*********************************************
     * Nom : __construct
     * But: il s'agit du constructeur
     * Retour:
     * Paramètre:
     * *******************************************/
    public function __construct()
    {
        $this->dbConnection();
    }

    /*********************************************
     * Nom : __destruct
     * But: il s'agit du destructeur
     * Retour:
     * Paramètre:
     * *******************************************/
    public function __destruct()
    {
        $this->dbDeconnection();
    }

    /*********************************************
     * Nom : dbConnection
     * But: Etablie la connection à la base de donnée
     * Retour:
     * Paramètre:
     * *******************************************/
    private function dbConnection()
    {
        // Connection à la db
        try {
            $this->objectConnection = new PDO('mysql:host=localhost;dbname=' . self::STR_DB_NAME . ';charset=utf8', 'root', '');
        } //Affiche les eventuelles erreures si la connection echoue
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    //Fonction de déconnection de la base de données
    private function dbDeconnection()
    {
        $this->objectConnection = null;
    }

    public function sendRequestUser($username)
    {
        $strSQLRequestUser = "select * from t_user  WHERE useName='$username'";
        $query = $this->objectConnection->prepare($strSQLRequestUser);
        $rsResult = $query->execute();
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }
















































}
?>