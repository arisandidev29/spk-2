<x-layout>
    <div class="grid grid-cols-[.7fr_.3fr]">
        <div
            style="background-image: url(/asset/pattern.svg)"
            class="sticky top-0 h-screen w-full bg-repeat-x p-8 pl-8"
        >
            <img src="/asset/logo.png" alt="logo" class="w-40" />

            <div class="mt-24 text-center">
                <h2 class="text-[6rem] font-bold text-white">Sebelum Mulai</h2>
                <h2 class="text-[6rem] font-bold text-white">
                    Daftar Dulu Yuk !
                </h2>
            </div>
        </div>
        <div class="p-4">
            <h1 class="text-primary mt-[15vh] text-center text-3xl">
                Register Your Account
            </h1>

            <form action="" class="mt-20 flex flex-col gap-10 px-8">
                <label for="username">
                    <input
                        type="text"
                        placeholder="Username"
                        class="border-b-primary text-primary placeholder:text-primary my-2 w-full border-b-4 p-4 text-xl outline-0 placeholder:text-xl active:bg-none"
                    />
                </label>
                <label for="email">
                    <input
                        type="email"
                        placeholder="Email"
                        class="border-b-primary text-primary placeholder:text-primary my-2 w-full border-b-4 p-4 text-xl outline-0 placeholder:text-xl active:bg-none"
                    />
                </label>
                <label for="Password">
                    <input
                        type="password"
                        placeholder="password confirm"
                        class="border-b-primary text-primary placeholder:text-primary my-2 w-full border-b-4 p-4 text-xl outline-0 placeholder:text-xl active:bg-none"
                    />
                </label>
                <label for="token">
                    <input
                        type="text"
                        placeholder="Token"
                        class="border-b-primary text-primary placeholder:text-primary my-2 w-full border-b-4 bg-none p-4 text-xl outline-0 placeholder:text-xl active:bg-none"
                    />
                </label>

                <label for="profile pic">
                    <p class="text-primary pl-4 text-xl">Profile Picture</p>
                    <input
                        type="file"
                        class="file-input file-input-primary mt-2"
                    />
                </label>

                <div class="flex flex-col">
                    <button
                        class="btn bg-primary mx-auto mt-7 max-w-max rounded-xl border-none px-10 py-8 text-2xl text-white"
                    >
                        Daftar
                    </button>
                    <small class="text-primary text-center">
                        Sudah Punya akun ?
                        <a href="/login" class="underline">Login Disini</a>
                    </small>
                </div>
            </form>
        </div>
    </div>
</x-layout>
