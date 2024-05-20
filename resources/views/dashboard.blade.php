<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Utilisez une classe de flexbox pour aligner les éléments de manière horizontale -->
                    <div class="flex flex-col md:flex-row items-center space-x-4 mb-4">
                        <!-- Ajoutez une ombre portée à l'image de profil pour lui donner une apparence plus nette -->
                        <div class="w-16 h-16 rounded-full overflow-hidden shadow-lg">
                            <img src="https://source.unsplash.com/1600x900/?nature,water" alt="Profile" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __("Bienvenue,") }} {{ Auth::user()->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <!-- Déplacez le lien vers sa propre ligne et ajoutez des styles pour le faire ressortir davantage -->
                    <div>
                        <a href="{{ route('user.books.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                        Ma Bibliothèque
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mx-4">
    @foreach ($books as $book)
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg flex flex-col justify-between">
            <!-- Chemin d'image censé mener au dossier d'image mais qui ne fonctionne pas. ""à revoir"" -->
            <img src="{{ asset('storage/image1' . $book->cover_image ) }}" alt="{{ $book->title }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $book->title }}</h3>
                <p class="text-gray-600 dark:text-gray-400">par {{ $book->author }}</p>
                <p class="mt-2 text-gray-500 dark:text-gray-300 line-clamp-3">{{ $book->description }}</p>
            </div>
            @if (!auth()->user()->books->contains($book->id))
                <form action="{{ route('user.books.attach', $book->id) }}" method="POST" class="flex items-center justify-center px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:shadow-outline">
                    @csrf
                    <button type="submit" class="flex items-center justify-center px-4 py-2 bg-transparent border-none focus:outline-none">
                        <i class="fas fa-plus mr-2"></i>
                        Ajouter à ma bibliothèque
                    </button>
                </form>
            @else
                <p class="text-center text-gray-600 dark:text-gray-400">Déjà dans votre bibliothèque</p>
            @endif
            <div class="flex items-center justify-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                <a href="#" class="flex items-center justify-center px-4 py-2 border-none focus:outline-none">
                    <i class="fas fa-book mr-2"></i>
                    Lire maintenant
                </a>
            </div>
        </div>
    @endforeach
</div>
    </div>
</x-app-layout>
