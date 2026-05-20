@props([
    'title' => 'Login'
])

<x-form.layout title="{{$title}}">
    
        <div class="absolute left-100 bottom-120 bg-gray-500/60 rounded-md h-50 w-70 flex flex-col items-center justify-center flex gap-2">
            <p class="!text-orange-600 !text-[12px]">Admin Credentials</p>
            <p class="!text-orange-400 !text-[10px]">Correo:</p>
            <p class="!text-[10px]">admin@example.com</p>
            <p class="!text-orange-400 !text-[10px]">Password:</p>
            <p class="!text-[10px]">12345678</p>
        </div>
    
        <x-form title="{{$title}}"/>

</x-form.layout>