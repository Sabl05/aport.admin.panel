<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Категории') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(isset($error))
                        <p class="text-sm font-light text-red-600">
                            {{ __('Данная категория уже привязана к магазину') }}
                        </p>
                    @endif
                    <x-primary-button class="m-2 float-right"
                                      x-data=""
                                      x-on:click.prevent="$dispatch('open-modal', 'add-category')">
                        Добавить категорию
                    </x-primary-button>
                    @include('category.partials.category-table')
                    @include('category.partials.add-category-modal')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
