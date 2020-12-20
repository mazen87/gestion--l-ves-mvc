<?php
    require_once 'model/ModelClasse.php';
    require_once 'Controleur.php';
    require_once 'model/ModelEleve.php';
    require_once 'vue/Vue.php';


    class ControleurAccueil extends Controleur{

        function __construct()
        {
            $this->classe = new ModelClasse();
            $this->eleve = new ModelEleve();
        }

        public function accueil(){
            $classes = $this->classe->select_toutes_classes();
            $eleves = $this->eleve->select_tous_eleves();
            $vueAccueil = new Vue("Accueil");
            $vueAccueil->generer(array(
                'eleves'=>$eleves,
                'classes'=>$classes
            ));
        }

        public function accueilClasse($id_classe){
            $classes = $this->classe->select_toutes_classes();
            $eleves = $this->eleve->select_tous_eleves_classe($id_classe);
            $vueAccueil = new Vue("Accueil");
            $vueAccueil->generer(array(
                'eleves'=>$eleves,
                'classes'=>$classes
            ));
        }
    }