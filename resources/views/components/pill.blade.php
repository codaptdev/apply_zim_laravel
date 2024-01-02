@props(['href', 'color'])

<a
    class="
    bg-{{$color}}-200 border-2
    border-{{$color}}-400
    text-{{$color}}-800
    py-2
    px-4
    rounded-full
    hover:bg-{{$color}}-400
    "

    href="{{$href}}"
>
    {{-- The lable put on the pill --}}
    {{$slot}}
</a>
