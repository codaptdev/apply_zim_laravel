@props(['href', 'color'])



@if ($href === "")

    <p
        class="
        bg-{{$color}}-200 border-2 border-{{$color}}-400
        text-{{$color}}-800 py-2 px-4
        rounded-full hover:bg-{{$color}}-400 text-center"
    >
        {{-- The label put on the pill --}}
        {{$slot}}
    </p>


@else
    <a
    class="bg-{{$color}}-200 border-2 border-{{$color}}-400
    text-{{$color}}-800 py-2 px-4 rounded-fullhover:bg-{{$color}}-400 text-center"

    href="{{$href}}"
    >
    {{-- The label put on the pill --}}
    {{$slot}}
    </a>


@endif
