<x-layout >
    <x-header />

    <div class="max-w-xl mx-auto my-4 min-h-screen flex justify-center items-center">
        <div class="shadow-xl w-lg mx-auto border-slate-500 border-2 rounded-2xl p-4 py-8">

            <h1 class="text-2xl font-bold text-center text-primary">Change Password</h1> 
            <p class="text-sm m-2 text-center my-4">Kamu akan melakukan Perubahan password, masukan email kamu Token  di bawah ini</p>
            <form action="{{route('doChangepassword')}}" method="post" class="flex flex-col gap-4">
                
                @csrf

                <input type="text" placeholder="Type email" class="input w-full" name="email" />

                @error('email')
                   <p class="text-sm text-red-500">{{$message}}</p> 
                @enderror
                
                
                <label for="token">
                    <input type="text" placeholder="Type Token" class="input w-full" name="token" />
                    @error('token')
                       <p class="text-sm text-red-500">{{$message}}</p> 
                    @enderror
                    <a href="{{route('howtogettoken')}}" class="underline text-primary">
                        <small>Cara Dapat Token ?</small>
                    </a>

                </label>
                
                <button class="btn bg-primary text-white">Kirim</button>
            </form>
        </div>
    </div>
</x-layout>