@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header text-center"><h1>{{ __('Search Results') }}</h1></div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Item</th>
                                <th scope="col">Description</th>
                                <th scope="col">Re-sale price</th>
                                <th scope="col">Win bidder id</th>
                                <th scope="col">Win price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($search as $item)
                                @if ($item))
                                <tr>
                                    <td><strong>{{ $item->id }}</strong></td>
                                    <td><strong>{{ $item->name }}</strong></td>
                                    <td><strong>{{ $item->description }}</strong></td>
                                    <td><strong>{{ $item->resaleprice }}</strong></td>
                                    <td><strong>{{ $item->winbidder }}</strong></td>
                                    <td>
                                        @if ( $item->winprice === null)
                                            <strong>{{ $item->resaleprice }}</strong>
                                        @else
                                            <strong>   {{ $item->winprice }}</strong>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('items.show', $item->id) }}" class="btn btn-danger"><strong>Bet</strong></a><br>
                                        <strong style="color: red">Valid until: {{ $item->available }}</strong>
                                    </td>
                                </tr>
                                @else
                                   <strong>No Results</strong>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

