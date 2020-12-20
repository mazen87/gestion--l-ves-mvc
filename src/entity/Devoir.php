<?php 
    class Devoir {
        private $id;
        private $titre;
        private $description;
        private $date_devoir;
        private $dateEcheance;
        private $status;

        function __construct()
        {
            
        }

        public function get_id(){
            return $this->id;
        }
        public function get_titre(){
            return $this->titre;
        }
        public function get_description(){
            return $this->description;
        }
        public function get_date_devoir(){
            return new DateTime($this->date_devoir);
        }
        public function get_dateEcheance(){
            return new DateTime($this->dateEcheance);
        }
        public function get_status(){
            return $this->status;
        }



        public function set_id($id){
            $this->id = $id;
        }
        public function set_titre($titre){
            $this->titre = $titre;
        }
        public function set_description($description){
            $this->description = $description;
        }
        public function set_date_devoir($date_devoir){
            $this->date_devoir = new DateTime($date_devoir);
        }
        public function set_dateEcheance($dateEcheance){
            $this->dateEcheance = $dateEcheance;
        }
        public function set_status($status){
            $this->status = $status;
        }
         /**
         * fonction permet de convertir la date en format sql 
         */
        public function getDateFormatSql() {
            return $this->date_naissance->format("Y-m-d H:i:s");
         }
        
    }