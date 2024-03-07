@seoTitle(__('Новый заказ'))

<x-app-layout>
    <x-slot:header>
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Новый заказ') }}
            </h2>
            <a href="{{ route('orders.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">{{ __('К списку заказов') }}</a>
        </div>
        </x-slot>
        <div class="my-4 p-4 rounded-md max-w-3xl mx-auto bg-white">
            <x-splade-form action="{{route('orders.store')}}">
                <x-splade-input name="numberOrder" label="{{__('Номер заказа')}}" placeholder="{{__('123')}}"/>
                <x-splade-input name="numberPostavka" label="{{__('Название компании')}}" placeholder="{{__('Geyjin')}}"/>
                <x-splade-input name="phoneNumber" label="{{__('Номер телефона')}}" placeholder="{{__('+78685852322')}}"/>
                <x-splade-input name="email" label="{{__('Почта')}}" placeholder="{{__('sigma@gmail.com')}}"/>
                <x-splade-input name="address" label="{{__('Имя аккаунта')}}" placeholder="{{__('olegZZZ')}}"/>
                <x-splade-select name="product_id" :options="$products" label="{{__('Название продукта')}}"/>
                <x-splade-select name="delivery" label="{{__('Вид получения')}}">
                    <option value="0">{{__('Себе на аккаунт')}}</option>
                    <option value="1">{{__('Подарком другу')}}</option>
                </x-splade-select>
                <x-splade-select name="payment" label="{{__('Вид оплаты')}}">
                    <option value="0">{{__('СБП')}}</option>
                    <option value="1">{{__('GeyCoins')}}</option>
                </x-splade-select>
                <x-splade-select name="isActive" label="{{__('Статус продукта')}}">
                    <option value="0">{{__('Не активен')}}</option>
                    <option value="1">{{__('Активен')}}</option>
                </x-splade-select>
                <x-splade-submit label="Сохранить" class="mt-3"/>
            </x-splade-form>
        </div>
</x-app-layout>
