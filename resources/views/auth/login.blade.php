<x-guest-layout>

    <div class="w-full max-w-md mx-auto mt-16 bg-white shadow-2xl rounded-2xl p-8 border border-gray-300">

        <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">
            Login
        </h2>

        <x-auth-session-status class="mb-4 text-green-700 font-semibold" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" class="!text-gray-900 font-semibold" />

                <x-text-input 
                    id="email"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required autofocus autocomplete="username"
                    class="block mt-1 w-full border border-gray-400 rounded-lg px-3 py-2 bg-white
                           text-gray-900 placeholder-gray-500 focus:outline-none
                           focus:ring-2 focus:ring-green-500 focus:border-green-600"
                />

                <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-600" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Senha')" class="!text-gray-900 font-semibold" />

                <x-text-input 
                    id="password"
                    type="password"
                    name="password"
                    required autocomplete="current-password"
                    class="block mt-1 w-full border border-gray-400 rounded-lg px-3 py-2 bg-white
                           text-gray-900 placeholder-gray-500 focus:outline-none
                           focus:ring-2 focus:ring-green-500 focus:border-green-600"
                />

                <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-600" />
            </div>

            <div class="flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-400 text-green-600 shadow-sm focus:ring-green-500">
                <label for="remember_me" class="ml-2 text-sm text-gray-800">
                    Lembrar sessão
                </label>
            </div>

            <button
                class="w-full py-2 bg-green-700 hover:bg-green-800 text-white font-bold rounded-xl shadow-md transition">
                Entrar
            </button>

            <p class="text-center text-sm text-gray-800 mt-3">
                Não tem conta?
                <a href="{{ route('register') }}"
                    class="text-green-700 font-bold hover:text-green-900 hover:underline transition">
                    Criar conta
                </a>
            </p>

        </form>

    </div>

</x-guest-layout>
