@vite('resources/css/app.css')
<title>Register</title>
<body class="bg-cover" style="background-image: url('{{asset("images/Abstract-Dark-Red-Layers-AI-Generated-4K-Wallpaper.jpg")}}')">
<section class="h-screen">
    <div class="container h-full px-6 py-24">
        <h1 class="mb-4 text-3xl font-extrabold md:text-5xl lg:text-6xl" style="margin-bottom: 10px"><span class="text-transparent bg-clip-text bg-gradient-to-r to-pink-700 from-red-500">Get Ready</span> To Travel</h1>
        <div
            class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">

            <div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12">
                <img
                    src="{{asset('images/airplane.jpg')}}"
                    class="w-full rounded-md opacity-100 transition duration-300 ease-in-out hover:opacity-70"
                    alt="Phone image" />
            </div>

            <div class="md:w-8/12 lg:ml-6 lg:w-5/12">

                <form action="{{route('register')}}" method="POST" >
                    @csrf
                    <div class="relative mb-6" data-te-input-wrapper-init>
                        <input type="text" class="text-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" style="border: white 2px solid" id="name" name="name"
                            placeholder="Name" required/>
                        <label for="name"
                            class="text-white pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-white transition-all duration-200 ease-out peer-focus:-translate-y-[1.7rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                        >Name
                        </label>
                    </div>

                    <div class="relative mb-6" data-te-input-wrapper-init>
                        <input type="text" class="text-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" style="border: white 2px solid" id="email" name="email"
                            placeholder="Email address" required/>
                        <label for="email"
                            class="text-white pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.7rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                        >Email address
                        </label>
                    </div>

                    <div class="relative mb-6" data-te-input-wrapper-init>
                        <input type="text" pattern=".{11}" class="text-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" style="border: white 2px solid" id="contact" name="contact"
                               placeholder="00000000000" required/>
                        <label for="contact"
                               class="text-white pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.7rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                        >Contact
                        </label>
                    </div>

                    <div class="relative mb-6" data-te-input-wrapper-init>
                        <input type="text" class="text-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" style="border: white 2px solid" id="nid" name="nid"
                               required/>
                        <label for="nid"
                               class="text-white pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.7rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                        >National ID
                        </label>
                    </div>

                    <div class="relative mb-6" data-te-input-wrapper-init>
                        <input type="password" style="border: white 2px solid" class="text-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="password" name="password"
                               placeholder="Password" required/>
                        <label for="password"
                            class="text-white pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.7rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                        >Password
                        </label>
                    </div>

                    <div class="relative mb-6" data-te-input-wrapper-init>
                        <input type="password" style="border: white 2px solid" class="text-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="password_confirmation" name="password_confirmation"
                            placeholder="Password" required/>
                        <label for="password_confirmation"
                            class="text-white pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.7rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none"
                        >Confirm Password
                        </label>
                    </div>

                    <button
                        type="submit"
                        class="mb-3 flex w-full items-center justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50"
                        data-te-ripple-init
                        data-te-ripple-color="light">
                        Register
                    </button>

                    <div
                        class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                        <p
                            class="mx-4 mb-0 text-center font-semibold dark:text-neutral-200">
                            OR
                        </p>
                    </div>

                    <a
                        class="mb-3 flex w-full items-center justify-center rounded bg-red-400 bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white opacity-100 transition duration-300 ease-in-out hover:opacity-50"
                        href="{{route('google-login')}}"
                        role="button"
                        data-te-ripple-init
                        data-te-ripple-color="light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16"> <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/> </svg>
                        &nbsp;&nbsp;Sign up with google
                    </a>
                </form>
                <div style="display: flex; justify-content: space-between; margin-bottom: 20px">
                    <a href="{{route('homepage')}}">
                        <button class="group relative h-12 w-32 overflow-hidden rounded-lg bg-white text-lg shadow">
                            <div class="absolute inset-0 w-3 bg-red-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                            <span class="relative text-black group-hover:text-white">Home</span>
                        </button>
                    </a>
                    <a class="justify-end" href="{{route('login')}}">
                        <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow">
                            <div class="absolute inset-0 w-3 bg-red-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                            <span class="relative text-black group-hover:text-white">Already Registered?</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/scripts.js')}}"></script>
</section>
</body>
