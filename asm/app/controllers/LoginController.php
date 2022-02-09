<?php
namespace App\Controllers;

use App\Models\BaseModel;
use App\Models\User;

class LoginController extends BaseModel{
    public function login(){
        require_once './app/views/client/login.php';
        if(isset($_POST['login'])){
            $users = User::where(['email','=',$_POST['email']])
                        ->andWhere(['password','=',$_POST['password']])
                        ->first();
            
            // echo '<pre>';
            // var_dump($users);

            if($users){
                if($users->role_id ==1){
                    header('location: ' . BASE_URL . 'dashboard');
                }elseif($users->role_id ==2){
                    header('location: ' . BASE_URL);
                }
            }
        }
    }
    
    public function logout(){
        header('location: ' . BASE_URL . 'login');
    }
}

?>