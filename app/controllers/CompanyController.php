<?php
namespace App\Controllers;

use App\Models\Company;

class CompanyController{
    public function index()
    {
        $congty = Company::all();
        return view('cong-ty-ds', [
            'congty' => $congty
        ]);
    }

    public function xoa($id)
    {
        Company::destroy($id);
        header('location: http://localhost/asm-php2/companies');
    }
}

?>