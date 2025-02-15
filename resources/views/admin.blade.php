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
<x-headeradmin />

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Все записи</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Дата и время</th>
                    <th class="px-4 py-2 border-b">Пациент</th>
                    <th class="px-4 py-2 border-b">Врач</th>
                    <th class="px-4 py-2 border-b">кнопка</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $record->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $record->data }}</td>
                    <td class="px-4 py-2 border-b">{{ $record->user->name }}</td>
                    <td class="px-4 py-2 border-b">{{ $record->doctor->name }}</td>
                    <td class="px-4 py-2 border-b"> @if($record->status === 0)
                <!-- Кнопка для изменения статуса -->
                <form action="{{ route('admin.updateStatus', $record->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Выполнить прием
                    </button>
                </form></td>
            @else
                <!-- Если статус уже равен 1 -->
                <span class="text-green-600 font-bold">Прием выполнен</span>
            @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>