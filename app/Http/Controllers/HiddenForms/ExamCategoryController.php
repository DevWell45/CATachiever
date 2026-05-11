<?php

namespace App\Http\Controllers\HiddenForms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamCategoryController extends Controller
{
    public function Category(Request $request){
        $category = $request->category;

        session([
            'category' => $category
        ]);

        return redirect()->route('exam_page');

    }
}
