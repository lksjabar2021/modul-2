<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Virtual Machine') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <div class="grid grid-cols-2 gap-4">
                    <div>{{ __('The list of VM services') }}</div>
                    <div class="flex justify-end">
                      <button class="bg-blue-500 text-white px-3 py-1 font-bold" >
                        <a href="{{ route('vm-create') }}">
                          Create VM
                        </a> 
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Data Table section -->
                <div class="p-6">
                    @if (session('status'))
                    <div class="p-3 text-white bg-green-500 font-bold">
                        {{ session('status') }}
                    </div>
                    @endif
 

                    <div style="overflow-x:auto">
                        <table class="table-auto w-full">
                            <th class="p-3 border-b-2">Hostname</th>
                            <th class="p-3 border-b-2">IP Address</th>
                            <th class="p-3 border-b-2">RAM</th>
                            <th class="p-3 border-b-2">vCPU</th>
                            <th class="p-3 border-b-2">Storage (SSD)</th>
                            <th class="p-3 border-b-2">Action</th>
                            @if (count($vm) > 0)
                            @foreach ($vm as $v)
                            <tr>
                                <td class="p-3 text-center">{{ $v->hostname }}</td>
                                <td class="p-3 text-center">{{ $v->ip_address }}</td>
                                <td class="p-3 text-center">{{ $v->ram }}</td>
                                <td class="p-3 text-center">{{ $v->vcpu }}</td> 
                                <td class="p-3 text-center">{{ $v->ssd }}</td> 
                                <td class="p-3 text-center">
                                    <form action="/vm/delete/{{ $v->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-400 font-bold" type="submit">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" class="text-center p-5">No VM service available</td> 
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
                <!-- end of Data Table section -->  
            </div>
        </div>
    </div>
</x-app-layout>
