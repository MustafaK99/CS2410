@extends('layouts.app')

@section('content')
    <h1> Item Listings </h1>
    @if(count($items) > 0)
        @foreach ($items as $item)
            <div class = "card p-3 mt-3 mb-3">
                </div class = "row"> 
                    </div class = "col-md-4 col-sm-4"> 
                        <img style = "width:10%" src="/storage/item_images/{{$item->item_image}}">
                    </div>
                    </div class = "col-md-8 col-sm-8"> 
                        <h3> <a href="/items/{{$item->id}}">{{ $item->itemName}}</h3>
                        <small> Colour: {!!$item->colour!!} </small>  
                        <br>
                        <small>Categoyr: {!!$item->category!!} </small>  
                        <br>
                        <small>Written on {{$item->created_at}}</small>
                        <br>
                        <small>Last Updated {{$item->updated_at}}</small>

                    </div>
                </div>
            </div>
        @endforeach
        {{$items->links()}}
    @else 
        <p> No items listed </p>
    @endif
@endsection