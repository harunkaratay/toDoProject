<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::where('user_id', Auth::id())->get();
        return view('panel.categories.index', compact('categories'));
    }

    public function createPage(){

        return view('panel.categories.create');
    }

    public function addCategory(request $request){

        $category = new Category();
        $category->name= $request->category_name;

        if($request->category_status=='Aktif'){
            $category->is_active = 1;
        }else{
            $category->is_active=0;
        }

        $category->user_id = Auth::id();
        $category->save();
        return redirect()->route('panel.categoryIndex')->with(['success'=>'Kategori başarıyla oluşturuldu.✅']);
    }

    public function updatePage($id){
        //$category = Category::where('id',$id)->first();
        $category = Category::find($id);
        return view('panel.categories.update', compact('category'));
    }

    public function updateCategory(request $request){

        $request->validate([
            //'form_name'=>'kurallar'|'kurallar'
            'category_status'=>'min:0|max:1|required',
            'category_name'=>'min:3|max:25|required',
        ]);

        $category=Category::find($request->category_id);
        if($category!=null){

            $category->name= $request->category_name;
            $category->is_active= $request->category_status;
            $category->save();
            return redirect()->route('panel.categoryIndex')->with(['success'=>'Kategori başarıyla güncellendi.✅']);

        }
        else{
            return redirect()->route('panel.categoryIndex')->with(['errors'=>'Tamam, en büyük hacker sensin']);
        }
    }

    public function deleteCategory($id){
        $category= Category::find($id);
        if($category!=null){
            $category->delete();
            return redirect()->route('panel.categoryIndex')->with(['success'=>'Kategori başarıyla silindi.✅']);
        }else{
            return redirect()->route('panel.categoryIndex')->with(['erors'=>'Bir hata oluştu! Kategeri silinemedi.']);
        }

    }

}
