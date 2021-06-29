<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function Index(){
        $category = DB::table('categories')->orderBy('id', 'asc')->paginate(5);
        return view('backend.category.index', compact('category'));  

    }

    public function AddCategory(){
        return view('backend.category.create');
    }


    public function StoreCategory(Request $request){
        $validateDate = $request->validate([

            'category_eng' => ' required',
            'category_hin' => 'required', 

        ]);

        $data = array();
        $data['category_eng'] = $request->category_eng;
        $data['category_hin'] = $request->category_hin;
        DB::table('categories')->insert($data);

        $notif = array(

            'message' => 'Category Berhasil ditambahkan',
            'alert-type' => 'success'
        );


        return redirect('categories')->with($notif);
    }

    public function EditCategory($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return view('backend.category.edit', compact('category'));

    }

    public function UpdateCategory(Request $request, $id){
        $data = array();
        $data['category_eng'] = $request->category_eng;
        $data['category_hin'] = $request->category_hin;
        DB::table('categories')->where('id', $id)->update($data);

        $notif = array(

            'message' => 'Category Berhasil diperbaharui',
            'alert-type' => 'success'
        );

        return redirect('categories')->with($notif);

    }

    public function DeleteCategory($id){

        $categoryDel = DB::table('categories')->where('id', $id);
        $categoryDel->delete();

        $notif = array(

            'message' => 'Category Berhasil Dihapus',
            'alert-type' => 'warning'
        );



            return redirect('categories')->with($notif);
    }
}
