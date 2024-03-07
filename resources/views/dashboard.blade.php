@seoTitle(__('Главная'))

<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Главная') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <h1 class="font-black uppercase text-[80px] text-center">Кто прочитал, тот ...</h1>
            </div>
        </div>
    </div>
</x-app-layout>
