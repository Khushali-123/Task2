@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="panel-heading">
                          <a href="{{route('products.index')}}" class="btn btn-success" > Product</a>
                          <a href="{{route('categories.index')}}" class="btn btn-success" >category</a>
                          <!-- <a href="{{route('profile')}}" class="btn btn-success" >update</a> -->

                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
