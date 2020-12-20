<?php 
    require_once 'model/ModelClasse.php';
    require_once 'Controleur.php';
    require_once 'model/ModelEleve.php';
    require_once 'vue/Vue.php';

    class ControleurEleve extends Controleur{

        function __construct()
        {
            $this->classe = new ModelClasse();
            $this->eleve = new ModelEleve();
        }

        public function eleveCreerFormulaire(){
            $classes = $this->classe->select_toutes_classes();
            $appreciations = ["Tres bien","bien","moyen","pas bien"];
            $vue = new Vue("EleveCreer");
            $vue->generer(array(
                'classes'=>$classes,
                'appreciations'=>$appreciations
            ));
        }

        public function eleveCreer($eleve){
           $this->eleve->insert_eleve($eleve);
           //$this->eleveCreerFormulaire();
           $classes = $this->classe->select_toutes_classes();
           $appreciations = ["Tres bien","bien","moyen","pas bien"];
           $vueEleveCreer = new Vue("EleveCreer");
           $vueEleveCreer->generer(array(
            'classes'=>$classes,
            'appreciations'=>$appreciations
            ));

        }

        public function eleveModifier($eleve){ 
           $this->eleve->update_eleve ($eleve);
           $this->eleveModifierFormulaire($eleve->get_id());
           //$eleveExiste = $this->eleve->select_eleve_id($eleve->get_id());
           //$classes = $this->classe->select_toutes_classes();
           //$appreciations = ["Tres bien","bien","moyen","pas bien"];
           //$vueEleveModifier = new Vue("EleveModifier");
           //$vueEleveModifier->generer(array(
            //'classes'=>$classes,
            //'appreciations'=>$appreciations,
            //'eleve_recupere'=>$eleveExiste
           //));
        }

        public function eleveModifierFormulaire($id_eleve){
            $eleveExiste = $this->eleve->select_eleve_id($id_eleve);
            $classes = $this->classe->select_toutes_classes();
            $appreciations = ["Tres bien","bien","moyen","pas bien"];
            $vueEleveModifier = new Vue("EleveModifier");
            $vueEleveModifier->generer(array(
             'classes'=>$classes,
             'appreciations'=>$appreciations,
             'eleve_recupere'=>$eleveExiste
            ));
        }
    }