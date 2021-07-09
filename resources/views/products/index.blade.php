@extends ('layouts.app')

 @section('content')
  <div class="container">
    <div class="row">
      <div class="col-ad-8 col-nd-offset-2">
       <div class="panel panel-default">
         <div class="panel-heading">
         <a href="{{route('products.create')}}" class="btn btn-success" >add Product</a>
         <a href="{{route('products.export')}}" class="btn btn-success" >export product</a>
         <a href="{{route('products.importdisplay')}}" class="btn btn-success" >import product</a>
         <a href="{{route('categories.index')}}" class="btn btn-success" >category</a>
         <br>
         @php
                    $date=date_create();
                    echo  date_format($date,"d/ m / y  H:i:s A");  
                    @endphp


         
         </div>
         
         
     <div class="panel-body">
    
                    
           <h1>Product List</h1>

            <table class="table table-striped">
             <thead>
             
             <tr>
               <th scope="col">Id</th>
               <th scope="col">Owner</th>

               <th scope="col">Category</th>
               <th scope="col">Name</th>
               <th scope="col">Information</th>
               <th scope="col">Image</th>
               
               <th scope="col">Status</th>
               <th scope="col">Add on</th>
               <th scope="col">Option</th>
                
             </tr>
              </thead>
              
               <tbody>

                    @php
                        $srNo=1;
                    @endphp
               @if(count($products) > 0)
                @foreach($products as $product)
               

                    
                
                 <tr>
                 
                        <th>
                        @php
                             echo $srNo;
                             $srNo=$srNo+1;
                        @endphp
                        </th>
                     <td>{{ $product->user->fname}} {{ $product->user->lname}}</td>
                     <td>{{ ucwords($product->category->name)}}</td> 

                     <td>{{  ucwords($product->name)}}</td>
                     <td>{{ Str::title($product->info)}}</td>
                     <td><image width=100px hight=100px alt="{{$product->image}}" src= "{{'../storage/app/public/images/'.$product->image}}" /></td>

                     <td>{{ $product->status_value}}</td>
                    @php
                    $date=date_create($product['created_at']);
                    echo "<td>". date_format($date,"d/ m / y  H:i:s A")."</td>";  
                    @endphp

                    

                  
                      

                       @if(Auth::user()->id == $product->user_id)
                                <td><a href="{{route('products.edit',$product->id)}}"class="btn btn-primary">Edit </a>
                                </td> 
                                <td><a href="{{route('products.delete',$product->id)}}" class="btn btn-danger">Delete</a> </td>
                                @else
                                <td>  ----
                                </td>
                                <td>  ----  </td>
                                @endif


                       
                     
                     

                 </tr>
                 @endforeach
                @else  
                   <tr>

                   <td colspan="3">No Data Found</td>
                   
                   </tr>
                  
                  @endif
                </tbody>
           </table>
      </div>
     </div> 
 </div>
 </div>
</div>
 @endsection