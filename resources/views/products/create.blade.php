<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{--{{ __("Register!") }}--}}
                    <form id="registerNewProduct" name="registerNewProduct">
                
                        <!-- Nome do produto -->
                        <div x-data="{ open: false }" @click.away="open = false">
                            <label for="name" class="block font-medium text-sm text-gray-900 dark:text-gray-300">Nome do produto:</label>
                            <input @click="open = !open" id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
                            type="text" name="name" required autofocus />
                            <!-- Adaptação de Popover (tailwind)-->
                            <div x-show="open" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                Permite letras, números e espaços
                            </div>
                        </div>
                        <br>

                        <!-- Descrição do produto -->
                        <div x-data="{ open: false }" @click.away="open = false">
                            <label for="description" class="block font-medium text-sm text-gray-900 dark:text-gray-300">Descrição do produto:</label>
                            <input  @click="open = !open" id="description" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="description" autofocus />
                                <!-- Adaptação de Popover (tailwind)-->
                                <div x-show="open" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                    Permite letras, números e espaços
                                </div>
                        </div>
                        <br>

                        <!-- Preço do produto -->
                        <div x-data="{ open: false }" @click.away="open = false">
                            <label for="price" class="block font-medium text-sm text-gray-900 dark:text-gray-300">Preço:</label>
                            <input @click="open = !open" id="price" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="number" step="0.01" name="price" autofocus />
                                <!-- Adaptação de Popover (tailwind)-->
                                <div x-show="open" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                    Permite caracteres númericos inteiros e decimais
                                </div>                
                        </div>
                        <br>

                        <!-- Botão -->
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 
                            border border-transparent rounded-md font-semibold 
                            text-xs text-white dark:text-gray-800 uppercase tracking-widest 
                            hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white 
                            active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 
                            focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 
                            transition ease-in-out duration-150" style="margin-top: 1%">
                            Cadastrar
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
      
</x-app-layout>
