@extends('layouts.app')

{{-- The page title will be the title of the post itself --}}
@section('title', $post->title)

@section('content')
    <div class="article-full-container">
        <article class="article-content-main">
            <header class="article-header">
                <h1>{{ $post->title }}</h1>
            
                {{-- This button will only show if the logged-in user is the post's author --}}
                @can('update', $post)
                    <div class="edit-post-container">
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary">Edit Post</a>
                    </div>
                @endcan
            
                <div class="article-meta">
                    <span class="author">By {{ $post->author->name }}</span>
                    <span class="date">{{ $post->created_at->format('F d, Y') }}</span>
                </div>
            </header>

            <div class="article-body">
                {{-- This displays the full post content, converting line breaks to <br> tags --}}
                <p>{!! nl2br(e($post->content)) !!}</p>
            </div>
        </article>
    </div>
@endsection