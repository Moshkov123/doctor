<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Личный кабинет</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
</head>
<body>
<x-headeruser />
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Личный кабинет</h1>
    <div class="mb-6">
        <p><strong>ID:</strong> {{ $id }}</p>
        <p><strong>Имя:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
    </div>

    <h2 class="text-xl font-bold mb-4">Мои записи</h2>
    @if($records->isEmpty())
        <p>У вас пока нет записей.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">Дата и время</th>
                        <th class="px-4 py-2 border-b">
                            @if($userType === 4)
                                Врач
                            @else
                                Пациент
                            @endif
                            <th class="px-4 py-2 border-b">Статус приема</th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $record->data }}</td>
                        <td class="px-4 py-2 border-b">
                            @if($userType === 4)
                                {{ $record->doctor->name }}
                            @else
                                {{ $record->user->name }}
                            @endif
                        </td>
                        <td class="px-4 py-2 border-b"> @if($record->status === 0)
                    <p class="bg-blue-500 text-white px-4 py-2 rounded">
                        Вы записаны на прием
</p>
                
            @else
                <span class="text-green-600 font-bold">Прием выполнен</span>
            @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
</body>
</html>