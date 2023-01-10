<x-modal name="update-category{{ $category->id }}" focusable>
    <form method="post" action="{{ route('category.update', ['id' => $category->id]) }}" class="p-6">
        @csrf
        @method('patch')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Обновить категорию') }}
        </h2>
{{--        <p class="text-sm font-light text-red-600">--}}
{{--            {{ __('Соотношение сторон 16х9') }}--}}
{{--        </p>--}}

        <div class="mb-6 mt-4">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                Наименование
            </label>
            <input value="{{ $category->title }}" class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title" type="text" name="title" placeholder="Ведите Наименование магазина">
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Отменить') }}
            </x-secondary-button>

            <x-primary-button class="ml-3">
                {{ __('Обновить') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
