<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Worker') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                        <div class="flex items-center p-4">
                            <img src="{{$worker->logo}}" alt="" class="h-50 w-50 flex-none rounded-full">
                            <div class="ml-4 flex-auto">
                                <div class="font-medium">{{$worker->name}}</div>
                                <div class="mt-1 text-slate-700"><a href="malito:{{$worker->email}}">{{$worker->email}}</a></div>
                                <div class="mt-1 text-slate-700"><a href="tel:{{$worker->phone}}">{{$worker->phone}}</a></div>
                                <div class="mt-1 text-slate-700"><a href="{{route('companies.show',$worker->company)}}">{{$worker->company->name}}</a></div>
                            </div>
                            <a href="{{route('worker.edit',$worker)}}" class="pointer-events-auto ml-4 flex-none rounded-md py-[0.3125rem] px-2 font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Редактировать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

