<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            line-height: 1.6;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .post {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .post-meta {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 15px;
        }
        .post-content {
            margin-bottom: 20px;
            white-space: pre-wrap;
        }
        .comments-section {
            margin-top: 40px;
        }
        .comment {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .comment-meta {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 10px;
        }
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            color: white;
            margin-right: 10px;
        }
        .btn-primary {
            background-color: #2196F3;
        }
        .btn-secondary {
            background-color: #757575;
        }
        .btn-danger {
            background-color: #f44336;
        }
        .comment-form {
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            min-height: 100px;
            resize: vertical;
        }
        .error {
            color: #f44336;
            margin-top: 5px;
            font-size: 0.9em;
        }
        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $post->title }}</h1>
        <div>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
            @if(auth()->check() && auth()->id() === $post->user_id)
            <div style="margin-top:20px">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit Post</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
                </form>
            </div>
            @endif
        </div>
    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="post">
        <div class="post-meta">
            Posted by {{ $post->user->name }} on {{ $post->created_at->format('F j, Y') }}
        </div>
        <div class="post-content">
            {{ $post->content }}
        </div>
    </div>

    <div class="comments-section">
        <h2>Comments</h2>
        
        @auth
            <div class="comment-form">
                <form action="{{ route('comments.store', $post->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="content">Add a Comment</label>
                        <textarea name="content" id="content" required></textarea>
                        @error('content')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Post Comment</button>
                </form>
            </div>
        @endauth

        @forelse($post->comments as $comment)
            <div class="comment">
                <div class="comment-meta">
                    {{ $comment->user->name }} • {{ $comment->created_at->format('F j, Y g:i a') }}
                </div>
                <div class="comment-content">
                    {{ $comment->content }}
                </div>
                @if(auth()->check() && auth()->id() === $comment->user_id)
                    <div style="margin-top: 10px;">
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <p>No comments yet. Be the first to comment!</p>
        @endforelse
    </div>
</body>
</html> 