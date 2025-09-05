@extends('layouts.app')

@section('title', 'Write a New Article')

@section('content')
    <div class="create-container">
        <h2>Write New Article</h2>

        {{-- Display validation errors if any --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="article-form" method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group">
                <label for="article-title">Title</label>
                <input type="text" id="article-title" name="title" placeholder="Enter article title" value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
                <label for="article-content">Content</label>
                <textarea id="article-content" name="content" placeholder="Write your article content here..." rows="15" required>{{ old('content') }}</textarea>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Publish Article</button>
            </div>
        </form>
    </div>
@endsection