<aside class="
bg-primary-500 dark:bg-dark-500 text-light-900
 h-screen p-4 transition-all w-64 overflow-auto
 ">
    <div class="flex flex-col items-center space-y-4">
        <div class="inline-flex items-center space-x-1">
            <a href="{{ route('index') }}">
                <span>&lt;</span>
                {{ config('app.name') }}
                <span>/&gt;</span>
            </a>
        </div>

        <div class="p-4 flex flex-col items-center">
            <livewire:layout.dark-mode-toggle />
        </div>

        <img src="{{ route('image', ['path' => $aboutMe->avatar]) }}"
             alt="{{ $aboutMe->title }}" class="rounded-full border border-gray-500 h-32"
        />
        @if($aboutMe->introduction)
            <p class="text-xs text-center whitespace-pre-line">{{ $aboutMe->introduction }}</p>
        @endif
    </div>

    <div class="
        border-t border-t-gray-500 dark:border-t-gray-700 p-4
        mt-6 flex gap-2 justify-center
        [&_a]:bg-light-500 [&_a]:text-primary-500
        [&_a]:dark:bg-primary-500 [&_a]:dark:text-light-500
        [&_a]:hover:opacity-70"
        >
        @foreach($socialMedia as $social)
            <a href="{{ $social->url }}"
               target="_blank"
               title="{{ $social->name }}"
               class="p-2 rounded-full"
            >{{ svg($social->icon, 'w-4 h-4') }}</a>
        @endforeach
    </div>

    <nav class="
        border-t border-t-gray-500 dark:border-t-gray-700
        space-y-2 p-4
        [&_a]:block [&_a]:p-2 [&_a]:hover:text-primary-700"
    >
        <a href="{{ route('index') }}">
            <div class="inline-flex items-center">
                <x-heroicon-s-user class="h-4 w-4 mr-2" /> {{__('About me')}}
            </div>
        </a>
        <a href="{{ route('index') }}">
            <div class="inline-flex items-center space-x-1">
                <x-heroicon-s-computer-desktop class="h-4 w-4 mr-2" />  {{__('Portfolio')}}
            </div>
        </a>
        <a href="{{ route('index') }}">
            <div class="inline-flex items-center space-x-1">
                <x-heroicon-s-document class="h-4 w-4 mr-2" />  {{__('Resume')}}
            </div>
        </a>
        <a href="{{ route('index') }}">
            <div class="inline-flex items-center space-x-1">
                <x-heroicon-s-chat-bubble-left-right class="h-4 w-4 mr-2" />  {{__('Contact')}}
            </div>
        </a>
    </nav>
</aside>


