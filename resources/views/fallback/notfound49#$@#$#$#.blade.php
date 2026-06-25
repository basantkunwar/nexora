<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>nexora</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="text-center px-6">

        <!-- Error Code -->
        <h1 class="text-7xl font-bold text-indigo-600">404</h1>

        <!-- Message -->
        <h2 class="text-2xl font-semibold mt-4 text-gray-800">
            Oops! Page not found
        </h2>

        <p class="text-gray-500 mt-2">
            The page you are looking for doesn’t exist or has been moved.
        </p>

        <!-- Buttons -->
        <div class="mt-6 flex justify-center gap-4">

            <!-- Go Back -->
            <button onclick="history.back()"
                class="px-5 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg transition">
                Go Back
            </button>

            <!-- Home Redirect -->
            <a href="{{ redirect()->intended()->getTargetUrl() }}"
                class="px-5 py-2 bg-indigo-600 text-white hover:bg-indigo-700 rounded-lg transition">
                Back to Home
            </a>

        </div>

        <!-- Optional Illustration -->
        <div class="mt-10">
            <p class="text-sm text-gray-400">
                Sorry, we couldn’t find that page.
            </p>
        </div>

    </div>

</body>
</html>