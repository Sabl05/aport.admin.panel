<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Магазины') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-primary-button class="m-2 float-right"
                                      x-data=""
                                      x-on:click.prevent="$dispatch('open-modal', 'add-shop')">
                        Добавить магазин
                    </x-primary-button>
                    @include('shop.partials.shop-table')
                    @include('shop.partials.add-shop-modal')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
