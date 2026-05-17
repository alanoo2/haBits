@props([
    "title" => '' 
])

    <div x-data="{ showOCEAN: false }" 
        class="bg-white/60 p-10 rounded-lg shadows-lg w-full max-w-md mx-auto mt-40 transition-all duration-500 ease-in-out"
    >
        
        <div 
            x-show="!showOCEAN"
            x-transition:leave="transition-opacity duration-300"
            x-transition:leave-end="opacity-0"
        >
            <h1 class="text-[32px] text-center">{{ $title }}</h1>
            <p class="text-[10px] text-center !text-gray-400 mb-5">Please fill in the form below to {{ strtolower($title) }}</p>
            <form action="{{ route(strtolower($title)) }}" method="POST">
                @csrf
            
                <div class="flex flex-col gap-5">
                    @if($title == "Register")
                        <x-form.input name="name" label="Name" type="text" required/>
                    @endif
                    <x-form.input name="email" label="Email" type="email" required/>
                    <x-form.input name="password" label="Password" type="password" required/>
            
                    @if($title == "Register")
                        <button type="button" @click="showOCEAN = true" class="bg-violet-900 px-4 py-2 rounded cursor-pointer hover:bg-yellow-200 hover:!text-gray-800">Start Now!</button>
                    @else
                        <button type="submit" class="bg-violet-900 px-4 py-2 rounded cursor-pointer hover:bg-yellow-200 hover:!text-gray-800">{{ $title == "Login" ? "Get In!" : "Start Now!" }}</button>
                    @endif
                </div>
            @if($errors->any())
                <p class="mt-5 text-[10px] !text-red-700">Error. Please check your credentials.</p>
            @endif    
                <hr class="mt-5 border-t-2">
                <div class="flex lex-col gap-5 mt-5">
            @if( $title == "Register")
                <p class="text-[12px] ">Already have an account? <a class="!text-sky-100 hover:!text-yellow-100 underline" href="{{ route('login') }}">Login</a></p>
            @elseif( $title == "Login")
                <p class="text-[12px] ">New around here? <a class="!text-sky-100 hover:!text-yellow-100 underline" href="{{ route('register') }}">Register</a></p>
            @endif
        </div>

        <!-- OCEAN -->
        </div>

            <div x-show="showOCEAN"
                 x-transition:enter="transition-opacity duration-300"
                 x-transition:enter-start="opacity-0"
                 class="flex flex-col gap-5"
            >
                <p class="text-[12px] text-center !text-gray-400 mb-5">To complete your registration, please fill in the OCEAN personality traits below.</p> 
                <img src="./img/personalities/a.png" alt="" class="w-1200 ">
                <button type="submit" class="bg-violet-900 px-4 py-2 rounded cursor-pointer hover:bg-yellow-200 hover:!text-gray-800">{{ $title == "Login" ? "Get In!" : "Start Now!" }}</button>    
            </div>

        </form>
       
    </div>