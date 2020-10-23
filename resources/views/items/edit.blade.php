@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Item') }}</div>

                    <div class="card-body">
                        <form action="{{ route('items.update', $item->id) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                Name:
                                <input type="text" name="name" class="form-control" value="{{ old('name') }} {{ $item->name }}"  placeholder="Enter name">
                                @if ($errors->any())
                                    <label for="name" class="error" style="color: red">{{ $errors->first('name') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="" cols="30" rows="5"  placeholder="enter description">{{ old('description') }}{{ $item->description }}</textarea>
                                @if ($errors->any())
                                    <label for="description" class="error" style="color: red">{{ $errors->first('description') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                Resale price:
                                <input type="number" step="0.01" name="rprice" value="{{ old('rprice') }} {{ $item->resaleprice }}" class="form-control"  placeholder="Enter resale price">
                                @if ($errors->any())
                                    <label for="rprice" class="error" style="color: red">{{ $errors->first('rprice') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Win Bidder</label>
                                <input type="number"  name="wbidder" class="form-control" value="{{ old('wbidder') }} {{ $item->winbidder }}"   placeholder="Enter win bidder id">
                                @if ($errors->any())
                                    <label for="wbidder" class="error" style="color: red">{{ $errors->first('wbidder') }}</label>
                                @endif
                            </div>
                            <div class="form-check">
                                <label>Win price</label>
                                <input type="number"  step="0.01" name="wprice" value="{{ old('wprice') }} {{ $item->winprice }}" class="form-control"   placeholder="Enter win price">
                                @if ($errors->any())
                                    <label for="wprice" class="error" style="color: red">{{ $errors->first('wprice') }}</label>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
