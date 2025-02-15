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
    <!-- Air Datepicker CSS (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.css">
</head>
<body>
<x-header />
<div class="flex flex-col items-center justify-center">
    <!-- Блок с информацией о докторе -->
    <div class="w-full text-center mt-16">
        <img 
            style="width: 350px;" 
            src="{{ asset('img/kandinsky-download-1739103820167.png') }}" 
            alt="{{ $user->name }}"
            class="mx-auto mb-1 rounded-full"
        >
        <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
        <p class="text-gray-600">{{ $user->specialty }}</p> 
    </div>
     <!-- Вывод сообщений об успехе или ошибке -->
     @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded w-full max-w-md text-center mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded w-full max-w-md text-center mb-4">
            {{ session('error') }}
        </div>
    @endif
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6 text-center">Выберите дату и время записи</h1>
        <form action="{{ route('record.store') }}" method="POST">
            @csrf
            <input type="hidden" name="doctor_id" value="{{ $user->id }}">
            <input type="text" id="datetimepicker" name="datetime" class="w-full p-2 border rounded">
            <button type="submit" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Записаться
            </button>
        </form>
    </div>
</div>

<!-- Air Datepicker JS (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.js"></script>
<script>
    new AirDatepicker('#datetimepicker', {
        autoClose: true,
        minDate: new Date(),
        position: 'top center',
        timepicker: true,
        timepickerSeparate: true,
        timepickerFormat: 'H:i',
        minHours: 7,
        maxHours: 17,
        maxMinutes: 0,
        onSelect: function({ date }) {
            console.log('Выбранная дата и время:', date);
        }
    });
</script>
</body>
</html>