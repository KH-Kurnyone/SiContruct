<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Payment') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('payment.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="payment_date" :value="__('Tanggal Pembayaran')" />
                            <x-text-input id="payment_date" class="block mt-1 w-full" type="date" name="payment_date"
                                :value="old('payment_date')" required autofocus autocomplete="payment_date" />
                            <x-input-error :messages="$errors->get('payment_date')" class="mt-2" />
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
                            <label for="method" class="text-sm">Metode</label>
                            <select name="method"
                                class="w-full text-sm rounded-lg border-gray-400 dark:bg-gray-700 shadow-sm dark:shadow-gray-500 {{ $errors->first('method') ? 'border-red-500' : '' }}">
                                <option value="" selected disabled hidden></option>
                                <option value="Transfer Bank">Transfer Bank</option>
                                <option value="Tunai">Tunai</option>
                                <option value="Cek">Cek</option>
                            </select>
                            <span class="text-sm text-red-500">{{ $errors->first('method') }}</span>
                        </div>
                        <div class="mt-2">
                            <x-input-label for="amount" :value="__('Nominal')" />
                            <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount"
                                :value="old('amount')" required autofocus autocomplete="amount" />
                            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                        </div>

                        <div class="mt-2">
                            <label for="description"
                                class="max-sm:text-xs sm:text-xs md:text-xs lg:text-xs xl:text-base">Deskripsi</label>
                            <textarea name="description" id="description" cols="30" rows="2"
                                class="w-full rounded-lg border-gray-300 shadow-sm {{ $errors->first('description') ? 'border-red-500' : '' }}">{{ old('description') }}</textarea>
                            <span class="text-xs text-red-500">{{ $errors->first('description') }}</span>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-danger-link-button class="ms-4" :href="route('payment.index')">
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
