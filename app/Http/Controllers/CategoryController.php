<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::get();
        return view('panel.categories.index', compact('categories'));
    }

    public function createPage(){

        return view('panel.categories.create');
    }

    public function addCategory(request $request){

        $category = new Category();
        $category->name= $request->category_name;
        $category->save();

        return redirect()->route('panel.categoryIndex')->with(['success'=>'Kategori başarıyla oluşturuldu.✅']);
    }

}
