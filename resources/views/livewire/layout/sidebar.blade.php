<aside
    @click.away="open=false"
    class="flex flex-col w-full md:w-64 flex-shrink-0
     text-light-900 h-screen transition-all overflow-auto"
    x-data="{ open: false }"
>
    <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between bg-primary-500 dark:bg-dark-500">

        <a href="{{ route('index') }}" class="md:m-auto">
            <span>&lt;</span>
            {{ config('app.name') }}
            <span>/&gt;</span>
        </a>

        <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>


    <div :class="{'block': open, 'hidden': !open}" class="bg-primary-500 dark:bg-dark-500 text-light-900 flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto ">

        <div class="flex flex-col items-center space-y-4">

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
    </div>
</aside>
