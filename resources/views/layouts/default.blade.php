<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>

    @vite('resources/css/app.css')
    <livewire:styles />
</head>
<body class="flex min-h-screen">
    <livewire:layout.sidebar />
    <div class="flex flex-col flex-1 min-h-screen">
        <main class="flex-1 p-6 overflow-y-auto">
            {{ $slot }}
        </main>
        <livewire:layout.footer />
    </div>
    <livewire:scripts />
</body>
</html>
