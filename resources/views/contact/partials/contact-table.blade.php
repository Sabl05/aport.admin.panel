<table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
    <thead>
    <tr class="font-bold">
        <td class="border px-6 py-4">Наименование</td>
        <td class="border px-6 py-4">Действие</td>
    </tr>
    </thead>
    @foreach($contacts as $contact)
        <tr>
            <td class="border px-6 py-4">{{ $contact->title }}</td>
            <td class="border px-6 py-4 justify-end">
                <x-secondary-button class="inline-flex"
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'update-contact{{ $contact->id }}')">
                    Изменить
                </x-secondary-button>
                <form action="{{ route('contact.destroy', ['contact' => $contact->id]) }}" method="post" class="inline-flex">
                    @csrf
                    @method('delete')
                    <input class="bg-red-600 hover:bg-red-500 text-white font-semibold py-1 px-4 border border-red-100 rounded shadow" style="cursor: pointer;" type="submit" value="Удалить">
                </form>
                @include('contact.partials.update-contact-modal')
            </td>
        </tr>
    @endforeach
</table>
