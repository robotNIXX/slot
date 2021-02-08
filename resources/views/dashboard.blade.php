<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 px-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-10 px-10 text-center">
                    <a class="py-10 bg-pink-400" href="{{ route('prizes.get') }}">Select you prize</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
