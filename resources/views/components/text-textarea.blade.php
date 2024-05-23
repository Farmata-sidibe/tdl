{{-- @props(['disabled' => false])
<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 light:border-gray-700 light:bg-[#F6F3EC] light:text-gray-300 focus:border-indigo-500 light:focus:border-indigo-600 focus:ring-indigo-500 light:focus:ring-indigo-600 rounded-md shadow-sm']) !!} cols="30" rows="10">{{$slot}}</textarea> --}}

@props(['disabled' => false,'placeHolder'])

<div class="relative">
    <textarea
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge(['class' => 'block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-[#9CC4B9] peer']) !!}
        placeholder=" " cols="30" rows="10" > {{$slot}} </textarea>
    <label for="{{ $placeHolder}}" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white  peer-focus:px-2 peer-focus:text-[#9CC4B9]  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
        {{ $placeHolder}}
    </label>
</div>
