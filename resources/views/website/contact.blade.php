@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                {{-- Contact Form: DO NOT MODIFY --}}

                {{-- Recaptcha Scripting --}}
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                <script>
                    function onSubmit(token) {
                        document.getElementById("form").submit();
                    }
                </script>

                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                            {{ session('message') }}
                    </div>
                @endif

                <form action="{{ route('contact-submit') }}" method="POST" id="form">
                    @csrf

                    <div class="form-group">
                      <label for="name">{{ __('Full Name') }}</label>
                      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="" aria-describedby="helpName">
                      @error('name')
                        <small id="helpName" class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="email">{{ __('Email') }}</label>
                      <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="" aria-describedby="helpEmail">
                      @error('email')
                        <small id="helpEmail" class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="tel">{{ __('Phone') }}</label>
                      <input type="tel" name="phone" id="tel" class="form-control @error('phone') is-invalid @enderror" placeholder="" aria-describedby="helpPhone">
                      @error('phone')
                        <small id="helpPhone" class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="subject">{{ __('Subject') }}</label>
                        <select name="subject" id="subject" class="custom-select @error('subject') is-invalid @enderror" aria-describedby="helpSubject">
                            {{-- Make this dynamic on the database --}}
                            @forelse (App\Models\Subject::all() as $subject)
                                <option value="{{ $subject->value }}">{{ $subject->name }}</option>
                            @empty
                                <option value="" disabled>Error: No subjects available. Please contact the site owner.</option>
                            @endforelse
                        </select>
                        @error('name')
                            <small id="helpSubject" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="msg">{{ __('Message') }}</label>
                        <textarea name="message" id="msg" class="form-control @error('message') is-invalid @enderror" cols="30" rows="10" aria-describedby="helpMessage"></textarea>
                        @error('message')
                            <small id="helpMessage" class="text-danger">{{ $message }}</small>
                        @else
                            <small id="helpMessage" class="text-muted">Allows for a maximum of 500 characters.</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button
                            class="g-recaptcha btn btn-success"
                            data-sitekey="{{ config('services.recaptcha.key') }}"
                            data-callback="onSubmit">
                            Submit
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
