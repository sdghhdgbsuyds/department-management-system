<x-app-layout>
    <div class="container w-full p-3 mx-auto lg:w-3/5">

        <a href="{{ route('portal.timeclock.index') }}">
            <x-button>Back</x-button>
        </a>

        <div class="mt-5">
            <p class="text-xl font-thin uppercase">Patrol #: {{ $patrol->id }}</p>
        </div>

        <div class="uppercase border-2 border-white">
            <div class="w-full md:flex">

                <div class="flex justify-between p-2 border border-white md:w-1/2">
                    <p class="font-bold">Patrol Start Time</p>
                    <p class="text-2xl handwriting">{{ $patrol->start_time->format('m-d-Y H:i:s') }}</p>
                </div>
                <div class="flex justify-between p-2 border border-white md:w-1/2">
                    <p class="font-bold">Patrol Start Time</p>
                    <p class="text-2xl handwriting">{{ $patrol->start_time->format('m-d-Y H:i:s') }}</p>
                </div>
            </div>

            <div class="md:flex">

                <div class="flex justify-between p-2 border border-white md:w-1/2">
                    <p class="font-bold">Officer Badge Number</p>
                    <p class="text-2xl handwriting">{{ auth()->user()->badge_number }}</p>
                </div>
                <div class="flex justify-between p-2 border border-white md:w-1/2">
                    <p class="font-bold">Officer Name</p>
                    <p class="text-2xl handwriting">{{ $patrol->user()->display_name }}</p>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <p class="text-xl font-thin uppercase">End of Patrol Report</p>
        </div>

        @if (is_null($patrol->report))
        <a href="{{ route('portal.reports.patrol.create') }}">
            <x-button>Fill out end of patrol Report</x-button>
        </a>
        @else
        <div class="uppercase border-2 border-white">
            <div class="w-full md:flex">

                <div class="flex justify-between p-2 border border-white md:w-1/2">
                    <p class="font-bold">Patrol Start Time</p>
                    <p class="text-2xl handwriting">{{ $patrol->start_time->format('m-d-Y H:i:s') }}</p>
                </div>
                <div class="flex justify-between p-2 border border-white md:w-1/2">
                    <p class="font-bold">Patrol Start Time</p>
                    <p class="text-2xl handwriting">{{ $patrol->start_time->format('m-d-Y H:i:s') }}</p>
                </div>
            </div>

            <div class="md:flex">

                <div class="flex justify-between p-2 border border-white md:w-1/2">
                    <p class="font-bold">Officer Badge Number</p>
                    <p class="text-2xl handwriting">{{ auth()->user()->badge_number }}</p>
                </div>
                <div class="flex justify-between p-2 border border-white md:w-1/2">
                    <p class="font-bold">Officer Name</p>
                    <p class="text-2xl handwriting">{{ $patrol->user()->display_name }}</p>
                </div>
            </div>
        </div>

        @endif




</x-app-layout>
