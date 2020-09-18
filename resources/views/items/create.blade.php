@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Item') }}</div>

                    <div class="card-body">
                        <form action="{{ route('items.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"  placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="" cols="30" rows="5" placeholder="enter description"></textarea>
                            </div>
                            <div class="form-check">
                                <label>Resale price</label>
                                <input type="number"  step="0.1" name="rprice" class="form-control"   placeholder="Enter resale price">
                            </div>
                            <div class="form-check">
                                <label>Win Bidder</label>
                                <input type="number"  name="wbidder" class="form-control"   placeholder="Enter win bidder id">
                            </div>
                            <div class="form-check">
                                <label>Win price</label>
                                <input type="number"  step="0.1" name="wprice" class="form-control"   placeholder="Enter win price">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
