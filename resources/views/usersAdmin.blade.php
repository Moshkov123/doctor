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
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-left text-sm font-light">
                                        <thead
                                            class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">id</th>
                                                <th scope="col" class="px-6 py-4">имя</th>
                                                <th scope="col" class="px-6 py-4">email</th>
                                                <th scope="col" class="px-6 py-4">кнопка</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr class="border-b bg-neutral-100">
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $user->id }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $user->name }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $user->email }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->type }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                            class="text-white font-bold py-2 px-4 rounded"
                                                            style="background-color: #4299e1;">
                                                            Редактировать
                                                        </a>
                                                    </td>
                                                </tr>
                                                </form>
                                            @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>