<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Worker') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('worker.store') }}">
                        @csrf

                        <div>
                            <label for="user_id" class="text-sm">Nama Pekerja</label>
                            <select name="user_id"
                                class="w-full text-sm rounded-lg border-gray-400 dark:bg-gray-700 shadow-sm dark:shadow-gray-500 {{ $errors->first('user_id') ? 'border-red-500' : '' }}">
                                <option value="" selected disabled hidden></option>
                                @foreach ($dataUser as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('user_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-sm text-red-500">{{ $errors->first('user_id') }}</span>
                        </div>
                        <div class="mt-2">
                            <label for="project_id" class="text-sm">Nama Proyek</label>
                            <select name="project_id"
                                class="w-full text-sm rounded-lg border-gray-400 dark:bg-gray-700 shadow-sm dark:shadow-gray-500 {{ $errors->first('project_id') ? 'border-red-500' : '' }}">
                                <option value="" selected disabled hidden></option>
                                @foreach ($dataProyek as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('project_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->project_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-sm text-red-500">{{ $errors->first('project_id') }}</span>
                        </div>
                        <div class="mt-2">
                            <label for="company_id" class="text-sm">Nama Perusahaan</label>
                            <select name="company_id"
                                class="w-full text-sm rounded-lg border-gray-400 dark:bg-gray-700 shadow-sm dark:shadow-gray-500 {{ $errors->first('company_id') ? 'border-red-500' : '' }}">
                                <option value="" selected disabled hidden></option>
                                @foreach ($dataCompany as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('company_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->company_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-sm text-red-500">{{ $errors->first('company_id') }}</span>
                        </div>
                        <div class="mt-2">
                            <label for="position" class="text-sm">Jabatan</label>
                            <select name="position"
                                class="w-full text-sm rounded-lg border-gray-400 dark:bg-gray-700 shadow-sm dark:shadow-gray-500 {{ $errors->first('position') ? 'border-red-500' : '' }}">
                                <option value="" selected disabled hidden></option>
                                <option value="Mandor">Mandor</option>
                                <option value="Tukang">Tukang</option>
                                <option value="Helper">Helper</option>
                                <option value="Teknisi">Teknisi</option>
                            </select>
                            <span class="text-sm text-red-500">{{ $errors->first('position') }}</span>
                        </div>
                        <div class="mt-2">
                            <label for="status" class="text-sm">Status</label>
                            <select name="status"
                                class="w-full text-sm rounded-lg border-gray-400 dark:bg-gray-700 shadow-sm dark:shadow-gray-500 {{ $errors->first('status') ? 'border-red-500' : '' }}">
                                <option value="" selected disabled hidden></option>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Non Aktif</option>
                            </select>
                            <span class="text-sm text-red-500">{{ $errors->first('status') }}</span>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-danger-link-button class="ms-4" :href="route('worker.index')">
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
