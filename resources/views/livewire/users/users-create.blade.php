<div class="py-4" x-data="{
    documentType: 'cpf',
    getMask() {
        if (this.documentType === 'cpf') return '999.999.999-99';
        if (this.documentType === 'cnpj') return '99.999.999/9999-99';
        if (this.documentType === 'passport') return '*********';
        return '';
    }
}">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <form class="mx-auto p-2" wire:submit='save'>
                    <h3 class="mb-4 font-semibold text-gray-900 ">Informe como o usuário será identificado</h3>
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex mb-2">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center ps-3">
                                <input wire:model='identification_type' id="cpf" type="radio" value="cpf" name="list-radio" checked x-model="documentType" @change="documentValue=''"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">

                                <label for="cpf"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900">CPF</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center ps-3">
                                <input wire:model='identification_type' id="cnpj" type="radio" value="cnpj" name="list-radio" x-model="documentType" @change="documentValue=''"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="cnpj"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900">CNPJ</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r ">
                            <div class="flex items-center ps-3">
                                <input wire:model='identification_type' id="passport" type="radio" value="passport" name="list-radio" x-model="documentType" @change="documentValue=''"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="passport"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900">PASSAPORTE</label>
                            </div>
                        </li>
                        <li class="w-full ">
                            <div class="flex items-center ps-3">
                                <input wire:model='identification_type' id="other" type="radio" value="other" name="list-radio" x-model="documentType" @change="documentValue=''"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="other"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900">OUTRO</label>
                            </div>
                        </li>
                    </ul>
                    <div class="relative z-0 w-full mb-5 group">
                        <input  type="text" name="identification" wire:model='identification' 
                                x-model="documentValue" 
                                x-mask:dynamic="getMask()"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" ">
                        <label for="identification"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            {{ __('Identificação') }}
                        </label>
                        <x-input-error :messages="$errors->get('identification')" class="mt-2" />
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="name" wire:model='name'
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" ">
                        <label for="name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            {{ __('Name') }}
                        </label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" name="email" wire:model='email'
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" ">
                        <label for="email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            {{ __('E-mail') }}
                        </label>
                    </div>
                    <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
