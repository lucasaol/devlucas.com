<!doctype html>
<html lang="en" class="{{session('dark_mode') ? 'dark' : ''}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>

    @vite('resources/css/app.css')
    <livewire:styles />
</head>
<body class="min-h-screen">
    <div class="flex sm:flex-col md:flex-row max-h-screen">
        <livewire:layout.sidebar />

        <div class="
        flex flex-col min-h-screen
        bg-light-500 dark:bg-dark-700 dark:text-light-900
        sm:mt-12 md:mt-0 w-full  overflow-y-scroll"
        >
            <main class="flex-1">{{ $slot }}</main>
            <livewire:layout.footer />
        </div>
    </div>
    <livewire:scripts />
</body>
</html>
