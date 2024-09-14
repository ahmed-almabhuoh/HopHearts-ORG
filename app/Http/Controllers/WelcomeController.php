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

        $blog->content = $this->parseMarkdown($blog->content);

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

    protected function parseMarkdown($text)
    {
        // Define replacements for various Markdown elements
        $replacements = [
            '/\*\*(.*?)\*\*/' => '<strong>$1</strong>',  // Bold
            '/\*(.*?)\*/' => '<em>$1</em>',  // Italic
            '/\#\#\# (.*?)\n/' => '<h3>$1</h3>', // Heading 3
            '/\#\# (.*?)\n/' => '<h2>$1</h2>', // Heading 2
            '/\# (.*?)\n/' => '<h1>$1</h1>', // Heading 1
            '/`([^`]*)`/' => '<code>$1</code>', // Inline code
            '/```(.*?)```/s' => '<pre><code>$1</code></pre>', // Block code
            '/\n\*\s(.*?)\n/' => '<ul><li>$1</li></ul>', // Unordered list
            '/\[(.*?)\]\((.*?)\)/' => '<a href="$2">$1</a>', // Links
            '/\n/' => '<br>', // Line breaks (for simple cases)
        ];

        // Apply all replacements
        foreach ($replacements as $pattern => $replacement) {
            $text = preg_replace($pattern, $replacement, $text);
        }

        // Return the parsed Markdown as HTML
        return $text;
    }
}
