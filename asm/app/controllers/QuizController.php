<?php
namespace App\Controllers;

use App\Models\BaseModel;
use App\Models\Quiz;
use App\Models\Subject;

class QuizController extends BaseModel{
    public function index(){
        $quizs = Quiz::rawQuery("SELECT q.*, s.name AS name_subject 
                                FROM quizs q JOIN subjects s ON q.subject_id = s.id")
                                ->get();
        require_once "./app/views/admin/quizs/quizs.php";
    }
    public function add(){
        $subjects = Subject::all();
        require_once "./app/views/admin/quizs/add-quizs.php";
    }
    public function save_add(){
        $model = new Quiz();
        $data = [
            'name'=>$_POST['name'],
            'subject_id'=>$_POST['subject_id'],
            'duration_minutes'=>$_POST['duration_minutes'],
            'start_time'=>$_POST['start_time'],
            'end_time'=>$_POST['end_time'],
            'status'=>$_POST['status'],
            'is_shuffle'=>$_POST['is_shuffle'],
        ];
        $model->insert($data);
        header('location: ' . BASE_URL . 'mon-hoc/quizs');
        die;
    }
    
    
}

?>