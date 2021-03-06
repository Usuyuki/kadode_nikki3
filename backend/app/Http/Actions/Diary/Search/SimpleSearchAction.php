<?php

declare(strict_types=1);

namespace App\Http\Actions\Diary\Search;

use App\Http\Controllers\Controller;
use App\Models\Diary;
use App\UseCases\Diary\ShapeStatisticFromDiaries;
use DB;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SimpleSearchAction extends Controller
{
    public function __construct(
        private ShapeStatisticFromDiaries $shapeStatisticFromDiaries
    ) {
    }

    public function __invoke(Request $request): View|Factory
    {
        //効果あるか分からないけれど、危険な変数のエスケープをする
        $request->keyword = htmlspecialchars($request->keyword, ENT_QUOTES);
        // 検索結果のバリデーション
        $rules = array(
            "keyword" => "min:2|max:20",
        );
        $this->validate($request, $rules);


        //DB叩く 最近の日記から直近50個
        DB::enableQueryLog();
        /** @var Collection|null */
        $diaries = Diary::where("content", "like", "%$request->keyword%")->orderby("date", "desc")->take(200)->get();
        //クエリ時間取得
        $queryLog = DB::getQueryLog();
        $queryTime = $queryLog[0]["time"];
        // \Log::debug("requests".$request->keyword);

        //文字の抽出　該当箇所の前後飲みにする
        $proceedDiary = null;
        $counter = 0;
        if (! empty($diaries)) {

            $diaries = $this->shapeStatisticFromDiaries->invoke($diaries);

            /**
             * 日記文字ハイライト処理
             */
            foreach ($diaries as $diary) {
                $counter += 1;
                //キーワードの長さ
                $keywordLength = mb_strlen($request->keyword);
                //日記の長さ
                $contentLength = mb_strlen($diary->content);
                //キーワードまでの文字数
                $placeOfWord = mb_strpos($diary->content, $request->keyword);

                //キーワードまでの文字数-100がマイナスなら0にする
                $placeStart = ($placeOfWord - 100 >= 0) ? ($placeOfWord - 100) : 0;
                //検索したキーワード含めずに後ろ100字 日記の文字数オーバーしない範囲で
                $placeEnd = ($placeOfWord + $keywordLength + 100 <= $contentLength) ? ($placeOfWord + $keywordLength + 100) : $contentLength;

                //前後100字含めた切り出し
                $diary->content = mb_substr($diary->content, $placeStart, $placeEnd - $placeStart);

                /*
             * キーワードハイライトのための代入
             */
                //キーワードの長さ
                $keywordLength = mb_strlen($request->keyword);
                //日記の長さ
                $contentLength = mb_strlen($diary->content);
                //キーワードまでの文字数
                $placeOfWord = mb_strpos($diary->content, $request->keyword);
                //ハイライト追加に際して、シーケンスせずhtml解釈させるので、その前に攻撃防止のためにタグを防ぐ
                $diary->content = htmlspecialchars($diary->content, ENT_QUOTES);
                //ハイライト追加
                //webpackでビルドに変更したため、ここでTailwindのCSS指定しても生成されないため、styleで指定
                $diary->content = mb_substr($diary->content, 0, $placeOfWord) . "<span style='background-color:#FFFDBF;color:var(--kn_b)'>" . mb_substr($diary->content, $placeOfWord, $keywordLength) . "</span>" . mb_substr($diary->content, $placeOfWord + $keywordLength);


                $proceedDiary[] = $diary;
            }
        }
        return view('diary/search/searchResult', ['counter' => $counter, 'keyword' => $request->keyword, 'diaries' => $proceedDiary, 'queryTime' => $queryTime]);
    }
}