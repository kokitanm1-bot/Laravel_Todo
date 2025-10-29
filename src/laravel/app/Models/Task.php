<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
