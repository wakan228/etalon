@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(session('messaege'))
            <h1>{{session('message')}}</h1>
        @endif
        {{session('message')}}
        <div class="col-md-8">
            <div class="card">
                You must werify you email - {{Auth::user()->email}}
            </div>
            <form action="{{route('verification.send')}}" method="POST">
                @csrf
                <button type="submit">Send agayn</button>
            </form>
        </div>
    </div>
</div>
@endsection
