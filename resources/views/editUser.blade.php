<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование пользователя</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <x-headeradmin />
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-semibold text-center mb-6">Редактирование пользователя</h2>
            <form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Имя</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Тип пользователя</label>
                    <select id="type" name="type" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
    <option value="4" {{ $user->type === 4 ? 'selected' : '' }}>Пользователь</option>
    <option value="3" {{ $user->type === 3 ? 'selected' : '' }}>Хирург</option>
    <option value="2" {{ $user->type === 2 ? 'selected' : '' }}>Стоматолог</option>
    <option value="1" {{ $user->type === 1 ? 'selected' : '' }}>Терапевт</option>
    <option value="0" {{ $user->type === 0 ? 'selected' : '' }}>Администратор</option>
</select>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Сохранить изменения
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>