<x-modal name="add-banner" focusable>
    <form method="post" action="{{ route('banner.store') }}" class="p-6" enctype="multipart/form-data">
        @csrf

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Добавить баннер') }}
        </h2>
        <p class="text-sm font-light text-red-600">
            {{ __('Соотношение сторон 16х9') }}
        </p>

        <div class="mt-6">
            <x-input-label for="picture" value="Picture" class="sr-only" />
            <input
                id="picture"
                name="picture"
                type="file"
                class="mt-1 block w-3/4"
            />

            {{--                <x-input-error :messages="$errors->userDeletion->get('')" class="mt-2" />--}}
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Отменить') }}
            </x-secondary-button>

            <x-primary-button class="ml-3">
                {{ __('Добавить') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
