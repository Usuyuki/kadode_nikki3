import time
import sys

from datetime import datetime as dt
from base import connectDBClass as database
from nlp import meta_generate


import spacy

def nlpForPre(user_id):
    model="ja_ginza" #軽量モデルを使用。本当はtransformer採用型を使いたいけど、メモリが足りない。

    #DBインスタンス
    db = database.connectDB()

    #進行度を10%に
    db.set_multiple_progress(user_id,"statistics",10)
    # # データ取得
    # rows=db.get_all_diaries_from_user(user_id)

    #日記
    rows=db.get_all_diaries_from_user(user_id)


    #固有表現ルールcustom
    customNER=db.get_customNER(user_id)
    #固有表現ルールpackage
    packageNER=db.get_packageNER(user_id)
    #パターン生成
    NERList=[]
    NERList.append({'label':'Product_Other','pattern':'かどで日記'})
    for singleNER in customNER:
        NERList.append({'label':singleNER[0],'pattern':singleNER[1]})
    for singleNER in packageNER:
        NERList.append({'label':singleNER[0],'pattern':singleNER[1]})
    '''
    固有表現追加の処理が激重なのでループ外で先に行っておく
    '''
    nlp = spacy.load(model)
    config = {
        'overwrite_ents': True
    }
    ruler = nlp.add_pipe('entity_ruler', config=config)
    ruler.add_patterns(NERList)


    '''
    統計更新してから日記側に変更がないとき(updated_statistic_at<=udpated_at)→処理しない分岐
    dbに入っている日付2021-09-20 14:29:16
    '''
    number_of_diaries=0
    for row in rows:
        number_of_diaries+=1
        #個別日記のループ
        #日記の更新日取得
        if(row[4]!=None):
            time_updated_at = row[4]#この時点でdatetime型になっている
        else:
            # データない場合
            time_updated_at = time.strptime('1800-1-1 11:11:11', '%Y-%m-%d %H:%M:%S')
        #統計の更新日取得
        if(row[5]!=None):
            time_statistics_updated_at = row[5]
        else:
            # データない場合
            time_statistics_updated_at = dt.strptime('1800-1-1 11:11:11','%Y-%m-%d %H:%M:%S')
        # print(time_updated_at)
        # print(time_statistics_updated_at)
        # print(type(time_updated_at))
        # print(type(time_statistics_updated_at))

        logic_updated_at = dt.strptime('2021-10-27 21:00:22','%Y-%m-%d %H:%M:%S')
        # print(logic_updated_at)
        # print(time_statistics_updated_at)
        #統計の更新がロジック更新後に更新入っているか統計更新してから日記側に変更xがないときは変更しない
        #falseで実行なので、andに違和感覚えるが、これでいい。
        if(time_statistics_updated_at > logic_updated_at and time_statistics_updated_at>time_updated_at):
            #処理不要 リーダーブルコードに乗ってたなんとかかんとかってやつ
            print(str(row[0])+"スキップ")

            continue
        else:
            print(str(row[0])+"pre処理")
            db.set_single_progress(row[0],"diaries",10)

            '''
            char_length:日記の文字数
            '''
            char_length = len(row[2])#pythonはマルチバイトそのままでいける口
            # print(char_length)

            '''
            token:形態素解析
            chunk:係り受け構造
            sentence:一文ごとの位置(係り受けで使う)
            '''

            token,chunk,sentence=meta_generate.get_tokenChunkSentence_by_ginza(row,nlp)
            # print(sentence)
            # print(token)
            # print(chunk

            '''
            affiliation:固有表現抽出
            annotationは注釈、affiliationは所属という意味
            ↑誤字っているわけではない。
            '''
            affiliation=meta_generate.get_affiliation_by_ginza(row,nlp)
            # print(affiliation)


            '''
            更新日更新はnlpDorDiaryで行う
            '''

            '''
            DB代入
            '''
            db.set_single_json_data('diaries',row[0],chunk=chunk,token=token,sentence=sentence,affiliation=affiliation)
            db.set_single_normal_data('diaries',row[0],char_length=char_length)
            db.set_single_progress(row[0],"diaries",50)

    db.set_multiple_progress(user_id,"statistics",20)
    #インスタンス破棄
    del db

    print("nlpForPre処理終了")
    #日記数を返す(トータルの条件分岐で使用)
    return number_of_diaries
if __name__ == '__main__':
    from_php = sys.argv#php側の引数
    user_id=from_php[1]
    nlpForPre(user_id)
