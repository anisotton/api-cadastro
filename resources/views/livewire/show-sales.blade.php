  <div>
      <div class="max-w-7xl mx-auto py-auto sm:px-6 lg:px-8">
          <h1 class="text-4xl py-6 font-bold h-24"></h1>
          <form method="post" wire:submit.prevent="create" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-8">
              <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-white sm:p-6">
                      <div class="grid grid-cols-6 gap-6">
                          <div class="col-span-6 sm:col-span-3">
                              <label for="vendedor" class="block text-sm font-medium text-gray-700">Vendedor</label>
                              @error('vendedor') <p><span class="text-red-500">{{ $message }}</span></p> @enderror
                              <select wire:model="vendedor" id="vendedor" name="vendedor"
                                  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                  <option>Selecione um vendedor</option>
                                  @foreach ($sellers as $seller)
                                      <option value="{{ $seller->id }}">{{ $seller->nome }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-span-6 sm:col-span-3">
                              <label for="first-name" class="block text-sm font-medium text-gray-700">Valor da
                                  venda</label>
                              <div class="mt-1 relative rounded-md shadow-sm">
                                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                      <span class="text-gray-500 sm:text-sm">
                                          R$
                                      </span>
                                  </div>
                                  <input type="text" wire:model="valor" name="valor" id="valor"
                                      class=" border focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md py-2 px-3 bg-white"
                                      placeholder="00,00">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                      <button type="submit"
                          class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          Lançar venda
                      </button>
                      <button wire:click="listSales" type="button"
                          class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          Listar vendas
                      </button>
                      <button wire:click="addSeller" type="button"
                          class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          Adicionar vendedor
                      </button>
                  </div>
              </div>
          </form>
      </div>



      <div class="max-w-none mx-auto">
          <div class="bg-white overflow-hidden shadow sm:rounded-lg">
              <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                  <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                      <h1 class="text-2xl py-6 font-bold h-8">Vendas</h1>
                  </div>
              </div>
              <ul role="list" class="divide-y divide-gray-200">
                  @if ($sales)
                      @foreach ($sales as $sale)
                          <li>
                              <div class="px-4 py-4 sm:px-6">
                                  <div class="flex items-center justify-between">
                                      <div class="text-sm font-medium text-indigo-600 truncate">
                                          {{ $sale->seller->nome }}
                                      </div>
                                      <div class="ml-2 flex-shrink-0 flex">
                                          R$ {{ $sale->valor }}
                                      </div>
                                  </div>
                                  <div class="mt-2 flex justify-between">
                                      <div class="sm:flex">
                                          <div class="mr-6 flex items-center text-sm text-gray-500">
                                              {{ $sale->data }}
                                          </div>
                                      </div>
                                      <div class="flex items-center text-sm text-gray-500">
                                          <span
                                              class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                              R$ {{ ($sale->seller->comissao / 100) * $sale->valor }}
                                          </span>

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
                                      Nenhuma venda para listar
                                  </div>
                              </div>
                          </div>
                      </li>
                  @endif

              </ul>

          </div>
      </div>

  </div>
