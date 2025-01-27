<div class="py-4">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-2">
                    <h1>User: {{ $user->name }}</h1>
                    <ul x-data="{
                        identification_type: '{{ $user->identification_type }}',
                        identification: '{{ $user->identification }}',
                        formater() {
                            if (this.identification_type === 'cpf') {
                                return this.identification.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
                            }
                            if (this.identification_type === 'cnpj') {
                                return this.identification.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
                            }
                            
                            return this.identification;
                        }
                    }">
                        <li>{{ $user->identification_type }}</li>
                        <li x-text="formater()"></li></li>
                        <li>{{ $user->email }}</li>
                    </ul>
                </div>
                <div class="p-2">
                    <x-primary-button>Vincular função</x-primary-button>
                </div>
            </div>
        </div>
    </div>
</div>
