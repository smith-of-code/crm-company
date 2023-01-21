<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company create') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form action="{{$company->id?route('companies.update',$company):route('companies.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="company-name" class="block text-sm font-medium text-gray-700">Company name</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="name" value="{{$company->name}}" placeholder="ООО 'как дела'" id="company-name" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" >
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="company-email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="email" value="{{$company->email}}" id="company-email" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="example@example.ru">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="company-address" class="block text-sm font-medium text-gray-700">Адрес</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="address" value="{{$company->address}}" id="company-address" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="г.Москва ул.безымянная д.5">
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="mt-1 flex items-center">
                                      <span class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100">
                                        <img src="{{$company->logo}}" alt="">
                                      </span>
                                        <input class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" name="logo" type="file" accept="image/jpeg,image/png">
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
                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
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
