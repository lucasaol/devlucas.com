<!doctype html>
<html lang="en" class="{{session('dark_mode') ? 'dark' : ''}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>

    @vite('resources/css/app.css')
    <livewire:styles />
</head>
<body class="flex min-h-screen sm:flex-col md:flex-row">
    <livewire:layout.sidebar />
    <div class="flex flex-col min-h-screen bg-light-500 dark:bg-dark-700 dark:text-light-900 sm:mt-12 md:mt-0 w-full">
        <main class="flex-1 overflow-y-auto">
            {{ $slot }}
        </main>
        <livewire:layout.footer />
    </div>
    <livewire:scripts />
</body>
</html>
