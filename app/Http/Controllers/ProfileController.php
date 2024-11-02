<?php

namespace App\Http\Controllers;

use App\Models\Bio;
use App\Models\Post;
use App\Models\User;
use App\Exports\PostsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class ProfileController extends Controller
{

    public $user = [
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|string|email|max:255|unique:users',
        'username' => 'nullable|string|max:255',
        'password' => 'nullable|string|min:8',
        'avatar' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
    ];

    public $credenticial = [
        'username' => 'nullable|string|max:255',
        'password' => 'nullable|string|min:8',
    ];

    public $bio = [
        'user_id' => 'required|exists:users,id',
        'bio' => 'nullable|string|max:500',
    ];

    public $post = [
        'user_id' => 'required|exists:users,id',
        'photo' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov|max:153600',
        'caption' => 'nullable|string'
    ];

    public function register(Request $request)
    {
        $validated_user = $request->validate($this->user);
        $validated_user['password'] = Hash::make($validated_user['password']);

        User::create($validated_user);

        return redirect()->to('login');
    }

    public function authenticate(Request $request)
    {
        $validate_credenticial = $request->validate($this->credenticial);
        $user = User::where('username', $validate_credenticial['username'])->first();
        // dd($user);
        if ($user && Hash::check($validate_credenticial['password'], $user->password)) {
            Auth::login($user);

            return redirect()->to('/dashboard');
        }
    }


    public function detailProfile($id)
    {
        $users = User::findOrFail($id);
        return view('profile', compact('users'));
    }

    public function editProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validated_user = $request->validate($this->user);
        $validated_bio = $request->validate($this->bio);
        $validated_post['user_id'] = Auth::id();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            $validated_user['avatar'] = $path;
        }
        $user->update($validated_user);

        Bio::create($validated_bio);

        return redirect()->to('dashboard');
    }

    public function addPost(Request $request)
    {
        $validated_post =  $request->validate($this->post);
        $validated_post['user_id'] = Auth::id();

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
        $pengguna = Auth::user();
        $users = User::where('username', $pengguna->username)->get();
        $bios = Bio::where('user_id', $pengguna->id)->get();
        $posts = Post::orderBy('created_at', 'desc')->where('user_id', $pengguna->id)->get();

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
        $pengguna = Auth::user();

        $posts = Post::orderBy('created_at', 'desc')->where('user_id', $pengguna->id)->get();
        return view('post.archive', compact('posts'));
    }

    public function login()
    {
        return view('login');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function preview()
    {
        $pengguna = Auth::user();
        $posts = Post::orderBy('created_at', 'desc')->where('user_id', $pengguna->id)->get();
        $pdf = FacadePdf::loadView('preview.index', compact('posts'));
        // return view('preview.index', compact('posts'));
        return $pdf->download('Posts.pdf');
    }


    public function downloadXLS()
    {
        return Excel::download(new PostsExport, 'posts.xlsx');
    }

    // public function filter(Request $request)
    // {
    //     $query = Post::query();
    //     if ($request->has('start_date') && $request->has('end_date')) {
    //         $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
    //     }
    //     $posts = $query->orderBy('created_at', 'desc')->get();

    //     return view('post.archive', compact('posts'));
    // }
}
