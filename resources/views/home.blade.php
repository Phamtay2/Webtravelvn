@extends('layouts.app')

@section('content')
    <h1>Chào mừng  {{ auth()->user()->name }}</h1>
@endsection