<div class="py-4">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                {{ $user->name }} | {{ $user->email }} | {{ $user->logisticOperator->birth_date->age }} | {{ $user->logisticOperator->birth_date->format('d/m/Y') }}
            </div>
        </div>
    </div>
</div>