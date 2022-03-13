<x-guest-layout>
    <div class="p-24"
        style="background-image: url('{{ asset('images/public/header.jpg') }}');background-repeat: no-repeat;background-position: center;background-size: cover;">
        <div class="md:w-2/3 w-full mx-auto text-center">
            <div class="">
                <h1 class="text-5xl font-bold text-white">Welcome Home</h1>
                <p class="md:text-2xl md:p-3 p-1 text-lg text-gray-100">We believe that a community can save lives. We
                    are a
                    group
                    of
                    people from
                    every walk of life that happen to share a passion for roleplay in a game called GTA. We are San
                    Andreas
                    Shoreline RP.</p>
                <div class="mx-auto mt-5">
                    <button
                        class="px-4 py-2 m-3 mx-auto font-semibold text-center text-black uppercase bg-action rounded-lg hover:bg-blue-400"><a
                            href="{{ route('auth.steam') }}">Apply
                            Now</a></button>
                    <button
                        class="px-4 py-2 m-3 mx-auto font-semibold text-center text-white uppercase bg-secondary rounded-lg hover:bg-blue-800"><a
                            href="#">Join Discord</a></button>
                    <button
                        class="px-4 py-2 m-3 mx-auto font-semibold text-center text-white border-2 border-gray-400 hover:border-white uppercase rounded-lg">
                        <a href="#">Learn More</a>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div class="lg:w-2/3 p-9 lg:flex-row container flex flex-col w-11/12 mx-auto mt-5 text-center">
        <div class="lg:w-1/3 w-full">
            <div class="max-w-xl px-4 py-8 m-auto">
                <div class="shadow-2xl">
                    <div class="mb-2">
                        <img class="rounded" src="{{ asset('images/public/image0.jpg') }}">
                    </div>
                    <div class="bg-primary-normal px-4 py-2 mt-2 rounded-lg">
                        <h2 class="text-2xl font-bold text-white uppercase">Join Today</h2>
                        <p class="sm:text-sm px-2 my-3 mr-1 text-xs text-gray-100">
                            We are always looking for people to join the community. Start the process today by filling
                            out
                            an
                            application.</p>
                        <div class="mt-4 mb-2">
                            <button
                                class="px-4 py-2 m-3 mx-auto font-semibold text-center text-black uppercase bg-action rounded-lg hover:bg-blue-400">
                                <a href="{{ route('auth.steam') }}">
                                    Apply Now
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:w-1/3 w-full">
            <div class="max-w-xl px-4 py-8 m-auto">
                <div class="shadow-2xl">
                    <div class="mb-2">
                        <img class="rounded" src="{{ asset('images/public/image1.jpg') }}">
                    </div>
                    <div class="bg-primary-normal px-4 py-2 mt-2 rounded-lg">
                        <h2 class="text-2xl font-bold text-white uppercase">Community Rules</h2>
                        <p class="sm:text-sm px-2 my-3 mr-1 text-xs text-gray-100">
                            Are you up for the roleplay challenge? We are a fun community that engages in serious
                            roleplay.
                            Read our
                            code of conduct and rules of engagement to see if you are up to the task!</p>
                        <div class="mt-4 mb-2">
                            <button
                                class="px-4 py-2 m-3 mx-auto font-semibold text-center text-black uppercase bg-action rounded-lg hover:bg-blue-400">
                                <a
                                    href="https://docs.google.com/document/d/1HmQ3s6jtiOETDZB8sogQhkTBDISDCElhqSeTHA2vzYk/edit?usp=sharing">
                                    Check out the rules
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:w-1/3 w-full">
            <div class="max-w-xl px-4 py-8 m-auto">
                <div class="shadow-2xl">
                    <div class="mb-2">
                        <img class="rounded" src="{{ asset('images/public/image2.jpg') }}">
                    </div>
                    <div class="bg-primary-normal px-4 py-2 mt-2 rounded-lg">
                        <h2 class="text-2xl font-bold uppercase">Departments</h2>
                        <p class="sm:text-sm px-2 my-3 mr-1 text-xs text-gray-200">
                            We offer public saftey, civilian and communication departments for you to join and roleplay
                            in!
                            for you to
                            join and roleplay in!</p>
                        <div class="mt-4 mb-2">
                            <button
                                class="px-4 py-2 m-3 mx-auto font-semibold text-center text-black uppercase bg-action rounded-lg hover:bg-blue-400">
                                <a href="#">
                                    View Departments
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        class="lg:w-2/3 p-9 lg:flex-row bg-secondary text-off-white container flex flex-col w-11/12 mx-auto mt-5 rounded-lg">
        <div class="md:flex-row flex flex-col text-gray-200">
            <div>
                <h1 class="text-4xl font-bold">Leadership Opportunity</h1>
                <p class="md:text-xl md:p-3 p-1 text-lg">One of our principles is leadership. We strive to foster
                    and create a community of leaders. We have leadership
                    opportunities in every department if you want a bigger role in this community. SASRP leaders have a
                    lot
                    of
                    responsibility, but it come with great rewards. We will do quarterly giveaways, feature your content
                    and
                    recognize you in the community. Apply to be a leader today!</p>
                <button
                    class="px-4 py-2 m-3 mx-auto font-semibold text-center text-black uppercase bg-action rounded-lg hover:bg-blue-400">
                    <a href="#">
                        I'm Interested
                    </a>
                </button>
            </div>
            <img src="{{ asset('images/logo.png') }}" alt="" class="mx-auto">
        </div>

    </div>
</x-guest-layout>
