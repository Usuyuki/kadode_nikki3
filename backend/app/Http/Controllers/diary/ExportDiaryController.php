<?php

namespace App\Http\Controllers\diary;

use App\Http\Controllers\Controller;
use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ExportDiaryController extends Controller
{
    public function __invoke()
    {
        $diaries = Diary::orderby("date", "asc")->select(['date', 'title', 'content'])->get()->toArray();
        // \Log::debug("message".$diary);
        //CSVカラムの生成
        $head = ["日付", "タイトル", "内容"];

        // 書き込み用ファイルを開く
        $uuid = Str::uuid();
        $f = fopen("exportCsv/$uuid.csv", 'w');
        if ($f) {
            // カラムの書き込み SJISがCSVの保存形式なので、SJISで保存。
            /** mb_convert_variables('SJIS-win', 'UTF-8', $head);を以前は使用していたが文字化けする */
            mb_convert_variables('SJIS-win', 'UTF-8', $head);
            fputcsv($f, $head);
            // データの書き込み
            foreach ($diaries as $diary) {

                mb_convert_variables('SJIS-win', 'UTF-8', $diary);
                fputcsv($f, $diary);
            }
        }
        // ファイルを閉じる
        fclose($f);
        // HTTPヘッダ
        /** @todo ここにheaderは責務分割的によろしくない */
        header("Content-Type: application/octet-stream");
        header('Content-Length: ' . filesize("exportCsv/$uuid.csv"));
        header("Content-Disposition: attachment; filename=exportCsv/$uuid.csv");
        readfile("exportCsv/$uuid.csv");

        $file = "exportCsv/$uuid.csv";
        if (unlink($file)) {
            // echo $file.'の削除に成功しました。';
            \Log::debug("$file.の削除成功");
        } else {
            \Log::debug("$file.の削除失敗");
        }
        return redirect("settings");
    }
}