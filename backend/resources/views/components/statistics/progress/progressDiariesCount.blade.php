@isset($ended_diaries_count)
<p class="text-center kiwi-maru mt-12 mb-2">個別日記解析状況</p>
<p class="text-center text-xs kiwi-maru my-2">※初回や統計システム更新時は処理の大きい個別日記の基礎解析を行うため、時間を要します。</p>
<div style="max-width:70%" class="mx-auto">
  <div class="relative pt-1">
    <div class="flex mb-2 items-center justify-between">
      <div>

      </div>
      <div class="text-right">
        <span class="text-xs font-semibold inline-block text-kn_w">
          {{$number_of_nikki}}日記中{{$ended_diaries_count}}日記完了
        </span>
      </div>
    </div>
    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded " style="background-color:#8A8772">
      <div style="background-color:#4B8996;width:{{$percecntage}}%"
        class="shadow-none flex flex-col text-center whitespace-nowrap text-kn_w justify-center"></div>
    </div>
  </div>

</div>
<!--進行中のときの動作-->


@endisset