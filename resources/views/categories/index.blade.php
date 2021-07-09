@extends ('layouts.app')

 @section('content')  

 
  <div class="container">
    <div class="row">
      <div class="col-ad-8 col-nd-offset-2">
       <div class="panel panel-default">
         <div class="panel-heading">
         <a href="{{route('categories.create')}}" class="btn btn-success" >add Category</a>
         <a href="{{route('products.index')}}" class="btn btn-success" >view products</a>
         </div>
         
         
     <div class="panel-body">
    
                    
           <h1>Category list</h1>

            <table class="table table-striped">
             <thead>
             
             <tr>
               <th scope="col">Name</th>
               <th scope="col">Status</th>
               <th scope="col">Action</th>
                
             </tr>
              </thead>
              
               <tbody>

              
                @foreach($categories as $category)
                
                 <tr>
                     <th scope="row">{{ ucwords($category->name)}}</th>
                    
                     <td>{{ ucwords($category->status_value)}}</td>

                     <td>
                       <a href="{{route('categories.edit',['categoryId' => $category->id])}}" class="btn btn-primary">Edit</a>
                       <a href="{{route('categories.delete',['categoryId' => $category->id])}}" class="btn btn-danger">Delete</a>
                       
                     </td>

                 </tr>
                 @endforeach
                
                  
                   
                </tbody>
           </table>
      </div>
     </div> 
 </div>
 </div>
</div>
 @endsection