<div class="mt-10 max-w-3xl">
    <h2 class="font-semibold text-white text-lg mb-2">
        Contact
    </h2>
    <form class="flex flex-col space-y-3 max-w-xs" method="POST" action="#">
        @csrf
        <label class="text-xs md:text-sm" for="email">
            Your Email
        </label>
        <input
            class="bg-[#161B22] rounded-md px-3 py-2 text-white placeholder-gray-500 text-xs md:text-sm focus:outline-none focus:ring-2 focus:ring-[#e31b2f] border border-gray-800"
            id="email" name="email" placeholder="Enter your email" type="email" required />
        <button
            class="bg-[#e31b2f] hover:bg-[#b41522] transition-colors rounded-md px-3 py-1 text-white font-semibold text-xs w-max"
            type="submit">
            Subscribe
        </button>
    </form>
</div>
