<?php

namespace App\Http\Controllers;

use App\Models\Bio;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public $profile = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'username' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'avatar' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
    ];

    public $bio = [
        'bio' => 'nullable|string|max:500',
    ];

    public $post = [
        'photo' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov|max:153600',
        'caption' => 'nullable|string'
    ];

    public function addProfile(Request $request)
    {
        $validated_bio =  $request->validate($this->bio);
        Bio::create($validated_bio);
    }

    public function addPost(Request $request)
    {
        $validated_post =  $request->validate($this->post);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            $validated_post['photo'] = $path;
        }

        Post::create($validated_post);

        return redirect()->to('dashboard');
    }

    public function detailPost($id)
    {
        $detailPosts = Post::findOrFail($id);
        return view('post.detail', compact('detailPosts'));
    }

    public function editPost(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $validated_post =  $request->validate($this->post);
        $post->update($validated_post);

        return redirect()->to('dashboard');
    }

    public function index()
    {
        $users = User::all();
        $posts = Post::orderBy('created_at', 'desc')->get();
        $bios = Bio::all();

        return view('dashboard', compact('users', 'posts', 'bios'));
    }

    public function detail()
    {
        return view('post.detail');
    }

    public function profile()
    {
        return view('profile');
    }

    public function archive()
    {
        $posts = Post::all();
        return view('post.archive', compact('posts'));
    }
}
