{{--  Se llama lading-layout debido a que se saca el nombre de la clase del componente que se encuentra en app/View/Components/LandingLayout.php --}}
<x-landing-layout>

    <!-- hero section -->
    <div class="flex flex-col-reverse md:flex-row items-center mt-20 lg:mt-32 gap-8">
        <div class="text-left md:w-1/2 flex flex-col gap-5">
            <div class="text-4xl md:text-6xl font-semibold text-gray-900 leading-none">
                Descubre el mundo de la programación
            </div>
            <div class="text-xl font-light text-true-gray-500 antialiased">
                Aprovecha las mejores lecturas para ampliar tus conocimientos y habilidades
            </div>
            <a href="#reviews"
                class="w-fit px-8 py-4 rounded-full font-normal tracking-wide bg-gradient-to-b from-blue-600 to-blue-700 text-white outline-none focus:outline-none hover:shadow-lg hover:from-blue-700 hover:to-blue-700 transition duration-200 ease-in-out">
                Revisa las reseñas
            </a>
            <div class="text-left">
                <a href="#featured"
                    class="flex items-center justify-center w-12 h-12 rounded-full bg-cool-gray-100 text-gray-800 animate-bounce hover:text-gray-900 hover:bg-cool-gray-50 transition duration-300 ease-in-out cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </a>
            </div>

        </div>
        <img src="https://res.cloudinary.com/dy09hqrno/image/upload/v1691588230/hero_wtour7.png" alt="hero image"
            class="md:w-1/2 rounded-xl mb-10 shadow-md">
    </div>

    <!-- /hero section -->

    <!-- Featured section / Destacados -->
    <div class="my-20" id="featured">
        <h2 class="text-xl md:text-3xl font-semibold text-gray-900 leading-none">
            Destacados
        </h2>

        <!-- Featured Grid -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-4">
            @foreach ($featuredBooks as $book)
                {{-- Por buenas practicas las propiedades se definen en el componente con PascalCase y en el x-book-card se pasan con kebab-case --}}
                <x-book-card :book="$book" show-description />
            @endforeach


        </div>
        <!-- /Featured Grid -->
    </div>

    <!-- /Featured section -->


    <!-- Reviews section -->
    <div class="my-20" id="reviews">
        <h2 class="text-xl md:text-3xl font-semibold text-gray-900 leading-none">
            Reseñas
        </h2>

        <!-- Review Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
            @foreach ($reviews as $review)
                <!-- Review Item -->
                <div class="bg-white p-4 rounded-xl flex gap-6 items-center shadow-xs">
                    <div class="w-1/4 flex flex-col items-center">
                        <img src="https://m.media-amazon.com/images/I/41SH-SvWPxL._SX342_SY445_QL70_ML2_.jpg"
                            alt="image book clean code" class="w-4/5">
                        <p class="text-gray-600 text-sm text-center mt-2">{{ $review->book->name }}</p>
                    </div>
                    <div class="flex flex-col gap-2 w-3/4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <p class="text-base text-gray-900">{{ $review->title }}</p>
                        <p class="text-base text-gray-500">{{ $review->description }}</p>
                        <p class="text-sm text-gray-400">{{ $review->user->name }} -
                            {{ $review->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
                <!-- /Review Item -->
            @endforeach
        </div>
        <!-- /Review Grid -->
    </div>
    <!-- Reviews section -->

    <!-- Books section -->
    <div class="my-20" id="books">
        <h2 class="text-xl md:text-3xl font-semibold text-gray-900 leading-none">
            Libros
        </h2>

        <!-- Books Grid -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-4">

            @foreach ($books as $book)
                <x-book-card :book="$book" /> {{-- con :book="$book" se pasa el libro al componente --}}
            @endforeach

        </div>
        <!-- /Books Grid -->

    </div>

</x-landing-layout>
