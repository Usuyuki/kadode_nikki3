@extends("layouts.noLogIn")
@section("title","リリースノート")

@section('header')
@parent
@endsection
@section('content')
<h1 class="text-center my-8 text-3xl kiwi-maru">リリースノート</h1>
<div class="mx-auto px-4 mb-12" style="max-width: 1200px">

    @include('components.noLogIn.releaseNote',
    ['title'=>'統計更新での全日記進捗リセットに関するバグ',
    'date'=>'2021年10月26日',
    'genre'=>'Fix',
    'explain'=>'任意のユーザーが統計更新を行った際に、全ユーザーの日記の進捗がリセットされ統計情報が表示されなくなるバグを修正しました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'固有表現ルールをまとめたパッケージを追加',
    'date'=>'2021年10月26日',
    'genre'=>'Feature',
    'explain'=>'ユーザーが定義した固有表現ルール以外にパッケージを選ぶことで固有表現ルールを追加できる機能をリリースしました。正直私利私欲でしかありませんが趣味のwebアプリであること故ご了承願います。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'パッケージ機能リリース',
    'date'=>'2021年10月26日',
    'genre'=>'Feature',
    'explain'=>'統計生成の解析時に使用できるパッケージ機能を追加しました。「統計設定」より有効無効が設定できます。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'ユーザー定義の固有表現ルール追加機能',
    'date'=>'2021年10月26日',
    'genre'=>'Feature',
    'explain'=>'新しくできた「統計設定」ページより、ご自身で固有表現ルールを追加できるようになりました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'日記の本文でのショートカット',
    'date'=>'2021年10月24日',
    'genre'=>'Feature',
    'explain'=>'日記の本文入力で「Ctrl+Enter」(Macの方は「Cmd+Enter」)を押した際にクリックせず日記の書き込みを行えるようになりました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'アーカイブページでの編集ボタン消失問題解消',
    'date'=>'2021年10月3日',
    'genre'=>'Fix',
    'explain'=>'携帯端末などでアーカイブページを閲覧した際に、タイトル文字数が多いとき編集ボタンが消失する問題を解決しました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'年別アーカイブでの統計情報表示',
    'date'=>'2021年10月2日',
    'genre'=>'Feature',
    'explain'=>'年ごとのアーカイブページでも月ごとと同様の統計情報を表示するようにしました。この機会に昔を振り返ってみてはいかがでしょうか。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'月別アーカイブでの統計情報表示',
    'date'=>'2021年10月1日',
    'genre'=>'Feature',
    'explain'=>'月ごとのアーカイブページで統計情報を表示するようにしました。気持ちの推移や分類、よく使われた言葉などをご確認いただけます。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'アーカイブ、検索、ホームでのミニ統計情報表示機能',
    'date'=>'2021年9月25日',
    'genre'=>'Feature',
    'explain'=>'日記の編集ページ以外でも簡易的な統計機能を表示できるようになりました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'個別日記ページでのパンくずリストの追加',
    'date'=>'2021年9月24日',
    'genre'=>'Feature',
    'explain'=>'該当するアーカイブページに素早く移動できるよう、個別日記ページにパンくずリストを追加しました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'【統計】個別の日記での統計表示を追加',
    'date'=>'2021年9月23日',
    'genre'=>'Feature',
    'explain'=>'個々の日記の編集ページで「感情」「推定分類」「重要そうな言葉」「登場人物」の統計データが見れるようになりました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'【統計】自然言語処理個別日記の進行状況のグラフ化',
    'date'=>'2021年9月21日',
    'genre'=>'Feature',
    'explain'=>'今後の自然言語処理関連の実装に備えて、どのくらいの日記が解析済みかを示すプログレスバーを表示するようにしました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'統計機能の日記数制限',
    'date'=>'2021年9月17日',
    'genre'=>'Fix',
    'explain'=>'日記数が少ない場合グラフの崩壊などが生じるため、日記が30件未満の場合には生成できないように制限を設けました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'モバイル端末で本文入力中のフッターメニュー除去',
    'date'=>'2021年9月11日',
    'genre'=>'Fix',
    'explain'=>'モバイル端末で日記の本文を入力している際に、フッターメニューがバーチャルキーボードの上に表示され操作性が低下している問題を解決しました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'設定、統計のデザイン刷新',
    'date'=>'2021年9月11日',
    'genre'=>'Fix',
    'explain'=>'設定ページと統計ページのデザインを刷新しました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'【統計】自然言語処理進行状況のグラフ化',
    'date'=>'2021年9月7日',
    'genre'=>'Feature',
    'explain'=>'今後の自然言語処理関連の実装に備えて、どれくらい現段階で処理が進んでいるかを表示するグラフを描画するようにしました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'【統計】名詞と形容詞の登場順をグラフ化',
    'date'=>'2021年9月6日',
    'genre'=>'Feature',
    'explain'=>'形態素解析を用いて、日記全体に含まれる単語をカウントし、名詞と形容詞をグラフ化しました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'「気持ち」機能削除',
    'date'=>'2021年9月4日',
    'genre'=>'Fix',
    'explain'=>'形態素解析導入に伴い、各日記で手動で設定できた十段階の「気持ち」機能を削除しました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'日記編集ページ改善',
    'date'=>'2021年8月12日',
    'genre'=>'Fix',
    'explain'=>'日記編集ページにおいて、前後の日記のリンクが表示されるようになりました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'日記表示文字数変更',
    'date'=>'2021年8月12日',
    'genre'=>'Fix',
    'explain'=>'ホームページやアーカイブページなどで日記の表示文字数を最大2000文字に変更しました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'統計機能追加',
    'date'=>'2021年6月19日',
    'genre'=>'Feature',
    'explain'=>'月ごとの1日記あたりの平均文字数推移、月ごとの日記執筆率のグラフが表示できるようになりました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'レスポンシブ対応',
    'date'=>'2021年6月19日',
    'genre'=>'Feature',
    'explain'=>'スマホでもかどで日記をご利用いただけるようになりました。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'一般向けサービスローンチ',
    'date'=>'2021年6月14日',
    'genre'=>'Feature',
    'explain'=>'会員登録してご利用いただけます。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'日記のインポート機能を追加しました',
    'date'=>'2021年6月10日',
    'genre'=>'Feature',
    'explain'=>'かどで日記形式のCSVファイル、月に書く日記のTXTファイルがご利用いただけます。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'日記のエクスポート機能を追加しました',
    'date'=>'2021年6月4日',
    'genre'=>'Feature',
    'explain'=>'かどで日記形式のCSVファイルを出力できます。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'かどで日記3開発開始',
    'date'=>'2021年5月30日',
    'genre'=>'Feature',
    'explain'=>'現行版となる、かどで日記3の初期リポジトリでのinitial commit日。
    '])
    @include('components.noLogIn.releaseNote',
    ['title'=>'かどで日記開発開始',
    'date'=>'2020年12月31日',
    'genre'=>'Feature',
    'explain'=>'かどで日記の初期リポジトリでのinitial commit日。
    '])

</div>

@endsection
