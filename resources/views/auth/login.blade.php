<x-guest-layout>

    <div class="w-[500px] mx-auto mt-10 bg-white shadow-xl rounded-xl p-8 border border-green-200">

        <h2 class="text-3xl font-bold text-center text-green-700 mb-6">
            Login
        </h2>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" class="!text-gray-700" />
                <x-text-input id="email"
                    class="block mt-1 w-full border-gray-300 focus:border-green-600 focus:ring-green-600"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Senha')" class="!text-gray-700" />
                <x-text-input id="password"
                    class="block mt-1 w-full border-gray-300 focus:border-green-600 focus:ring-green-600"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500" />
            </div>

            <p class="text-center text-sm text-gray-600">
                Não tem uma conta?
                <a href="{{ route('register') }}"
                    class="text-green-600 font-semibold hover:text-green-800 transition">
                    Criar conta
                </a>
            </p>

            <div class="flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                    name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-700">
                    Lembrar sessão
                </label>
            </div>

                <button
                    class="px-5 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition">
                    Entrar
                </button>
            </div>

        </form>

    </div>

</x-guest-layout>
