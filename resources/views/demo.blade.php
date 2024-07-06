<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

        <title>Demo</title>

        @include('_head')

        <!--[if lt IE 9]>
        <script src="/js/html5shiv.js"></script>
        <script src="/js/selectivizr.js"></script>
        <![endif]-->
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <main class="mt-6">
                        <div id="player"></div>
                    </main>
                </div>
            </div>
        </div>

        <script src="/js/lib.js"></script>
        <script src="/js/common.js"></script>
        <script src="/js/index.js"></script>
    </body>
</html>
