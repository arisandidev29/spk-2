<div
    x-data="{
        profilePic: '{{ asset(auth()->user()->profile_pic) }}',
        updateProfilePic(event) {
            const file = event.target.files[0]
            if (file) {
                const reader = new FileReader()
                reader.onload = (e) => {
                    this.profilePic = e.target.result
                    document.getElementById('profile_pic_img').src = this.profilePic
                }
                reader.readAsDataURL(file)
            }
        },
    }"
    class="relative"
>
    <img
        :src="profilePic"
        alt="profile pic"
        id="profile_pic_img"
        class="aspect-square h-60 w-60 rounded-full border-4 border-black bg-white object-cover p-8"
    />

    <label for="profile_pic">
        <input
            type="file"
            name="profile_pic"
            class="hidden"
            id="profile_pic"
            @change="updateProfilePic"
        />

        <svg
            class="absolute bottom-0 left-10 h-8 w-8 cursor-pointer rounded-lg border-1 bg-white hover:bg-gray-200"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M19.186 2.09c.521.25 1.136.612 1.625 1.101.49.49.852 1.104 1.1 1.625.313.654.11 1.408-.401 1.92l-7.214 7.213c-.31.31-.688.541-1.105.675l-4.222 1.353a.75.75 0 0 1-.943-.944l1.353-4.221a2.75 2.75 0 0 1 .674-1.105l7.214-7.214c.512-.512 1.266-.714 1.92-.402zm.211 2.516a3.608 3.608 0 0 0-.828-.586l-6.994 6.994a1.002 1.002 0 0 0-.178.241L9.9 14.102l2.846-1.496c.09-.047.171-.107.242-.178l6.994-6.994a3.61 3.61 0 0 0-.586-.828zM4.999 5.5A.5.5 0 0 1 5.47 5l5.53.005a1 1 0 0 0 0-2L5.5 3A2.5 2.5 0 0 0 3 5.5v12.577c0 .76.082 1.185.319 1.627.224.419.558.754.977.978.442.236.866.318 1.627.318h12.154c.76 0 1.185-.082 1.627-.318.42-.224.754-.559.978-.978.236-.442.318-.866.318-1.627V13a1 1 0 1 0-2 0v5.077c0 .459-.021.571-.082.684a.364.364 0 0 1-.157.157c-.113.06-.225.082-.684.082H5.923c-.459 0-.57-.022-.684-.082a.363.363 0 0 1-.157-.157c-.06-.113-.082-.225-.082-.684V5.5z"
                fill="#000000"
            />
        </svg>
    </label>
</div>
@error("profile_pic")
    <p class="text-sm text-red-500">{{ $message }}</p>
@enderror
