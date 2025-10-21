<div class="flex flex-col  container">
    <div>
        <h2 class="text-3xl mb-5 dark:text-light-500 border-l-5 border-l-primary-500 pl-3">Habilidades Técnicas</h2>
        <div class="section-intro mb-5 [&_a]:text-primary-500 [&_a]:hover:text-primary-300">
            Tenho mais de 10 anos de experiência desenvolvendo software para clientes em todo o Brasil.
            Abaixo está uma visão rápida das minhas principais habilidades técnicas e das tecnologias que utilizo.
            Quer saber mais sobre minha experiência?
            Confira meu <a href="{{ route('index') }}">currículo</a> e <a href="{{ route('index') }}">meus projetos</a>.
        </div>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 justify-between">
        @foreach($technologies as $tech)
            <div class="p-2 mb-3">
                <img src="{{route('image', ['path' => $tech->image])}}" alt="{{ $tech->name }}" class="max-h-[30px]" />
                <h3 class="font-bold mt-2">{{ $tech->name }}</h3>
                <div class="text-sm">{{ $tech->description }}</div>
            </div>
        @endforeach
    </div>
</div>
