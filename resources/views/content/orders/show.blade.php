@extends('layouts.app')

@section('content')
@foreach($orders as $order)
    @include('components.order-card', ['order' => $order])
@endforeach
@endsection
