<aside class="bg-primary-500 dark:bg-dark-500 text-light-500 h-screen p-4 transition-all w-64">

    <div class="flex flex-col items-center space-y-4">
        <a href="{{ route('index') }}">{{config('app.name')}}</a>

        <img src="{{ asset('storage/' . $aboutMe->avatar) }}"
             alt="{{ $aboutMe->title  }}" class="mx-auto rounded bg-white bg-"
        />
    </div>

    <div class="
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
        mt-6 space-y-2 p-4
        [&_a]:block [&_a]:p-2 [&_a]:hover:text-primary-700
        "
    >
        <a href="{{ route('index') }}">About me</a>
        <a href="{{ route('index') }}">Portfolio</a>
        <a href="{{ route('index') }}">Resume</a>
        <a href="{{ route('index') }}">Contact</a>
    </nav>
</aside>
