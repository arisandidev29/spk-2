<div class="navbar from-secondary to-primary bg-linear-to-r px-12 shadow-sm">
    <div class="flex-1">
        <img src="/asset/logo.png" alt="logo" class="w-24" />
    </div>
    <div class="flex gap-2">
        <div class="dropdown dropdown-end">
            <span class="font-bold text-slate-800">
                {{ auth()->user()->name }}
            </span>
            <div
                tabindex="0"
                role="button"
                class="btn btn-ghost btn-circle avatar"
            >
                <div class="w-10  ">
                    <img
                        class="rounded-full border-2 border-slate-500"
                        alt="Tailwind CSS Navbar component"
                        src="{{ asset(auth()->user()->profile_pic) }}"
                    />
                </div>
            </div>
            <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow"
            >
                @if (auth()->user()->role == "admin")
                    <li class="py-2"><a href="{{route('dashboard')}}">Dashboard</a></li>
                @else
                    <li class="py-2"><a href="{{route('user.homepage')}}">Homepage</a></li>
                @endif
                <li class="py-2">
                    <a
                        href="{{ route("profile.view") }}"
                        class="justify-between"
                    >
                        Profile
                    </a>
                </li>
                <li class="py-2"><a href="/logout">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
