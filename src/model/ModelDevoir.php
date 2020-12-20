<?php 
    require_once 'Model.php';
    require_once 'entity/DEvoir.php';
    class ModelDevoir extends Model {

        public function select_tous_devoirs(){
           $requete = "SELECT * FROM devoir";
           $stmt = $this->Db_connect->prepare($requete);
           $stmt->setFetchMode(PDO::FETCH_CLASS,Devoir::class);
           $stmt->execute();
           $devoirs =$stmt->fetchAll();

           return $devoirs;

        }

        public function select_devoir_eleves($id_devoir){
            $requete = "SELECT e.nom as eleve_nom, e.prenom as eleve_prenom,d.status as status, de.travail_eleve as travail_eleve, de.note as note , d.titre as titre , d.description as description , d.date_echeance as date_echeance, d.date_devoir as date_devoir FROM eleve e INNER JOIN devoir_eleve de on de.id_eleve = e.id INNER JOIN devoir d on d.id = de.id_devoir WHERE d.id =:id ";
            $stmt = $this->Db_connect->prepare($requete);
            $stmt->execute(array(
                ':id'=>$id_devoir
            ));
            $devoir_eleves=$stmt->fetchAll();
            
            return $devoir_eleves;
        }
    }