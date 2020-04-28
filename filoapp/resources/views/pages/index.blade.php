        @extends('layouts.app')

        @section('content')
        
        <div class="jumbotron text-center">
                <h1>Welcome To FILO </h1>
                <p>This is a web application dedicated to finding items that have been lost. Here you can either view the listings for lost items
                  or alternatively sign-up now so that you can can post items you have found or claim items that are yours.
                </p>
                <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
        </div>
        
        @endsection
       
   
