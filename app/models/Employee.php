<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Employee extends Model{
    protected $table = 'employees';

    function tenCongTy(){
        $congty = Company::find($this->company_id);
        if($congty){
            return $congty->name;
        }
        return null;
    }
}
?>