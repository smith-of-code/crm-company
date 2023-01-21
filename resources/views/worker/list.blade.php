<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Workers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table id="example" class="display">
                        <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Email</th>
                            <th><a href="{{route('worker.create')}}" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Добавить Работника</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($workers as $item)
                            <tr>
                                <td><a href="{{route('worker.show',$item)}}">{{$item->name}}</a></td>
                                <td><a href="{{route('worker.show',$item)}}">{{$item->email}}</a></td>
                                <td> <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                        <form method="POST" action="{{route('worker.destroy',$item)}}">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Удалить</button>
                                        </form>

                                    </div></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="module">
    $(document).ready( function () {
        $('#example').DataTable();
        $('.delete-company__button').on('click',function (event){

            axios.delete('{{route('companies.index').'/'}}'+event.target.dataset.id)
            console.log(event.target.dataset.id)
        })

    } );

</script>
