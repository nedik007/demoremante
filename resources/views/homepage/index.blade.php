@extends('_layout.app')

@section('title', __('homepage.h1'))

@section('content')

<h1>Úvodní stránka demo obchodu {{env('APP_NAME')}}</h1>

@include('components.categories')

@endsection

