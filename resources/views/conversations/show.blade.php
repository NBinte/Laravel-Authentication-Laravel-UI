@extends('layouts.app')

@section('content')

    <div class="align-items-center text-justify ml-5">
        <p>

            <a href="/conversations"> Back </a>

        </p>

        <h1> {{ $conversation->title }} </h1>

        <p class="text-muted"> Posted by {{ $conversation->user->name }}</p>

        <div>

            {{ $conversation->body }}

        </div>

        @include('conversations.replies')
    </div>

@endsection
