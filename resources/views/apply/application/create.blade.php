<x-guest-layout>

    <div class="w-11/12 p-5 mx-auto mt-4 bg-secondary lg:w-3/5 rounded-2xl text-off-white">
        <h1 class="text-3xl text-center">{{ $applicationForm->name }}</h1>
        <p class="text-lg text-center">
            {{-- {{ $applicationForm->description }} --}}

        </p>

        <form action="{{ route('apply.application.store', $applicationForm->id) }}" class="mx-auto mt-6 space-y-5 md:w-2/3" method="post">
            @csrf

            @foreach ($questions as $question)
            <div>
                <x-label class="text-action" for="{{ $question->name }}" :value="$question->title" />


                @if($question->type == "textarea")
                <textarea name="{{ $question->name }}" id="{{ $question->name }}" rows="5" class="block w-full px-4 py-3 text-black rounded-lg form-input">{{ old($question->name) }}</textarea>




                @else
                <x-input id="{{ $question->name }}" class="block w-full text-black" type="{{ $question->type }}" name="{{ $question->name }}" :value="old($question->name)" />




                @endif



                @error($question->name)

                <x-input-validation>This field is required.</x-input-validation>
                @enderror
            </div>

            @endforeach

            <div>
                <x-button class="">Create Account</x-button>
            </div>


        </form>
    </div>


</x-guest-layout>
