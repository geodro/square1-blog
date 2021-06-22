<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="antialiased">
        <div class="min-h-screen bg-gray-100">
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            </div>

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <section class="text-gray-600 body-font overflow-hidden">
                    <div class="container px-5 py-24 mx-auto">
                        <div class=" divide-y-2 divide-gray-100">
                            @foreach($posts as $post)
                            <div class="py-8 flex flex-wrap md:flex-nowrap">
                                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                                    <span class="font-semibold title-font text-gray-700">{{ $post->user->name ?? '' }}</span>
                                    <span class="mt-1 text-gray-500 text-sm">{{ $post->publication_date->format("d M Y") }}</span>
                                </div>
                                <div class="md:flex-grow">
                                    <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $post->title }}</h2>
                                    <a href="{{ route('post.view', $post) }}" class="text-indigo-500 inline-flex items-center mt-4">{{ __('Learn More') }}
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{ $posts->links() }}
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
