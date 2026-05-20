<x-main.main :streak="$streak">
    <div class="p-6">
        <h1 class="text-[32px] mb-6">Edit Profile</h1>
        
        <form action="{{ route('admin.update', $user->id) }}" method="POST" class="flex flex-col gap-4 w-1/2">
            @csrf
            @method('PATCH')
            <div class="flex gap-10">
                <div>
                
                    <x-form.input label="Name" name="name" id="name" value="{{ $user->name }}"></x-form.input>
                    <x-form.input label="Email" name="email" type="email" id="email" value="{{ $user->email }}"></x-form.input>
                </div>
                <div>
                    <x-form.input label="New Password" name="password" type="password" id="password"></x-form.input>
                    <x-form.input label="Confirm Password" name="password_confirmation" type="password" id="password_confirmation"></x-form.input>
                </div>
            </div>

            <button type="submit" class="mt-5 w-full bg-violet-900 px-4 py-2 rounded cursor-pointer hover:bg-yellow-200 hover:!text-gray-800">
                Save Changes
            </button>
        </form>
    </div>
</x-main.main>