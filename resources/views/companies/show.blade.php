<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                        <div class="flex items-center p-4">
                            <img src="{{$company->logo}}" alt="" class="h-50 w-50 flex-none rounded-full">
                            <div class="ml-4 flex-auto">
                                <div class="font-medium">{{$company->name}}</div>
                                <div class="mt-1 text-slate-700"><a href="malito:{{$company->email}}">{{$company->email}}</a></div>
                            </div>
                            <a href="{{route('companies.edit',$company)}}" class="pointer-events-auto ml-4 flex-none rounded-md py-[0.3125rem] px-2 font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Редактировать</a>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Адрес</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$company->address}}</dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <div id="map_company" style="width: 600px; height: 400px"></div>
{{--                                    <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/11063/mineralniye-vodi/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Минеральные Воды</a><a href="https://yandex.ru/maps/11063/mineralniye-vodi/?ll=43.127903%2C44.197300&utm_medium=mapframe&utm_source=maps&z=14" style="color:#eee;font-size:12px;position:absolute;top:14px;">Минеральные Воды — Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/?ll=43.127903%2C44.197300&z=14" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>--}}
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid ">
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                        <table id="example" class="display">
                                            <thead>
                                            <tr>
                                                <th>ФИО</th>
                                                <th>Email</th>
                                                <th>Телефон</th>
                                                <th><a href="{{route('worker.create')}}" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Добавить Работника</a></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($company->workers as $item)
                                                <tr>
                                                    <td><a href="{{route('worker.show',$item)}}">{{$item->name}}</a></td>
                                                    <td><a href="{{route('worker.show',$item)}}">{{$item->email}}</a></td>
                                                    <td><a href="{{route('worker.show',$item)}}">{{$item->phone}}</a></td>
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
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="module">
    $(document).ready( function () {
        $('#example').DataTable();
    } );



</script>
<script type="text/javascript">
    ymaps.ready(init);
    function init(){
        // Создание карты.
        var myMap = new ymaps.Map("map_company", {
            // Координаты центра карты.
            // Порядок по умолчанию: «широта, долгота».
            // Чтобы не определять координаты центра карты вручную,
            // воспользуйтесь инструментом Определение координат.
            center: [55.76, 37.64],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 7
        });

        // Поиск координат центра Нижнего Новгорода.
        ymaps.geocode('{{$company->address}}', {
            /**
             * Опции запроса
             * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/geocode.xml
             */
            // Сортировка результатов от центра окна карты.
            // boundedBy: myMap.getBounds(),
            // strictBounds: true,
            // Вместе с опцией boundedBy будет искать строго внутри области, указанной в boundedBy.
            // Если нужен только один результат, экономим трафик пользователей.
            results: 1
        }).then(function (res) {
            // Выбираем первый результат геокодирования.
            var firstGeoObject = res.geoObjects.get(0),
                // Координаты геообъекта.
                coords = firstGeoObject.geometry.getCoordinates(),
                // Область видимости геообъекта.
                bounds = firstGeoObject.properties.get('boundedBy');

            firstGeoObject.options.set('preset', 'islands#darkBlueDotIconWithCaption');
            // Получаем строку с адресом и выводим в иконке геообъекта.
            firstGeoObject.properties.set('iconCaption', firstGeoObject.getAddressLine());

            // Добавляем первый найденный геообъект на карту.
            myMap.geoObjects.add(firstGeoObject);
            // Масштабируем карту на область видимости геообъекта.
            myMap.setBounds(bounds, {
                // Проверяем наличие тайлов на данном масштабе.
                checkZoomRange: true
            });

        });


    }
</script>
