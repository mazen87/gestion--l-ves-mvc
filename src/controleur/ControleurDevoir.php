<?php 
    require_once 'model/ModelDevoir.php';
    require_once 'Controleur.php';
    require_once 'vue/Vue.php';

    class ControleurDevoir extends Controleur{

        function __construct()
        {
            $this->devoir = new ModelDevoir();
        }

        public function afficherDevoirs(){
            $devoirs = $this->devoir->select_tous_devoirs();
            $vueDevoirs = new Vue("Devoirs");
            $vueDevoirs->generer(array(
                'devoirs'=>$devoirs
            ));
        }

        public function afficherDevoirEleves($id_devoir){
            $devoir_eleves= $this->devoir->select_devoir_eleves($id_devoir);
            $vueDevoirEleves = new Vue("DevoirEleves");
            $vueDevoirEleves->generer(array(
                'devoirEleves'=>$devoir_eleves
            ));
        }
    }