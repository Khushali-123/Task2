 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('import') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('products.import')}}" enctype="multipart/form-data">
                       @csrf 
                       
                    <label for="import" class="col-md-4 col-form-label text-md-right">{{ __('import') }}</label>
         <div class="col-md-6">
         <input style="position:absolute; left:8%;" type="file" name ="import" required> <br><br>
         @error('import')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

          </div>
                      

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('update') }}
                                </button>

                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
                           