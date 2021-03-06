<div class="flex border border-kn_2 p-2 m-2 md:p-8 md:m-8 flex-wrap">
    <div class="w-full md:w-1/4 flex justify-center flex-wrap items-center">
        <h4 class="text-xl text-center kiwi-maru">登場人物<br><span class="text-sm">固有表現抽出利用</span></h4>
    </div>
    <div class="w-full md:w-3/4 flex justify-center md:justify-start flex-wrap items-center">
        @foreach ($special_people as $special_person)
        <p class="flex flex-wrap m-4 p-2 bg-kn_3 kiwi-maru rounded-xl"><span
                class="material-icons">person</span>{{$special_person['name']}}さん</p>
        @endforeach
    </div>
</div>