<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[10px] font-bold uppercase tracking-wider text-zinc-455 mb-1.5">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                class="w-full px-3 py-2.5 border border-zinc-250 rounded-md focus:outline-none focus:ring-1 focus:ring-kwela-maroon focus:border-kwela-maroon bg-white hover:bg-zinc-50/30 text-zinc-900 text-sm transition-all placeholder-zinc-400 font-medium @error('email') border-red-500 @enderror"
                placeholder="name@example.com">
            @error('email')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-1.5">
                <label for="password" class="block text-[10px] font-bold uppercase tracking-wider text-zinc-455">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs text-zinc-500 hover:text-zinc-950 transition-colors font-semibold" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full px-3 py-2.5 border border-zinc-250 rounded-md focus:outline-none focus:ring-1 focus:ring-kwela-maroon focus:border-kwela-maroon bg-white hover:bg-zinc-50/30 text-zinc-900 text-sm transition-all placeholder-zinc-400 font-medium @error('password') border-red-500 @enderror"
                placeholder="••••••••">
            @error('password')
                <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember"
                class="w-4 h-4 text-kwela-maroon border-zinc-300 rounded focus:ring-kwela-maroon focus:ring-offset-0 focus:ring-0 accent-kwela-maroon cursor-pointer">
            <label for="remember_me" class="ml-2.5 text-xs text-zinc-500 hover:text-zinc-950 font-semibold cursor-pointer select-none">
                Remember my session
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full px-4 py-2.5 bg-kwela-maroon hover:bg-kwela-maroon/90 text-white rounded-md font-bold text-xs uppercase tracking-wider transition-colors shadow-sm text-center">
                Log In
            </button>
        </div>
    </form>
</x-guest-layout>
