<div>
    <div class="max-w-7xl mx-auto py-auto sm:px-6 lg:px-8">
        <h1 class="text-4xl py-6 font-bold h-24"></h1>
        <form method="post" wire:submit.prevent="create" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-8">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                            @error('nome') <p><span class="text-red-500">{{ $message }}</span></p> @enderror
                            <input type="text" wire:model="nome" name="nome" id="nome"
                            class=" border focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md py-2 px-3 bg-white" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" wire:model="email" name="Email" id="email"
                                    class=" border focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md py-2 px-3 bg-white" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Salvar
                    </button>
                    <button wire:click="listSales" type="button"
                          class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          Listar vendas
                      </button>
                </div>
            </div>
        </form>
    </div>
    <div class="max-w-none mx-auto">
          <div class="bg-white overflow-hidden shadow sm:rounded-lg">
              <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                  <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                      <h1 class="text-2xl py-6 font-bold h-8">Vendedores</h1>
                  </div>
              </div>
              <ul role="list" class="divide-y divide-gray-200">
                  @if ($sellers)
                      @foreach ($sellers as $seller)
                          <li>
                              <div class="px-4 py-4 sm:px-6">
                                  <div class="flex items-center justify-between">
                                      <div class="text-sm font-medium text-indigo-600 truncate">
                                          {{ $seller->nome }}
                                      </div>
                                  </div>
                                  <div class="mt-2 flex justify-between">
                                      <div class="sm:flex">
                                          <div class="mr-6 flex items-center text-sm text-gray-500">
                                              {{ $seller->email }}
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </li>
                      @endforeach
                  @else
                      <li>
                          <div class="px-4 py-4 sm:px-6">
                              <div class="flex items-center justify-between">
                                  <div class="text-sm font-medium text-indigo-600 truncate">
                                      Nenhuma vendedor cadastrado
                                  </div>
                              </div>
                          </div>
                      </li>
                  @endif

              </ul>

          </div>
      </div>
</div>
