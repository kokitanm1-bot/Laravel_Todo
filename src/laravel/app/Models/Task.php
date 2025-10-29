<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Carbon ライブラリを名前空間でインポートする
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    /**
     * ステータス（状態）定義
     * Bootstrap3 の label クラスに対応
     */
    const STATUS = [
        1 => [ 'label' => '未着手', 'class' => 'label-danger' ],
        2 => [ 'label' => '着手中', 'class' => 'label-info' ],
        3 => [ 'label' => '完了',   'class' => 'label-success' ],
    ];

    /**
     * ステータス（状態）ラベルのアクセサメソッド
     * 例: {{ $task->status_label }} → 「未着手」など
     */
    public function getStatusLabelAttribute(): string
    {
        $status = $this->attributes['status'] ?? null;

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    /**
     * 状態を表すHTMLクラスのアクセサメソッド
     * 例: {{ $task->status_class }} → 「label-danger」など
     */
    public function getStatusClassAttribute(): string
    {
        $status = $this->attributes['status'] ?? null;

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }

    /**
     * 整形した期限日のアクセサメソッド
    * 
    * @return string
    */
    public function getFormattedDueDateAttribute()
    {
        /* Carbon ライブラリを使って期限日の値の形式を変更して返す */
        // createFromFormat()：datetime で指定した文字列を format で指定した書式に沿って解釈した時刻にする関数
        // format()：書式を指定する関数
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
            ->format('Y/m/d');
    }
}
