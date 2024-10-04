<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">

<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://cdn-icons-png.flaticon.com/512/1149/1149356.png" class="h-8" alt="RatnaPhones" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">RatnaPhones</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                </li>
                <li>|</li>

                @if (Route::has('login'))

                        @auth
                            <li>
                            <a
                                href="{{ url('/dashboard') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent "
                            >
                                Dashboard
                            </a>
                            </li>
                        @else
                            <li>
                            <a
                                href="{{ route('login') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            >
                                Log in
                            </a>
                            </li>

                            @if (Route::has('register'))
                                <li>
                                <a
                                    href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-whiteblock py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                                >
                                    Register
                                </a>
                                </li>
                            @endif
                        @endauth

                @endif

                <li>
                    <a
                        href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-whiteblock py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                    >
                        Cart (0)
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold text-center mb-6">Product Catalog</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://placehold.co/400x400" alt="Product 1" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="font-bold text-lg">Product 1</h2>
                <p class="text-gray-700">$19.99</p>
                <p class="text-gray-600">Short description of Product 1.</p>
                <button class="mt-2 bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600">Add to Cart</button>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://placehold.co/400x400" alt="Product 2" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="font-bold text-lg">Product 2</h2>
                <p class="text-gray-700">$29.99</p>
                <p class="text-gray-600">Short description of Product 2.</p>
                <button class="mt-2 bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600">Add to Cart</button>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://placehold.co/400x400" alt="Product 3" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="font-bold text-lg">Product 3</h2>
                <p class="text-gray-700">$39.99</p>
                <p class="text-gray-600">Short description of Product 3.</p>
                <button class="mt-2 bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600">Add to Cart</button>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="https://placehold.co/400x400" alt="Product 4" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="font-bold text-lg">Product 4</h2>
                <p class="text-gray-700">$49.99</p>
                <p class="text-gray-600">Short description of Product 4.</p>
                <button class="mt-2 bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600">Add to Cart</button>
            </div>
        </div>

        <!-- Add more product items as needed -->
    </div>
</div>
</body>
</html>
