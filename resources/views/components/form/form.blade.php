@props([
    "title" => '' 
])

    <div x-data="{ step: 1 }" 
    class="bg-white/60 p-10 rounded-lg shadows-lg w-full max-w-md mx-auto mt-40 transition-all duration-500 ease-in-out"
>
    <form action="{{ route(strtolower($title)) }}" method="POST">
    @csrf

    <!-- STEP 1: Registro -->
    <div x-show="step === 1"
         x-transition:leave="transition-opacity duration-300"
         x-transition:leave-end="opacity-0"
    >
        <h1 class="text-[32px] text-center">{{ $title }}</h1>
        <p class="text-[10px] text-center !text-gray-400 mb-5">Please fill in the form below to {{ strtolower($title) }}</p>

        <div class="flex flex-col gap-5">
            @if($title == "Register")
                <x-form.input name="name" id="name" label="Name" type="text" required/>
            @endif
            <x-form.input name="email" id="email" label="Email" type="email" required/>
            <x-form.input name="password" id="password" label="Password" type="password" required/>

            @if($title == "Register")
                <button 
                    type="button" 
                    @click="
                        const name = document.getElementById('name');
                        const email = document.getElementById('email');
                        const password = document.getElementById('password');
                        
                        if(!name.value || !email.value || !password.value) {
                            name.reportValidity();
                            email.reportValidity();
                            password.reportValidity();
                            return;
                        }
                        step = 2
                    "
                    class="bg-violet-900 px-4 py-2 rounded cursor-pointer hover:bg-yellow-200 hover:!text-gray-800"
                >
                    Start Now!
                </button>
            @else
                <button type="submit" class="bg-violet-900 px-4 py-2 rounded cursor-pointer hover:bg-yellow-200 hover:!text-gray-800">Get In!</button>
            @endif
        </div>

        @if($errors->any())
            <p class="mt-5 text-[10px] !text-red-700">Error. Please check your credentials.</p>
        @endif

        <hr class="mt-5 border-t-2">
        <div class="flex flex-col gap-5 mt-5">
            @if($title == "Register")
                <p class="text-[12px]">Already have an account? <a class="!text-sky-100 hover:!text-yellow-100 underline" href="{{ route('login') }}">Login</a></p>
            @elseif($title == "Login")
                <p class="text-[12px]">New around here? <a class="!text-sky-100 hover:!text-yellow-100 underline" href="{{ route('register') }}">Register</a></p>
            @endif
        </div>
    </div>

    <!-- STEP 2: Bienvenida -->
    <div x-show="step === 2"
         x-transition:enter="transition-opacity duration-300"
         x-transition:enter-start="opacity-0"
         class="flex flex-col gap-5"
    >
        <h1 class="text-[28px] !text-yellow-200 mx-20">Welcome!</h1>
        <p class="text-[12px] text-center mb-5">To continue, please fill up the OCEAN form to complete your registration.</p>
        <button type="button" @click="step = 3" class="bg-violet-900 px-4 py-2 rounded cursor-pointer hover:bg-yellow-200 hover:!text-gray-800">Alright!</button>
    </div>

    <!-- STEPS 3-6: Cuestionario OCEAN -->
    <x-form.ocean.next-page step="3" q1="EXT10" q2="EXT9" q3="EXT3" q4="EST3"
        t1="I am quiet around strangers" t2="I don't mind being the center of attention"
        t3="I feel comfortable around people" t4="I worry about things"
    />
    <x-form.ocean.next-page step="4" q1="EST5" q2="EST10" q3="AGR1" q4="AGR3"
        t1="I am easily disturbed" t2="I often feel blue" t3="I feel little concern for others" t4="I insult people"
    />
    <x-form.ocean.next-page step="5" q1="AGR6" q2="CSN2" q3="CSN7" q4="CSN8"
        t1="I have a soft heart" t2="I leave my belongings around" t3="I like order" t4="I shirk my duties"
    />
    <x-form.ocean.next-page step="6" q1="OPN6" q2="OPN2" q3="OPN7"
        t1="I do not have a good imagination" t2="I have difficulty understanding abstract ideas" t3="I am quick to understand things"
    />

</form>
</div>
