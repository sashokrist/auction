@include('layouts.app2')

@section('content')
    <h1>Your payment was successful.</h1>
    <ul>Order details:
        <li>Name: {{ $username }}</li>
        <li>Item/; {{ $itemName }}</li>
        <li>You have paid: {{ $amount }}</li>
    </ul>
@endsection
