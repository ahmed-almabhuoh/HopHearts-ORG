<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Daily Report Submission') }}</title>
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

    <!-- Report Header -->
    <header class="bg-white shadow-md border-custom">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <a href="{{ route('welcome') }}">
                <div class="flex items-center">
                    <img src="{{ Storage::url(App\Models\WebsiteSettings::first()->site_logo) }}" alt="Company Logo"
                        class="h-12 w-auto mr-4">
                </div>
            </a>

            <h1 class="text-4xl font-bold text-custom">{{ __('Daily Report Submission') }}</h1>
        </div>
    </header>

    <!-- Report Content Section -->
    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-8 shadow-lg rounded-lg border-custom">
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Submission Form -->
            <div class="mt-8">
                <h2 class="text-2xl font-bold mb-4">{{ __('Submit Your Daily Report') }}</h2>

                <form action="{{ route('reports.submit') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-custom font-bold">{{ __('Email') }}</label>
                        <input type="email" name="email" id="email"
                            class="w-full p-2 border border-custom rounded-md" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-custom font-bold">{{ __('Password') }}</label>
                        <input type="password" name="password" id="password"
                            class="w-full p-2 border border-custom rounded-md" required>
                    </div>

                    <!-- Report Content -->
                    <div class="mb-4">
                        <label for="report_content"
                            class="block text-custom font-bold">{{ __('Report Content') }}</label>
                        <textarea name="report_content" id="report_content" class="w-full p-2 border border-custom rounded-md" rows="6"
                            required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" style="background: #FF6F61;"
                        class="text-white font-bold py-2 px-4 rounded-md hover:bg-opacity-90">
                        {{ __('Submit Report') }}
                    </button>
                </form>
            </div>

        </div>
    </main>

</body>

</html>
