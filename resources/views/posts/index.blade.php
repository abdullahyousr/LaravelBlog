<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 5px;
            color: white;
        }
        .btn-create {
            background-color: #4CAF50;
        }
        .btn-show {
            background-color: #2196F3;
        }
        .btn-back {
            background-color: grey;
        }
        .btn-edit {
            background-color: #FF9800;
        }
        .btn-delete {
            background-color: #f44336;
        }
        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .actions {
            display: flex;
            gap: 5px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Posts</h1>
        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-back">Back to Dashboard</a>
            <a href="{{ route('posts.create') }}" class="btn btn-create">Create New Post</a>
        </div>
    </div>
    

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Created At</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->title }}</td>
                    <td class="actions">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-show">Show</a>
                        @if(auth()->check() && auth()->id() === $post->user_id)
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align: center;">No posts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $posts->links() }}
    </div>
</body>
</html> 