<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Company') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('company.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="company_name" :value="__('Nama Perusahaan')" />
                            <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name"
                                :value="old('company_name')" required autofocus autocomplete="company_name" />
                            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="contact" :value="__('No. Telp')" />
                            <x-text-input id="contact" class="block mt-1 w-full" type="number" name="contact"
                                :value="old('contact')" required autofocus autocomplete="contact" />
                            <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-2">
                            <label for="address"
                                class="max-sm:text-xs sm:text-xs md:text-xs lg:text-xs xl:text-base">Alamat</label>
                            <textarea name="address" id="address" cols="30" rows="2"
                                class="w-full rounded-lg border-gray-300 shadow-sm {{ $errors->first('address') ? 'border-red-500' : '' }}">{{ old('address') }}</textarea>
                            <span class="text-xs text-red-500">{{ $errors->first('address') }}</span>
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-danger-link-button class="ms-4" :href="route('company.index')">
                                {{ __('Back') }}
                            </x-danger-link-button>
                            <x-primary-button class="ms-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
