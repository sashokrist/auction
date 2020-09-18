@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h1>{{ __('All Bidders') }}</h1></div>

                    <div class="card-body">
                        @foreach($bidders as $bidder)
                           <h2>Name: <strong>{{ $bidder->firstname }} {{ $bidder->lastname }}</strong></h2> <br>
                            <h2>Address: <strong>{{ $bidder->address }}</strong></h2><br>
                            <h2>Phone: <strong>{{ $bidder->phone }}</strong></h2>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
