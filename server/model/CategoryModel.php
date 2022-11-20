<?php
    require_once PATH . "/model/Database.php";

    class CategoryModel extends Database
    {
        public function getCategories()
        {
            return $this->select("SELECT * FROM `category`");
        }
    }
?>