@extends('layouts.app')

@section('content')
<a href="/items" class="btn btn-outline-secondary "> Back </a>
    <h1> {{$item->itemName}}</h1>
    <img style = "width:10%" src="/storage/item_images/{{$item->item_image}}">

    <div>
     <h2> Description </h2>
     <p> {!!$item->description!!} </p>

     <h3> Place found </h3>
     <p> {!!$item->foundPlace!!} </p>  

     <h3> Colour</h3>
     <p> {!!$item->colour!!} </p>  

     <h4> Category </h4>
     <p> {!!$item->category!!} </p>  

    </div>



    <hr>
    <small> 
        Upload date {{$item->created_at}}
        <br>
        Last Updated {{$item->updated_at}}
    </small>
    <hr>
    @if(!Auth::guest())
        {!! Form::open(['action' => 'RequestsController@store', 'method'=> 'POST'] )!!}
            {{Form::label('requestReason', 'Reason for request')}}
            {{Form::textarea('requestReason', '', ['class' => 'form-control','id'=>'editor', 'placeholder' => 'Enter reason for request' ])}}
            {{ Form::hidden('itemId', $item->id)}}
             <hr>
            {{Form::submit('Make Request',['class'=> 'btn btn-success'])}}

         {!! Form::close() !!}
    @endif


@endsection