<?php

namespace App\Http\Controllers\notifications;

use App\Http\Controllers\Controller;
use App\Models\Releasenote_genre;
use App\Models\Releasenote;
use App\Models\User;
use Illuminate\Http\Request;

class ReleasenoteController extends Controller
{

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request){

        // バリデーション
        $this->validate($request,Releasenote::$rules);

        //中身作成
        $form=[
            "title"=>$request->title,
            "genre_id"=>$request->osirase_genre_id,
            "description"=>$request->description,
            "date"=>$request->date,
        ];

        Releasenote::create($form);

        //ユーザー通知のフラグをオンにする
        User::where('id','!=','null')->update(["is_showed_update_system_info"=>1]);

        return redirect('administrator/notification');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function read(){
        $releasenotes=Releasenote::orderBy('date', 'desc')->get(['title','date','genre_id','description']);
        $releasenoteGenres=Releasenote_genre::get(['id','name']);
        foreach($releasenotes as $releasenote){
            $releasenote->genre=$releasenoteGenres[$releasenote->genre_id-1]->name;
        }
        return view('diaryNoLogIn/releaseNote',['releasenotes' => $releasenotes,]);
    }


    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */

    public function update(Request $request){

        // バリデーション
        $this->validate($request,Releasenote::$rules);

        $updateContent=[
            "title"=>$request->title,
            "genre_id"=>$request->osirase_genre_id,
            "description"=>$request->description,
            "date"=>$request->date,
        ];

        Releasenote::where('id',$request->releasenote_id)->update($updateContent);
        return redirect('administrator/notification');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function delete(Request $request){
        Releasenote::where('id',$request->releasenote_id)->delete();
        return redirect('administrator/notification');
    }
}