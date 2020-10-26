@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('All Bidders') }}</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bidders as $item)
                                <tr>
                                    <td><strong>{{ $item->id }}</strong></td>
                                    <td><strong>{{ $item->name }}</strong></td>
                                    <td><strong>{{ $item->address }}</strong></td>
                                    <td><strong>{{ $item->phone }}</strong></td>
                                    <td>
                                        @if (Auth::user()->id === $item->id)
                                            <a href="{{ route('bidders.edit', $item->id) }}" class="btn btn-primary">Edit</a><hr>
                                            <form action="{{ route('bidders.destroy', $item->id) }}" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger">Delete</button>
                                                @else
                                                    <p>Not allowed</p>
                                        @endif

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
