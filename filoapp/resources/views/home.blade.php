@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/items/create" class="btn btn-primary"> Add new item listing </a>
                    <hr>
                    <h3> Your requests </h3>
                    @if(count($requests)> 0 )
                        <table class="table table-striped">
                            <tr>
                              <th> Request ID</th>
                             <th> Status</th>
                             <th> Action </th>
                         </tr>
                         @foreach ($requests as $request)
                              <tr>
                                  <td> {{$request->id}} </td>
                                  <td> {{$request->status}} </td>
                                  <td>
                                    {!!Form::open(['action' => ['RequestsController@destroy', $request->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>    
                         @endforeach
                        </table>
                    
                    @else
                        <p> Currently no requests</p>
                    @endif
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
