<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Firdaus Akbar Amrullah 6706223004 -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <th class="p-4">Nama Koleksi</th>
                                    <td class="p-4">{{ $collection->namaKoleksi }}</td>
                                </tr>
                                <tr>
                                    <th class="p-4">Jenis Koleksi</th>
                                   <td class="p-4">
                                    @if ( $collection->jenisKoleksi == 1   )
                                    <span>Buku</span>  
                                  @elseif  (    $collection->jenisKoleksi == 2 )
                                      <span>Majalah</span>
                                      @else
                                      <span>Cakram Digital</span>
                                  @endif
                                   </td>
                                </tr>
                                <tr>
                                    <th class="p-4">Jumlah Koleksi</th>
                                    <td class="p-4">{{ $collection->jumlahKoleksi }}</td>
                                </tr>
                               
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
