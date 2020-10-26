@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h1>{{ __('Your Items') }}</h1></div>

                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ route('items.create') }}" class="btn btn-primary">New item</a>
                        </div>
                        @foreach($bidders as $bidder)
                           <h2>Name: <strong>{{ $bidder->name }}</strong></h2> <br>
                            <h2>Description: <strong>{{ $bidder->description }}</strong></h2><br>
                            <h2>Re-sale price: <strong>{{ $bidder->resaleprice }}</strong></h2>
                          {{--  <h2>Win bidder: <strong>{{ $bidder->winbidder }}</strong></h2>--}}
                            <h2>Win price: <strong>{{ $bidder->winprice }}</strong></h2>
                            <a href="{{ route('bidders.edit', $bidder->id) }}" class="btn btn-primary">Edit</a><hr>
                            <form action="{{ route('bidders.destroy', $bidder->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
