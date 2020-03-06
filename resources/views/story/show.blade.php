@extends('story.storybook')
@section('story_content')
    <div class="container">
        @if(\Session::has('success'))
            <div class="alert alert-success">
                {{\Session::get('success')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 m-4">
                <h2>{{$story->title}}</h2>
                <p>{{$story->body}}</p>
            </div>
        </div>
    </div>
@endsection
