@seoTitle(__($product->title))

<x-app-layout>
    <x-slot:header>
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{$product->title}}</h2>
            <a href="{{ route('products.index') }}" class="bg-gray-300 hover:bg-gray-600 hover:text-white text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">{{ __('К списку продуктов') }}</a>
        </div>
        </x-slot>
        <div class="flex justify-between  my-4 p-4 rounded-md max-w-[1240px] mx-auto bg-white">
            <div class="flex gap-[80px]  items-top  p-[15px]">
                <div class="">
                    <img class="max-w-[400px] rounded-md max-h-[400px]" src="{{Storage::url($product->image)}}" alt="">
                </div>
                <div class="flex flex-col items-start justify-between">
                    <div class=" ">
                        <h3 class="text-[24px] mb-[20px]">{{$product->title}}</h3>
                        <p class="text-[18px] whitespace-normal w-full">{{$product->content}}</p>
                    </div>
                    <p class="text-[18px] uppercase">{{$product->price}}</p>
                </div>
            </div>
            <div class="flex flex-col justify-between p-[15px]">
                    @if($product->isActive == 0)
                        <div class=" bg-gray-300 text-black font-bold py-2 px-4 rounded inline-flex items-center">
                            {{ __('Не активен') }}
                        </div>
                    @elseif($product->isActive == 1)
                        <div class="bg-green-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            {{ __('Активен') }}
                        </div>
                    @endif

            </div>
        </div>
</x-app-layout>

