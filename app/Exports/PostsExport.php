<?php

namespace App\Exports;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pengguna = Auth::user();
        return Post::orderBy('created_at', 'desc')->where('user_id', $pengguna->id)->get();
    }
}
