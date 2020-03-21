@extends('master')

@section('content')
    @include('inc.breadcrumbs')
    <hr>
    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
        <fieldset>
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">{{__('message.form_name')}}</label>
                <input type="text" name="name" class="form-control" placeholder="{{__('message.form_name')}}" value="{{ old('name') }}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">{{__('message.form_email')}}</label>
                <input type="email" name="email" class="form-control" placeholder="{{__('message.form_email')}}" value="{{ old('email') }}">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">{{__('message.form_phone')}}</label>
                <input type="tel" name="phone" class="form-control" placeholder="{{__('message.form_phone')}}" value="{{ old('phone') }}">
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>{{__('message.form_course')}}</label>
                <select name="course[]" class="custom-select">
                    <option value="php">Php</option>
                    <option value="js">Js</option>
                    <option value="java">Java</option>
                    <option value="c++">C++</option>
                    <option value="python">Python</option>
                </select>
                @error('course')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputFile">{{__('message.form_file')}}</label>
                <input type="file" name="image" class="form-control-file" >
                <small id="fileHelp" class="form-text text-muted">{{__('message.form_file_descr')}}</small>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{__('message.submit')}}</button>
        </fieldset>
    </form>
@endsection
