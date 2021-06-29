<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SubCategoryController extends Controller
{
    public function Index(){
         $subcategory = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*','categories.category_eng')
             ->orderBy('id', 'desc')->paginate(4);
        return view('backend.subcategory.index', compact('subcategory'));  

    }

    public function AddSubCategory(){
        $category = DB::table('categories')->get();
        return view('backend.subcategory.create', compact('category'));
    }

    public function StoreSubCategory(Request $request){
        $validateDate = $request->validate([

            'subcategory_eng' => ' required',
            'subcategory_hin' => 'required', 

        ]);

        $data = array();
        $data['subcategory_eng'] = $request->subcategory_eng;
        $data['subcategory_hin'] = $request->subcategory_hin;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->insert($data);

        $notif = array(

            'message' => 'SubCategory Berhasil ditambahkan',
            'alert-type' => 'success'
        );


        return redirect('subcategories')->with($notif);
    }

    public function EditSubCategory($id){
        $subcategory = DB::table('subcategories')->where('id', $id)->first();
        $category = DB::table('categories')->get();
        return view('backend.subcategory.edit', compact('subcategory','category'));

    }

    public function UpdateSubCategory(Request $request, $id){

        $data = array();
        $data['subcategory_eng'] = $request->subcategory_eng;
        $data['subcategory_hin'] = $request->subcategory_hin;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->where('id', $id)->update($data);


        $notif = array(

            'message' => 'SubCategory Berhasil diperbaharui',
            'alert-type' => 'success'
        );

        return redirect('subcategories')->with($notif);

    }

    public function DeleteSubCategory($id){

        $subcategoryDel = DB::table('subcategories')->where('id', $id);
        $subcategoryDel->delete();

        $notif = array(

            'message' => 'SubCategory Berhasil Dihapus',
            'alert-type' => 'warning'
        );

            return redirect('subcategories')->with($notif);
    }
}
