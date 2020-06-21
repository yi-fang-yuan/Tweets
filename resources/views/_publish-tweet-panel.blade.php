<div class="border border-blue-400 rounded-lg py-4 px-8 mb-8">
    <form method="POST" action="/tweets">
        @csrf
                  <textarea
                      name="body"
                      class="w-full"
                      placeholder="What's up doc"
                  >
                  </textarea>
        <hr class="my-4">
        <footer class="flex justify-between">
            <img
                src="{{auth()->user()->avatar}}"
                alt=""
                class="rounded-full w-12 h-12 mr-2"
                width="40"
                height="40"
            >
            <button type="submit"
                    class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white"
            >
                Tweet
            </button>
        </footer>

    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{$message}}</p>
    @enderror
</div>
