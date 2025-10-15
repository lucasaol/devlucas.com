<div class="flex items-center gap-2 px-3 py-1 rounded-full transition">
    <x-heroicon-s-sun class="h-6 w-6" />
    <label class="inline-flex items-center cursor-pointer">
        <input
            type="checkbox"
            wire:model.live="dark"
            class="sr-only peer">
        <div class="relative w-14 h-7 bg-primary-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 dark:peer-focus:ring-primary-700 rounded-full peer dark:bg-primary-300 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-primary-700 dark:peer-checked:bg-primary-500"></div>
    </label>

    <x-heroicon-s-moon class="h-6 w-6" />
</div>

@once
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('dark-toggled', ({ dark }) => {
                console.log(dark)
                const html = document.documentElement
                if (dark) html.classList.add('dark')
                else html.classList.remove('dark')
            })
            if (@js(session('dark_mode'))) {
                document.documentElement.classList.add('dark')
            }
        })
    </script>
@endonce
