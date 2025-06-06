@props([
    "kriteria",
    "alternatives",
])

<div class="bg-secondary rounded-xl p-6">
    <div class="flex items-center gap-4">
        <p
            class="flex h-10 w-10 items-center justify-center self-start rounded-full bg-white font-bold"
        >
            {{ $kriteria->kd_kriteria}}
        </p>
        <div>
            <p class="text-lg font-bold text-white">{{ $kriteria->nama }}</p>

            <p class="text-gray-200">{{ $kriteria->desc }}</p>
        </div>
    </div>

    <hr class="my-4 text-gray-800" />

    <div class="flex justify-evenly gap-8">
        @foreach ($alternatives as $index => $alternative)
            @php
                $error = $kriteria->kd_kriteria . "." . $alternative->name;
                $name = "userAnswer[$kriteria->kd_kriteria][$alternative->name]";
            @endphp

            <div class="flex flex-col items-center">
                <p class="text-lg text-white my-4">{{ $alternative->name }}</p>
                <input type="hidden" name="{{$name }}[kd_kriteria]" value="{{$kriteria->kd_kriteria}}">
                <input type="hidden" name="{{$name }}[alternative_id]" value="{{$alternative->id}}">
                <input
                    type="text"
                    name="{{ $name }}[jawaban]"
                    class="input w-full rounded-xl bg-white outline-0 {{$errors->has($error) ? 'border-red-500' : ''}}"
                    placeholder="Type here"
                    value="{{ old($kriteria->kd_kriteria . "." . $alternative->name) }}"
                />

                @error($error)
                    <p class="text-sm text-red-300">{{ $message }}</p>
                @enderror
            </div>
        @endforeach
    </div>
</div>
