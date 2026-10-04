<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nexora</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950 flex items-center justify-center p-6">

    <div class="w-full max-w-2xl">
        
        <!-- Main Card -->
        <div class="bg-white/10 backdrop-blur-xl border border-white/10 rounded-3xl p-8 md:p-12 shadow-2xl text-center">

            <!-- Icon -->
            <div class="mx-auto mb-6 w-20 h-20 rounded-full bg-yellow-400/20 flex items-center justify-center text-5xl">
                😂
            </div>

            <!-- Status -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-500/10 border border-red-500/20 text-red-400 text-sm font-medium mb-6">
                <span class="w-2 h-2 bg-red-400 rounded-full animate-pulse"></span>
                Feature Temporarily Unavailable
            </div>

            <!-- Heading -->
            <h1 class="text-4xl md:text-5xl font-black text-white mb-5">
                Sorry Guys 😭
            </h1>

            <p class="text-lg text-slate-300 leading-relaxed mb-8">
                This page or function is not completed yet...
            </p>

            <!-- Fake Reason -->
            <div class="bg-black/20 border border-white/10 rounded-2xl p-6 text-left mb-8">
                <h2 class="text-white font-bold text-lg mb-4">
                    Why is this happening? 🤔
                </h2>

                <div class="space-y-3 text-slate-300 text-sm">
                    <div class="flex gap-3">
                        <span>⏰</span>
                        <span>Less development time</span>
                    </div>

                    <div class="flex gap-3">
                        <span>☕</span>
                        <span>Developer needed more coffee</span>
                    </div>

                    <div class="flex gap-3">
                        <span>🐛</span>
                        <span>Too many unexpected bugs</span>
                    </div>

                    <div class="flex gap-3">
                        <span>😂</span>
                        <span>And honestly... we were too busy laughing</span>
                    </div>
                </div>
            </div>

            <!-- Joke -->
            <div class="mb-8">
                <p class="text-2xl font-bold text-yellow-300">
                    😂 HAHAHAHAHA 😂
                </p>

                <p class="text-slate-400 mt-2">
                    You actually thought the feature was broken!
                </p>
            </div>

            <!-- Button -->
            <button
                onclick="prank()"
                class="px-7 py-3 rounded-xl bg-indigo-500 hover:bg-indigo-400 text-white font-semibold transition-all duration-300 hover:scale-105 shadow-lg"
            >
                Try Again 😎
            </button>

            <!-- Footer -->
            <p class="mt-8 text-xs text-slate-500">
                © 2026 • Development Team • Definitely Not A Prank
            </p>

        </div>
    </div>

    <script>
        function prank() {
            alert("😂 GOTCHA! The function was never broken!");
        }
    </script>

</body>
</html>