<?php

namespace App\Http\Controllers\MyPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Mypage\Profile\EditRequest;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
  public function showProfileEditForm()
  {
    return view('mypage.profile_edit_form')
    ->with('user', Auth::user());
  }
  public function editProfile(EditRequest $request)
  {
    $user = Auth::user();

    $user->name = $request->input('name');

    if ($request->has('avatar')) {
      $fileName = $this->saveAvatar($request->file('avatar'));
      $user->avatar_file_name = $fileName;
    }

    $user->save();

    return redirect()->back()
    ->with('status', 'プロフィールを変更しました。');
  }
  /**
  * アバター画像をリサイズして保存します
  *
  * @param UploadedFile $file アップロードされたアバター画像
  * @return string ファイル名
  */
  private function saveAvatar(UploadedFile $file): string
  {
    $tempPath = $this->makeTempPath();

    Image::make($file)->fit(200, 200)->save($tempPath);

    $filePath = Storage::disk('public')
    ->putFile('avatars', new File($tempPath));

    return basename($filePath);
  }

  /**
  * 一時的なファイルを生成してパスを返します。
  *
  * @return string ファイルパス
  */
  private function makeTempPath(): string
  {
    $tmp_fp = tmpfile();
    $meta   = stream_get_meta_data($tmp_fp);
    return $meta["uri"];
  }
}
