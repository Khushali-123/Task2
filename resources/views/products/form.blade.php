
<a href="{{route('products.index')}}" class="btn btn-success" >view product</a>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name',$product->name) }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
   
         <label for="info" class="col-md-4 col-form-label text-md-right">{{ __('information') }}</label>
         <div class="col-md-6">
            <textarea style="position:absolute; left:8%;" placeholder="Enter Description of your product here" type="text"  name="info" required></textarea><br><br><br>
          </div>

          <label for="info" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>
         <div class="col-md-6">
         <input style="position:absolute; left:8%;" type="file" name ="image" required> <br><br>
 
          </div>




                       
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>

                            <div class="col-md-6">
                            <select class= "form-control" name="status">
                                 
                            <option value="">---select status---</option>
                            <option value="1">inactive</option>
                            <option value="2">active</option>

                            
                            </select>
                            </div>
                                                

    <div class="form-group row" {{$errors->has('category_id') ? ' has-error':''}}>
        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('category') }}</label>

        <div class="col-md-6">
            <select class="form-control" name="category_id">
                <option value="">---select category---</option>
                @foreach($categories as $category)
                <option @if($product->category_id === $category->id) selected @endif value=
                    "{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
