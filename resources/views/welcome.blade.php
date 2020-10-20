@extends('layouts.app')

@section('content')
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">{{ __('Dashboard') }}</div>
                                    <div class="card-body">
                                        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                                            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                                                @auth
                                                    <a href="{{ url('/bidders') }}" class="btn btn-primary underline">My bid</a>
                                                    <a href="{{ route('items.index') }}" class="btn btn-primary underline">Buy Item</a>
                                                    <a class="btn btn-primary" href="{{ route('items.create') }}">Sale item</a>
                                                    <a class="btn btn-primary" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                @endauth
                                                @guest
                                                    <a href="{{ route('items.index') }}" class="btn btn-primary underline">Buy Item</a>
                                                    <a class="btn btn-primary" href="{{ route('items.create') }}">Sale item</a>
                                                        <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                                                    <a href="{{ route('register') }}" class="btn btn-primary underline">Register Bidder</a>
                                                @endguest
                                            </div>
                                            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                                                <div class="grid grid-cols-1 md:grid-cols-2">
                                                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                                                        Build v{{ Illuminate\Foundation\Application::VERSION }}
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

