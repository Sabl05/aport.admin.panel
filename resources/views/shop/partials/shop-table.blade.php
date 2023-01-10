<table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
    <thead>
    <tr class="font-bold">
        <td class="border px-6 py-4">Баннер</td>
        <td class="border px-6 py-4">Этаж</td>
        <td class="border px-6 py-4">Наименование</td>
        <td class="border px-6 py-4">Описание</td>
        <td class="border px-6 py-4">Категория</td>
        <td class="border px-6 py-4">Действие</td>
    </tr>
    </thead>
    @foreach($shops as $shop)
        <tr>
            <td class="border px-6 py-4"><img src="{{asset("storage/$shop->banner")}}" width="150px"></td>
            <td class="border px-6 py-4">{{ $shop->floor }}</td>
            <td class="border px-6 py-4">{{ $shop->title }}</td>
            <td class="border px-6 py-4">{{ $shop->description }}</td>
            <td class="border px-6 py-4">{{ $shop->category->title }}</td>
            <td class="border px-6 py-4 justify-end">
                <x-secondary-button class="inline-flex"
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'update-shop{{ $shop->id }}')">
                    Изменить
                </x-secondary-button>
                <form action="{{ route('shop.destroy', ['shop' => $shop->id]) }}" method="post" class="inline-flex">
                    @csrf
                    @method('delete')
                    <input class="bg-red-600 hover:bg-red-500 text-white font-semibold py-1 px-4 border border-red-100 rounded shadow" style="cursor: pointer;" type="submit" value="Удалить">
                </form>
                @include('shop.partials.update-shop-modal')
            </td>
        </tr>
    @endforeach
</table>
