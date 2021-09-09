@extends('layouts.admin.main')
@section('headerTitle', 'Add Category')
@section('pageTitle', 'Add Category')
@section('content')


   {!! Form::open(['url' => route('category.index'), 'id' => 'formValidate', 'files' => true]) !!}


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        
                        <div class="mrg-btm-20">
                            <a href="{{ route('concept.index') }}" class="btn btn-primary btn-rounded btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
                        </div>
                        
                        @include ('admin.category.form', ['submitButtonText' => 'Update'])
                    </div>
                </div>
            </div>
        </div>
        

	{!! Form::close() !!}
@endsection