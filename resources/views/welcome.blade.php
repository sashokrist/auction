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
                    <div class="card-header text-center"><h1>{{ __('Welcome to SJ Auction') }}</h1></div>

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
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                @if ($date->lte($item->available))
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
                                    <tr style="text-decoration: line-through;">
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
                                            <strong style="color: red">Sold<br>
                                           Expired: {{ $item->available->diffForHumans() }}</strong>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div>
           <p style="font-size: 16px;">
               {{ $items->links() }}
           </p>
        </div>

    </div>
@endsection

