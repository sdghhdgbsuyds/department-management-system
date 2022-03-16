<x-app-layout>
    <h2 class="text-3xl font-bold text-center">Welcome, {{ auth()->user()->discord_name }}</h2>
    <p class="mt-3 text-lg text-center">Your current unit number is: <span class="text-2xl font-bold">{{ auth()->user()->unit_number }}</span>. If this is
        wrong please see your department staff.</p>
    <p class="mt-3 text-lg text-center">Your current status is:
        @if (auth()->user()->is_on_duty)
        <span class="text-2xl font-bold text-green-700">On Duty</span>
        @else
        <span class="text-2xl font-bold text-red-700">Off Duty</span>
        @endif
        {{-- If this is wrong <a href="#" class="text-blue-600">click here</a>. --}}
    </p>

    <p class="mt-3 text-lg text-center">Last status change at:
        {{ auth()->user()->last_action }}
    </p>

    <div class="mt-16">
        <div class="block text-center">

            @if (auth()->user()->is_on_duty)

            <form action="{{ route('home') }}" method="POST">
                @csrf
                <div class="mx-auto mt-4">
                    <x-label :value="__('Off Duty Report')" />
                    <textarea id="report" name="report" value="{{ old('report') }}" class="block w-3/5 h-48 px-3 py-2 mx-auto mt-3 text-gray-800 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required autofocus></textarea>
                </div>

                <input type="submit" class="inline-block px-8 py-6 m-3 text-lg bg-red-700 md:text-3xl md:px-16 md:py-12 hover:bg-red-800 rounded-xl" value="Go Off Duty">
            </form>

            @else
            <a href="{{ route('home') }}" class="inline-block px-8 py-6 m-3 text-lg bg-green-700 md:text-3xl md:px-16 md:py-12 hover:bg-green-800 rounded-xl">Go

                On
                Duty</a>
            @endif

        </div>
    </div>
</x-app-layout>
