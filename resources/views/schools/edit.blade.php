<x-main-layout>

    <div  class="flex flex-col justify-center items-center">

        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-5 bg-red-400 text-red-50 w-full">{{$error}}</div>
        @endforeach
    @endif

        <h1>Edit School Information </h1>
        <br>

        <form class="md:w-3/4" action={{url("myschool/update")}} method="POST" class="bg-white " >
            @csrf

            <label> School Name  </label>
            <label class="text-slate-400" >Old : {{$school->name}}</label>
            <input value="{{$school->name}}" required type="text" placeholder="e.g Milestone College" name="name" >

            <br>


            <label>Address</label>
            <label class="text-slate-400" >Old : {{$school->address}}</label>
            <input value="{{$school->address}}" required type="text" name="address" placeholder="e.g 44km peg, Nyanga Road, Rusape, Zimbabwe" >

            <br>

            <label> Town or City </label>
            <label class="text-slate-400" >Old : {{$school->town_city}}</label>
            <select required type="text" name="town_city" placeholder="e.g Harare" >
                @foreach ($cities as $city)
                <option value="{{$school->town_city}}">{{$school->town_city}}</option>
                <option value="{{$city}}">{{$city}}</option>
                @endforeach
                <option value="Other">Other</option>
            </select>

            <br>

            <label>Education Level</label>
            <label class="text-slate-400" >Old : {{$school->level}}</label>
            <select value="{{$school->level}}" required type="text" name="level"  placeholder="e.g Secondary" >
                <option value="Primary">Primary</option>
                <option value="Secondary">Secondary</option>
                <option value="Tertiary">Tertiary</option>
            </select>

            <br>

            <label>Year Established </label>
            <label class="text-slate-400" >Old : {{$school->year_established}}</label>
            <input value="{{$school->year_established}}" required type="number" min="1800" max="2024" placeholder="e.g 2005" name="year_established" >

            <br>
            <br>

            <button type="submit" class="link-btn shadow-md" href="" >Save</button>
            <br>
            <a href="/myschool" class="  red-link-btn shadow-md" href="" >Discard</a>

        </form>

        <br>
        <br>
        <br>
        <br>

    </div>

</x-main-layout>
