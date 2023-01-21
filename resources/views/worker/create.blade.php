<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Worker create') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form action="{{$worker->id?route('worker.update',$worker):route('worker.store')}}" method="POST" >
                        @csrf
                        @method($worker->id?'PATCH':'POST')
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="worker-name" class="block text-sm font-medium text-gray-700">Имя сотрудника</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="name" value="{{$worker->name}}" placeholder="Ильичев Владимир Викторович" id="worker-name" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" >
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="worker-email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="email" value="{{$worker->email}}" id="worker-email" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="example@example.ru">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="worker-phone" class="block text-sm font-medium text-gray-700">Телефон</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="tel" name="phone" value="{{$worker->phone}}" id="worker-phone" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="+79586545656">
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="worker-company" class="block text-sm font-medium text-gray-700">Компания</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <select name="company_id" id="worker-company" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                <option disabled selected value> -- компания -- </option>
                                                @foreach(\App\Models\Company::all() as $item)
                                                    <option @if($worker->id && $item->id === $worker->company->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</x-app-layout>

<script type="module">
    $(document).ready( function () {
        $('#example').DataTable();
    } );

</script>
