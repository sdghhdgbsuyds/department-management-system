<button
    {{ $attributes->merge(['type' => 'submit','class' =>'px-4 py-2 m-3 mx-auto font-semibold text-center text-black uppercase bg-action rounded-lg hover:bg-blue-400 transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
