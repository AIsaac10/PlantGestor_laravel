@props(['disabled' => false])

<input {{ $attributes->merge([
    'class' => 'bg-white border-gray-300 focus:border-green-500 focus:ring focus:ring-green-300 rounded-md shadow-sm'
]) }}>

