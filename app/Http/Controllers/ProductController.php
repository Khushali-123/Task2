<?php

namespace App\Http\Controllers;
use Auth;
use App\Category;
use App\Exports\productsExport;
use Illuminate\Http\Request;
use App\Product;
use App\user;
// use Illuminate\Support\Facades\Auth;
use App\Imports\productImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

use Log;




class ProductController extends Controller
{
    public function index(){
        try{
            if (!Auth::check()){
                return redirect('login');
            }
           
        $products = Product::all();
       // $users = User::all();
       

        // $category = "";
        // foreach($products as $product){
        //     $category = Category::where('id',$product['category_id'])->pluck('name');

        // }
          return view('products.index')->with('products',$products);

        }catch (\Exception $ex){
        
            \Log::error($ex);
        
        }
     
    } 

    public function create(){
        try{
           
        $product = new Product();

        $categories = Category::where('status',2)->get();
          return view('products.create', compact('product','categories'));

        }catch (\Exception $ex){
            \Log::error($ex);
        
        }
     
    } 


  
    public function edit($productId){
        try{
           
        $product = Product::find($productId);


        $categories = Category::where('status',2)->get();
          return view('products.edit', compact('product','categories'));

        }catch (\Exception $ex){
            \Log::error($ex);
        
        }
     
    } 

    

    public function update($productId, Request $request){
        try{
            $data = $request->all();
            $filenameWithExt = $filename = $extension = $fileNameToStore = $path = " ";
          
     //Add new image
             if($request->hasFile('image'))
                {

                    $filenameWithExt = $request->file('image')->getClientOriginalName ();
                    // Get Filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just Extension
                    $extension = $request->file('image')->getClientOriginalExtension();
                    // Filename To store
                    $fileNameToStore = $filename. '_'. time().'.'.$extension;
                    // Upload Image
                    $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
                    
                }   
            // $product = Product::findOrFail($productId)([
            //     'name' => $data['name'],
            //     'info' => $data['info'],
            //     'status' => $data['status'],
            //      'category_id' => $data['category_id'],
            //      'image' => $data['fileNameToStore']

            // ]); 
            

            $product = Product::findOrFail($productId);
           // return redirect()->route('products.index');
            $product->user_id =  \Auth::user()->id;
            $product->name = $data['name'];
            $product->info = $data['info'];

          

            $product->status = $data['status'];
            $product->category_id =$data['category_id'];
            
            $product->image = $fileNameToStore;

            

            $product ->save();
            return redirect()->route('products.index');



                  
        
        }catch (\Exception $ex){
            \Log::error($ex);
            // dd($ex);
        }
     
    }

  


    public function store(Request $request){

        try{

            $validate = Validator::make($request->all(), [
                'image' => 'mimes:jpeg,jpg,png',
                'name' => 'required|string|max:255',
                'info' => 'required|string|max:255'
            ]);
            if ($validate->fails()) {
                return redirect()->back()->withErrors($validate)->withInput();
            }

                $data = $request->all();
                $filenameWithExt = $filename = $extension = $fileNameToStore = $path = " ";
               
                if($request->hasFile('image'))
                {

                    $filenameWithExt = $request->file('image')->getClientOriginalName ();
                    // Get Filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just Extension
                    $extension = $request->file('image')->getClientOriginalExtension();
                    // Filename To store
                    $fileNameToStore = $filename. '_'. time().'.'.$extension;
                    // Upload Image
                    $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
                    
                }
                
                $product = new Product();

                $product->user_id =  \Auth::user()->id;
                $product->name = $data['name'];
                $product->info = $data['info'];
                $product->status = $data['status'];
                $product->category_id =$data['category_id'];
                $product->image = $fileNameToStore;

                $product ->save();
                return redirect()->route('products.index');

               
           
           
            if($product->save()){

                return redirect()->route('products.index');
            }
           

            }catch (\Exception $ex){
                \Log::error($ex);
            
            }
        }


        public function export()
        {
            try {
            return Excel::download(new productsExport(), 'products'. '_'. time().'.'.'xlsx');
            }
            catch (\Exception $e) {
                Log::error($e);
            }
        }

    





    public function destroy($productId){
        try{
           
            $product = Product::findOrFail($productId);

            if(!empty($product)){
                $product->delete();
            }
           
          return redirect()->back();

        }catch (\Exception $ex){
            \Log::error($ex);
            // dd($ex);
        }
     
    }


   

    public function import(Request $request)
    {
      //  return "Hello";
      try
        {
                 Excel::import( new productImport, $request->import);
                return view('products.index')->with("Succesfully imported");
         }
       catch (\Exception $e)
        {
            echo $e;
            Log::error($e);
        }
    }

    public function importdisplay()
   {
    try{
           
        return view('products.import');

        }catch (\Exception $ex){
            echo $ex;
            \Log::error($ex);
        
        }


   }



   public function helpers(){
    try{
        
        $array = Category::all();
        $contains = Arr::has($array, 'categorys.name');



      return view('products.helper',compact('contains'));

    }catch (\Exception $ex){
        \Log::error($ex);
        // dd($ex);
    }
 
}

}
