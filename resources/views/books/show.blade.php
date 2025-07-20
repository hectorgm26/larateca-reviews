
<x-landing-layout>

        @if(session('message'))
            <div class="mt-8 flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div>
                    <span class="font-medium">{{ session('message') }}
                </div>
            </div>
        @endif

        <!-- Book Detail -->
        <div class="grid grid-cols-1 md:grid-cols-6 my-10 gap-4">
            <div class="col-span-2 flex flex-col items-center">
                <div class="bg-white w-full flex flex-col items-center rounded-xl p-6">
                    <img src="https://m.media-amazon.com/images/I/41SH-SvWPxL._SX342_SY445_QL70_ML2_.jpg"
                         alt="book clean code image"
                         class="w-full h-[20rem] object-contain">
                    <a href="#reviews"
                       class="mt-4 px-6 py-3 mx-auto block rounded-full font-normal tracking-wide bg-gradient-to-b from-blue-600 to-blue-700 text-white outline-none focus:outline-none hover:shadow-lg hover:from-blue-700 hover:to-blue-700 transition duration-200 ease-in-out">
                        Escribir una reseña
                    </a>
                </div>

            </div>
            <div class="col-span-4 bg-white p-6 rounded-xl">
                <div>
                    <h1 class="text-3xl font-semibold text-gray-800">{{ $book->name }}</h1>
                    <h2 class="text-sm text-gray-500">
                        @foreach($book->authors as $author)
                            <span>{{ $author->name }}
                                @if(!$loop->last)
                                    ,
                                @endif
                            </span>
                        @endforeach
                    </h2>
                    <div class="flex items-center mt-4">
                        <svg class="w-5 h-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-gray-500 text-sm">{{ number_format($book->reviews_avg_stars, 1) }} estrellas ({{ $book->reviews_count }} reseñas)</span>
                    </div>
                    <div class="flex items-center mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="#000000" version="1.1" id="Capa_1" class="w-4 h-4 text-gray-300 mr-1"
                             viewBox="0 0 37 37"
                             xml:space="preserve">
<g>
    <path
        d="M36.75,8.5V35c0,1.104-0.895,2-2,2H8.25c-1.104,0-2-0.896-2-2V8.5c0-1.104,0.896-2,2-2h26.5   C35.855,6.5,36.75,7.396,36.75,8.5z M30.75,2c0-1.104-0.895-2-2-2H2.25c-1.104,0-2,0.896-2,2v26.5c0,1.104,0.896,2,2,2   c1.105,0,2-0.896,2-2V4h24.5C29.855,4,30.75,3.104,30.75,2z"/>
</g>
</svg>
                        <span class="text-gray-500 text-sm">{{ $book->pages }} páginas</span>
                    </div>
                    <div class="flex items-center mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M20 10V7C20 5.89543 19.1046 5 18 5H6C4.89543 5 4 5.89543 4 7V10M20 10V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V10M20 10H4M8 3V7M16 3V7"
                                stroke="#000000" stroke-width="2" stroke-linecap="round"/>
                            <rect x="6" y="12" width="3" height="3" rx="0.5" fill="#000000"/>
                            <rect x="10.5" y="12" width="3" height="3" rx="0.5" fill="#000000"/>
                            <rect x="15" y="12" width="3" height="3" rx="0.5" fill="#000000"/>
                        </svg>
                        <span class="text-gray-500 text-sm">{{ $book->published_at->format('d/m/Y') }}</span>
                    </div>
                    <p class="mt-4 text-gray-700">
                        {{ $book->description }}
                    </p>
                    <div class="flex mt-4 flex-wrap gap-1">
                        @foreach($book->genres as $genre)
                            <div>
                                <p tabindex="0"
                                   class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">
                                    {{ $genre->name }}</p>
                            </div>
                        @endforeach
                    </div>

                </div>
                <hr class="h-px my-8 bg-gray-200 border-0">
                <div>
                    <p class="text-2xl">Sobre el Autor</p>
                    @foreach($book->authors as $author)
                        <div>
                            <p class="text-gray-700 text-base mt-2">{{ $author->name }}</p>
                            <p class="text-gray-400 text-base">{{ $author->description }}</p>
                        </div>
                    @endforeach
                </div>
                <hr class="h-px my-8 bg-gray-200 border-0">
                <!-- Review Section -->
                <div id="reviews">
                    <p class="text-2xl">Reseñas</p>

                    @auth
                        <!-- Create review -->
                        <p class="text-gray-700 text-base mt-3">Crear Reseña</p>

                        <form action="{{ route('reviews.store', $book) }}" method="POST"
                              class="space-y-6 mt-2 mb-4 bg-gray-50 p-4 rounded-lg">
                            @csrf
                            <div>
                                <label for="subject" class="text-sm text-gray-500">Asunto</label>
                                <input type="text" name="title" id="title" placeholder="Ingresar asunto"
                                       class="block p-4 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500"/>
                                <x-input-error :messages="$errors->get('title')" />
                            </div>

                            <div>
                                <label for="text" class="text-sm text-gray-500">Reseña</label>
                                <textarea name="description" id="description" placeholder="Ingresar reseña"
                                          class="block p-4 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500"></textarea>
                                <x-input-error :messages="$errors->get('description')" />
                            </div>

                            <div>
                                <label for="text" class="text-sm text-gray-500 flex items-center">Calificación
                                    <span>
                                <svg class="w-6 h-6 text-yellow-500 ml-1" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </span>
                                </label>
                                <div class="flex items-center gap-5 mt-1">
                                    <div class="flex items-center gap-2">
                                        <input type="radio" name="stars" id="stars-1"
                                               value="1"/>
                                        <label for="stars-1"
                                               class="text-gray-600">1</label>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <input type="radio" name="stars" id="stars-2"
                                               value="2"/>
                                        <label for="stars-2"
                                               class="text-gray-600">2</label>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <input type="radio" name="stars" id="stars-3"
                                               value="3"/>
                                        <label for="stars-3"
                                               class="text-gray-600">3</label>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <input type="radio" name="stars" id="stars-4"
                                               value="4"/>
                                        <label for="stars-4"
                                               class="text-gray-600">4</label>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <input type="radio" name="stars" id="stars-5"
                                               value="5"/>
                                        <label for="stars-5"
                                               class="text-gray-600">5</label>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('stars')" />
                            </div>

                            <div>
                                <button
                                    class="px-4 py-2 block bg-blue-50 mx-auto rounded-full font-normal tracking-wide border-2 border-blue-600 text-blue-600 outline-none focus:outline-none hover:bg-blue-100 transition duration-200 ease-in-out">
                                    Registrar
                                </button>
                            </div>
                        </form>
                        <!-- /Create review -->
                    @else
                        <!-- Log in to create review -->
                        <div
                            class="bg-gray-50 text-gray-600 py-10 flex flex-col justify-center gap-4 items-center rounded-lg text-center text-xl mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" id="bb6a8e0f-9216-4739-b80e-a5efc2c838ab"
                                 data-name="Layer 1" class="h-56" viewBox="0 0 865.76 682.89">
                                <path d="M534.23,622.47h-9s-5.52,21.82,11.69,19.74l7-2.52S536.11,630.77,534.23,622.47Z"
                                      fill="#f9b499"/>
                                <path
                                    d="M606.5,637.93s-.36,13.78,29.82,11.39c0,0,18.68,1.86,31.77-.36,7.47-1.26,13.36-7.41,13.64-15a15.46,15.46,0,0,0-2.35-8.81,17.65,17.65,0,0,0-16-7.22l-26.19,2.77-21.84-3.61Z"
                                    fill="#0071f2"/>
                                <path d="M621,642.21l-28.28-9.8,9.8-24.27,23.76,12.58S632.66,632.91,621,642.21Z"
                                      fill="#f9b499"/>
                                <rect x="183.93" y="25.35" width="325.13" height="622.75" rx="25.71" fill="#2f2e41"/>
                                <rect x="190.42" y="29.03" width="312.38" height="613.18" rx="23.73" fill="#ccc"/>
                                <path
                                    d="M490.49,536.11l3.4-43.74-2.63,5.28c-17.81,7.17-42.25-7.16-42.25-7.16l21.12-47.9s6.55-21.66,42.12-21c0,0,69.12,4.42,77.8,19.88l2.64,22.25L581,479.49a64,64,0,0,0-12.27,32.16c-.93,10.14-1.43,22.42.22,31.63C569,543.28,514.25,551.2,490.49,536.11Z"
                                    fill="#0071f2"/>
                                <path
                                    d="M573.83,433.54c-3.87,17.69-20.61,21.51-20.61,21.51-35.33,5.16-43.06-27.42-43.06-27.42-1.1-9.93,13.67-9.25,13.67-9.25l14.83-18.54,20.67,3.68Z"
                                    fill="#f9b499"/>
                                <path
                                    d="M506.6,145.15h1a6.36,6.36,0,0,1,6.36,6.36v34.76a6.36,6.36,0,0,1-6.36,6.36h-1a0,0,0,0,1,0,0V145.15A0,0,0,0,1,506.6,145.15Z"
                                    fill="#2f2e41"/>
                                <path
                                    d="M506.6,205.76h1a6.36,6.36,0,0,1,6.36,6.36V273a6.36,6.36,0,0,1-6.36,6.36h-1a0,0,0,0,1,0,0V205.76A0,0,0,0,1,506.6,205.76Z"
                                    fill="#2f2e41"/>
                                <path d="M448.33,171.47a99.75,99.75,0,1,1-99.75-99.74A99.34,99.34,0,0,1,448.33,171.47Z"
                                      fill="#bcbec0"/>
                                <path
                                    d="M424.51,236.15a99.73,99.73,0,0,1-150.64,1.38c5.11-28.31,36.95-50.11,75.45-50.11C387.2,187.42,418.62,208.52,424.51,236.15Z"
                                    fill="#ccc"/>
                                <path
                                    d="M373.13,152.69a24.66,24.66,0,1,1-35-22.4,18.42,18.42,0,1,1,19.43-.5A24.65,24.65,0,0,1,373.13,152.69Z"
                                    fill="#ccc"/>
                                <rect x="205.41" y="312.43" width="284.14" height="48.58" rx="11.57" fill="#bcbec0"/>
                                <rect x="207.12" y="372.06" width="284.14" height="48.58" rx="11.57" fill="#bcbec0"/>
                                <rect x="223.81" y="330.84" width="125.37" height="11.04" rx="5.52" fill="#fff"/>
                                <rect x="364.18" y="331.2" width="74.58" height="11.04" rx="5.52" fill="#fff"/>
                                <circle cx="230.38" cy="397.51" r="5.7" fill="#fff"/>
                                <circle cx="253.69" cy="397.51" r="5.7" fill="#fff"/>
                                <circle cx="276.81" cy="397.51" r="5.7" fill="#fff"/>
                                <circle cx="301.11" cy="397.51" r="5.7" fill="#fff"/>
                                <circle cx="323.81" cy="397.51" r="5.7" fill="#fff"/>
                                <circle cx="348.59" cy="397.51" r="5.7" fill="#fff"/>
                                <circle cx="371.6" cy="397.51" r="5.7" fill="#fff"/>
                                <rect x="285.64" y="446.53" width="124.29" height="41.96" rx="20.98" fill="#bcbec0"/>
                                <path d="M581.93,436.1v-29s-7.94,14.38-24.58,13.33L556,428.92S573.28,433,581.93,436.1Z"
                                      fill="#2f2e41"/>
                                <path
                                    d="M577.6,567s-6.36,3.39-8.64-23.76c0,0-53.36,7.87-78.47-7.17,0,0-9.8,1.14-6.79,9.25,0,0,40.73,11.87,67.88,33.74Z"
                                    fill="#2f2e41"/>
                                <path
                                    d="M577.6,567s-6.36,3.39-8.64-23.76c0,0-53.36,7.87-78.47-7.17,0,0-9.8,1.14-6.79,9.25,0,0,40.73,11.87,67.88,33.74Z"
                                    opacity="0.2"/>
                                <path
                                    d="M475.41,622.85s-30.11-22-25.6-58.93a19.47,19.47,0,0,1,7-12.84c5.2-4.18,14-8.37,26.86-5.72,0,0,45.26,13.76,67.88,33.74l50.91,29s4.89,27.91-20.56,29.79l-47.69-18.1-20.74,2.26s-4.43-12.06-10.7-2.26l-23.24.38A4,4,0,0,0,475.41,622.85Z"
                                    fill="#2f2e41"/>
                                <path
                                    d="M475.41,622.85s-30.11-22-25.6-58.93a19.47,19.47,0,0,1,7-12.84c5.2-4.18,14-8.37,26.86-5.72,0,0,45.26,13.76,67.88,33.74l50.91,29s4.89,27.91-20.56,29.79l-47.69-18.1-20.74,2.26s-4.43-12.06-10.7-2.26l-23.24.38A4,4,0,0,0,475.41,622.85Z"
                                    fill="#fff" opacity="0.08"/>
                                <path
                                    d="M583.52,564.19,551.58,579.1l50.91,29,18.1,9.81s59.21-21.88,52-54.31c0,0-1.51-30.92-44.5-15.46l-41.4,14.89C585.67,563.45,584.54,563.72,583.52,564.19Z"
                                    fill="#2f2e41"/>
                                <path d="M546.3,642.21s-12.44-11.44-12.06-22.38l37.18,14.11S553.85,640.83,546.3,642.21Z"
                                      fill="#2f2e41"/>
                                <path
                                    d="M470.13,644.34s-6.41-10.93,5.28-21.49c0,0-.4-4.27,7.72-2.7l19.67-.32s15,8.08,4.4,32.59C507.2,652.42,477.29,657.54,470.13,644.34Z"
                                    fill="#0071f2"/>
                                <path
                                    d="M526.11,620.72s-7.33,23.93,10.77,21.49c0,0-4.61,6.32-21,5.89,0,0,.63-8.41-2.42-26Z"
                                    fill="#0071f2"/>
                                <path d="M637.18,620.72s-5.65,14.61-2.7,25.28c0,0-13.59,2.65-20.78-6.31l9.77-20.44Z"
                                      fill="#0071f2"/>
                                <path
                                    d="M645.79,619c-2.6,3-8.94,12.63-3.58,30.76l-7.74-.31s-4.33-21.12,6-33.63a4.35,4.35,0,0,1,3.17-1.65,2.59,2.59,0,0,1,2.56,1.34A3.07,3.07,0,0,1,645.79,619Z"
                                    fill="#2f2e41"/>
                                <polygon
                                    points="567.29 490.84 579.27 459.22 610.35 461.06 588.82 517.74 559.33 517.74 567.29 490.84"
                                    fill="#2f2e41"/>
                                <path
                                    d="M456.36,494.08S442.9,522.52,445.48,531c0,0,2.21,21.71,34.23,8.46l52.63-16.93,19.21-2.93a22.75,22.75,0,0,0,8.27-3l16.93-10.24a5.24,5.24,0,0,0,2.44-5.4l-1.4-7.81a5.23,5.23,0,0,0-7.42-3.78l-8.86,4.27a14.5,14.5,0,0,1-5.63,1.43l-12,.59,12.34-7.83a2.82,2.82,0,0,0-2.47-5,62.49,62.49,0,0,0-25.26,17.55,13.85,13.85,0,0,1-9.27,4.69c-11.9,1.09-37.66,3.58-41.32,5l7-10.68a54.54,54.54,0,0,1-16.23-1A53.73,53.73,0,0,1,456.36,494.08Z"
                                    fill="#f9b499"/>
                                <path
                                    d="M597.33,490.92l-1.73,9-8.42,5.46-5-11.34a4.79,4.79,0,0,1-.31-.9l-2.25-9.83a2.11,2.11,0,0,1,.74-2.14l9.73-4.5a1.29,1.29,0,0,1,1.72.65l5.4,12.12A2.56,2.56,0,0,1,597.33,490.92Z"
                                    fill="#f9b499"/>
                                <path d="M586.26,499.88l-1.42,17.86h8.32a4,4,0,0,0,4-4.21l-.94-16.74Z" fill="#f9b499"/>
                                <path d="M571.91,517.74s20.17,11.2,25-2.59Z" fill="#f9b499"/>
                                <path
                                    d="M513.5,622.09s5.55,15.1,1.67,29.39a5.91,5.91,0,0,1-3,3.81,3.14,3.14,0,0,1-3.56-.21,4,4,0,0,1-1.17-4.61c1.85-4.86,5.95-18.57-2.35-28.32a3.74,3.74,0,0,1,1-5.7C508.23,615.2,510.83,616,513.5,622.09Z"
                                    fill="#2f2e41"/>
                                <path
                                    d="M556.65,424.73l.7-4.34s-11.57-.91-18.48-13.33C538.87,407.06,539.18,420.16,556.65,424.73Z"
                                    fill="#f4a48e"/>
                                <ellipse cx="561.56" cy="384.45" rx="36.19" ry="27.48"
                                         transform="translate(114.35 897.43) rotate(-83.31)" fill="#f9b499"/>
                                <path
                                    d="M557.29,349.22S576,367.82,587.82,371c0,0,1.67,6.78,1.35,11.7,0,0,10.8-7.77,3.43-33.52,0,0-11.41-26.48-36.8-20.59,0,0-30.55,1-34.23,26.62,0,0-4.05,45.15-4.78,56.93,0,0,20.24,18.4,23.92,18.4,0,0-3.37-30.71-1.5-42l.76-16.48S554.37,363.93,557.29,349.22Z"
                                    fill="#2f2e41"/>
                                <ellipse cx="536.66" cy="378.44" rx="8.83" ry="10.55" fill="#f9b499"/>
                            </svg>
                            <div>
                                <a href="{{ route('login') }}" class="underline">Inicia Sesión</a> o <a
                                    href="{{ route('register') }}" class="underline">Regístrate</a> para que puedas
                                crear
                                una
                                reseña
                            </div>
                        </div>
                        <!-- /Log in to create review -->
                    @endauth

                    <!-- Review Grid -->
                    <div class="grid grid-cols-1 gap-4">
                        @foreach($reviews as $review)
                            <!-- Review Item -->
                            <div>
                                <p class="text-base text-gray-900 font-medium">{{ $review->title }}</p>
                                <p class="text-base text-gray-500">{{ $review->description }}</p>
                                <p class="text-sm text-gray-400">{{ $review->user->name }}
                                    - {{ $review->created_at->format('d/m/Y') }}</p>
                            </div>
                            <!-- /Review Item -->
                        @endforeach

                    </div>
                    <!-- /Review Grid -->

                    <!-- Pagination Section -->
                    <div class="my-4">
                        {{ $reviews->links() }}
                    </div>
                    <!-- /Pagination Section -->

                </div>
                <!-- /Review Section -->


            </div>

        </div>
        <!-- /Book Detail -->

</x-landing-layout>