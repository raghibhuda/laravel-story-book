@extends('story.storybook')
@section('story_content')
    <div class="container">
        @if(\Session::has('error'))
            <div class="alert alert-danger">
                {{\Session::get('error')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 m-4">
                <form method="POST" action="{{route('story.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" placeholder="ex.A rainy day when...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="body" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" type="text" rows="7" name="body" id="body"
                                      placeholder="More about story..."></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
