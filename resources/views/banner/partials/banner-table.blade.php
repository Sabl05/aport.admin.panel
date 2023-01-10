<table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
    <thead>
    <tr class="font-bold">
        <td class="border px-6 py-4">Картинка</td>
        <td class="border px-6 py-4">Действие</td>
    </tr>
    </thead>
    @foreach($banners as $banner)
        <tr>
            <td class="border px-6 py-4"><img src="{{asset("storage/$banner->picture")}}" width="150px"></td>
            <td class="border px-6 py-4 justify-end">
                <x-secondary-button class="inline-flex"
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'update-banner{{ $banner->id }}')">
                    Изменить
                </x-secondary-button>
                <form action="{{ route('banner.destroy', ['banner' => $banner->id]) }}" method="post" class="inline-flex">
                    @csrf
                    @method('delete')
                    <input class="bg-red-600 hover:bg-red-500 text-white font-semibold py-1 px-4 border border-red-100 rounded shadow" style="cursor: pointer;" type="submit" value="Удалить">
                </form>
                @include('banner.partials.update-banner-modal')
            </td>
        </tr>
    @endforeach
</table>
