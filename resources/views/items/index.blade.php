@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h1>{{ __('All Items') }}</h1></div>

                    <div class="card-body">
                        @foreach($items as $item)
                           <h2>Name: <strong>{{ $item->name }}</strong></h2> <br>
                            <h2>Description: <strong>{{ $item->description }}</strong></h2><br>
                            <h2>Phone: <strong>{{ $item->resaleprice }}</strong></h2>
                            <h2>Phone: <strong>{{ $item->winbidder }}</strong></h2>
                            <h2>Phone: <strong>{{ $item->winprice }}</strong></h2>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
