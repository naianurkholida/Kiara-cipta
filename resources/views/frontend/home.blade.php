@extends('frontend.component.master')

@section('content')
        @include('frontend.component.layouts.slider')

        @include('frontend.component.layouts.welcome')
        
        @include('frontend.component.layouts.treatment')

        {{-- @include('frontend.component.layouts.bestseller') --}}

        @include('frontend.component.layouts.youtube')

@endsection