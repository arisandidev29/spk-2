<x-layout>
    <div class="grid grid-cols-[.7fr_.3fr]">
        <div
            style="background-image: url(/asset/pattern.svg)"
            class="h-screen w-full bg-repeat-x p-8 pl-8"
        >
            <img src="/asset/logo.png" alt="logo" class="w-40" />

            <h1 class="mt-16 text-[10rem] font-thin text-white">Hai,</h1>
            <h2 class="text-[6rem] font-bold text-white">Selamat Datang</h2>

            <p class="mt-14 w-[600px] leading-9 text-slate-200">
                Kami Akan membantu kamu dalam memilih promram studi paling cocok
                untuk kamu sesuai dengan minat dan bakat serta kemampuan kamu
                tunggu apa lagi
                <a class="bg-yellow-300 text-black">Daftar Sekarang</a>
            </p>
        </div>
        <div class="p-4">
            <h1 class="text-primary mt-[15vh] text-center text-3xl">
                Login Your Account
            </h1>

            <form
                action="{{ route("doLogin") }}"
                method="post"
                class="mt-20 flex flex-col gap-10 px-8"
            >
                @if (session()->has("error"))
                    <div role="alert" class="alert alert-error bg-red-400">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 shrink-0 stroke-current"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                        <span>{{ session()->get("error") }}</span>
                    </div>
                @endif

                @if (session()->has("message"))
                    <div role="alert" class="alert alert-success bg-green-400">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 shrink-0 stroke-current"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                        <span>{{ session()->get("message") }}</span>
                    </div>
                @endif

                @csrf
                <label for="username">
                    <input
                        type="text"
                        name="username"
                        placeholder="Username"
                        value="{{ old("username") }}"
                        class="border-b-primary text-primary placeholder:text-primary my-2 w-full border-b-4 p-4 text-xl outline-0 placeholder:text-xl active:bg-none"
                    />
                    @error("username")
                        <p class="my-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </label>

                <labell x-data="{showPassword : false}"  for="password" class="relative">
                    <input
                        :type="showPassword ? 'text' : 'password'" 
                        name="password"
                        placeholder="Password"
                        value="{{ old("password") }}"
                        class="border-b-primary text-primary placeholder:text-primary my-2 w-full border-b-4 bg-none p-4 text-xl outline-0 placeholder:text-xl active:bg-none"
                    />

                    {{-- eye --}}
                    <button class="absolute top-6 right-0">
                        {{-- eye open --}}
                        <svg
                            @click.prevent="showPassword = true"
                            x-show="!showPassword"
                            class="w-8"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                stroke="#1C274C"
                                stroke-width="1.5"
                            />
                            <path
                                d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                stroke="#1C274C"
                                stroke-width="1.5"
                            />
                        </svg>
                        {{-- eye close --}}
                        <svg
                            @click.prevent="showPassword = false"
                            x-show="showPassword"
                            class="w-8"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M1.60603 6.08062C2.11366 5.86307 2.70154 6.09822 2.9191 6.60585L1.99995 6.99977C2.9191 6.60585 2.91924 6.60618 2.9191 6.60585L2.91858 6.60465C2.9183 6.604 2.91851 6.60447 2.91858 6.60465L2.9225 6.61351C2.92651 6.62253 2.93339 6.63785 2.94319 6.65905C2.96278 6.70147 2.99397 6.76735 3.03696 6.85334C3.12302 7.02546 3.25594 7.27722 3.43737 7.58203C3.80137 8.19355 4.35439 9.00801 5.10775 9.81932C5.28532 10.0105 5.47324 10.2009 5.67173 10.3878C5.68003 10.3954 5.68823 10.4031 5.69633 10.4109C7.18102 11.8012 9.25227 12.9998 12 12.9998C13.2089 12.9998 14.2783 12.769 15.2209 12.398C16.4469 11.9154 17.4745 11.1889 18.3156 10.3995C19.2652 9.50815 19.9627 8.54981 20.4232 7.81076C20.6526 7.44268 20.8207 7.13295 20.9299 6.91886C20.9844 6.81192 21.0241 6.72919 21.0491 6.67538C21.0617 6.64848 21.0706 6.62884 21.0758 6.61704L21.0808 6.60585C21.2985 6.0985 21.8864 5.86312 22.3939 6.08062C22.9015 6.29818 23.1367 6.88606 22.9191 7.39369L22 6.99977C22.9191 7.39369 22.9192 7.39346 22.9191 7.39369L22.9169 7.39871L22.9134 7.40693L22.9019 7.43278C22.8924 7.4541 22.879 7.48354 22.8618 7.52048C22.8274 7.59434 22.7774 7.69831 22.7115 7.8275C22.5799 8.08566 22.384 8.44584 22.1206 8.86844C21.718 9.5146 21.152 10.316 20.4096 11.1241L21.2071 11.9215C21.5976 12.312 21.5976 12.9452 21.2071 13.3357C20.8165 13.7262 20.1834 13.7262 19.7928 13.3357L18.9527 12.4955C18.3884 12.9513 17.757 13.3811 17.0558 13.752L17.8381 14.9544C18.1393 15.4173 18.0083 16.0367 17.5453 16.338C17.0824 16.6392 16.463 16.5081 16.1618 16.0452L15.1763 14.5306C14.4973 14.7388 13.772 14.8863 13 14.9554V16.4998C13 17.0521 12.5522 17.4998 12 17.4998C11.4477 17.4998 11 17.0521 11 16.4998V14.9556C10.2253 14.8864 9.50014 14.7386 8.82334 14.531L7.83814 16.0452C7.53693 16.5081 6.91748 16.6392 6.45457 16.338C5.99165 16.0367 5.86056 15.4173 6.16177 14.9544L6.94417 13.7519C6.24405 13.3814 5.61245 12.9515 5.04746 12.4953L4.20706 13.3357C3.81654 13.7262 3.18337 13.7262 2.79285 13.3357C2.40232 12.9452 2.40232 12.312 2.79285 11.9215L3.59029 11.1241C2.74529 10.2043 2.12772 9.292 1.71879 8.605C1.5096 8.25356 1.35345 7.95845 1.2481 7.74776C1.19539 7.64234 1.15529 7.55783 1.12752 7.49771C1.11363 7.46765 1.10282 7.44366 1.09505 7.42618L1.08566 7.4049L1.08267 7.39801L1.0816 7.39553L1.08117 7.39453C1.08098 7.39409 1.08081 7.39369 1.99995 6.99977L1.08117 7.39453C0.863613 6.8869 1.0984 6.29818 1.60603 6.08062Z"
                                fill="#1C274C"
                            />
                        </svg>
                    </button>
                    @error("username")
                        <p class="my-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </label>

                <a href="{{route('changepassword')}}" class="text-primary italic underline hover:text-green-800 ">
                    <small>Lupa Password ?</small>
                </a>

                <div class="flex flex-col">
                    <button
                        class="btn bg-primary mx-auto mt-7 max-w-max rounded-xl border-none px-10 py-8 text-2xl text-white"
                    >
                        Login
                    </button>
                    <small class="text-primary text-center">
                        Belum Punya akun ?
                        <a href="/register" class="underline">Daftar Disini</a>
                    </small>
                </div>
            </form>
        </div>
    </div>

    {{-- alpine js --}}

    @push("script")
        <script src="//unpkg.com/alpinejs" defer></script>
    @endpush
</x-layout>
