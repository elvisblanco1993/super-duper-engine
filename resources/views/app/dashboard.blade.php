@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <h2>
                        {{ __('Welcome back, ') . Auth::user()->name . '!' }}
                    </h2>
                    <p class="lead">
                        {{ __('To view your messages, go to the Messages menu option on the top of this screen.') }}
                    </p>

                    <p>
                        {{ __('This dashboard is part of a bigger project to simplify websites building at an affordable price.') }}
                    </p>

                    <p>
                        {{ __('If you need technical assistance, please email us at: ') }}
                        <a href="mailto:support@registrac.page">support@registrac.page</a>
                    </p>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
