@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="align-middle">
                            <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-envelope-open" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.818l5.724 3.465L8 8.917l1.276.766L15 6.218V5.4a1 1 0 0 0-.53-.882l-6-3.2zM15 7.388l-4.754 2.877L15 13.117v-5.73zm-.035 6.874L8 10.083l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738zM1 13.117l4.754-2.852L1 7.387v5.73zM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2z"/>
                            </svg>
                            {{ __('Message') }}
                        </div>

                        <div>
                            <a class="text-dark" href="{{ route('messages') }}">
                                {{ __('Close') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>
                            <strong>{{ __('From') }} </strong>: <a href="mailto:{{ $email }}">{{ $name }}</a>
                        </p>
                        <p>
                            <strong>{{ __('Subject') }}</strong>: {{ $subject }}
                        </p>
                        <p>
                            <strong>{{ __('Date') }}</strong>: {{ date('M d, Y H:i a', strtotime($date)) }}
                        </p>
                        <hr>
                        <p>
                            {{ $message }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
