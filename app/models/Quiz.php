<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Quiz extends Model{
    protected $table = 'quizs';

    public function subject(){
        // belongsTo(Class cha, khóa ngoại của class con, khóa chính của class cha)
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}
?>