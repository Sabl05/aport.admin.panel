<x-modal name="update-shop{{ $shop->id }}" focusable>
    <form method="post" action="{{ route('shop.update', ['old_picture' => $shop->banner, 'id' => $shop->id]) }}" class="p-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Обновить магазин') }}
        </h2>
{{--        <p class="text-sm font-light text-red-600">--}}
{{--            {{ __('Соотношение сторон 16х9') }}--}}
{{--        </p>--}}

        <div class="mb-6 mt-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="banner">
                Картинка
            </label>
            <input
                id="banner"
                name="banner"
                type="file"
                class="mt-1 block w-3/4"
            />
            {{--                <x-input-error :messages="$errors->userDeletion->get('')" class="mt-2" />--}}
        </div>
        <div class="mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="floor">
                Этаж
            </label>
            <input value="{{ $shop->floor }}"  class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="floor" type="number" name="floor" placeholder="Ведите этаж магазина" required>
        </div>
        <div class="mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                Наименование
            </label>
            <input value="{{ $shop->title }}" class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title" type="text" name="title" placeholder="Ведите Наименование магазина" required>
        </div>
        <div class="mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                Описание
            </label>
            <input value="{{ $shop->description }}" class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="description" type="text" name="description" placeholder="Ведите описание магазина" required>
        </div>
        <div class="mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                Категории
            </label>
            <select class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="description" type="text" name="category_id" required>
                @foreach($categories as $category)
                    @if($category->id == $shop->category_id)
                        <option selected value="{{ $category->id }}">{{ $category->title }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <h3 class="text-lg font-medium text-gray-900">
            {{ __('Время работы') }}
        </h3>
        <div class="mb-6 mt-4">
            @foreach($shop->workTime as $work_time)
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-4">
                    {{ $work_time->name }}
                </label>
                <input value="{{ $work_time->since }}" class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="work_time[{{ $work_time->name }}][since]" placeholder="с" required>
                <input value="{{ $work_time->till }}" class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mt-4" type="text" name="work_time[{{ $work_time->name }}][till]" placeholder="до" required>
            @endforeach
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
