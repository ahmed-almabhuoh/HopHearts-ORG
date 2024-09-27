<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Job;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use League\CommonMark\CommonMarkConverter;

class WelcomeController extends Controller
{
    //

    public function getWelcomePage()
    {
        $projects = Project::all();
        $blogs = Blog::all();
        $jobs = Job::where('status', 'open')->get();

        return response()->view('welcome', [
            'projects' => $projects,
            'blogs' => $blogs,
            'jobs' => $jobs,
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
        $replacements = [
            '/\*\*(.*?)\*\*/' => '<strong>$1</strong>',  // Bold
            '/\*(.*?)\*/' => '<em>$1</em>',  // Italic
            '/\#\#\# (.*?)\n/' => '<h3 class="text-2xl font-bold text-custom">$1</h3>', // Heading 3
            '/\#\# (.*?)\n/' => '<h2 class="text-3xl font-bold text-custom">$1</h2>', // Heading 2
            '/\# (.*?)\n/' => '<h1 class="text-4xl font-bold text-custom">$1</h1>', // Heading 1
            '/`([^`]*)`/' => '<code class="bg-gray-100 p-1 rounded">$1</code>', // Inline code
            '/```(.*?)```/s' => '<pre class="bg-gray-900 text-white p-3 rounded-md overflow-auto"><code>$1</code></pre>', // Block code
            '/\n\*\s(.*?)\n/' => '<ul class="list-disc pl-6"><li>$1</li></ul>', // Unordered list
            '/\[(.*?)\]\((.*?)\)/' => '<a href="$2" class="text-blue-500 underline">$1</a>', // Links
            '/\n/' => '<br>', // Line breaks (for simple cases)
        ];

        foreach ($replacements as $pattern => $replacement) {
            $text = preg_replace($pattern, $replacement, $text);
        }

        return $text;
    }

    public function getJobPage(string $slug)
    {
        return view('job', [
            'job' => Job::where([
                ['status', '=', 'open'],
                ['slug', '=', $slug],
            ])->first(),
        ]);
    }

    public function jopApplying(Request $request)
    {
        // Step 1: Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048', // limit file size to 2MB
            'cover_letter' => 'required|string',
            'job_id' => [
                'required',
                'int',
                Rule::exists('jobs_advertisement', 'id')->where(function ($query) {
                    $query->where('status', 'open'); // Ensures job status is 'open'
                })
            ],
        ]);

        // Step 2: Handle the resume upload
        if ($request->hasFile('resume')) {
            // Store the file in the 'resumes' folder within the 'storage/app/public' directory
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        // Step 3: Save the data to the applications table
        $application = new Application();
        $application->name = $validatedData['name'];
        $application->email = $validatedData['email'];
        $application->job_id = $validatedData['job_id'];
        $application->resume = $resumePath; // store the file path
        $application->cover_letter = $validatedData['cover_letter'];
        $application->save();

        // Step 4: Redirect back with a success message
        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    }
}
