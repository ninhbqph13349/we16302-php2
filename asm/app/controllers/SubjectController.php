<?php
namespace App\Controllers;

use App\Models\BaseModel;
use App\Models\Subject;

class SubjectController extends BaseModel{
    public function index(){
        $subjects = Subject::rawQuery("SELECT u.*, s.id AS id_subject, s.name AS name_subject FROM subjects s JOIN users u ON s.author_id=u.id")
                            ->get();
        require_once './app/views/admin/subjects/subject.php';
        
    }
    public function add(){
        $subjects = Subject::rawQuery("SELECT u.*,u.id as author_id, s.id AS id_subject, s.name AS name_subject FROM subjects s JOIN users u ON s.author_id=u.id")
                            ->get();
        require_once './app/views/admin/subjects/add-subject.php';
    }
    public function save_add(){
        $model = new Subject();
        $data = [
            'name'=>$_POST['name_subject'],
            'author_id'=>$_POST['author_id']
        ];
        $model->insert($data);
        header('location: '. BASE_URL . 'mon-hoc' );
        die;
        
        // var_dump($data);
    }
    public function delete(){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        // var_dump($id);
        if(!$id){
            header('location: ' . BASE_URL . 'mon-hoc');
            die;    
        }else{
            Subject::destroy($id);
            header('location: ' . BASE_URL . 'mon-hoc');
            die;
        }
        
    }
    public function detail(){

    }
    public function edit(){
        require_once './app/views/admin/subjects/edit-subject.php';
        $id = $_GET['id'];
        $model = Subject::where(['id','=', $id])->first();
        if(!$model){
            header('location: '. BASE_URL . 'mon-hoc');
            die;
        }
        var_dump($model);
        die;
        
    }
    public function save_edit(){
        // $model = new Subject();
        // $data = [
        //     'name'=>$_POST['name_subject'],
        //     'author_id'=>$_POST['author_id']
        // ];
        // $model->update($data);
        // header('location: '. BASE_URL . 'mon-hoc' );
        // die;

    }

}

?>