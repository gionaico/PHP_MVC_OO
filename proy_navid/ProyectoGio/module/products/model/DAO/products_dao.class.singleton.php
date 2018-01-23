<?php
//echo json_encode("products_dao.class.singleton.php");
//exit;

class productDAO {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function create_product_DAO($db, $arrArgument) {
        $un= $arrArgument['un'];
        $pbt = $arrArgument['pbt'];
        $country = $arrArgument['country'];
        
        $province = $arrArgument['province'];

        $city = $arrArgument['city'];
        $add1 = $arrArgument['add1'];
        $phone = $arrArgument['phone'];
        $email = $arrArgument['email'];
        $message = $arrArgument['message'];
        $product_type = $arrArgument['product_type'];
        $avatar= $arrArgument['avatar'];
        $date_today= $arrArgument['date_today'];
        
        if ($product_type==='Sale Vehicle') {
            $brand = $arrArgument['brand'];
            $model = $arrArgument['model'];
            $year = $arrArgument['year'];
            $combustible = $arrArgument['combustible'];
            $color = $arrArgument['color'];   
          
            if ($country=="ES") {
                $sql = "INSERT INTO products (avatar, date_today, user_name, title, country, province, city, address, phone, email, description, product_type, brand, model, year, combustible, color) VALUES ('avatar', '$date_today', $un', '$pbt', '$country', '$province', '$city', '$add1', '$phone', '$email', '$message', '$product_type', '$brand', '$model', '$year', '$combustible', '$color' )";
            }else{
                $sql = "INSERT INTO products (avatar, date_today, user_name, title, country, address, phone, email, description, product_type, brand, model, year, combustible, color) VALUES ('avatar', '$date_today', $un', '$pbt', '$country', '$add1', '$phone', '$email', '$message', '$product_type', '$brand', '$model', '$year', '$combustible', '$color' )";
            }       
        }else{
            if ($country=="ES") {
              $sql = "INSERT INTO products (avatar, date_today, user_name, title, country, province, city, address, phone, email, description, product_type) VALUES ('$avatar', '$date_today', '$un', '$pbt', '$country', '$province', '$city', '$add1', '$phone', '$email', '$message', '$product_type')";
                      
             }else{
              $sql = "INSERT INTO products (avatar, date_today, user_name, title, country, address, phone, email, description, product_type) VALUES ('$avatar', '$date_today', '$un', '$pbt', '$country', '$add1', '$phone', '$email', '$message', '$product_type')";
             }
        }
      return $db->ejecutar($sql);
    }

    public function obtain_countries_DAO($url){
          $ch = curl_init();
          curl_setopt ($ch, CURLOPT_URL, $url);
          curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
          $file_contents = curl_exec($ch);

          $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          curl_close($ch);
          $accepted_response = array(200, 301, 302);
          if(!in_array($httpcode, $accepted_response)){
            return FALSE;
          }else{
            return ($file_contents) ? $file_contents : FALSE;
          }
    }

    public function obtain_provinces_DAO(){
          $json = array();
          $tmp = array();

          $provincias = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/proy_navid/ProyectoGio/resources/provinciasypoblaciones.xml');
          $result = $provincias->xpath("/lista/provincia/nombre | /lista/provincia/@id");
          for ($i=0; $i<count($result); $i+=2) {
            $e=$i+1;
            $provincia=$result[$e];

            $tmp = array(
              'id' => (string) $result[$i], 'nombre' => (string) $provincia
            );
            array_push($json, $tmp);
          }
              return $json;

    }

    public function obtain_cities_DAO($arrArgument){
          $json = array();
          $tmp = array();

          $filter = (string)$arrArgument;
          $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/proy_navid/ProyectoGio/resources/provinciasypoblaciones.xml');
          $result = $xml->xpath("/lista/provincia[@id='$filter']/localidades");

          for ($i=0; $i<count($result[0]); $i++) {
              $tmp = array(
                'poblacion' => (string) $result[0]->localidad[$i]
              );
              array_push($json, $tmp);
          }
          return $json;
    }
}//End productDAO
