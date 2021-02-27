<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function posts()
    {
        $posts = Post::paginate(10);
        $page = '';

        return view('pages/posts/table', compact('posts', 'page'));
    }

    public function author($id)
    {
        $author = User::find($id);
        $posts = $author->posts()->paginate(10);
        $page = 'author/' . $id;

        return view('pages/posts/table', compact('posts', 'page'));
    }

    public function category($id)
    {
        $category = Category::find($id);
        $posts = $category->posts()->paginate(10);
        $page = 'category/' . $id;

        return view('pages/posts/table', compact('posts', 'page'));
    }

    public function tag($id)
    {
        $tag = Tag::find($id);
        $posts = $tag->posts()->paginate(10);
        $page = 'tag/' . $id;

        return view('pages/posts/table', compact('posts', 'page'));
    }


    public function filterAC()
    {
        $authors = User::all();
        $categories = Category::all();

        return view('pages/filter/AC', compact('authors', 'categories'));
    }

    public function validationAC()
    {
        $data = request()->all();

        $validator = validator()->make($data, [
            'author'   => ['required'],
            'category' => ['required']
        ]);

        $error = $validator->errors();

        if (count($error) > 0) {
            $_SESSION['data'] = $data;
            $_SESSION['errors'] = $error->toArray();

            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        } else {
            $author = $data['author'];
            $category = $data['category'];

            return new RedirectResponse('/author/' . $author . '/category/' . $category);
        }
    }

    public function postsAC($author, $category)
    {
        $posts = Post::whereHas('user', function (\Illuminate\Database\Eloquent\Builder $query) use ($author, $category) {
            $query->where('user_id', '=', $author);
            $query->where('category_id', '=', $category);
        })->paginate(10);

        $page = '/author/' . $author . '/category/' . $category;
        return view('pages/posts/table', compact('posts', 'page'));
    }


    public function filterACT()
    {
        $authors = User::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages/filter/ACT', compact('authors', 'categories', 'tags'));
    }

    public function validationACT()
    {
        $data = request()->all();

        $validator = validator()->make($data, [
            'author'   => ['required'],
            'category' => ['required'],
            'tag'      => ['required']
        ]);

        $error = $validator->errors();

        if (count($error) > 0) {
            $_SESSION['data'] = $data;
            $_SESSION['errors'] = $error->toArray();


            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        } else {
            $author = $data['author'];
            $category = $data['category'];
            $tag = $data['tag'];

            return new RedirectResponse('/author/' . $author . '/category/' . $category . '/tag/' . $tag);
        }
    }

    public function postsACT($author, $category, $tag)
    {
        $posts = Post::whereHas('tags', function (\Illuminate\Database\Eloquent\Builder $query) use ($author, $category,$tag) {
            $query->where('user_id', '=', $author);
            $query->where('category_id', '=', $category);
            $query->where('tag_id', '=', $tag);

        })->paginate(10);

        $page = '/author/' . $author . '/category/' . $category . '/tag/' . $tag;
        return view('pages/posts/table', compact('posts', 'page'));
    }
}
