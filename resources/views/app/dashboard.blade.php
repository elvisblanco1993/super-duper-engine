@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-house-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg>
                      {{ __('Dashboard') }}
                    </div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    {{-- Load graphs --}}
                    <div class="row">
                        <div class="col-md-4">
                            {{-- Unread messages counter --}}
                            <div class="card shadow-sm" style="width: 18rem;">
                                <div class="card-body">
                                    <h1 class="card-title">{{ App\Models\Message::count() }}</h1>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ __('Unread messages') }}</h6>
                                    <a href="{{ route('messages') }}" class="card-link">{{ __('View messages') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- Visits MTD --}}
                            <div class="card shadow-sm" style="width: 18rem;">
                                <div class="card-body">
                                    <h1 class="card-title">{{ App\Models\Message::count() }}</h1>
                                    <h6 class="card-subtitle mb-2 text-muted" title="{{ __('This information is collected locally and my not be 100 percent accurate. For more details about site visits, please visit your Analytics dashboard.') }}">{{ __('Visitors this month') }}
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                            <circle cx="8" cy="4.5" r="1"/>
                                        </svg>
                                    </h6>
                                    <a href="{{ '' }}" class="card-link">{{ __('View more details') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
