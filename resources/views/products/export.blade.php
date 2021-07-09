@extends ('layouts.app')
<table class="table table-striped">
             <thead>
             
             <tr>
               <th scope="col">id</th>
               <th scope="col">owner</th>

               <th scope="col">category</th>
               <th scope="col">name</th>
               <th scope="col">information</th>
               <th scope="col">image</th>
               
               <th scope="col">status</th>
               <th scope="col">add on</th>
               
                
             </tr>
              </thead>
              
               <tbody>

              
                @foreach($products as $product)
               
                
                 <tr>
                 <th scope="row">{{ $product->id}}</th>
                     <td>{{ $product->user_id}}</td>
                     <td>{{ $product->category->name}}</td> 

                     <td>{{$product->name}}</td>
                     <td>{{$product->info}}</td>
                     <!-- <td>{{ $product->image}}</td> -->

                     <td>{{ $product->status_value}}</td>
                     

                    

                     

                 </tr>
                 @endforeach
               
                 
                </tbody>
           </table>