<?php
namespace App\Controllers;

use App\Models\BaseModel;

class DashboardController extends BaseModel{
    public function index(){
        require_once './app/views/admin/dashboard.php';
    }

}

?>