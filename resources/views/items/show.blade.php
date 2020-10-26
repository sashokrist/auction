@extends('layouts.app2')
<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>Champion League Goalscorer</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>
</head>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h1>{{ $item->name }} Id: {{ $item->id }}</h1></div>

                    <div class="card-body">
                        <img src="{{ asset('uploads/avatars/'.$item->image) }}" alt="" id="avatar-img" width="100px" height="100px">
                        <h2>  Description: {{ $item->description }}</h2><br>
                        <h2> Re-sale price: {{ $item->resaleprice }}</h2><br>
                        <h2>  Win bidder: {{ $item->winbidder }}</h2><br>
                        <h2>
                            @if ( $item->winprice === null)
                                Win price: <strong>{{ $item->resaleprice }}</strong>
                            @else
                                Win price: <strong>   {{ $item->winprice }}</strong>
                            @endif
                            @if ($item->active === 1)
                                    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal" id="open">BET</button>
                                    <!-- Modal -->
                                        <div class="modal" tabindex="-1" role="dialog" id="myModal">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="alert alert-danger" style="display:none"></div>
                                                    <div class="modal-header">

                                                        <h1 class="modal-title text-center">Make your Bet!</h1>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="{{ route('item-bet', $item->id) }}" id="form">
                                                        @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label for="Bet">Your Bet:</label>
                                                                <input type="number" step="0.01" id="bet" name="bet" value="{{ $item->winprice }}" class="form-control" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit"  class="btn btn-success" >Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                <strong>SOLD!</strong>
                            @endif
                        </h2><br>
                        <a href="{{ route('items.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#ajaxSubmit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/item-bet/'+ $('#bid').val(),
                    method: 'post',
                    data: {
                        'winprice' : $('#bet').val(),
                    },
                    success: function(result){
                        if(result.errors)
                        {
                            $('.alert-danger').html('');

                            $.each(result.errors, function(key, value){
                                $('.alert-danger').show();
                                $('.alert-danger').append('<li>'+value+'</li>');
                            });
                        }
                        else
                        {
                            console.log('success');
                            console.log($('#bid').val());
                            $('.alert-danger').hide();
                            $('#open').hide();
                            $('#myModal').modal('hide');
                        }
                    }});
            });
        });
    </script>--}}
@endsection
