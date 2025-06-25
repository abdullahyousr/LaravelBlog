<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-blue-50">
        <div class="container mx-auto py-12 px-4">
            <!-- Header Section -->
            <div class="flex flex-col lg:flex-row justify-between items-center mb-12">
                <div class="text-center lg:text-left mb-6 lg:mb-0">
                    <h1 class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent mb-2">
                        Your Shopping Cart
                    </h1>
                    <p class="text-gray-600 text-lg">Review your items and complete your purchase</p>
                </div>
                <a href="{{ route('products.index') }}" class="group bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white px-8 py-4 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 group-hover:-translate-x-1 transition-transform duration-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Continue Shopping
                </a>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-gradient-to-r from-green-400 to-green-600 text-white p-6 rounded-2xl mb-8 text-center font-semibold shadow-lg animate-pulse">
                    <div class="flex items-center justify-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Error Message -->
            @if(session('error'))
                <div class="bg-gradient-to-r from-red-400 to-red-600 text-white p-6 rounded-2xl mb-8 text-center font-semibold shadow-lg animate-pulse">
                    <div class="flex items-center justify-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            @if($items->isEmpty())
                <!-- Empty Cart State -->
                <div class="text-center py-16">
                    <div class="bg-white rounded-3xl shadow-lg p-12 max-w-md mx-auto">
                        <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 106 0m-6 0a3 3 0 016 0m-6 0H5.25a2.25 2.25 0 01-2.25-2.25V6.75A2.25 2.25 0 015.25 4.5h13.5a2.25 2.25 0 012.25 2.25v5.25a2.25 2.25 0 01-2.25 2.25H16.5m-6 0v1.5a3 3 0 006 0v-1.5" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Your cart is empty</h3>
                        <p class="text-gray-600 mb-8">Looks like you haven't added any products to your cart yet.</p>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white px-8 py-3 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                            </svg>
                            Start Shopping
                        </a>
                    </div>
                </div>
            @else
                <!-- Cart Items -->
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-blue-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 106 0m-6 0a3 3 0 016 0m-6 0H5.25a2.25 2.25 0 01-2.25-2.25V6.75A2.25 2.25 0 015.25 4.5h13.5a2.25 2.25 0 012.25 2.25v5.25a2.25 2.25 0 01-2.25 2.25H16.5m-6 0v1.5a3 3 0 006 0v-1.5" />
                            </svg>
                            Cart Items ({{ $items->count() }})
                        </h2>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="py-6 px-8 text-left text-lg font-semibold text-gray-700">Product</th>
                                    <th class="py-6 px-8 text-right text-lg font-semibold text-gray-700">Price</th>
                                    <th class="py-6 px-8 text-center text-lg font-semibold text-gray-700">Quantity</th>
                                    <th class="py-6 px-8 text-right text-lg font-semibold text-gray-700">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach($items as $item)
                                    @php $subtotal = $item->quantity * $item->product->price; $total += $subtotal; @endphp
                                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                                        <td class="py-6 px-8">
                                            <div class="flex items-center gap-4">
                                                <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-blue-100 rounded-2xl flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-green-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h3 class="text-lg font-semibold text-gray-800">{{ $item->product->name }}</h3>
                                                    <p class="text-gray-500 text-sm">{{ Str::limit($item->product->description, 50) }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-6 px-8 text-right">
                                            <span class="text-xl font-bold text-gray-800">${{ number_format($item->product->price, 2) }}</span>
                                        </td>
                                        <td class="py-6 px-8 text-center">
                                            <span class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-r from-green-100 to-blue-100 text-green-700 font-bold rounded-full">
                                                {{ $item->quantity }}
                                            </span>
                                        </td>
                                        <td class="py-6 px-8 text-right">
                                            <span class="text-xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">
                                                ${{ number_format($subtotal, 2) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Order Summary -->
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-8 py-6">
                        <div class="flex justify-between items-center">
                            <div class="text-2xl font-bold text-gray-800">Total Amount</div>
                            <div class="text-3xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">
                                ${{ number_format($total, 2) }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Button -->
                <div class="mt-12 flex justify-center">
                    <form action="{{ route('cart.order') }}" method="POST">
                        @csrf
                        <button type="submit" class="group bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white px-12 py-6 rounded-3xl font-bold shadow-2xl hover:shadow-3xl transition-all duration-300 transform hover:scale-105 text-xl flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 group-hover:rotate-12 transition-transform duration-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75A2.25 2.25 0 0014.25 4.5h-4.5A2.25 2.25 0 007.5 6.75v3.75m9 0V17.25A2.25 2.25 0 0114.25 19.5h-4.5A2.25 2.25 0 017.5 17.25V10.5m9 0h-9" />
                            </svg>
                            Place Order - ${{ number_format($total, 2) }}
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-app-layout> 