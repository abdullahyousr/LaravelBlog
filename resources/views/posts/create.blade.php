<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Create New Post</h1>

                <!-- Create Post Form -->
                <form action="/posts" method="POST" class="space-y-6">
                    <!-- CSRF Token (Laravel requirement) -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- Title Field -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Post Title <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="title" 
                            id="title"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your post title..."
                            maxlength="255"
                            required
                        >
                        <p class="mt-1 text-sm text-gray-600">Maximum 255 characters</p>
                    </div>

                    <!-- Content Field -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                            Post Content <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="content" 
                            id="content"
                            rows="10"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your post content here..."
                            required
                        ></textarea>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between pt-4">
                        <a 
                            href="/posts" 
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Cancel
                        </a>

                        <button 
                            type="submit"
                            class="inline-flex items-center px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create Post
                        </button>
                    </div>
                </form>

                <!-- Character Counter -->
                <div class="mt-4 text-sm text-gray-500">
                    <span id="title-count">0</span>/255 characters in title
                </div>
            </div>

            <!-- Writing Tips -->
            <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h3 class="text-lg font-medium text-blue-800 mb-2">Writing Tips</h3>
                <ul class="text-sm text-blue-700 space-y-1">
                    <li>• Keep your title clear and descriptive</li>
                    <li>• Use proper grammar and spelling</li>
                    <li>• Break up long content with paragraphs</li>
                    <li>• Be respectful and constructive</li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Character counter for title
        const titleInput = document.getElementById('title');
        const titleCount = document.getElementById('title-count');
        
        titleInput.addEventListener('input', function() {
            titleCount.textContent = this.value.length;
            
            // Change color if approaching limit
            if (this.value.length > 200) {
                titleCount.className = 'text-red-500 font-bold';
            } else if (this.value.length > 150) {
                titleCount.className = 'text-yellow-500 font-medium';
            } else {
                titleCount.className = 'text-gray-500';
            }
        });

        // Auto-resize textarea
        const contentTextarea = document.getElementById('content');
        contentTextarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const title = titleInput.value.trim();
            const content = contentTextarea.value.trim();

            if (!title) {
                alert('Please enter a title for your post.');
                titleInput.focus();
                e.preventDefault();
                return;
            }

            if (!content) {
                alert('Please enter content for your post.');
                contentTextarea.focus();
                e.preventDefault();
                return;
            }

            if (title.length > 255) {
                alert('Title must be 255 characters or less.');
                titleInput.focus();
                e.preventDefault();
                return;
            }
        });
    </script>
</body>
</html>