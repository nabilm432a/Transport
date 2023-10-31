@vite('resources/css/app.css')
<section style="background-image: url('{{asset("images/Abstract-Dark-Red-Layers-AI-Generated-4K-Wallpaper.jpg")}}')" class="h-screen bg-gray-500 bg-cover">
    <div class="container h-full px-6 py-24">
        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 text-white md:text-5xl lg:text-6xl" style="margin-bottom: 10px"><span class="text-transparent bg-clip-text bg-gradient-to-r to-pink-700 from-red-500">Get Ready</span> To Travel</h1>
        <div
            class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
            <!-- Left column container with background-->
            <div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12">
                <img
                    src="{{asset('images/airplane.jpg')}}"
                    class="w-full rounded-md opacity-100 transition duration-300 ease-in-out hover:opacity-70"
                    alt="Phone image" />
            </div>
            <!-- Right column container with form -->
            <div class="md:w-8/12 lg:ml-6 lg:w-5/12">
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="relative mb-6" data-te-input-wrapper-init>
                        <input
                            type="email"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            style="border: white 2px solid"
                            id="email"
                            name="email"
                            placeholder="Email address" />
                        <label
                            for="email"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.7rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                        >Email address
                        </label>
                    </div>

                    <!-- Submit button -->
                    <button
                        type="submit"
                        class="mb-3 flex w-full items-center justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50"
                        data-te-ripple-init
                        data-te-ripple-color="light">
                        Send Password Reset email
                    </button>
                </form>
                @if(session('status'))
                    <p class="text-white">{{ session('status') }}</p>
                @endif

                <div style="display: flex; justify-content: space-between;">
                    <a href="{{route('login')}}">
                        <button class="group relative h-9 w-32 overflow-hidden rounded-lg bg-white text-lg shadow">
                            <div class="absolute inset-0 w-3 bg-red-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                            <span class="relative text-black group-hover:text-white">Go back</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/scripts.js')}}"></script>
</section>
