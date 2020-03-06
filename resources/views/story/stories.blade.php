@extends('story.storybook')
@section('story_content')
    <div class="container">
        @if(\Session::has('success'))
            <div class="alert alert-success">
                {{\Session::get('success')}}
            </div>
        @endif
        <div class="row">
            @if (!count($stories))
                <div class="col-lg-12 m-4">
                    <div class="jumbotron">
                        <div class="container">
                            <h1 class="display-4">No Story Found</h1>
                            <p class="lead">Create a story first, to read</p>
                        </div>
                    </div>
                </div>

            @else
                @foreach($stories as $story)
                    <div class="card border-secondary mb-3" style="max-width: 18rem;">
                        <div class="card-body text-secondary">
                            <h5 class="card-title">{{$story->title}}</h5>
                            <p class="card-text">
                                {{ Str::limit(strip_tags($story->body), 50) }}
                                @if(strlen(strip_tags($story->body)) > 50 )
                                    <a href="{{route('story.show',$story->id)}}">...Read more</a>
                                @endif
                            </p>
                            <a href="{{route('story.edit',$story->id)}}" class="btn btn-outline-primary">Edit</a>
                            <form method="POST" action="{{route('story.delete',$story->id)}}">
                                @csrf
                                @method('POST')
                                <button class="btn btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
