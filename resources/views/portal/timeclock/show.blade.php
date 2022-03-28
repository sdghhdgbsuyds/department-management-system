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
            <p class="text-xl font-thin uppercase border-b-2">End of Patrol Report</p>
        </div>

        @if (is_null($patrol->report_id))
        <a href="{{ route('portal.reports.endpatrol.create', $patrol->id) }}">
            <x-button>Fill out end of patrol Report</x-button>
        </a>
        @else
        <div class="text-center lg:flex lg:justify-around">
            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="number_arrests" :value="__('Officer Name')" />
                <p class="text-2xl border-b handwriting">{{ auth()->user()->display_name }}</p>
            </div>

            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="number_arrests" :value="__('Officer Unit Number')" />
                <p class="text-2xl border-b handwriting">{{ auth()->user()->badge_number }}</p>
            </div>

            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="number_arrests" :value="__('Date')" />
                <p class="text-2xl border-b handwriting">{{ $epr->created_at->format('m-d-Y') }}</p>

            </div>

            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="number_arrests" :value="__('Time')" />
                <p class="text-2xl border-b handwriting">{{ $epr->created_at->format('H:m:i') }}</p>

            </div>
        </div>


        <div class="text-2xl font-semibold border-b-2 mt-5">Runs Summary</div>

        <div class="text-center lg:flex lg:justify-around">
            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="town_runs" :value="__('Runs in Town')" />
                <p class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting">{{ $epr->town_runs }}</p>
            </div>

            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="out_town_runs" :value="__('Runs out of Town')" />
                <p class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting">{{ $epr->out_town_runs }}</p>
            </div>

            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="assists" :value="__('Assists')" />
                <p class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting">{{ $epr->assists }}</p>
            </div>

            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="vehicles_towed" :value="__('Vehicles Towed')" />
                <p class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting">{{ $epr->vehicles_towed }}</p>
            </div>
        </div>

        <div class="text-2xl font-semibold border-b-2 mt-5">Arrests Summary</div>

        <div class="text-center lg:flex lg:justify-around">
            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="misdemeanor" :value="__('Misdemeanor')" />
                <p class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting">{{ $epr->misdemeanor }}</p>
            </div>

            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="felony" :value="__('Felony')" />
                <p class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting">{{ $epr->felony }}</p>
            </div>

            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="warrant" :value="__('Warrant')" />
                <p class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting">{{ $epr->warrant }}</p>
            </div>

            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="DUI" :value="__('DUI')" />
                <p class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting">{{ $epr->DUI }}</p>
            </div>
        </div>

        <div class="text-2xl font-semibold border-b-2 mt-5">Reports Summary</div>
        <div class="text-center lg:flex lg:justify-around">
            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="cases" :value="__('Cases')" />
                <p class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting">{{ $epr->cases }}</p>
            </div>

            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="crash" :value="__('Crash')" />
                <p class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting">{{ $epr->crash }}</p>
            </div>

            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="deadly_force_used" :value="__('Deadly Force Used')" />
                <p class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting">@if($epr->deadly_force_used) Yes @else No @endif</p>
            </div>

            <div class="w-full p-1 lg:w-1/4">
                <x-label class="text-white" for="taser_used" :value="__('Taser Used')" />
                <p class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting">@if($epr->taser_used) Yes @else No @endif</p>
            </div>
        </div>

        <p>If yes to deadly force used or taser used require you to fill out the report and include the report number in the box below.</p>
        <p class="block w-full text-3xl text-white rounded-lg handwriting h-10">@php if($epr->other_report_numbers){echo $erp->other_report_numbers;}else{echo "No other reports.";} @endphp</p>


        <div class="text-2xl font-semibold border-b-2 mt-5">Call Summary</div>

        <p class="block w-full text-3xl text-white rounded-lg handwriting h-10">{{ $epr->call_summary }}</p>


        @endif




</x-app-layout>
