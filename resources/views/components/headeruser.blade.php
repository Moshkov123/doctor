<nav class="bg-white shadow-md">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex w-full flex-wrap items-center justify-between px-3 h-16">
      <div class="flex space-x-8">
        <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-700">Клиника</a>
      </div>
        
          <div class="flex space-x-8"><a href="{{ url('/') }}" class="text-gray-700 hover:text-gray-900">Главная</a></div>
          <div class="flex space-x-8"><a href="{{ url('/appointment') }}" class="text-gray-700 hover:text-gray-900">Запись к врачу</a></div>
          
          <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="text-gray-700 hover:text-gray-900 bg-transparent border-none cursor-pointer">
          Выход
        </button>
      </form>
      </div>
    </div>
</nav>