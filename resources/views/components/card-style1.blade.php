@props([
    'color'
])

    <div class="card w-[360px] h-[290px] ring-2 ring-[{{$color}}] rounded-[20px] p-[25px] flex flex-col justify-between items-start gap-x-[12px]">
        {{ $slot }}

    </div>


