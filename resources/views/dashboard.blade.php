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
<x-headeruser />
<div>
<div>
    <div>Данные пользователя</div>
    <div>
    <div class="bg-white shadow-md flex">
    <div class="mb-4 p-2">
            <p class="text-lg"><span class="font-semibold">ID:</span> {{ $id }}</p>
        </div>
        <div class="mb-4 p-2">
            <p class="text-lg"><span class="font-semibold">Имя:</span> {{ $name }}</p>
        </div>
        <div class="mb-4 p-2">
            <p class="text-lg"><span class="font-semibold">Email:</span> {{ $email }}</p>
        </div>
    </div>
    </div>
</div>
<div>
    <div>Мои записи</div>
    <div>

    </div>
</div>
</div>
</body>
</html>