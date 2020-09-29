@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Show Bidder') }}</div>

                    <div class="card-body">
                        <h1 class="text-center">{{ $item->name }}</h1>
                        <h2>  Id: {{ $item->id }}</h2><br>
                        <h2>  Description: {{ $item->description }}</h2><br>
                        <h2> Re-sale price: {{ $item->resaleprice }}</h2><br>
                        <h2>  Win bidder: {{ $item->winbidder }}</h2><br>
                        <h2>  Win price: {{ $item->winprice }}</h2><br>
                        <a href="{{ route('items.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

