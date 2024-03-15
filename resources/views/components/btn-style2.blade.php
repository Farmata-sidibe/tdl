<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-[#9CC4B9] text-white px-7 py-2 rounded-[15px] hover:bg-[#FF91B2]']) }}>
    {{ $slot }}
</button>
