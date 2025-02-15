<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Клиника</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
</head>
<body>
<x-header />
<div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-center">Наши врачи</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($users as $user)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="{{ asset('img/kandinsky-download-1739103820167.png') }}" alt="{{ $user->name }}"
                        class="w-full h-48 object-cover rounded-t-lg mb-4">
                    <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                    <p class="text-gray-600">{{ $user->specialty }}</p> 
                    <a href="{{ route('record.show', $user->id) }}" 
                    class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Записаться
                </a>
                </div>
            @endforeach
        </div>
    </div>
    
</body>
</html>