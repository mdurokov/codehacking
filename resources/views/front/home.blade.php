@extends('layouts.blog-home')

@section('content')

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            @if(count($posts) > 0)
                @foreach($posts as $post)
            <!-- First Blog Post -->
                    <h2>
                        <a href="{{ route('home.post', $post->slug) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="lead">
                        by {{ $post->user->name }}
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>
                    <hr>
                    <img class="img-responsive" src="{{ $post->photo->file }}" alt="">
                    <hr>
                    <p>{{ strip_tags(str_limit($post->body, 500)) }}</p>
                    <a class="btn btn-primary" href="{{ route('home.post', $post->slug) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                @endforeach
            @endif
            <!-- Pagination -->
            <div class="row">
                <div class="col-sm-6 col-sm-offset-4">
                    {{ $posts->render() }}
                </div>
            </div>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        @include('includes.front_sidebar_nav')

    </div>
@endsection
