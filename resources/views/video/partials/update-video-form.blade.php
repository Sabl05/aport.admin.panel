<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Видео материал') }}
        </h2>
        <video width="100%" height="240" controls>
            <source src="{{asset("storage/$video->video")}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </header>

    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Обновить') }}</x-primary-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('video.update') }}" class="p-6" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Обновить видео материал') }}
            </h2>

            <div class="mt-6">
                <x-input-label for="video" value="Video" class="sr-only" />
                <input
                    id="video"
                    name="video"
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
                    {{ __('Обновить') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</section>
