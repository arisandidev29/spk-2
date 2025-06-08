<x-layout >
    <x-header />

    <div class="max-w-xl mx-auto my-4 min-h-screen flex justify-center items-center">
        <div class="shadow-xl w-lg mx-auto border-slate-500 border-2 rounded-2xl p-4 py-8">

            <h1 class="text-2xl font-bold text-center text-primary">Set New Password</h1> 
            <p class="text-sm m-2 text-center my-4">Ubah Password Baru kamu, pastikan 8 karakter</p>
            <form action="{{route('setNewPassword')}}" method="post" class="flex flex-col gap-4">
                
                @csrf

                <input type="password" placeholder="password baru" class="input w-full" name="newPassword" />

                @error('newPassword')
                   <p class="text-sm text-red-500">{{$message}}</p> 
                @enderror
                
                
                <button class="btn bg-primary text-white">Ubah Password</button>
            </form>
        </div>
    </div>
</x-layout>