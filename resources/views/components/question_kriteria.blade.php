@props([
    "kriteria",
    "alternatives",
])

<div class="bg-secondary rounded-xl p-6">
    <div class="flex items-center gap-4">
        <p
            class="flex h-8 w-8 items-center justify-center self-start rounded-full bg-white text-sm font-bold md:h-10 md:w-10 lg:text-base"
        >
            {{ $kriteria->kd_kriteria }}
        </p>
        <div>
            <p class="text-base font-bold text-white md:text-lg">
                {{ $kriteria->nama }}
            </p>

            <p class="my -1md:text-base text-sm text-gray-200">
                {{ $kriteria->desc }}
            </p>
        </div>
    </div>

    <hr class="my-4 text-gray-800" />

    <div class="flex justify-evenly gap-4 lg:gap-8">
        @foreach ($alternatives as $index => $alternative)
            @php
                $error = $kriteria->kd_kriteria . "." . $alternative->name;
                $name = "userAnswer[$kriteria->kd_kriteria][$alternative->name]";
            @endphp

            <div class="flex flex-col items-center ">
                <p class="my-4 text-center md:text-left text-sm md:text-base lg:text-lg text-white">{{ $alternative->name }}</p>
                <input
                    type="hidden"
                    name="{{ $name }}[kd_kriteria]"
                    value="{{ $kriteria->kd_kriteria }}"
                />
                <input
                    type="hidden"
                    name="{{ $name }}[alternative_id]"
                    value="{{ $alternative->id }}"
                />
                <input
                    type="text"
                    name="{{ $name }}[jawaban]"
                    class="input {{ $errors->has($error) ? "border-red-500" : "" }} w-full rounded-lg bg-white outline-0"
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
