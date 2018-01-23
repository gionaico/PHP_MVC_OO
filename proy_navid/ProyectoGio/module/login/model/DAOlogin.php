<?php 
// echo "daoLogin";
// exit;
    function testLogin_m($login,  $pass){

        
            $conexion = connect::con();

            $sql=("SELECT password FROM usuario2 WHERE user ='$login'");
            $res = mysqli_query($conexion, $sql);
            $cant_filas=mysqli_num_rows($res);

            // while(($fila=mysqli_fetch_array($res, MYSQL_ASSOC))==true){//el true no hace falta porque inician en true siempre.
            //     $pass_enc_bd= $res;
            // }

            foreach ($res as $row) {
                    $pf=$row['password'];
            }
                     
            if($cant_filas==1){
                // if (password_verify($pass, $pf )) {
                if (password_verify($pass, $pf )) {
                    // echo "entra en encr";
                    return true;
                }else{
                    // echo "entra en false";
                    return false;
                }
            }else{
                return false;
            }

    }
/*----------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------*/
    function testAdm_or_Norm($login){
         

        $admin=false;
            $conexion = connect::con();

            $sql=("SELECT user_type FROM usuario2 WHERE user ='$login'");
            $res = mysqli_query($conexion, $sql);
            foreach ($res as $row) {
                    $user_type=$row['user_type'];
            }
            if ($user_type==1) {
                $admin=true;
            }
            return $admin;
        
    }
/*----------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------*/

    function userAlreadyExists_m($login){

        $conexion = connect::con();
        $sql=("SELECT * FROM usuario2 WHERE user ='$login'");
        $res = mysqli_query($conexion, $sql);
        $res_consulta=mysqli_num_rows($res);

        if($res_consulta==1){
            return true;
        }else{
            return false;
        }

        
    }



    function make_login($user, $pass){
    //$password_cifrado=password_hash($_POST["password"], PASSWORD_DEFAULT);
    //LOGIN

    // if(isset($_GET["action"]) && $_GET["action"] == "login"){

        //if(isset($_POST["name"]) && isset($_POST["password"])){
            // $name=$_POST["name"];
            // $password=$_POST["password"];
            $valido=false;
            
            $logUser_type=null;
            $error=null;
            if (userAlreadyExists_m($user)) {
                $testeo = testLogin_m($user, $pass);
                if($testeo){
                    $admin=testAdm_or_Norm($user);
                    //$_SESSION["administrador"]=$admin;
                    if ($admin) {
                        $logUser_type=1;
                    }else{
                        $logUser_type=0;
                    }
                    $valido=true;
                }
                else{ 
                    $error = " ".$user." does not have this password";
                }
            }else{
                $error = "User not exist in DB";
            }
            return $return = array('resultado' => $valido, 
                            'error' => $error, 
                            'logUser_type' => $logUser_type);
       // }
    //}
}

 ?>