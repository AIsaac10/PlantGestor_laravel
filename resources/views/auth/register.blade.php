<x-guest-layout>

    <div class="w-full max-w-md mx-auto mt-12 bg-white shadow-2xl rounded-2xl p-8 border border-gray-200">
        
        <h2 class="text-3xl font-bold text-center text-green-800 mb-6">
            Criar Conta
        </h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Nome')" class="!text-gray-800 font-medium" />
                <x-text-input 
                    id="name"
                    class="block mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-500" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" class="!text-gray-800 font-medium" />
                <x-text-input 
                    id="email"
                    class="block mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Senha')" class="!text-gray-800 font-medium" />
                <x-text-input 
                    id="password"
                    class="block mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500"
                    type="password"
                    name="password"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" class="!text-gray-800 font-medium" />
                <x-text-input 
                    id="password_confirmation"
                    class="block mt-1 w-full border border-gray-300 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500"
                    type="password"
                    name="password_confirmation"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500" />
            </div>

            <button type="submit"
                class="w-full py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-md transition-all duration-200 transform hover:scale-105">
                Criar Conta
            </button>

            <p class="mt-4 text-center text-gray-600 text-sm">
                Já tem uma conta?
                <a href="{{ route('login') }}"
                   class="text-green-600 font-semibold hover:text-green-800 hover:underline transition">
                    Entrar
                </a>
            </p>
        </form>

    </div>

</x-guest-layout>

