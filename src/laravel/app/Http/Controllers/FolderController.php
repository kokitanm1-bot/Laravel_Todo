<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FolderController extends Controller
{
    /**
     *  【フォルダ作成ページの表示機能】
     *
     *  GET /folders/create
     *  @return \Illuminate\View\View
     */
    public function showCreateForm()
    {
        /* フォルダの新規作成ページを呼び出す */
        // view('遷移先のbladeファイル名');
        return view('folders/create');
    }
}