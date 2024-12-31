<div class="py-4">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">


                <form class="p-4 mx-auto" wire:submit='save'>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" wire:model='customer_name'
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ __('Customer name') }}</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" wire:model='customer_email'
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ __('Customer email') }}</label>

                    </div>



                    <div
                        class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h3
                            class="p-4 flex flex-wrap font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                            {{ __('Products') }}
                        </h3>
                        <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel"
                            aria-labelledby="about-tab">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="w-2/3 px-6 py-3">
                                            Product
                                        </th>
                                        <th scope="col" class="w-1/3 px-6 py-3">
                                            Quantity
                                        </th>
                                        <th scope="col" class="px-6 py-3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderProducts as $key => $orderProduct)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <select name="orderProducts[{{$key}}]['product_id']"
                                                    wire:model='orderProducts.{{$key}}.product_id'
                                                class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                                <option selected>-- choose product --</option>
                                                @foreach ($allProducts as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }} (R$ {{ $product->price }})</option>
                                                @endforeach
                                            </select>
                                        </th>
                                        <td class="px-6 py-4">
                                            <input type="number" name="orderProducts[{{$key}}][quantity]"
                                            wire:model='orderProducts.{{$key}}.quantity'
                                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " required />
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" wire:click.prevent="removeProduct({{$key}})">{{ __('Delete') }}</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="py-4">
                                <x-primary-button type="button" wire:click='addProduct'>{{ __('+ Add another product') }}</x-primary-button>
                            </div>
                        </div>



                    </div>
                    <div class="py-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                    

                </form>

            </div>
        </div>
    </div>
</div>
