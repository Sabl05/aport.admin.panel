<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Контакты') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-primary-button class="m-2 float-right"
                                      x-data=""
                                      x-on:click.prevent="$dispatch('open-modal', 'add-contact')">
                        Добавить Контакт
                    </x-primary-button>
                    @include('contact.partials.contact-table')
                    @include('contact.partials.add-contact-modal')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
