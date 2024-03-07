@seoTitle(__($client->name))

<x-app-layout>
    <x-slot:header>
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{$client->name}}</h2>
            <a href="{{ route('clients.index') }}" class="bg-gray-300 hover:bg-gray-600 hover:text-white text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">{{ __('К списку пользователей') }}</a>
        </div>
        </x-slot>
        <div class="flex justify-between  my-4 p-4 rounded-md max-w-[1240px] mx-auto bg-white">
            <div class="flex gap-[80px]  items-top  p-[15px]">
                <div class="">
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">{{ $client->name }}</h3>

                </div>
                <div class="flex gap-[40px] items-start">
                    <p class="text-[18px] mb-[10px]">{{$client->phoneNumber}}</p>
                    <p class="text-[18px] mb-[10px] whitespace-normal w-full">{{$client->email}}</p>
                    <p class="text-[18px] uppercase">{{$client->product_id}}</p>
                </div>
            </div>
            <div class="flex flex-col justify-between p-[15px]">
                    @if($client->isActive == 0)
                        <div class=" bg-gray-300 text-black font-bold py-2 px-4 rounded inline-flex items-center">
                            {{ __('Не активен') }}
                        </div>
                    @elseif($client->isActive == 1)
                        <div class="bg-green-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            {{ __('Активен') }}
                        </div>
                    @endif

            </div>
        </div>
</x-app-layout>

