@seoTitle(__('Редактировать платёж'))

<x-app-layout>
    <x-slot:header>
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Редактирование платежа') }} {{$pay->client_id}}
            </h2>
            <a href="{{ route('pays.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">{{ __('К списку платежей') }}</a>
        </div>
        </x-slot>
        <div class="my-4 p-4 rounded-md max-w-3xl mx-auto bg-white">
            <x-splade-form method="PUT" action="{{route('pays.update', $pay->id)}}" :default="$pay">
                <x-splade-select name="client_id" :options="$clients" label="{{__('Имя клиента')}}"/>
                <x-splade-input name="cardNumber" label="{{__('Номер карты')}}" placeholder="{{__('1234 4321 5678 8765')}}"/>
                <x-splade-input name="address" label="{{__('Имя получателя')}}" placeholder="{{__('sigma@gmail.com')}}"/>
                <x-splade-select name="order_id" :options="$orders" label="{{__('Номер заказа')}}"/>
                <x-splade-select name="isActive" label="{{__('Статус заказа')}}">
                    <option value="0">{{__('Не активен')}}</option>
                    <option value="1">{{__('Активен')}}</option>
                </x-splade-select>
                <x-splade-submit label="Сохранить" class="mt-3"/>
            </x-splade-form>
        </div>
</x-app-layout>
