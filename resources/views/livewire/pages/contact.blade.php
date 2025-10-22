<div>
    <section class="bg-gray-50 dark:bg-dark-700 p-12 flex flex-col text-center w-full items-center  container">
        <div class="max-w-4xl">
            <h2 class="text-3xl mb-5 font-bold dark:text-light-500">{{__('Contato')}}</h2>
            <p class="text-sm mb-8">
                Estou sempre em busca de compartilhar conhecimento,
                colaborar com equipes diversas e aprender novas tecnologias que possam agregar valor aos projetos.
                Vamos nos conectar!
            </p>
        </div>
    </section>

    <section class="p-12 max-w-4xl m-auto">
        <h2 class="font-bold text-xl mb-4">{{__('Envie sua mensagem')}}</h2>
        <div class="grid [&_div.fi-sc]:gap-4">
            <form wire:submit="submit">
                {{ $this->form }}

                <div class="flex mt-4">
                    <button type="submit"
                            class="text-white bg-primary-500 hover:bg-primary-700
                    focus:ring-4 focus:outline-none focus:ring-blue-300
                    font-medium rounded-lg px-5 py-2.5 text-center text-sm">
                        {{__('Enviar')}}</button>

                    @if (session()->has('error'))
                        <div class="p-2 text-sm grow ml-4 rounded-lg border
                        text-red-800 border-red-300 bg-red-50
                        dark:bg-dark-500 dark:text-red-400 dark:border-red-800"
                             role="alert"
                        >
                            <div class="font-medium">{{ session('error') }}</div>
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="p-2 text-sm grow ml-4 rounded-lg border
                            text-green-800  border-green-300 bg-green-50
                            dark:bg-dark-500 dark:text-green-400  dark:border-green-800"
                             role="alert"
                        >
                            <div class="font-medium">{{ session('message') }}</div>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </section>

    <x-filament-actions::modals />
</div>
