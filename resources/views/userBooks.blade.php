<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <x-back-button :href="route('dashboard')">
                {{ __('Retour au menu principal') }}
            </x-back-button>

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ma bibliothèque') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mx-4">
                        @if (auth()->user()->books()->count() == 0)
                            <div class="text-white text-2xl text-center">
                                <p class="text-white text-xl text-center text-semibold">Les livres que vous ajouterez à votre bibliothèque d'afficheront ici</p>
                            </div>
                        @else
                            @foreach (auth()->user()->books()->orderBy('created_at', 'DESC')->get() as $book)
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg flex flex-col justify-between">
                                    <img src="{{ asset('storage/image1' . $book->cover_image) }}" alt="{{ $book->title }}" class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $book->title }}</h3>
                                        <p class="text-gray-600 dark:text-gray-400">par {{ $book->author }}</p>
                                        <p class="mt-2 text-gray-500 dark:text-gray-300 line-clamp-3">{{ $book->description }}</p>
                                    </div>
                                    <div class="px-4 pb-4">
                                        <a href="#" class="flex items-center justify-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                            <i class="fas fa-book mr-2"></i>
                                            Lire maintenant
                                        </a>
                                    </div>
                                    <form action="{{ route('user.books.detach', $book->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center justify-center px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 focus:outline-none focus:shadow-outline">
                                            <i class="fas fa-minus mr-2"></i>
                                            Retirer de ma bibliothèque
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
