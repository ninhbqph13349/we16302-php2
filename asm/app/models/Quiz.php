<?php
namespace App\Models;
class Quiz extends BaseModel{
    protected $tableName = 'quizs';
    public $data = [];
    // public function quiz(){
    //     $quiz = Quiz::where(['id','=',$this->quiz_id])->first();
    //     if($quiz){
    //         return $quiz;
    //     }else{
    //         return null;
    //     }
    // }
}
?>