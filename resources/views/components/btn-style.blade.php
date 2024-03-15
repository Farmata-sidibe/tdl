
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-[#FF91B2] text-white px-7 py-2 rounded-[15px] hover:bg-[#9CC4B9]']) }}>
    {{ $slot }}
</button>
