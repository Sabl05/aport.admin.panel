<x-modal name="add-contact" focusable>
    <form method="post" action="{{ route('contact.store') }}" class="p-6" enctype="multipart/form-data">
        @csrf

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Добавить контакт') }}
        </h2>
        {{--        <p class="text-sm font-light text-red-600">--}}
        {{--            {{ __('Соотношение сторон 16х9') }}--}}
        {{--        </p>--}}

        <div class="mb-6 mt-4">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                Наименование
            </label>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title" type="text" name="title" placeholder="Ведите Наименование магазина" required>
        </div>
        <h3 class="text-lg font-medium text-gray-900">
            {{ __('Время работы') }}
        </h3>
        <div class="mb-6 mt-4">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                ПН
            </label>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="work_time[ПН][since]" placeholder="с" required>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mt-4" type="text" name="work_time[ПН][till]" placeholder="до" required>

            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-4">
                ВТ
            </label>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="work_time[ВТ][since]" placeholder="с" required>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mt-4" type="text" name="work_time[ВТ][till]" placeholder="до" required>

            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-4">
                СР
            </label>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="work_time[СР][since]" placeholder="с" required>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mt-4" type="text" name="work_time[СР][till]" placeholder="до" required>

            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-4">
                ЧТ
            </label>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="work_time[ЧТ][since]" placeholder="с" required>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mt-4" type="text" name="work_time[ЧТ][till]" placeholder="до" required>

            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-4">
                ПТ
            </label>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="work_time[ПТ][since]" placeholder="с" required>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mt-4" type="text" name="work_time[ПТ][till]" placeholder="до" required>

            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-4">
                СБ
            </label>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="work_time[СБ][since]" placeholder="с" required>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mt-4" type="text" name="work_time[СБ][till]" placeholder="до" required>

            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-4">
                ВСК
            </label>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="work_time[ВСК][since]" placeholder="с" required>
            <input class="appearance-none block w-3/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mt-4" type="text" name="work_time[ВСК][till]" placeholder="до" required>
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
