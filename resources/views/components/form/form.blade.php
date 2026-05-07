@props([
    "title" => '' 
]);

<div class="bg-white/60 p-10 rounded-lg shadows-lg w-full max-w-md mx-auto mt-40">
        <h1 class="text-[32px] text-center">{{ $title }}</h1>
        <p class="text-[10px] text-center !text-gray-400 mb-5">Please fill in the form below to {{ strtolower($title) }}</p>
        <form action="{{ route(strtolower($title)) }}" method="POST">
            @csrf
            
            <div class="flex flex-col gap-5">
                <div >
                    <label for="email">Email</label>
                    <input class="form-input" type="email" id="email" name="email" required>
                </div>
                <div >
                    <label for="password">Password</label>
                    <input class="form-input" type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="bg-violet-900 px-4 py-2 rounded">{{ $title }}</button>

            </div> 
        </form>
    </div>