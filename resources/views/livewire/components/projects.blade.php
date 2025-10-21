<div class="flex flex-col">
    <div>
        <h2 class="text-3xl mb-5 dark:text-light-500 border-l-5 border-l-primary-500 pl-3">Projetos</h2>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-2 justify-between">
        @foreach($projects as $project)
            <a href="{{ route('index') }}" class="max-w-sm p-4 border border-gray-200 rounded-sm shadow-sm md:p-6 dark:border-gray-700">
                <div
                    class="h-48 mb-4 rounded-sm bg-cover bg-center"
                    style="background-image: url('{{ route('image', ['path' => $project->gallery()->first()->image])  }}')"
                ></div>
                <h3 class="mb-4">{{ $project->title }}</h3>
                <div class="mb-4">{{ $project->introduction }}</div>

                <button
                    type="button"
                    class="text-primary-500  border border-primary-500
                    hover:text-white hover:bg-primary-500
                    focus:ring-4 focus:outline-none focus:ring-primary-500
                    font-medium rounded-lg text-xs px-5 py-2.5
                    inline-flex items-center text-center cursor-pointer
                    ">
                    Ver mais
                    <x-heroicon-s-arrow-top-right-on-square class="h-3 w-3 ml-1" />
                </button>
            </a>
        @endforeach
    </div>
</div>
