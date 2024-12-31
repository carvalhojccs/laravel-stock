<div class="py-4">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Nome') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('E-mail') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Tipo') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Último Login') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Ações') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                Operador Logístico
                            </td>
                            <td class="px-6 py-4">
                                @if ( $user->last_login_at )
                                {{ $user->last_login_at->format('d/m/Y H:i:s') }}
                                @else
                                {{ __('Nunca') }}
                                @endif
                                
                            </td>
                            <td class="px-6 py-4">
                                <x-primary-button type="button" wire:navigate href="{{ route('users.show', $user->id) }}">Show</x-primary-button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>