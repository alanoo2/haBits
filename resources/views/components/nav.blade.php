<div class="bg-violet-900 p-3 flex justify-between">
    <div>
        <h1 class="!text-amber-300">haBits</h1>
    </div>
    <div class="flex gap-10">
        @guest
            <a href=" {{ route('login-form') }}">Login</a>
            <a href=" {{ route('register-form') }}  ">Register</a>
        @endguest
        @auth
            <form 
                action=" {{  route('logout') }}"
                method="POST"
            >
                @csrf
                @method('DELETE')

                <button type="submit" class="bg-red-500 p-2 rounded-md hover:bg-red-700">Logout</button>
            </form>
        @endauth

    </div>
</div>