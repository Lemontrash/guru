<?php

namespace App\Http\Controllers;

use App\AccountVerificationFiles;
use App\User;
use FontLib\EOT\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Svg\Tag\Image;

class UserController extends Controller
{
    public function store(Request $request){

//        dd($request);
        $id = Auth::id();
        $file_id =  $request->file('id');
        $file_selfie = $request->file('selfie');
        $file_bank = $request->file('bank') ;
        $file_dod = $request->file('dod') ;

        $name_id = 'id-'.$id.'.'.$file_id->extension();
        $name_selfie = 'selfie-'.$id.'.'.$file_selfie->extension();
        $name_bank = 'bank-'.$id.'.'.$file_bank->extension();
        $name_dod = 'dod-'.$id.'.'.$file_dod->extension();

        $path_id = Storage::putFileAs(
            'public', $file_id, $name_id
        );
        $path_selfie = Storage::putFileAs(
            'public', $file_selfie, $name_selfie
        );
        $path_bank = Storage::putFileAs(
            'public', $file_bank, $name_bank
        );
        $path_dod = Storage::putFileAs(
            'public', $file_dod, $name_dod
        );
        $file = AccountVerificationFiles::create([
            'user_id' => $id,
            'file_id' => $path_id,
            'selfie' => $path_selfie,
            'bank' => $path_bank,
            'dod' => $path_dod,
        ]);
        return back();
    }
    public function updatePersonalInfo(Request $request){
        $all = $request->all();
    }
}
