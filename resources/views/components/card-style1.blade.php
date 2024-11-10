@props([
    'color'
])
    {{-- <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12"> --}}
        <div
            class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
            <span class="absolute top-10 z-0 h-20 w-20 rounded-full bg-[{{$color}}] transition-all duration-300 group-hover:scale-[10]"></span>
            <div class="relative z-10 mx-auto max-w-md">
                {{ $slot }}
                <div class="pt-5 text-base font-semibold leading-7">
                    <p class="text-start">
                        <a href="#" class="text-[{{$color}}] transition-all duration-300 group-hover:text-white">Créer ma liste
                            &rarr;
                        </a>
                    </p>
                </div>
            </div>
        </div>
    {{-- </div> --}}

