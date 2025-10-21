<div class="p-12 border-b border-b-gray-300 dark:border-b-gray-700 flex lg:flex-row flex-col h-full container">
    <div class="flex flex-col justify-between">
        <div>
            <h1 class="text-6xl mb-1 dark:text-light-500">{{$aboutMe->title}}</h1>
            <p class="text-xl mb-3 dark:text-light-700">{{$aboutMe->caption}}</p>
        </div>

        <div class="[&_a]:text-primary-500 [&_a]:hover:text-primary-300">
            {!! $aboutMe->content !!}
        </div>

        <div class="mt-4 flex">
            <a href="{{ route('index') }}" class="text-white bg-primary-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center me-2">
                <x-heroicon-s-arrow-right-circle class="h-5 w-5 mr-1" />
                {{__('Ver Portfólio')}}
            </a>

            <a href="{{ route('index') }}" class="text-white bg-dark-400 hover:bg-dark-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center me-2">
                <x-heroicon-s-document-text class="h-5 w-5 mr-1" />
                {{__('Ver Currículo')}}
            </a>
        </div>
    </div>

    <img src="{{ route('image', ['path' => $aboutMe->picture]) }}"
         alt="{{ $aboutMe->title }}" class="max-h-64 object-contain mt-4 lg:mt-0"
    />
</div>
