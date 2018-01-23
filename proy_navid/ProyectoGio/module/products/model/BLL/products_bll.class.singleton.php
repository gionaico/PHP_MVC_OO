<?php
//echo json_encode("products_bll.class.singleton.php");
//exit;


require($_SERVER['DOCUMENT_ROOT']."/proy_navid/ProyectoGio/model/Db.class.singleton.php");
require($_SERVER['DOCUMENT_ROOT']."/proy_navid/ProyectoGio/module/products/model/DAO/products_dao.class.singleton.php");

class products_bll{
    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = productDAO::getInstance();
        $this->db = Db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function create_product_BLL($arrArgument){
      return $this->dao->create_product_DAO($this->db, $arrArgument);
    }

    public function obtain_countries_BLL($url){
      return $this->dao->obtain_countries_DAO($url);
    }

    public function obtain_provinces_BLL(){
      return $this->dao->obtain_provinces_DAO();
    }

    public function obtain_cities_BLL($arrArgument){
      return $this->dao->obtain_cities_DAO($arrArgument);
    }
}
