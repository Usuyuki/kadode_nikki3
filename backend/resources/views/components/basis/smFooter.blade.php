<!---SMフッターここから--->
<div class="sm:hidden" style="height: 60px">
    <!-- smフッターメニューのための余白 -->
</div>

<div id="smFooter"
    class="bg-main-color w-full border-border-main-color border-t-2  fixed bottom-0 right-0 sm:hidden flex  justify-around items-center z-10"
    style="height: 60px">
    <p><a class="flex justify-center flex-col" href="{{url("/home")}}"><span
                class="material-icons mx-auto">home</span><span class="text-xs">ホーム</span></a></p>
    <p><a class="flex justify-center flex-col" href="{{url("/edit")}}"><span
                class="material-icons mx-auto">edit</span><span class="text-xs">日記作成</span></a></p>
    <p><a class="flex justify-center flex-col" href="{{url("/diary").date("/Y/n")}}"><span
                class="material-icons mx-auto">collections_bookmark</span><span class="text-xs">アーカイブ</span></a></p>
    <p><a class="flex justify-center flex-col" href="{{url("/statistics/home")}}"><span
                class="material-icons mx-auto">poll</span><span class="text-xs">統計</span></a></p>
</div>
<!---SMフッターここまで--->
