@php
$counter=0;
$totalEmotions=0;

foreach ($emotions as $emotion) {
$totalEmotions+=$emotion['value'];
$counter+=1;
}
$emotionRate=$totalEmotions/$counter;

if($emotionRate>=0.5){
$emotions_chr="ポジティブ";
$bg_color="bg-kn_excellent";
}else{
$emotions_chr="ネガティブ";
$bg_color="bg-kn_poor";
}
@endphp
<p class="kiwi-maru p-2 {{$bg_color}} rounded-xl w-full md:w-1/2 md:text-left text-center">平均<br>{{$emotions_chr}}<span
        class="text-xs">({{$emotionRate}})</span></p>