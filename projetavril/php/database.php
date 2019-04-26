<?php
/* connexion à la base de donnée*/
try {
    $bdd= new PDO('mysql:host=localhost; dbname=construction; charset=utf8', 'root','');
} 
catch (Exception $e) 
{
    die('Erreur :' . $e->getMessage());
}


/*
  fonction pour insérer des données dans la base de donnée
 
  @param array $table
  @param array $field
  @param array $data
 @return array
 */
function Inserer($table,$field,$data)
{
    global $bdd;
    $field_values= implode(',',$field);
    $data_values=implode("','",$data);
    $sql= "INSERT INTO $table (".$field_values.") VALUES ('".$data_values."') ";
    return $bdd->query($sql) or die(print_r($bdd->errorInfo()));
}


/*
 faire une réquête sql
 
  @param string $sql
  @param boolean $single
  @return array
 */
function requete($sql,$single = true)
{
    global $bdd;
    $data = $bdd->prepare($sql);
    $data->execute();
    if($single){
        return $data->fetch();
    }else{
        return $data->fetchAll();
    }
}

/*
  Obtenir toutes les données d'une table
 
  @param string $table
  @param boolean $single
  @return array
 */
function getAll($table,$single = true)
{
    global $bdd;
    $sql = "SELECT * FROM $table";
    $sth = $bdd->prepare($sql);
    $sth->execute();
    if($single){
        return $sth->fetch();
    }else{
        return $sth->fetchAll();
    }
}

function getSingle($table,$field,$single = true)
{
    global $bdd;
    $field_values= implode(',',$field);
    $sql = "SELECT $field_values FROM $table";
    $data = $bdd->query($sql);
    if($single){
        return $data->fetch();
    }else{
        return $data->fetchAll();
    }
}

/**
  supprimer une ligne de la base de donnée
 
  @param string $table
  @param string $field
  @param string $where
   @return boolean
 */
function Delete($table,$field,$where)
{
    global $bdd;
    $sql = "DELETE FROM $table WHERE  $field = $where";
    return (bool)$bdd->query($sql);
}