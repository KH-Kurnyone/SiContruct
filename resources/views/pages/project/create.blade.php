<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Project') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('project.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="project_name" :value="__('Nama Proyek')" />
                            <x-text-input id="project_name" class="block mt-1 w-full" type="text" name="project_name"
                                :value="old('project_name')" required autofocus autocomplete="project_name" />
                            <x-input-error :messages="$errors->get('project_name')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="location" :value="__('Lokasi')" />
                            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location"
                                :value="old('location')" required autofocus autocomplete="location" />
                            <x-input-error :messages="$errors->get('location')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="start_date" :value="__('Tanggal Mulai')" />
                            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date"
                                :value="old('start_date')" required autofocus autocomplete="start_date" />
                            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="end_date" :value="__('Tanggal Akhir')" />
                            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date"
                                :value="old('end_date')" required autofocus autocomplete="end_date" />
                            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="budget" :value="__('Nominal')" />
                            <x-text-input id="budget" class="block mt-1 w-full" type="number" name="budget"
                                :value="old('budget')" required autofocus autocomplete="budget" />
                            <x-input-error :messages="$errors->get('budget')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <label for="status" class="text-sm">Status</label>
                            <select name="status"
                                class="w-full text-sm rounded-lg border-gray-400 dark:bg-gray-700 shadow-sm dark:shadow-gray-500 {{ $errors->first('status') ? 'border-red-500' : '' }}">
                                <option value="" selected disabled hidden></option>
                                <option value="Perencanaan">Perencanaan</option>
                                <option value="Berjalan">Berjalan</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Tertunda">Tertunda</option>
                            </select>
                            <span class="text-sm text-red-500">{{ $errors->first('status') }}</span>
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-danger-link-button class="ms-4" :href="route('project.index')">
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
