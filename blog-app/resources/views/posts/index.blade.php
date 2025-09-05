@extends('layouts.app')

@section('title', 'Latest Blog Posts')

@section('content')
    <section id="home-page" class="page active">
        <div class="hero-section">
            <h2>Welcome to BlogSpace</h2>
            <p>Discover amazing stories and share your own thoughts with the world.</p>
        </div>
        
        <div class="articles-container">
            <h3>Latest Articles</h3>
            <div id="articles-list" class="articles-grid">
                
                {{-- The Loop to display posts from the database --}}
                @foreach ($posts as $post)
                    <div class="article-card">
                        <h4>
                            {{-- This link is now functional --}}
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </h4>
                        <div class="article-meta">
                            <span class="author">By {{ $post->author->name }}</span>
                            <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                        <p class="article-preview">{{ Str::limit($post->content, 150) }}...</p>
                        
                        {{-- This link is now functional --}}
                        <a href="{{ route('posts.show', $post) }}">Read More</a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection