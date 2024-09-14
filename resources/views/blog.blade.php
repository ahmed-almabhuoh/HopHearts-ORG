<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }} - Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom color classes */
        .bg-custom-bg {
            background-color: #FFE4B5;
        }

        .border-custom {
            border-color: #FF6F61;
        }

        .text-custom {
            color: #8B4000;
        }

        .hover-text-custom:hover {
            color: #FF6F61;
        }
    </style>
</head>

<body class="bg-custom-bg">

    <!-- Blog Header -->
    <header class="bg-white shadow-md border-custom">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <a href="{{ route('welcome') }}">
                <div class="flex items-center">
                    <img src="{{ Storage::url(App\Models\WebsiteSettings::first()->site_logo) }}" alt="Hop Hearts"
                        class="h-12 w-auto mr-4">
                </div>
            </a>

            <h1 class="text-4xl font-bold text-custom">{{ $blog->title }}</h1>
            <div class="mt-2 flex items-center text-sm text-gray-600">
                <span class="mr-4">{{ __('By') }} {{ $blog->author->name }}</span>
                <span class="mr-4">{{ $blog->created_at->format('M d, Y') }}</span>
                <span>{{ $blog->views }} {{ __('views') }}</span>
            </div>
        </div>
    </header>

    <!-- Blog Content Section -->
    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-8 shadow-lg rounded-lg border-custom">
            <img class="w-full h-auto mb-8 rounded-lg" src="{{ Storage::url($blog->image) }}"
                alt="{{ $blog->title }}">

            <!-- Blog Content -->
            <div class="prose max-w-none text-custom">
                {!! (new Parsedown())->text($blog->content) !!} <!-- Converting markdown to HTML -->
            </div>

            <!-- Blog Stats -->
            <div class="mt-8 flex justify-between items-center">
                <div class="text-sm text-gray-600">
                    <span>{{ $blog->likes }} {{ __('Likes') }}</span> |
                    <span>{{ $blog->comments->count() }} {{ __('Comments') }}</span>
                </div>

                <!-- Like Button -->
                <form action="{{ route('blogs.pages.like') }}" method="POST">
                    @csrf
                    <input type="text" value="{{ $blog->slug }}" style="display: none;" name="slug">
                    <button type="submit" class="flex items-center text-custom hover-text-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M20.9752 12.1852L20.2361 12.0574L20.9752 12.1852ZM20.2696 16.265L19.5306 16.1371L20.2696 16.265ZM6.93777 20.4771L6.19056 20.5417L6.93777 20.4771ZM6.12561 11.0844L6.87282 11.0198L6.12561 11.0844ZM13.995 5.22142L14.7351 5.34269V5.34269L13.995 5.22142ZM13.3323 9.26598L14.0724 9.38725V9.38725L13.3323 9.26598ZM6.69814 9.67749L6.20855 9.10933H6.20855L6.69814 9.67749ZM8.13688 8.43769L8.62647 9.00585H8.62647L8.13688 8.43769ZM10.5181 4.78374L9.79208 4.59542L10.5181 4.78374ZM10.9938 2.94989L11.7197 3.13821V3.13821L10.9938 2.94989ZM12.6676 2.06435L12.4382 2.77841L12.4382 2.77841L12.6676 2.06435ZM12.8126 2.11093L13.042 1.39687L13.042 1.39687L12.8126 2.11093ZM9.86195 6.46262L10.5235 6.81599V6.81599L9.86195 6.46262ZM13.9047 3.24752L13.1787 3.43584V3.43584L13.9047 3.24752ZM11.6742 2.13239L11.3486 1.45675V1.45675L11.6742 2.13239ZM3.9716 21.4707L3.22439 21.5353L3.9716 21.4707ZM3 10.2342L3.74721 10.1696C3.71261 9.76945 3.36893 9.46758 2.96767 9.4849C2.5664 9.50221 2.25 9.83256 2.25 10.2342H3ZM20.2361 12.0574L19.5306 16.1371L21.0087 16.3928L21.7142 12.313L20.2361 12.0574ZM13.245 21.25H8.59635V22.75H13.245V21.25ZM7.68498 20.4125L6.87282 11.0198L5.3784 11.149L6.19056 20.5417L7.68498 20.4125ZM19.5306 16.1371C19.0238 19.0677 16.3813 21.25 13.245 21.25V22.75C17.0712 22.75 20.3708 20.081 21.0087 16.3928L19.5306 16.1371ZM13.2548 5.10015L12.5921 9.14472L14.0724 9.38725L14.7351 5.34269L13.2548 5.10015ZM7.18773 10.2456L8.62647 9.00585L7.64729 7.86954L6.20855 9.10933L7.18773 10.2456ZM11.244 4.97206L11.7197 3.13821L10.2678 2.76157L9.79208 4.59542L11.244 4.97206ZM12.4382 2.77841L12.5832 2.82498L13.042 1.39687L12.897 1.3503L12.4382 2.77841ZM10.5235 6.81599C10.8354 6.23198 11.0777 5.61339 11.244 4.97206L9.79208 4.59542C9.65573 5.12107 9.45699 5.62893 9.20042 6.10924L10.5235 6.81599ZM12.5832 2.82498C12.8896 2.92342 13.1072 3.16009 13.1787 3.43584L14.6307 3.05921C14.4252 2.26719 13.819 1.64648 13.042 1.39687L12.5832 2.82498ZM11.7197 3.13821C11.7548 3.0032 11.8523 2.87913 11.9998 2.80804L11.3486 1.45675C10.8166 1.71309 10.417 2.18627 10.2678 2.76157L11.7197 3.13821ZM11.9998 2.80804C12.1345 2.74311 12.2931 2.73181 12.4382 2.77841L12.897 1.3503C12.3873 1.18655 11.8312 1.2242 11.3486 1.45675L11.9998 2.80804ZM14.1537 10.9842H19.3348V9.4842H14.1537V10.9842ZM4.71881 21.4061L3.74721 10.1696L2.25279 10.2988L3.22439 21.5353L4.71881 21.4061ZM3.75 21.5127V10.2342H2.25V21.5127H3.75ZM3.22439 21.5353C3.2112 21.3828 3.33146 21.25 3.48671 21.25V22.75C4.21268 22.75 4.78122 22.1279 4.71881 21.4061L3.22439 21.5353ZM14.7351 5.34269C14.8596 4.58256 14.8241 3.80477 14.6307 3.0592L13.1787 3.43584C13.3197 3.97923 13.3456 4.54613 13.2548 5.10016L14.7351 5.34269ZM8.59635 21.25C8.12244 21.25 7.72601 20.887 7.68498 20.4125L6.19056 20.5417C6.29852 21.7902 7.3427 22.75 8.59635 22.75V21.25ZM8.62647 9.00585C9.30632 8.42 10.0392 7.72267 10.5235 6.81599L9.20042 6.10924C8.85404 6.75767 8.3025 7.30493 7.64729 7.86954L8.62647 9.00585ZM21.7142 12.313C21.9695 10.8365 20.8341 9.4842 19.3348 9.4842V10.9842C19.9014 10.9842 20.3332 11.4959 20.2361 12.0574L21.7142 12.313ZM3.48671 21.25C3.63292 21.25 3.75 21.3684 3.75 21.5127H2.25C2.25 22.1953 2.80289 22.75 3.48671 22.75V21.25ZM12.5921 9.14471C12.4344 10.1076 13.1766 10.9842 14.1537 10.9842V9.4842C14.1038 9.4842 14.0639 9.43901 14.0724 9.38725L12.5921 9.14471ZM6.87282 11.0198C6.8474 10.7258 6.96475 10.4378 7.18773 10.2456L6.20855 9.10933C5.62022 9.61631 5.31149 10.3753 5.3784 11.149L6.87282 11.0198Z"
                                fill="#1C274C" />
                        </svg>
                        {{ __('Like') }}
                    </button>
                </form>
            </div>
        </div>
    </main>

    <!-- Comments Section -->
    <section class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-custom mb-6">{{ __('Comments') }} ({{ $blog->comments->count() }})</h2>

        <!-- Comment Form -->
        <div class="mb-6">
            <form action="{{ route('blogs.pages.comment') }}" method="POST"
                class="bg-white p-6 shadow-lg rounded-lg border-custom">
                @csrf

                <input type="text" value="{{ $blog->slug }}" style="display: none;" name="slug">

                <!-- Comment As Input Field -->
                <div class="mb-4">
                    <label for="as"
                        class="block text-sm font-medium text-gray-700">{{ __('Comment As:') }}</label>
                    <input type="text" name="as" id="as"
                        class="w-full p-4 border border-custom rounded-lg focus:outline-none focus:border-custom"
                        placeholder="Enter your name or leave blank for anonymous" />
                </div>

                <!-- Comment Textarea -->
                <label for="comment">{{ __('Comment') }}</label>
                <textarea name="comment" rows="3"
                    class="w-full p-4 border border-custom rounded-lg focus:outline-none focus:border-custom"
                    placeholder="Add a comment..."></textarea>

                <!-- Submit Button -->
                <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-lg">
                    {{ __('Post Comment') }} </button>
            </form>
        </div>

        <!-- Display Comments -->
        <div class="space-y-6">
            @foreach ($blog->comments as $comment)
                <div class="bg-white p-6 shadow-lg rounded-lg border-custom">
                    <div class="flex items-center mb-4">
                        <img class="h-10 w-10 rounded-full"
                            src="https://randomuser.me/api/portraits/men/{{ rand(1, 99) }}.jpg"
                            alt="{{ $comment->cement_as }}">
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold">{{ $comment->cement_as }}</h4>
                            <span class="text-sm text-gray-600">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <p class="text-gray-700">{{ $comment->comment }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white shadow-md py-4 border-custom">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-600">
            © {{ date('Y') }} {{ __('Hop Hearts. All rights reserved.') }}
        </div>
    </footer>

</body>

</html>
