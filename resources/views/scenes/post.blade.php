@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="mx-auto max-w-4xl">
        <x-post :post="$post" />
        <x-make-reply :post="$post" />
    </div>
@endsection
