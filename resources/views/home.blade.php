@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome ' . Auth::user()->name) }}
                </div>
            </div>

            <div class="card" style="margin-top: 5%">
                <div class="card-header"> Shortener </div>
                <div class="card-body">
                    <div class="flex">
                        <form action="/create" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="username" value="{{ __(Auth::user()->name) }}">
                        <div class="input-group mb-3">
                           <span class="input-group-text">Long URL</span>
                            <input type="text"  class="form-control" name="dest_link" id="short" required='required'>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">https://sego.link/</span>
                    <input type="text" class="form-control" name="wrapper_url" required='required'>
                            </div>
                    <input class="btn btn-primary" type="submit" value="Shorten">
                        </div>
                        </form>
                        @if ($data ?? '')
                       <div style="margin-top: 2%" class="alert alert-{{ $data[0] }}" role="alert">
                           Your links successfully shortened to <a href="https://sego.link/{{ $data[1] }}"> https://sego.link/{{ $data[1] }}</a>
                       </div>
                        @endif
                        @error('wrapper_url')
                        <div style="margin-top: 2%" class="alert alert-warning" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
