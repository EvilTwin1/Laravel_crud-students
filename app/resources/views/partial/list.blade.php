@extends('master')

@section('content')

    <a href="{{ route('create') }}" class="btn btn-outline-secondary" style="margin-bottom: 40px">{{ __('message.create') }}</a>

    @include('inc.alert')

    @if(count($students) != 0)
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">{{ __('message.image') }}</th>
                <th scope="col">{{ __('message.name') }}</th>
                <th scope="col">{{ __('message.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>
                    @if($student->image == null)
                        <div class="img_wrapp" style="overflow: hidden; border-radius: 50%; width: 100px; height: 100px">
                            <img width="100%" height="100%" src="https://via.placeholder.com/400x400?text={{ __('message.student') }}+{{$student->id}}" alt="">
                        </div>
                    @else
                        <div class="img_wrapp" style="overflow: hidden; border-radius: 50%; width: 100px; height: 100px">
                            <img width="100%" height="100%" src=" {{asset('uploads/students') . '/'. $student->image}}" alt="">
                        </div>
                    @endif

                </td>
                <th>{{$student->name}}</th>
                <td>
                    <a href="{{ route('show', $student->id) }}" class="btn btn-info">{{ __('message.show') }}</a>
                    <a href="{{ route('edit', $student->id) }}" class="btn btn-warning">{{ __('message.edit') }}</a>
                    <a href="{{ route('delete', $student->id) }}" class="btn btn-danger">{{ __('message.delete') }}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p style="text-align: center">{{ __('message.students_not_found') }}</p>
    @endif
    {{$students->links()}}


    <h2>{{ __('message.popular') }}</h2>
    @if(count($relatedStudents) != 0)
    <div class="row">
        @foreach($relatedStudents as $relatedStudent)
        <div class="card border-dark mb-3" style="min-width: 20rem; margin: 0 auto">
            <div class="card-header"></div>
            @if($relatedStudent->image == null)
                <div class="img_wrapp" style="overflow: hidden; border-radius: 50%; width: 100px; height: 100px; margin: 10px auto">
                    <img width="100%" height="100%" src="https://via.placeholder.com/400x400?text={{ __('message.student') }}+{{$relatedStudent->id}}" alt="">
                </div>
            @else
                <div class="img_wrapp" style="overflow: hidden; border-radius: 50%; width: 100px; height: 100px; margin: 10px auto">
                    <img width="100%" height="100%" src=" {{asset('uploads/students') . '/'. $relatedStudent->image}}" alt="">
                </div>
            @endif
            <div class="card-body">
                <h4 class="card-title">{{$relatedStudent->name}}</h4>
                <p class="card-text">{{ __('message.course') }}: {{$relatedStudent->course}}</p>
            </div>
        </div>
        @endforeach
    </div>
    @else
        <p style="text-align: center">{{ __('message.popular_students_not_found') }}</p>
    @endif

@endsection
