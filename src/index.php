<?php
    
    /*
    require_once 'model/ModelClasse.php';
    $modelClasse = new ModelClasse();
    $classes = $modelClasse->select_toutes_classes();
    var_dump($classes);
    */
    //require_once 'model/ModelEleve.php';
    //require_once 'entity/Eleve.php';
    //$modelEleve = new ModelEleve();
    //$eleve = new Eleve();
    //$eleve->set_id(51);
    //$eleve->set_nom("testMvc1");
    //$eleve->set_prenom("testMvc1");
    //$eleve->set_date_naissance("10/22/1980");
    //$eleve->set_id_classe(1);
    //$eleve->set_moyen(95);
    //$eleve->set_appreciation("tres bien");
    //$eleves=$modelEleve->select_tous_eleves_classe(1);
    //$eleve= $modelEleve->select_eleve_id(50);
    //var_dump($eleve);
    //require_once 'controleur/ControleurEleve.php';
    //$eleveCreer = new ControleurEleve();
    //$eleveCreer->eleveModifierFormulaire(51);
    require_once 'controleur/Routeur.php';
    $routeur = new Routeur();
    $routeur->routerRequete();
