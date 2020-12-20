<?php
    require_once 'ControleurAccueil.php';
    require_once 'ControleurEleve.php';
    require_once 'ControleurDevoir.php';
    require_once 'entity/Eleve.php';
class Routeur {

private $cntrlAccueil;
private $cntrlEleve;
private $cntrlDevoir;


public function __construct()
{
  $this->cntrlAccueil = new ControleurAccueil();
  $this->cntrlEleve = new ControleurEleve();
  $this->cntrlDevoir = new  ControleurDevoir();

  
}

public function routerRequete(){
  $id=0;
  try{

      /*
    if(isset($_GET['action'])){
      if($_GET['action']=="message"){
        
          $id_message = intval($this-> getParametre($_GET, 'id_message'));
          if($id_message !=0){
            $this->cntrlMessage->message($id_message);
          }else{
            throw new Exception("identifiant de message non valide");
          }
  
      }else if($_GET['action']=='commenter'){
        $commentaire = new Commentaire();
        $commentaire->set_com_auteur($this->getParametre($_POST,'auteur'));
        $commentaire->set_com_contenu($this->getParametre($_POST,'contenu'));
        $commentaire->set_id_message($this->getParametre($_POST,'id_message'));
        $this->cntrlMessage->commenter($commentaire);
        
      }else if($_GET['action']=='ajouterMessage') {
        $message = new Message();
        $message->set_titre($this->getParametre($_POST,'titre'));
        $message->set_auteur($this->getParametre($_POST,'auteur'));
        $message->set_contenu($this->getParametre($_POST,'contenu'));
        $this->cntrlAccueil->ajouterMessage($message);
        
      }else{
        throw new Exception("action non valide");

      }
    }else{
      $this->cntrlAccueil->accueil();
    }
    */
    
    if(isset($_GET['action'])){
         if(($_GET['action']=="accueil")){
             if(isset($_POST['classe'] )&& $_POST['classe']!=0){
                $id = intval($_POST['classe']);
                $this->cntrlAccueil->accueilClasse($id);
             }else{
                $this->cntrlAccueil->accueil();
             }

         } else if($_GET['action']=="eleveCreerFormulaire"){
                $this->cntrlEleve->eleveCreerFormulaire();
         } else if($_GET['action']=="eleveCreer"){
                    $eleve = new Eleve();
                    $eleve->set_nom($this->nettoyer($this->getParametre($_POST,'nom')));
                    $eleve->set_prenom($this->nettoyer($this->getParametre($_POST,'prenom')));
                    $eleve->set_date_naissance($this->nettoyer($this->getParametre($_POST,'date_naissance')));
                    $eleve->set_moyen(intval($this->nettoyer($_POST['moyen'])));
                    $eleve->set_appreciation($this->nettoyer($_POST['appreciation']));
                    $eleve->set_id_classe(intVal($this->nettoyer($this->getParametre($_POST,'classe'))));

                    $this->cntrlEleve->eleveCreer($eleve);

                    
              
         } else if($_GET['action']=="eleveModifierFormulaire"){
             if(isset($_GET["id"])){
                 $id =intval($_GET['id']);
                 $this->cntrlEleve->eleveModifierFormulaire($id);

             }else{
                throw new Exception ("identifiant d'élève non valide");
             }

         } else if($_GET['action']=="eleveModifier"){
             
            if(isset($_GET["id"])){
                $id =intval($_GET['id']);
                $eleve = new Eleve();
                $eleve->set_id($id);
                $eleve->set_nom($this->nettoyer($this->getParametre($_POST,'nom')));
                $eleve->set_prenom($this->nettoyer($this->getParametre($_POST,'prenom')));
                $eleve->set_date_naissance($this->nettoyer($this->getParametre($_POST,'date_naissance')));
                $eleve->set_moyen($this->nettoyer($_POST['moyen']));
                $eleve->set_appreciation($this->nettoyer($_POST['appreciation']));
                $eleve->set_id_classe(intval($this->nettoyer($this->getParametre($_POST,'classe'))));

                $this->cntrlEleve->eleveModifier($eleve);
            }else{
               throw new Exception ("identifiant d'élève non valide");
            }
         }else if($_GET['action']=="afficherDevoirs") {
         
           $this->cntrlDevoir->afficherDevoirs();

         }else if($_GET['action']=='afficherDevoirEleves'){
          if(isset($_GET['id'])){
            $id=intval($_GET['id']);
            $this->cntrlDevoir->afficherDevoirEleves($id);
          }else{
            throw new Exception ("identifiant du devoir non valide");
          }
         }else {
               throw new Exception ("Action non valide ");
         }
    }else {
        $this->cntrlAccueil->accueil();
    }


  }catch(Exception $e){
    $this->erreur($e->getMessage());
  }

}

public function erreur($msgErreur) {
  //require 'vue/vueErreur.php';
  $vueErreur = new Vue("Erreur");
  $vueErreur->generer(array('msgErreur'=>$msgErreur));
}

private function getParametre($tableau,$nom){
  if(isset($tableau[$nom]) && !empty($tableau[$nom])){
    return $tableau[$nom];
  }else{
    throw new Exception (" $nom est absent");
  }
}

private function nettoyer($valeur) {
    return htmlspecialchars(strip_tags(stripslashes(trim($valeur))));
  }

}  


