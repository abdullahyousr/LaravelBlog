<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
        <div class="container mx-auto py-12 px-4">
            <!-- Header Section -->
            <div class="flex flex-col lg:flex-row justify-between items-center mb-12">
                <div class="text-center lg:text-left mb-6 lg:mb-0">
                    <h1 class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
                        Discover Amazing Products
                    </h1>
                    <p class="text-gray-600 text-lg">Find the perfect items for your needs</p>
                </div>
                <a href="{{ route('cart.index') }}" class="group bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-8 py-4 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 group-hover:rotate-12 transition-transform duration-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 106 0m-6 0a3 3 0 016 0m-6 0H5.25a2.25 2.25 0 01-2.25-2.25V6.75A2.25 2.25 0 015.25 4.5h13.5a2.25 2.25 0 012.25 2.25v5.25a2.25 2.25 0 01-2.25 2.25H16.5m-6 0v1.5a3 3 0 006 0v-1.5" />
                    </svg>
                    View Cart
                </a>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-gradient-to-r from-green-400 to-green-600 text-white p-4 rounded-2xl mb-8 text-center font-semibold shadow-lg animate-pulse">
                    <div class="flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden border border-gray-100">
                        <!-- Product Image Placeholder -->
                        <div class="h-48 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-200/20 to-purple-200/20 group-hover:scale-110 transition-transform duration-500"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-16 h-16 text-blue-400 group-hover:text-blue-600 transition-colors duration-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </div>

                        <!-- Product Content -->
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-3 text-gray-800 group-hover:text-blue-600 transition-colors duration-300">
                                {{ $product->name }}
                            </h2>
                            <p class="text-gray-600 mb-4 line-clamp-2">{{ $product->description }}</p>
                            
                            <!-- Price and Stock -->
                            <div class="flex items-center justify-between mb-6">
                                <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                                @if($product->stock < 1)
                                    <span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full font-semibold">
                                        Out of Stock
                                    </span>
                                @else
                                    <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold">
                                        In Stock: {{ $product->stock }}
                                    </span>
                                @endif
                            </div>

                            <!-- Add to Cart Button -->
                            <form action="{{ route('products.addToCart', $product) }}" method="POST">
                                @csrf
                                <button type="submit" 
                                    class="w-full group/btn bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white py-3 px-6 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none" 
                                    @if($product->stock < 1) disabled @endif>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 group-hover/btn:rotate-12 transition-transform duration-300">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 106 0m-6 0a3 3 0 016 0m-6 0H5.25a2.25 2.25 0 01-2.25-2.25V6.75A2.25 2.25 0 015.25 4.5h13.5a2.25 2.25 0 012.25 2.25v5.25a2.25 2.25 0 01-2.25 2.25H16.5m-6 0v1.5a3 3 0 006 0v-1.5" />
                                    </svg>
                                    {{ $product->stock < 1 ? 'Out of Stock' : 'Add to Cart' }}
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
                <div class="mt-16 flex justify-center">
                    <div class="bg-white rounded-2xl shadow-lg p-4">
                        {{ $products->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout> 
