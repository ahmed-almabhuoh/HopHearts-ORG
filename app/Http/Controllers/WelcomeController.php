<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Project;
use Illuminate\Http\Request;
use League\CommonMark\CommonMarkConverter;

class WelcomeController extends Controller
{
    //

    public function getWelcomePage()
    {
        $projects = Project::all();
        $blogs = Blog::all();

        return response()->view('welcome', [
            'projects' => $projects,
            'blogs' => $blogs,
        ]);
    }

    public function getBlogPage($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        $blog->views++;
        $blog->save();

        //    // Initialize the CommonMark converter
        //    $converter = new CommonMarkConverter();

        //    // Convert Markdown to HTML
        //    $blog->content = $converter->convertToHtml($blog->content);

        return response()->view('blog', [
            'blog' => $blog
        ]);
    }

    public function likeBlog(Request $request)
    {
        $request->validate([
            'slug' => 'required|exists:blogs,slug',
            // 'as' => 'required|string|min:2',
            // 'comment' => 'required|string|min:2|max:255',
            // ], $request->only(['slug', 'as', 'comment']));
        ], $request->only(['slug']));
        //

        $blog = Blog::where('slug', $request->post('slug'))->first();

        $blog->likes++;
        $blog->save();

        // $comment = new BlogComment();
        // $comment->cement_as = $request->as;
        // $comment->comment = $request->comment;
        // $comment->comment = $request->comment;
        // $comment->blog_id = $blog->id;
        // $comment->save();

        return redirect()->route('blogs.pages.view', $blog->slug);
    }


    public function commentOnBlog(Request $request)
    {
        $request->validate([
            'slug' => 'required|exists:blogs,slug',
            'as' => 'required|string|min:2',
            'comment' => 'required|string|min:2|max:255',
        ], $request->only(['slug', 'as', 'comment']));
        //

        $blog = Blog::where('slug', $request->post('slug'))->first();

        $comment = new BlogComment();
        $comment->cement_as = $request->as;
        $comment->comment = $request->comment;
        $comment->blog_id = $blog->id;
        $comment->save();

        return redirect()->route('blogs.pages.view', $blog->slug);
    }
}
