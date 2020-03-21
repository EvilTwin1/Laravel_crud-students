@extends('master')

@section('content')

    @include('inc.breadcrumbs')

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
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align: center">{{ __('message.students_not_found') }}</p>
    @endif
    {{$students->links()}}


@endsection
