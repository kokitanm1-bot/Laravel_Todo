<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 状態（セレクトボックスの値）が定義された値ではない場合はバリデーションエラーにするメソッド
     * 用途：状態（'status'）に不正な値（1,2,3以外）を入力してエラーをテストする
     *
     * @test
     */
    public function status_should_be_within_defined_numbers()
    {
        $this->seed('TasksTableSeeder');

        $response = $this->post('/folders/1/tasks/1/edit', [
            'title' => 'Sample task',
            'due_date' => Carbon::today()->format('Y/m/d'),
            'status' => 999,
        ]);

        $response->assertSessionHasErrors([
            'status' => '状態 には 未着手、着手中、完了 のいずれかを指定してください。',
        ]);
    }
}
