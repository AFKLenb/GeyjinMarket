@seoTitle(__('Главная'))

<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Главная') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-[32px] mb-[80px] uppercase font-bold text-center">Happy customers</h3>
                <div class="flex justify-around">
                    <img src="{{ asset('/assets/gifs/1.gif') }}" class="w-[200px] h-[200px]" alt="">
                    <img src="{{ asset('/assets/gifs/2.gif') }}" class="w-[200px] h-[200px]" alt="">
                    <img src="{{ asset('/assets/gifs/3.gif') }}" class="w-[200px] h-[200px]" alt=""></div>
            </div>
        </div>
    </div>
</x-app-layout>
