<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 py-12 px-4">
        <div class="max-w-5xl mx-auto">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-10 gap-4">
                <h1 class="text-3xl sm:text-4xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Posts</h1>
                <div class="flex gap-3">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-5 py-2.5 rounded-xl bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold transition-colors duration-200 shadow !text-gray-800">
                        Back to Dashboard
                    </a>
                    <a href="{{ route('posts.create') }}" class="inline-flex items-center px-5 py-2.5 rounded-xl bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 text-white font-semibold transition-colors duration-200 shadow !text-white">
                        Create New Post
                    </a>
                </div>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-gradient-to-r from-green-400 to-green-600 text-white p-4 rounded-xl mb-8 text-center font-semibold shadow animate-pulse">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Posts Table -->
            <div class="bg-white rounded-2xl shadow-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">Created At</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($posts as $post)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-gray-600">{{ $post->created_at }}</td>
                                <td class="px-6 py-4 font-semibold text-gray-900">{{ $post->title }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('posts.show', $post->id) }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold transition-colors duration-200 shadow !text-white">
                                            Show
                                        </a>
                                        @if(auth()->check() && auth()->id() === $post->user_id)
                                            <a href="{{ route('posts.edit', $post->id) }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold transition-colors duration-200 shadow !text-white">
                                                Edit
                                            </a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-4 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white text-sm font-semibold transition-colors duration-200 shadow !text-white">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-8 text-center text-gray-400 text-lg">No posts found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout> 