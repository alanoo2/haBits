<div 
    x-show="confirmDelete"
    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
>
    <div class="bg-violet-900 border-2 border-white/50 rounded-xl p-6 w-80 flex flex-col gap-4">
        <h2 class="text-lg font-bold">Delete habit?</h2>
        <p>Are you sure you want to delete <span class="text-yellow-300" x-text="habitTitle"></span>?</p>
            <div class="flex gap-3">
                <form :action="'/habits/' + habitId" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 w-full py-2 rounded-lg hover:bg-red-700">
                        Delete
                    </button>
                </form>
                <button 
                    @click="confirmDelete = false"
                    class="bg-gray-500 flex-1 py-2 rounded-lg hover:bg-gray-700"
                >
                    Cancel
                </button>
            </div>
        </div>
    </div>