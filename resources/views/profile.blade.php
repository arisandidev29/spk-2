<x-layout>
    <x-header />
    <div
        class="m-8 mx-auto my-8 min-h-[100vh] max-w-3xl items-center justify-center"
    >
        <h1 class="text-primary my-8 text-center text-4xl">
            Profile : {{ auth()->user()->name }}
        </h1>

        @if (session()->has("success"))
            <x-alert.success message="{{session()->get('success')}}" />
        @endif

        <form method="post" action="{{route('profile.edit')}}" enctype="multipart/form-data" class="mt-4 flex flex-col items-center gap-4">

            @csrf
            @method('put')
            
                <x-profile-pic-change />
                   
                <div class="mx-auto flex w-[90%] max-w-lg flex-col gap-2">
                    <input
                type="text"
                placeholder="Username"
                name="name"
                value="{{ old("name", auth()->user()->name) }}"
                class="input w-full"
                />

                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    
                @enderror
                
                <input
                type="text"
                placeholder="Email"
                name="email"
                value="{{ old("email", auth()->user()->email) }}"
                class="input w-full"
                />
                
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    
                @enderror


                <a href="{{route('changepassword')}}" class="text-primary text-sm my-2 italic hover:text-green-800">Ubah Password ! </a>

                <button class="btn bg-primary text-white">Edit</button>
             </form>
    </div>

    @push('script')
        <script src="//unpkg.com/alpinejs" defer></script>
    @endpush
</x-layout>
