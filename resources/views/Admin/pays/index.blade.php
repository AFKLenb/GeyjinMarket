@seoTitle(__('Платежи'))

<x-app-layout>
    <x-slot:header>
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Платежи') }}</h2>
            <a href="{{ route('pays.create') }}" class="bg-gray-300 hover:bg-gray-600 hover:text-white text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">{{ __('Новый платёж') }}</a>
        </div>
    </x-slot>
        <div class="my-4 p-4 rounded-md max-w-[1400px] mx-auto bg-white">
            <x-splade-table :for="$pays">
                @cell('client_id', $pays)
                <div class="font-bold py-2 px-4 rounded inline-flex items-center">
                    {{ $pays->client->name }}
                </div>
                @endcell
                @cell('action', $pays)
                    <div class="flex gap-3">
                        <Link href="{{ route('pays.destroy', $pays->id) }}" class="bg-gray-300 hover:bg-gray-600 hover:text-white text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" confirm="Внимание" confirm-text="Вы действительно хотите удалить платёж?" confirm-button="Да" cancel-button="Нет" method="DELETE" >{{__('Удалить')}}</Link>
                        <Link href="{{ route('pays.edit', $pays->id) }}" class="bg-gray-300 hover:bg-gray-600 hover:text-white text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" >{{__('Редактировать')}}</Link>
                        <Link href="{{ route('pays.show', $pays->id) }}" class="bg-gray-300 hover:bg-gray-600 hover:text-white text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" >{{__('Подробнее')}}</Link>
                    </div>
                @endcell
                @cell('order_id', $pays)
                    <div class="font-bold py-2 px-4 rounded inline-flex items-center">
                        {{ $pays->order->numberOrder }}
                    </div>
                @endcell
                @cell('isActive', $pays)
                    @if($pays->isActive == 0)
                        <div class="bg-gray-300 text-black font-bold py-2 px-4 rounded inline-flex items-center">
                            {{ __('Не активен') }}
                        </div>
                    @elseif($pays->isActive == 1)
                        <div class="bg-green-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            {{ __('Активен') }}
                        </div>
                    @endif
                @endcell
            </x-splade-table>
        </div>

</x-app-layout>

