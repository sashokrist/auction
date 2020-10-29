@extends('layouts.app2')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit New User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}


    <p class="text-center text-primary"><small>SJ Auction Buy Or Die</small></p>
@endsection
{{--
@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1 class="text-center">{{ __('Edit Bidder') }}</h1></div>

                    <div class="card-body">
                        <form action="{{ route('bidders.update', $bidder->id) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                First name:
                                <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }} {{ $bidder->firstname }}"  placeholder="Enter  first name">
                                @if ($errors->any())
                                    <label for="firstname" class="error" style="color: red">{{ $errors->first('firstname') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                Last name:
                                <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }} {{ $bidder->lastname }}"  placeholder="Enter  last name">
                                @if ($errors->any())
                                    <label for="lastname" class="error" style="color: red">{{ $errors->first('lastname') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                Address:
                                <input type="text" name="address" class="form-control" value="{{ old('address') }} {{ $bidder->address }}"  placeholder="Enter address">
                                @if ($errors->any())
                                    <label for="address" class="error" style="color: red">{{ $errors->first('address') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                Phone:
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }} {{ $bidder->phone }}"  placeholder="Enter phone">
                                @if ($errors->any())
                                    <label for="phone" class="error" style="color: red">{{ $errors->first('phone') }}</label>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
--}}
