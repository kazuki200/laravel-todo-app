<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;

class FolderController extends Controller
{
    /**
     *
     *【フォルダ作成ページの表示機能】
     * GET /folders/create
     * @return \Illuminate\View\View
     */
    public function showCreateForm()
    {
        return  view('folders.create');
    }

    /**
     *【フォルダの作成機能】
     *
     * POST /folders/create
     * @param CreateFolder $request (リクエストクラスの$request)
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CreateFolder $request)
    {
        $folder = new Folder();
        $folder->title = $request->title;
        $folder->save();

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }

    /**
     *  【フォルダ編集ページの表示機能】
     *
     *  GET /folders/{id}/edit
     *  @param int $id
     *  @return \Illuminate\View\View
     */
    public function showEditForm(int $id)
    {
        $folder = Folder::find($id);

        return view('folders/edit', [
            'folder_id' => $folder->id,
            'folder_title' => $folder->title,
        ]);
    }
}
