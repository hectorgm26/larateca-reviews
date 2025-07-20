
<x-landing-layout>

        <!-- Hero -->
        <div class="relative isolate overflow-hidden bg-gray-900 my-10 rounded-xl">
            <img alt=""
                 class="absolute inset-0 -z-10 h-full w-full object-cover mix-blend-overlay"
                 src="https://images.unsplash.com/photo-1533669955142-6a73332af4db?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2174&q=80">
            <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
                <svg
                    class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]"
                    viewBox="0 0 1155 678">
                    <path
                        d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z"
                        fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".2"></path>
                    <defs>
                        <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" gradientUnits="userSpaceOnUse"
                                        x1="1155.49" x2="-78.208" y1=".177" y2="474.645">
                            <stop stop-color="#9089FC"></stop>
                            <stop offset="1" stop-color="#FF80B5"></stop>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="px-6 lg:px-8">
                <div class="mx-auto max-w-2xl py-8 sm:py-20 text-white">
                    <h1 class="text-4xl md:text-6xl leading-none">Explora la biblioteca</h1>
                    <h2 class="mt-6 text-xl font-light">Explora nuestra amplia selección y descubre conocimientos
                        valioso</h2>

                    <form action="#" method="GET">
                        <label for="default-search"
                               class="mb-2 text-sm font-medium sr-only text-gray-300">Buscar</label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="search" id="default-search" name="search"
                                   class="mt-8 block p-4 pl-10 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500"
                                   placeholder="Ingresar el nombre del libro o los autores" 
                                   value="{{ request('search') }}" >
                            <button type="submit"
                                    class="text-white absolute right-2.5 bottom-2.5 bg-gradient-to-b from-blue-600 to-blue-700 text-white outline-none focus:outline-none hover:shadow-lg hover:from-blue-700 hover:to-blue-700 transition duration-200 ease-in-out font-medium rounded-lg text-sm px-4 py-2">
                                Buscar
                            </button>
                        </div>
                    </form>

                </div>
                <div
                    class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
                    <svg
                        class="relative left-[calc(50%+3rem)] h-[21.1875rem] max-w-none -translate-x-1/2 sm:left-[calc(50%+36rem)] sm:h-[42.375rem]"
                        viewBox="0 0 1155 678">
                        <path
                            d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z"
                            fill="url(#ecb5b0c9-546c-4772-8c71-4d3f06d544bc)" fill-opacity=".2"></path>
                        <defs>
                            <linearGradient id="ecb5b0c9-546c-4772-8c71-4d3f06d544bc" gradientUnits="userSpaceOnUse"
                                            x1="1155.49" x2="-78.208" y1=".177" y2="474.645">
                                <stop stop-color="#9089FC"></stop>
                                <stop offset="1" stop-color="#FF80B5"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
        <!-- /Hero -->

        <!-- Books Section -->
        <div class="my-6 grid grid-cols-1 md:grid-cols-4 gap-4">
            
            @foreach ( $books as $book )
                <x-book-card :book="$book" /> {{--  Es lo mismo que  <x-book-card :$book /> --}}
            @endforeach
            
        </div>
        <!-- /Books Section -->

        <!-- Pagination Section -->
        <div class="my-4">
            {{ $books->links() }}
        </div>
        <!-- /Pagination Section -->

</x-landing-layout>