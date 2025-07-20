<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p class="mb-4">{{ __("You're logged in!") }}</p>

                    {{-- ✅ Solo los administradores verán esto --}}
                    @if (auth()->user()->isAdmin())
                        <h3 class="text-lg font-bold mb-4">Reseñas pendientes de aprobación</h3>

                        {{-- Mensaje flash --}}
                        @if (session('message'))
                            <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4">
                                {{ session('message') }}
                            </div>
                        @endif

                        @forelse($pendingReviews as $review)
                            <div class="mb-4 p-4 border rounded shadow">
                                <p><strong>Libro:</strong> {{ $review->book->name }}</p>
                                <p><strong>Usuario:</strong> {{ $review->user->name }}</p>
                                <p><strong>Título:</strong> {{ $review->title }}</p>
                                <p><strong>Contenido:</strong> {{ $review->description }}</p>
                                <p><strong>Estrellas:</strong> {{ $review->stars }}</p>

                                <form action="{{ route('admin.reviews.approve', $review) }}" method="POST"
                                    class="mt-2">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                        Aprobar reseña
                                    </button>
                                </form>
                            </div>
                        @empty
                            <p>No hay reseñas pendientes por aprobar.</p>
                        @endforelse

                        <!-- Links de paginacion -->
                        <div class="mt-6">
                            {{ $pendingReviews->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
