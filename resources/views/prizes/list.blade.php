<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 px-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-10 px-10 text-left">
                    @if(count($prizes) > 0)
                        @foreach($prizes as $prize)
                            <li>
                                @if($prize->awarded_type == 'App\Models\PhysicalPrize')
                                    Physical Object: {{ $prize->awarded->physicalObject->title }}
                                @endif
                                @if($prize->awarded_type == 'App\Models\CashPrize')
                                    Cash prize: ${{ $prize->awarded->sum }}
                                @endif
                                @if($prize->awarded_type == 'App\Models\BonusPrize')
                                    Bonus prize: {{ $prize->awarded->sum }} bonuses
                                @endif
                            </li>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
