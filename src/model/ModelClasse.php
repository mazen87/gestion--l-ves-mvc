<?php 
    require_once 'Model.php';
    require_once 'entity/Classe.php';

    class ModelClasse extends Model {

        /**
         * fonction permet de récupérer toutes les classe depuis la base de données 
         */
        public function select_toutes_classes (){
            //$dbconnect = Connexionbd::getInstance("mysql:host=localhost;dbname=gestion_eleves","root","");
            //$classes = array();
            $requete = "SELECT id,nom_classe FROM classe ";
            $stmt=$this->Db_connect->prepare($requete);
            $stmt->setFetchMode(PDO::FETCH_CLASS,Classe::class);
            $stmt->execute();
            $classes= $stmt->fetchAll();
            /*
            for($i=0;$i<count($classes);$i++){
                $classes_objets[] = Classe::conctruc_classe_rempli($classes[$i]['id'],$classes[$i]['nom_classe']);
            }
            
            
            return $classes_objets;
            */
            return $classes;
            }
    }