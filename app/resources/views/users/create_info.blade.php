<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>
    <div class="user_new">
        <form class="user_new_form bg-primary" method="POST" action="{{ route('register-info') }}">
            <div class="user_new_content">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="color" :value="__('Color')" />
                    <select class="block mt-1 w-full text-black" id="color" name="color" required>
                        <option value="black">black</option>
                        <option value="red">Red</option>
                        <option value="blue">Blue</option>
                        <option value="green">Green</option>
                        <option value="orange">Orange</option>
                        <option value="sky">Sky</option>
                        <option value="amber">Amber</option>
                        <option value="teal">Teal</option>
                    </select>
                    <x-input-error :messages="$errors->get('color')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="job" :value="__('Job')" />
                    <x-text-input id="job" class="block mt-1 w-full text-black" type="text" name="job" required />
                    <x-input-error :messages="$errors->get('job')" class="mt-2" />
                </div>

                <div class="flex items-center justify-center mt-4">
                    <button class="ml-4">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
