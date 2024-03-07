@seoTitle(__('Продукты'))

<x-app-layout>
    <x-slot:header>
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Продукты') }}</h2>
            <a href="{{ route('products.create') }}" class="bg-gray-300 hover:bg-gray-600 hover:text-white text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">{{ __('Новый продукт') }}</a>
        </div>
    </x-slot>
        <div class="my-4 p-4 rounded-md max-w-[1400px] mx-auto bg-white">
            <x-splade-table :for="$products">
                @cell('content', $products)
                    <p class="max-w-[100px] overflow-x-auto">{{$products->content}}</p>
                @endcell
                @cell('image', $products)
                    <img class="max-w-[35px] rounded-full max-h-[35px] mt-[15px] mb-[15px]" src="{{Storage::url($products->image)}}" alt="">
                @endcell
                @cell('action', $products)
                    <div class="flex gap-3">
                        <Link href="{{ route('products.destroy', $products->id) }}" class="bg-gray-300 hover:bg-gray-600 hover:text-white text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" confirm="Внимание" confirm-text="Вы действительно хотите удалить категорию?" confirm-button="Да" cancel-button="Нет" method="DELETE" >{{__('Удалить')}}</Link>
                        <Link href="{{ route('products.edit', $products->id) }}" class="bg-gray-300 hover:bg-gray-600 hover:text-white text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" >{{__('Редактировать')}}</Link>
                        <Link href="{{ route('products.show', $products->id) }}" class="bg-gray-300 hover:bg-gray-600 hover:text-white text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" >{{__('Подробнее')}}</Link>
                    </div>
                @endcell
                @cell('category_id', $products)
                <div class="font-bold py-2 px-4 rounded inline-flex items-center">
                    {{ $products->category->title }}
                </div>
                @endcell
                @cell('stock', $products)
                @if($products->stock == 0)
                    <div class="bg-gray-300 text-black font-bold py-2 px-4 rounded inline-flex items-center">
                        {{ __('Обычный товар') }}
                    </div>
                @elseif($products->stock == 1)
                    <div class="bg-yellow-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        {{ __('Акционный товар') }}
                    </div>
                @endif
                @endcell
                @cell('isActive', $products)
                    @if($products->isActive == 0)
                        <div class="bg-gray-300 text-black font-bold py-2 px-4 rounded inline-flex items-center">
                            {{ __('Не активна') }}
                        </div>
                    @elseif($products->isActive == 1)
                        <div class="bg-green-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            {{ __('Активна') }}
                        </div>
                    @endif
                @endcell
            </x-splade-table>
        </div>

</x-app-layout>

