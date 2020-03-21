@extends('master')

@section('content')
    @include('inc.breadcrumbs')

    <div class="card mb-3">
        <h3 class="card-header">{{$currentStudent->name}}</h3>
        <div class="card-body"></div>
        @if($currentStudent->image == null)
            <img style="height: 300px;width: 300px;display: block;border-radius: 50%;margin: 0 auto;" src="https://via.placeholder.com/300x300?text={{ __('message.student') }}+{{$currentStudent->id}}" alt="">
        @else
            <img style="height: 300px;width: 300px;display: block;border-radius: 50%;margin: 0 auto;" src="{{ asset('uploads/students') . '/'. $currentStudent->image}}" alt="Card image">
        @endif
        <div class="card-body">
            <p class="card-text">{{ __('message.view') }} <i class="far fa-eye"></i> {{$currentStudent->view_count}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ __('message.email') }}: {{$currentStudent->email}}</li>
            <li class="list-group-item">{{ __('message.phone') }}: {{$currentStudent->phone}}</li>
            <li class="list-group-item">{{ __('message.course') }}: {{$currentStudent->course}}</li>
        </ul>
        <div class="card-body"></div>
        <div class="card-footer text-muted">
            {{ __('message.created') }}: {{$currentStudent->created_at->format('d-m-Y')}}
        </div>
    </div>
@endsection
