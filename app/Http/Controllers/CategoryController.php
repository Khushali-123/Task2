<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    public function index(){
        try{
                if (!Auth::check()){
                    return redirect('login');
                }
           
            $categories = Category::all();
          return view('categories.index',compact('categories'));

        }catch (\Exception $ex){
            \Log::error($ex);
            // dd($ex);
        }
     
    }

    public function create(){
        try{
           
           
          return view('categories.create');

        }catch (\Exception $ex){
            \Log::error($ex);
            // dd($ex);
        }
     
    }

    public function store(Request $request){
        try{
           
            $category = new Category();

            $category->name = $request->name;
            $category->status = $request->status;

            $category->save();
           
          return redirect()->route('categories.index');

        }catch (\Exception $ex){
            \Log::error($ex);
            // dd($ex);
        }
     
    }


    public function edit($categoryId){
        try{
           
            $category = Category::findOrFail($categoryId);
           
          return view('categories.edit',compact('category'));

        }catch (\Exception $ex){
            \Log::error($ex);
            // dd($ex);
        }
     
    }




    public function update($categoryId, Request $request){
        try{
           
            $category = Category::findOrFail($categoryId);

            $category->name = $request->name;
            $category->status = $request->status;

            $category->save();
           
          return redirect()->route('categories.index');

        }catch (\Exception $ex){
            \Log::error($ex);
            // dd($ex);
        }
     
    }



    public function destroy($categoryId){
        try{
           
            $category = Category::findOrFail($categoryId);

            if(!empty($category)){
                $category->delete();
            }
           
          return redirect()->back();

        }catch (\Exception $ex){
            \Log::error($ex);
            // dd($ex);
        }
     
    }




}
