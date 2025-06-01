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

                <label for="password">
                    <input
                        type="text"
                        name="password"
                        placeholder="Password"
                        value="{{ old("password") }}"
                        class="border-b-primary text-primary placeholder:text-primary my-2 w-full border-b-4 bg-none p-4 text-xl outline-0 placeholder:text-xl active:bg-none"
                    />
                    @error("username")
                        <p class="my-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </label>

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
</x-layout>
