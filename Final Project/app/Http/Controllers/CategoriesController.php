<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function create(){
        return view('Categories.tambahCategory');
    }
    public function storeCategory(Request $request){
        $request->validate([
            'name' => 'required|min:2',
        ]);

        DB::table('categories') -> insert([
            'name' =>$request->input('name'),
        ]);

        return redirect('/category');
    }

    public function indexCategory(){
        $categories = DB::table('categories')->get();

        return view('Categories.displayCategories', ['categories' => $categories]);
    }
    public function showCategory($id){
        $categories = Categories::find($id);

        return view('Categories.detailCategories', ['categories' => $categories]);
    }
    public function editCategory($id){
        $categories = Categories::find($id);

        return view('Categories.editCategories', ['categories' => $categories]);
    }
    public function updateCategory(Request $request, $categories_id){
        $request->validate([
            'name' => 'required',
        ]);

        DB::table('categories')
            ->where('id', $categories_id)
            ->update(
                [
                    'name' => $request->input('name'),
                ]
            );
            return redirect('/category');
    }
    public function destroyCategory($id){
        DB::table('categories')->where('id', '=', $id)->delete();

        return redirect('/category');
    }
}   

