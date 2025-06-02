@props([
    "title" => "Modal Title",
    "triggerText" => "open modal", 
    "id" => "my_modal",
])
<div {{ $attributes->merge(["class" => ""]) }}>


    @isset($trigger)
    {{ $trigger }}
    @else
        <button
            class="btn btn-primary rounded-lg border-0 text-white m-4 {{$attributes->get("class-trigger")}}"
            onclick="{{$id}}.showModal()"
        >
        {{ $triggerText }}
        </button>
    @endisset

    @isset($modalBox)
        {{ $modalBox }}
    @else
        <dialog
            id="{{ $id }}"
            class="modal"
            {{ $attributes->get("opencondition") }}
        >
            <div class="modal-box">
                <form method="dialog">
                    <button
                        class="btn btn-sm btn-circle btn-ghost absolute top-2 right-2"
                    >
                        ✕
                    </button>
                </form>
                <h3 class="text-primary py-4 text-lg font-bold {{$attributes->get('class-title')}}">{{$title}}</h3>
                {{ $slot }}
           </div>
        </dialog>
    @endisset
</div>
