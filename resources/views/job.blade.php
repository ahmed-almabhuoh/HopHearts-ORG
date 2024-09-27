<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->title }} - Job Details</title>
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

    <!-- Job Header -->
    <header class="bg-white shadow-md border-custom">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <a href="{{ route('welcome') }}">
                <div class="flex items-center">
                    <img src="{{ Storage::url(App\Models\WebsiteSettings::first()->site_logo) }}" alt="Company Logo"
                        class="h-12 w-auto mr-4">
                </div>
            </a>

            <h1 class="text-4xl font-bold text-custom">{{ $job->title }}</h1>
            <div class="mt-2 flex items-center text-sm text-gray-600">
                <span class="mr-4">{{ __('Company') }}: {{ __('Hop Hearts') }}</span>
                <span class="mr-4">{{ $job->created_at->format('M d, Y') }}</span>
                <span>{{ $job->location }}</span>
            </div>
        </div>
    </header>

    <!-- Job Content Section -->
    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-8 shadow-lg rounded-lg border-custom">
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Job Description -->
            <h2 class="text-2xl font-bold mb-4">{{ __('Job Description') }}</h2>
            <div class="prose max-w-none text-custom" style="color: black !important;">
                {!! (new Parsedown())->text($job->description) !!}
            </div>

            <!-- Application Form -->
            <div class="mt-8">
                <h2 class="text-2xl font-bold mb-4">{{ __('Apply for this Job') }}</h2>

                <form action="{{ route('jobs.apply') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="text" name="job_id" value="{{ $job->id }}" style="display: none;">

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-custom font-bold">{{ __('Your Name') }}</label>
                        <input type="text" name="name" id="name"
                            class="w-full p-2 border border-custom rounded-md" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-custom font-bold">{{ __('Your Email') }}</label>
                        <input type="email" name="email" id="email"
                            class="w-full p-2 border border-custom rounded-md" required>
                    </div>

                    <!-- Resume Upload -->
                    <div class="mb-4">
                        <label for="resume" class="block text-custom font-bold">{{ __('Upload Resume') }}</label>
                        <input type="file" name="resume" id="resume"
                            class="w-full p-2 border border-custom rounded-md" required>
                    </div>

                    <!-- Cover Letter -->
                    <div class="mb-4">
                        <label for="cover_letter" class="block text-custom font-bold">{{ __('Cover Letter') }}</label>
                        <textarea name="cover_letter" id="cover_letter" class="w-full p-2 border border-custom rounded-md" rows="6"
                            required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" style="background: #FF6F61;"
                        class="text-white font-bold py-2 px-4 rounded-md hover:bg-opacity-90">
                        {{ __('Submit Application') }}
                    </button>
                </form>
            </div>

        </div>
    </main>

</body>

</html>
