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
                                        @if ($item->active === 1)
                                            <a href="{{ route('items.show', $item->id) }}" class="btn-success"><strong>Bet</strong></a>
                                        @else
                                            <strong>Sold</strong>
                                        @endif
                                        {{--<a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">Edit</a><hr>
                                        <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>--}}
                                    </td>
                                </tr>
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

