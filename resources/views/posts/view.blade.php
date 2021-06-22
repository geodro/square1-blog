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
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-12">
                    <div class="p-12 flex flex-col items-start">
                        <span
                            class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">{{ $post->user->name }}</span>
                        <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">{{ $post->title }}</h2>
                        <p class="leading-relaxed mb-8">{{ $post->description }}</p>
                        <div
                            class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">{{ $post->publication_date->format("d M Y") }}</div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
