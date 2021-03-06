<div class="flex border border-kn_2 p-2 m-2 md:p-8 md:m-8 flex-wrap">
    <div class="w-full md:w-1/4 flex justify-center flex-wrap items-center">
        <h4 class="text-xl text-center kiwi-maru">重要そうな言葉<br><span class="text-sm">固有表現抽出利用</span></h4>
    </div>
    <div class="w-full md:w-3/4 flex justify-center md:justify-start flex-wrap items-center">
        @foreach ($important_words as $important_word)
        <p class="flex flex-wrap m-4 p-2 bg-kn_3 kiwi-maru rounded-xl">{{$important_word['name']}}</p>
        @endforeach
    </div>
</div>