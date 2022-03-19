<x-app-layout>

    <div class="w-11/12 p-5 mx-auto mt-4 bg-secondary lg:min-w-max rounded-2xl text-off-white uppercase">
        <h1 class="text-3xl text-center">End Of Shift Report</h1>
        <p class="text-lg text-center">
            This report is required after every patrol.
        </p>

        <p class="text-lg text-center">Patrol # {{ $patrol->id }}</p>

        <form action="{{ route('portal.reports.endpatrol.store', $patrol->id) }}" class="mx-auto mt-6 space-y-5 md:w-2/3" method="post">

            @csrf

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
                    <p class="text-2xl border-b handwriting">{{ $patrol->created_at->format('m-d-Y') }}</p>

                </div>

                <div class="w-full p-1 lg:w-1/4">
                    <x-label class="text-white" for="number_arrests" :value="__('Time')" />
                    <p class="text-2xl border-b handwriting">{{ date('H:m:i') }}</p>
                </div>
            </div>


            <div class="text-2xl font-semibold border-b-2">Runs Summary</div>
            <div class="text-center lg:flex lg:justify-around">
                <div class="w-full p-1 lg:w-1/4">
                    <x-label class="text-white" for="town_runs" :value="__('Runs in Town')" />
                    <input name="town_runs" type="number" class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting" value="{{ old('town_runs') }}">
                    @error('town_runs')
                    <x-input-validation>This field is required.</x-input-validation>
                    @enderror
                </div>

                <div class="w-full p-1 lg:w-1/4">
                    <x-label class="text-white" for="out_town_runs" :value="__('Runs out of Town')" />
                    <input name="out_town_runs" type="number" class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting" value="{{ old('out_town_runs') }}">
                    @error('out_town_runs')
                    <x-input-validation>This field is required.</x-input-validation>
                    @enderror
                </div>

                <div class="w-full p-1 lg:w-1/4">
                    <x-label class="text-white" for="assists" :value="__('Assists')" />
                    <input name="assists" type="number" class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting" value="{{ old('assists') }}">
                    @error('assists')
                    <x-input-validation>This field is required.</x-input-validation>
                    @enderror
                </div>

                <div class="w-full p-1 lg:w-1/4">
                    <x-label class="text-white" for="vehicles_towed" :value="__('Vehicles Towed')" />
                    <input name="vehicles_towed" type="number" class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting" value="{{ old('vehicles_towed') }}">
                    @error('vehicles_towed')
                    <x-input-validation>This field is required.</x-input-validation>
                    @enderror
                </div>
            </div>

            <div class="text-2xl font-semibold border-b-2">Arrests Summary</div>
            <div class="text-center lg:flex lg:justify-around">
                <div class="w-full p-1 lg:w-1/4">
                    <x-label class="text-white" for="misdemeanor" :value="__('Misdemeanor')" />
                    <input name="misdemeanor" type="number" class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting" value="{{ old('misdemeanor') }}">
                    @error('misdemeanor')
                    <x-input-validation>This field is required.</x-input-validation>
                    @enderror
                </div>

                <div class="w-full p-1 lg:w-1/4">
                    <x-label class="text-white" for="felony" :value="__('Felony')" />
                    <input name="felony" type="number" class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting" value="{{ old('felony') }}">
                    @error('felony')
                    <x-input-validation>This field is required.</x-input-validation>
                    @enderror
                </div>

                <div class="w-full p-1 lg:w-1/4">
                    <x-label class="text-white" for="warrant" :value="__('Warrant')" />
                    <input name="warrant" type="number" class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting" value="{{ old('warrant') }}">
                    @error('warrant')
                    <x-input-validation>This field is required.</x-input-validation>
                    @enderror
                </div>

                <div class="w-full p-1 lg:w-1/4">
                    <x-label class="text-white" for="DUI" :value="__('DUI')" />
                    <input name="DUI" type="number" class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting" value="{{ old('DUI') }}">
                    @error('DUI')
                    <x-input-validation>This field is required.</x-input-validation>
                    @enderror
                </div>
            </div>

            <div class="text-2xl font-semibold border-b-2">Reports Summary</div>
            <div class="text-center lg:flex lg:justify-around">
                <div class="w-full p-1 lg:w-1/4">
                    <x-label class="text-white" for="cases" :value="__('Cases')" />
                    <input name="cases" type="number" class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting" value="{{ old('cases') }}">
                    @error('cases')
                    <x-input-validation>This field is required.</x-input-validation>
                    @enderror
                </div>

                <div class="w-full p-1 lg:w-1/4">
                    <x-label class="text-white" for="crash" :value="__('Crash')" />
                    <input name="crash" type="number" class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting" value="{{ old('crash') }}">
                    @error('crash')
                    <x-input-validation>This field is required.</x-input-validation>
                    @enderror
                </div>

                <div class="w-full p-1 lg:w-1/4">
                    <x-label class="text-white" for="deadly_force_used" :value="__('Deadly Force Used')" />
                    <select name="deadly_force_used" class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>

                <div class="w-full p-1 lg:w-1/4">
                    <x-label class="text-white" for="taser_used" :value="__('Taser Used')" />
                    <select name="taser_used" class="w-full p-0 text-3xl text-center bg-transparent border-0 border-b border-white handwriting">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>

            <p>If yes to deadly force used or taser used require you to fill out the report and include the report number in the box below.</p>
            <textarea name="other_report_numbers" id="other_report_numbers" class="block w-full text-3xl text-black rounded-lg handwriting form-input">{{ old('other_report_numbers') }}</textarea>


            <div class="text-2xl font-semibold border-b-2">Call Summary</div>
            <textarea name="call_summary" id="call_summary" class="block w-full text-3xl text-black rounded-lg handwriting form-input">{{ old('call_summary') }}</textarea>
            @error('call_summary')
            <x-input-validation>This field is required.</x-input-validation>
            @enderror

            <div>
                <x-button class="">Submit Report</x-button>
            </div>

        </form>
    </div>

</x-app-layout>
