@extends('layouts.app')


@section('content')

    <div class="align-items-center text-justify ml-5">
        @foreach ($conversations as $conversation)
            <h2> <a href="/conversations/{{ $conversation->id }}"> {{ $conversation->title }} </a> </h2>

            @continue($loop->last)

            <hr>

        @endforeach
        <div>

@endsection
