<?php
namespace App\Controllers;

use App\Models\BaseModel;
use App\Models\Question;

class QuestionController extends BaseModel{
    public function detail_quizs(){
        $questions = Question::rawQuery('SELECT q.*, a.content, a.img FROM questions q JOIN answers a ON q.id = a.question_id')
                            ->get();
        require_once "./app/views/admin/quizs/detail-quizs.php";
    }
}






?>