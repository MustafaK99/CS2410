@extends('layouts.app')

@section('content')
    <h1> Create Listing</h1>
    {!! Form::open(['action' => 'ItemsController@store', 'method'=> 'POST','enctype'=> 'multipart/form-data'] )!!}
      
    <div class="form-group">
      {{Form::label('itemName', 'Item Name')}}
      {{Form::text('itemName', '', ['class' => 'form-control', 'placeholder' => 'Enter item name' ])}}
      
      {{Form::label('category', 'Category')}}
      {{Form::text('category', '', ['class' => 'form-control', 'placeholder' => 'Enter category of item' ])}}

      {{Form::label('description', 'Description')}}
      {{Form::textarea('description', '', ['class' => 'form-control','id'=>'editor', 'placeholder' => 'Enter item description' ])}}

      {{Form::label('foundPlace', 'Place found')}}
      {{Form::text('foundPlace', '', ['class' => 'form-control', 'placeholder' => 'Enter place where item was found' ])}}

      {{Form::label('colour', 'Colour')}}
      {{Form::text('colour', '', ['class' => 'form-control', 'placeholder' => 'Enter colour of item' ])}}
    </div>
      <div class="form-group">
          {{Form::file('item_image')}}
      </div>
     {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
   {!! Form::close() !!}
@endsection