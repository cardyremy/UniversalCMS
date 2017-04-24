<?php
/**
 * Created by PhpStorm.
 * User: Cardyre
 * Date: 14.03.2017
 * Time: 09:30
 */
header('Content-Type: text/html; charset=utf-8');
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

    /*Fonction de déconnection de la base de données*/
    private function dbDeconnection()
    {
        $this->objectConnection = null;
    }

    /*********************************************
     * Nom : sendRequestUser
     * But: Afficher toutes les information de l'utilisateur qui est en parametre
     * Retour:$getAll
     * Paramètre:$username
     * *******************************************/
    public function sendRequestUser($username=null)
    {
        $strSQLRequestUser = "select * from t_user  WHERE useName='$username'";
        $query = $this->objectConnection->prepare($strSQLRequestUser);
        $rsResult = $query->execute();
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }

    /*********************************************
     * Nom : sendMenuRequest
     * But: Afficher toutes les informations liés au menu
     * Retour:$getAll
     * Paramètre:
     * *******************************************/

    public function sendMenuRequest()
    {
        $strSQLRequestUser = "select * from t_menu ";
        $query = $this->objectConnection->prepare($strSQLRequestUser);
        $rsResult = $query->execute();
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }

    /*********************************************
     * Nom : articleRequest
     * But: Afficher toutes les information liés aux articles
     * Retour:$getAll
     * Paramètre:
     * *******************************************/
    public function articleRequest()
    {
        $strSQLRequestUser = "select * from t_article ";
        $query = $this->objectConnection->prepare($strSQLRequestUser);
        $rsResult = $query->execute();
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }
    /*********************************************
     * Nom : articleRequestTemplate
     * But: Affiche toutes les informations liés aux articles liés au ID en paramètre
     * Retour:$getAll
     * Paramètre:
     * *******************************************/
    public function articleRequestTemplate($idGet)
    {
        $strSQLRequestUser = "select * from t_article WHERE fkMenu ='$idGet'";
        $query = $this->objectConnection->prepare($strSQLRequestUser);
        $rsResult = $query->execute();
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }
    /*********************************************
     * Nom :InsertMenuInToDB
     * But:
     * Retour:
     * Paramètre:
     * *******************************************/
    public function InsertMenuInToDB($menu)
    {
        $strSQLRequestUser = "INSERT INTO t_menu (menName) VALUES ('$menu')";
        $query = $this->objectConnection->prepare($strSQLRequestUser);

        $rsResult = $query->execute();
        //var_dump($rsResult);die();

        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }

    /*********************************************
     * Nom :InsertArticleInToDB
     * But: Insert les valeurs suivantes dans la DB
     * Retour:$getAll$getAll;
     * Paramètre:$artName,$artContent,$artFile,$fkMenu,$user
     * *******************************************/
    public function InsertArticleInToDB($artName,$artContent,$artFile,$fkMenu,$user)
    {
        $strSQLRequestUser = "INSERT INTO t_article (artName, artContent,artFiles,fkMenu,fkUser) VALUES (?,?,?,?,?)";
        $query = $this->objectConnection->prepare($strSQLRequestUser);
        $rsResult = $query->execute(array($artName,$artContent,$artFile,$fkMenu,$user));
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;

    }

    /*********************************************
     * Nom :sendMenuId
     * But: Recupérer l'ID de la table menu
     * Retour:$getAll
     * Paramètre: $name
     * *******************************************/
    public function sendMenuId($name)
    {
        $strSQLRequestUser = "select idMenu FROM t_menu WHERE menName=?";
        $query = $this->objectConnection->prepare($strSQLRequestUser);
        $rsResult = $query->execute(array($name));
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }

    /*********************************************
     * Nom :idCheck
     * But: Récupérer les droits de l'utilisateur
     * Retour:$getAll
     * Paramètre:
     * *******************************************/
    public function idCheck()
    {
        $strSQLRequestUser = "select useRights from t_user ";
        $query = $this->objectConnection->prepare($strSQLRequestUser);
        $rsResult = $query->execute();
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }


    /*********************************************
     * Nom :dropDataMenu
     * But:Supprime les donnés de la table menu en fonction de l'ID
     * Retour:$isExecuted
     * Paramètre:$paramID
     * *******************************************/
    //Supression table
    public function dropDataMenu($paramID)
    {
        $strSQLDrop = "DELETE FROM t_menu WHERE idMenu=?";
        $query = $this->objectConnection->prepare($strSQLDrop);
        $isExecuted = $query->execute(array($paramID));
        $query->closeCursor();

        return $isExecuted;
    }

    /*********************************************
     * Nom :dropDataArticle
     * But: Supprimer les donnés de la table article en fonction de son FK
     * Retour:$isExecuted
     * Paramètre:$paramFk
     * *******************************************/
    public function dropDataArticle($paramFk)
    {
        $strSQLDrop = "DELETE FROM t_article WHERE fkMenu=?";
        $query = $this->objectConnection->prepare($strSQLDrop);
        $isExecuted = $query->execute(array($paramFk));
        $query->closeCursor();

        return $isExecuted;
    }

    /*********************************************
     * Nom :getMenuDataFromID
     * But:Récupérer toutes les informations du menu en fonction de l'ID
     * Retour:$getAll
     * Paramètre:$menuId
     * *******************************************/
    public function getMenuDataFromID($menuId)
    {
        $strSQLRequestUser = "select * from t_menu WHERE idMenu =? ";
        $query = $this->objectConnection->prepare($strSQLRequestUser);
        $rsResult = $query->execute(array($menuId));
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }


    /*********************************************
     * Nom :updDataToDB
     * But:Mettre a jour la table t_article
     * Retour:$isExecuted
     * Paramètre:$artName, $artContent,$artFile,$fkMen
     * *******************************************/
    public function updDataToDB($artName, $artContent,$artFile,$fkMen)
    {
        //Mettre à jour la table si la valeur du fichier est vide
        if (($artFile)==null) {
            $strSQLUpdate = "UPDATE t_article SET artName = ?,artContent=? WHERE fkMenu=? ";
            $query = $this->objectConnection->prepare($strSQLUpdate);
            $isExecuted = $query->execute(array($artName, $artContent,$fkMen));
            $query->closeCursor();
        }
        else
        {
            $strSQLUpdate = "UPDATE t_article SET artName = ?,artContent=?,artFiles=? WHERE fkMenu=? ";
            $query = $this->objectConnection->prepare($strSQLUpdate);
            $isExecuted = $query->execute(array($artName, $artContent,$artFile,$fkMen));
            $query->closeCursor();
        }

        return $isExecuted;
    }

    /*********************************************
     * Nom :updMenuTitleToDB
     * But:Mettre à jour la table t_menu
     * Retour:$menName,$idMen
     * Paramètre: $isExecuted
     * *******************************************/
    public function updMenuTitleToDB($menName,$idMen)
    {
        $strSQLUpdate = "UPDATE t_menu SET menName = ? WHERE idMenu = ?";
        $query = $this->objectConnection->prepare($strSQLUpdate);
        $isExecuted = $query->execute(array($menName,$idMen));
        $query->closeCursor();
        return $isExecuted;
    }

    /*********************************************
     * Nom :signUpData
     * But:Inserer dans la table t_user les information liés à la connection
     * Retour:$getAll
     * Paramètre:$strName,$strPwd,$key,$strEmail
     * *******************************************/
    public function signUpData($strName,$strPwd,$key,$strEmail)
    {

        $strSignUpSQL = "INSERT INTO t_user (useName,usePswd,useKey,useEmail) VALUES (?,?,?,?)";
        $query = $this->objectConnection->prepare($strSignUpSQL);
        $rsResult = $query->execute(array($strName,$strPwd,$key,$strEmail));
        $getAll = $query->fetchAll();
        $query->closeCursor();
        return $getAll;

    }

    /*********************************************
     * Nom : selectForControlUser
     * But:Récuperer toutes les informations de l'utilisateur en fonction de son nom
     * Retour:$getAll
     * Paramètre:$username
     * *******************************************/
    public function selectForControlUser($username)
    {
        $strSelectUserSQL = "SELECT * FROM t_user WHERE useName=?";
        $query = $this-> objectConnection->prepare($strSelectUserSQL);

        $rsResult = $query->execute(array($username));
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }

    /*********************************************
     * Nom :updateConfirmKey
     * But:Mettre à jour la valeur de confirmation de l'utilisateur
     * Retour:$isExecuted
     * Paramètre:$useName
     * *******************************************/
    public function updateConfirmKey ($useName)
    {
        $strUpdateSQL = "UPDATE t_user SET useConfirm = '1' WHERE useName =?";
        $query = $this->objectConnection->prepare($strUpdateSQL);
        $isExecuted = $query->execute(array($useName));
        $query->closeCursor();
        return $isExecuted;
    }

    /*********************************************
     * Nom :emailCheckUser
     * But:Verifier que l'email existe dans la BD
     * Retour:$getAll
     * Paramètre:$useEmail
     * *******************************************/
    public function emailCheckUser ($useEmail)
    {
        $strSelectUserSQL = "SELECT useEmail FROM t_user WHERE useEmail = ?";
        $query = $this-> objectConnection->prepare($strSelectUserSQL);

        $rsResult = $query->execute(array($useEmail));
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }

    /*********************************************
     * Nom :usernameCheck
     * But:Verifier que l'utilisateur existe dans la BD
     * Retour:$getAll
     * Paramètre:$usernameCheck
     * *******************************************/
    public function usernameCheck ($usernameCheck)
    {
        $strSelectUserSQL = "SELECT useName FROM t_user WHERE useName = ?";
        $query = $this-> objectConnection->prepare($strSelectUserSQL);

        $rsResult = $query->execute(array($usernameCheck));
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }

    /*********************************************
     * Nom :selectDataForPassword
     * But:Récupérer les informations de l'utilisateur en fonction de son adresse email
     * Retour:$getAll
     * Paramètre:$userEmail
     * *******************************************/
    public function selectDataForPassword ($userEmail)
    {
        $strSelectUserSQL = "SELECT * FROM t_user WHERE useEmail = ?";
        $query = $this-> objectConnection->prepare($strSelectUserSQL);

        $rsResult = $query->execute(array($userEmail));
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }

    /*********************************************
     * Nom :updatePasswordUser
     * But:Mettre à jour le champ usePswd de la table t_user
     * Retour:$isExecuted
     * Paramètre:$usePaswd,$useEmail
     * *******************************************/
    public function updatePasswordUser ($usePaswd,$useEmail)
    {
        $strUpdateSQL = "UPDATE t_user SET usePswd = ? WHERE useKey =?";
        $query = $this->objectConnection->prepare($strUpdateSQL);
        $isExecuted = $query->execute(array($usePaswd,$useEmail));
        $query->closeCursor();
        return $isExecuted;
    }

    /*********************************************
     * Nom :articleHomeSelect
     * But: Afficher les articles sur la page d'accueil
     * Retour: $getAll;
     * Paramètre:$getAll
     * *******************************************/
    public function articleHomeSelect()
    {
        $strSQLRequestUser = "select * from t_article WHERE artBlock = '1' ";
        $query = $this->objectConnection->prepare($strSQLRequestUser);
        $rsResult = $query->execute();
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }

    /*********************************************
     * Nom :updDataHomeToDB
     * But: Mettre à jour les champs du nom et du contenu des articles de la page d'accueil
     * Retour: $isExecuted
     * Paramètre: $artName, $artContent,$artId
     * *******************************************/
    public function updDataHomeToDB($artName, $artContent,$artId)
    {
        //Mettre à jour la table si la valeur du fichier est vide

            $strSQLUpdate = "UPDATE t_article SET artName = ?,artContent=? WHERE idArticle=? ";
            $query = $this->objectConnection->prepare($strSQLUpdate);
            $isExecuted = $query->execute(array($artName, $artContent,$artId));
            $query->closeCursor();

        return $isExecuted;
    }
    /*********************************************
     * Nom :sendMenuName
     * But: Afficher les nom des menus en fonction de l'id
     * Retour: $getAll;
     * Paramètre:$idMenu
     * *******************************************/
    public function sendMenuName($idMenu)
    {
        $strSQLRequestUser = "select menName from t_menu WHERE idMenu=?";
        $query = $this->objectConnection->prepare($strSQLRequestUser);
        $rsResult = $query->execute(array($idMenu));
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }

    /*********************************************
     * Nom :selectAllUser
     * But: Recupère toutes les informations liés à l'utilisateur
     * Retour:$getAll;
     * Paramètre:-
     * *******************************************/
    public function selectAllUser()
    {
        $strSelectUserSQL = "SELECT * FROM t_user ";
        $query = $this-> objectConnection->prepare($strSelectUserSQL);

        $rsResult = $query->execute();
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }
    /*********************************************
     * Nom :updateUseRights
     * But: Mettre à jour les champs des droits sur les utilisateurs
     * Retour:$isExecuted;
     * Paramètre:$userRights,$useName
     * *******************************************/
    public function updateUseRights($userRights,$useName)
    {
        $strUpdateSQL = "UPDATE t_user SET useRights = ? WHERE useName =?";
        $query = $this->objectConnection->prepare($strUpdateSQL);
        $isExecuted = $query->execute(array($userRights,$useName));
        $query->closeCursor();
        return $isExecuted;
    }
    /*********************************************
     * Nom :updateArtBlock
     * But: Mettre à jour le champ artBlock en fonction du fkMenu
     * Retour:$isExecuted
     * Paramètre:$artBlock,$fkMenu
     * *******************************************/
    public function updateArtBlock ($artBlock,$fkMenu)
    {
        $strUpdateSQL = "UPDATE t_article SET artBlock = ? WHERE fkMenu =?";
        $query = $this->objectConnection->prepare($strUpdateSQL);
        $isExecuted = $query->execute(array($artBlock,$fkMenu));
        $query->closeCursor();
        return $isExecuted;
    }
    /*********************************************
     * Nom :InsertArticleInToDBWithoutfiles
     * But: Insert des valeurs dans la table t_article
     * Retour:$getAll
     * Paramètre:$artName,$artContent,$fkMenu,$user
     * *******************************************/
    public function InsertArticleInToDBWithoutfiles ($artName,$artContent,$fkMenu,$user)
    {
        $strSQLRequestUser = "INSERT INTO t_article (artName, artContent,fkMenu,fkUser) VALUES (?,?,?,?)";
        $query = $this->objectConnection->prepare($strSQLRequestUser);
        $rsResult = $query->execute(array($artName,$artContent,$fkMenu,$user));
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;

    }
    /*********************************************
     * Nom :deleteAllArticles
     * But: Supprime le contenu de la table t_article en fonction du artBlock et du fkMenu
     * Retour:$isExecuted
     * Paramètre:$artBlock,$paramFk
     * *******************************************/
    public function deleteAllArticles($artBlock,$paramFk)
    {
        $strSQLDrop = "DELETE FROM t_article WHERE artBlock=? AND fkMenu=?";
        $query = $this->objectConnection->prepare($strSQLDrop);
        $isExecuted = $query->execute(array($artBlock,$paramFk));
        $query->closeCursor();

        return $isExecuted;
    }
    /*********************************************
     * Nom :articleRequestArtBlock
     * But: Affiche la valeur de artBlock en fonction du fkMenu
     * Retour:$getAll
     * Paramètre:$idGet
     * *******************************************/

    public function articleRequestArtBlock($idGet)
    {
        $strSQLRequestUser = "select artBlock from t_article WHERE fkMenu =?";
        $query = $this->objectConnection->prepare($strSQLRequestUser);
        $rsResult = $query->execute(array($idGet));
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }
    /*********************************************
     * Nom :artSelectWhithArtBlock
     * But: Affiche toutes le informations de la table t_article en fonction de artBlock et du fkMenu
     * Retour:
     * Paramètre:$artBlock, $idGet
     * *******************************************/
    public function artSelectWhithArtBlock($artBlock, $idGet)
    {
        $strSQLRequestUser = "select * from t_article WHERE artBlock=? AND fkMenu =?";
        $query = $this->objectConnection->prepare($strSQLRequestUser);
        $rsResult = $query->execute(array($artBlock, $idGet));
        $getAll = $query->fetchAll();
        $query->closeCursor();

        return $getAll;
    }
    /*********************************************
     * Nom :updMoreArticlesToDB
     * But: Mettre à jour les champs de la table t_article, du nom, contenu et image en fontion de l'id
     * Retour:
     * Paramètre:$artName, $artContent,$artFiles,$artId
     * *******************************************/
    public function updMoreArticlesToDB($artName, $artContent,$artFiles,$artId)
    {

        $strSQLUpdate = "UPDATE t_article SET artName = ?,artContent=?,artFiles=? WHERE idArticle=? ";
        $query = $this->objectConnection->prepare($strSQLUpdate);
        $isExecuted = $query->execute(array($artName, $artContent,$artFiles,$artId));
        $query->closeCursor();
        return $isExecuted;
    }

}
?>