<x-guest-layout>

    <div class="w-full max-w-md mx-auto mt-12 bg-white shadow-2xl rounded-2xl p-8 border border-gray-200">
        
        <h2 class="text-3xl font-bold text-center text-green-800 mb-6">
            Entrar no PlantGestor
        </h2>

        @if (session('status'))
            <div class="mb-4 text-center bg-green-100 text-green-800 px-4 py-2 rounded-md">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" class="!text-gray-800 font-medium" />
                <x-text-input 
                    id="email"
                    class="block mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Senha')" class="!text-gray-800 font-medium" />
                <x-text-input 
                    id="password"
                    class="block mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500" />
            </div>

            <div class="flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 text-green-500 focus:ring-green-400"
                       name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-700">
                    Lembrar sessão
                </label>
            </div>

            <button type="submit"
                class="w-full py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-md transition-all duration-200 transform hover:scale-105">
                Entrar
            </button>

            <p class="mt-4 text-center text-gray-600 text-sm">
                Não tem uma conta?
                <a href="{{ route('register') }}"
                   class="text-green-600 font-semibold hover:text-green-800 hover:underline transition">
                    Criar conta
                </a>
            </p>
        </form>

    </div>

</x-guest-layout>
