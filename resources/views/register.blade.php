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
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<x-header />

<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Регистрация</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf 
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Имя</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required autofocus>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 relative">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Пароль</label>
                <input type="password" id="password" name="password"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <i class="fas fa-eye absolute right-3 top-10 cursor-pointer" id="togglePassword"></i>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Поле "Подтверждение пароля" -->
            <div class="mb-6 relative">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Подтвердите пароль</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <i class="fas fa-eye absolute right-3 top-10 cursor-pointer" id="togglePasswordConfirmation"></i>
            </div>

            <!-- Кнопка отправки формы -->
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Зарегистрироваться
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    const togglePasswordConfirmation = document.querySelector('#togglePasswordConfirmation');
    const passwordConfirmation = document.querySelector('#password_confirmation');

    togglePassword.addEventListener('click', function (e) {
        // Переключаем тип поля ввода
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // Переключаем иконку
        this.classList.toggle('fa-eye-slash');
    });

    togglePasswordConfirmation.addEventListener('click', function (e) {
        // Переключаем тип поля ввода
        const type = passwordConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirmation.setAttribute('type', type);
        // Переключаем иконку
        this.classList.toggle('fa-eye-slash');
    });
</script>
</body>
</html>