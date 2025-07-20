{{-- ESTE SERA UN COMPONENTE ANONIMO, POR NO IR ASOCIADO A UN ARCHIVO EN HTTP/View/Components/ y solo utilizarse a si mismo como componente --}}

@props(['book', 'showDescription' => false])
{{--  Mediante el props podemos pasarle al componente el libro y si se muestra o no la descripcion --}}
{{--  se le pasa el componente book y showDescription, y por defecto este sera falso --}}

<!-- Books Item -->
<a href="{{ route('books.show', $book) }}" class="focus:outline-none xl:mb-0 mb-8 rounded-xl overflow-hidden shadow-xs bg-white">
    <div>
        <img alt="person capturing an image"
            src="https://m.media-amazon.com/images/I/41SH-SvWPxL._SX342_SY445_QL70_ML2_.jpg" tabindex="0"
            class="focus:outline-none w-full h-44 object-contain py-4" />
    </div>
    <div>
        <div class="p-4">
            <div>
                <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">{{ $book->name }}</h2>
                <p class="text-sm text-gray-500">por
                    @foreach ($book->authors as $author)
                        <span>{{ $author->name }}
                            {{-- Si es distinto del ultimo autor, se coloca coma --}}
                            @if (!$loop->last)
                                ,
                            @endif
                        </span>
                    @endforeach
                </p>
            </div>
            <div class="flex mt-4 gap-1">
                @foreach ($book->genres as $genre)
                    <div>
                        <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">
                            {{ $genre->name }}
                        </p>
                    </div>
                @endforeach
            </div>

            @if($showDescription)
                <div class="text-sm text-gray-600 py-2">
                    <p>{{ $book->description }}</p>
                </div>
            @endif
            
            <div class="flex items-center mt-4 gap-2">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="text-gray-500 text-xs">{{ number_format($book->reviews_avg_stars), 1 }}
                        estrellas</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" version="1.1" id="Layer_1"
                        viewBox="0 0 460 460" xml:space="preserve">
                        <g>
                            <path style="fill:#FF7F4F;"
                                d="M230.333,0C103.308,0,0,102.974,0,230c0,98.785,62.479,183.024,150.004,215.598l297.381-291.024   C416.25,64.595,330.94,0,230.333,0z" />
                            <path style="fill:#FF5419;"
                                d="M460,230c0-26.416-4.467-51.784-12.663-75.41l-44.274-44.274l-345.46,201.7l50.785,50.785   l-10.785,30.515l52.366,52.367C174.895,454.935,202.187,460,230.332,460C357.358,460,460,357.026,460,230z" />
                            <polygon style="fill:#71E2F0;"
                                points="403.063,110.317 403.063,312.017 230.332,312.017 200.003,211.167 230.332,110.317  " />
                            <polygon style="fill:#C2FBFF;"
                                points="230.332,110.317 230.332,312.017 178.893,312.017 97.603,393.317 97.603,312.017    57.603,312.017 57.603,110.317  " />
                            <polygon style="fill:#C2FBFF;"
                                points="383.063,130.317 383.063,292.017 230.332,292.017 210.333,211.167 230.332,130.317  " />
                            <rect x="77.603" y="130.317" style="fill:#FFFFFF;" width="152.729" height="161.7" />
                            <polygon style="fill:#E0A300;"
                                points="362.823,202.002 343.073,222.122 347.223,250.002 321.993,237.432 311.993,214.882    321.993,172.332 335.023,197.332  " />
                            <polygon style="fill:#FFC61B;"
                                points="321.993,172.332 321.993,237.432 296.753,250.002 300.913,222.122 281.163,202.002    308.963,197.332  " />
                            <polygon style="fill:#E0A300;"
                                points="271.162,202.002 251.412,222.122 255.562,250.002 230.332,237.432 220.332,214.882    230.332,172.332 243.362,197.332  " />
                            <polygon style="fill:#FFC61B;"
                                points="230.332,172.332 230.332,237.432 205.092,250.002 209.252,222.122 189.502,202.002    217.302,197.332  " />
                            <polygon style="fill:#E0A300;"
                                points="179.503,202.002 159.753,222.122 163.903,250.002 138.673,237.432 128.673,214.882    138.673,172.332 151.703,197.332  " />
                            <polygon style="fill:#FFC61B;"
                                points="138.673,172.332 138.673,237.432 113.433,250.002 117.593,222.122 97.843,202.002    125.643,197.332  " />
                        </g>
                    </svg>
                    <span class="text-gray-500 text-xs ml-1">{{ $book->reviews_count }} reseñas</span>
                </div>
            </div>
        </div>
    </div>
</a>
