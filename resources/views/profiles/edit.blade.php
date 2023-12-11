<x-main-layout>

    <div class="flex flex-col justify-center items-center">
        <h1>Edit Profile</h1>

        <form action="/myschool/profile/update" method="POST" class="bg-white " >
            @csrf

            <label> About</label>
            <p class="my-2 text-slate-500" >A brief outline of your school. YOur school's about is shown on your schools short card on search results. You can be as creative as you want here. Save more detail for your profile body
            </p>
            <textarea
             required type="text"
             placeholder="Whats your school all about..."
             name="about"
             rows="5"
            >{{$school->about}}</textarea>

            <br>

            <label>Profile Body <span class="bg-slate-200 text-sm  text-slate-500 py-1 px-2 rounded-full" >Markdown</span> <span class="bg-orange-100 text-sm  text-orange-500 py-1 px-2 rounded-full" >Required</span> </label>
            <p class="my-2 text-slate-500" > Your school's profile body is where you can include all the neccessary detail in Markdown
            </p>

            <a class="mb-2" href="">New to Markdown? Click here</a>
            <textarea
             required type="text"
             name="body"
             rows="10"
            >{{$school->body}}</textarea>

            <br>

            <label>School Website Url</label>
            <input value="{{$school->website_url}}" required type="url" name="website_url" placeholder="e.g https://myschool.com" >

            <br>

            <label>Application Form Url</label>
            <p class="my-2 text-slate-500" >This is the link where a student will be redirected to when they click the 'Apply' button.
                We reccomend that you put the link to either a website or document spelling out the application procedure or a form where students can fill in
                to apply.
            </p>
            <input value="{{$school->application_url}}" required type="url" name="application_url" placeholder="e.g https://myschool.com" >

            <br>

            <label>Instagram Url <span class="bg-slate-200 text-sm  text-slate-500 py-1 px-2 rounded-full" >Optional</span></label>
            <input  value="{{$school->instagram}}" type="url" name="instagram" >

            <br>

            <label>Facebook Url <span class="bg-slate-200 text-sm  text-slate-500 py-1 px-2 rounded-full" >Optional</span></label>
            <input  value="{{$school->facebook}}" type="url" name="facebook" >

            <br>

            <label>X Url (Formally Twitter) <span class="bg-slate-200 text-sm  text-slate-500 py-1 px-2 rounded-full" >Optional</span></label>
            <input  value="{{$school->twitter}}" type="url" name="twitter" >

            <br>

            <label>Application Process</label>
            <p class="my-2 text-slate-500" >Brief Description of what a student will expect to see when they click the Apply and
                what they need to do next to apply to your school
            </p>
            <textarea
             required type="text"
             name="application_process"
             rows="7"
            >{{$school->application_process}}</textarea>

            <br>

            <label>Tuition Min </label>
            <input required type="number" min="0" value="{{$school->tuition_max}}" placeholder="e.g 2000" name="tuition_min" >

            <br>

            <label>Tuition Max </label>
            <input required type="number" value="{{$school->tuition_max}}" min="0" placeholder="e.g 3000" name="tuition_max" >

            <br>

            <br>

            <input type="submit" class="link-btn shadow-md" value="Update Profile"/>

        </form>

    </div>

</x-main-layout>
