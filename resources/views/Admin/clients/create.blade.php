@seoTitle(__('Новый пользователь'))

<x-app-layout>
    <x-slot:header>
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Новый пользователь') }}
            </h2>
            <a href="{{ route('clients.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">{{ __('К списку пользователей') }}</a>
        </div>
        </x-slot>
        <div class="my-4 p-4 rounded-md max-w-3xl mx-auto bg-white">
            <x-splade-form action="{{route('clients.store')}}">
                <x-splade-input name="name" label="{{__('Имя пользователя')}}" placeholder="{{__('Иван Иванов')}}"/>
                <x-splade-input name="phoneNumber" label="{{__('Номер телефона')}}" placeholder="{{__('+78685852322')}}"/>
                <x-splade-input name="email" label="{{__('Почта')}}" placeholder="{{__('sigma@gmail.com')}}"/>
                <x-splade-select name="product_id" :options="$products" label="{{__('Название продукта')}}"/>
                <x-splade-select name="isActive" label="{{__('Статус продукта')}}">
                    <option value="0">{{__('Не активен')}}</option>
                    <option value="1">{{__('Активен')}}</option>
                </x-splade-select>
                <x-splade-submit label="Сохранить" class="mt-3"/>
            </x-splade-form>
        </div>
</x-app-layout>
