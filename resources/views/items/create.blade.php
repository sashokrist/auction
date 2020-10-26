@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Item') }}</div>

                    <div class="card-body">
                        <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              Name:
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"  placeholder="Enter name">
                                @if ($errors->any())
                                    <label for="name" class="error" style="color: red">{{ $errors->first('name') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="" cols="30" rows="5" placeholder="enter description">{{ old('description') }}</textarea>
                                @if ($errors->any())
                                    <label for="description" class="error" style="color: red">{{ $errors->first('description') }}</label>
                                @endif
                          </div>
                            <div class="form-group">
                                Resale price:
                                <input type="number" step="0.01" name="rprice" class="form-control"  placeholder="Enter resale price">
                                @if ($errors->any())
                                    <label for="rprice" class="error" style="color: red">{{ $errors->first('rprice') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                Item wil be available until:
                                <input type="date"  class="form-control" name="available">
                                @if ($errors->any())
                                    <label for="created_at" class="error" style="color: red">{{ $errors->first('available') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="avatar" id="choose-file">
                                    <i class="fas fa-camera"></i>
                                    <span>Choose file</span>
                                    <input id="avatar" type="file" name="avatar">
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
