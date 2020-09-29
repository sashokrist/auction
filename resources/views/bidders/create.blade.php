@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1 class="text-center">{{ __('New Bidder') }}</h1></div>

                    <div class="card-body">
                        <form action="{{ route('bidders.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                First name:
                                <input type="text" name="firstname" class="form-control"   placeholder="Enter  first name">
                                @if ($errors->any())
                                    <label for="firstname" class="error" style="color: red">{{ $errors->first('firstname') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                Last name:
                                <input type="text" name="lastname" class="form-control"   placeholder="Enter  last name">
                                @if ($errors->any())
                                    <label for="lastname" class="error" style="color: red">{{ $errors->first('lastname') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                Address:
                                <input type="text" name="address" class="form-control"   placeholder="Enter address">
                                @if ($errors->any())
                                    <label for="address" class="error" style="color: red">{{ $errors->first('address') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                Phone:
                                <input type="text" name="phone" class="form-control"   placeholder="Enter phone">
                                @if ($errors->any())
                                    <label for="phone" class="error" style="color: red">{{ $errors->first('phone') }}</label>
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
