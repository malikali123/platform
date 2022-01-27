<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('لائحة المتاجر المسجلة') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
            <thead>
                <tr class="text-center font-bold">
                    <x-table-column>{{ __('#') }}</x-table-column>
                    <x-table-column>{{ __('إسم المتجر') }}</x-table-column>
                    <x-table-column>{{ __('عنوان المتجر') }}</x-table-column>
                    <x-table-column>{{ __('بريد المتجر') }}</x-table-column>
                    <x-table-column>{{ __('تاريخ التسجيل') }}</x-table-column>
                    <x-table-column>{{ __('الحالة') }}</x-table-column>
                    <x-table-column>{{ __('العمليات') }}</x-table-column>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $store)
                    <tr>
                        <x-table-column-td>{{ $store->id }}</x-table-column-td>
                        <x-table-column-td>{{ $store->name }}</x-table-column-td>
                        <x-table-column-td>
                            <x-button href="//{{ $store->domain }}" target="_blank">{{ $store->domain }}
                            </x-button>
                        </x-table-column-td>
                        <x-table-column-td>{{ $store->email }}</x-table-column-td>
                        <x-table-column-td>{{ $store->created_at }}</x-table-column-td>
                        <x-table-column-td>
                            @if ($store->is_active)
                                <x-button variant="success" title="مفعل"
                                    href="{{ route('store.enactive', $store->id) }}">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                        </path>
                                    </svg>
                                </x-button>
                            @else
                                <x-button variant="danger" title="غير مفعل"
                                    href="{{ route('store.active', $store->id) }}">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </x-button>
                            @endif
                        </x-table-column-td>
                        <x-table-column-td>
                            <x-button ic variant="info">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </x-button>
                            <x-button variant="danger">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </x-button>
                        </x-table-column-td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
