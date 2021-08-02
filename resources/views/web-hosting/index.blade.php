<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Web Hosting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 sm:grid-rows gap-4">
                      <div>{{ __('The list of Web Hosting services') }}</div>
                      <div class="flex justify-end">
                        <button class="bg-blue-500 text-white px-3 py-1 font-bold" >
                          <a href="{{ route('hosting-create') }}">
                            Create Web Hosting
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
                            <th class="p-3 border-b-2">Domain</th>
                            <th class="p-3 border-b-2">IP Address</th>
                            <th class="p-3 border-b-2">RAM</th>
                            <th class="p-3 border-b-2">vCPU</th>
                            <th class="p-3 border-b-2">Storage (SSD)</th>
                            <th class="p-3 border-b-2">Action</th>
                            @if (count($hosting) > 0)
                            @foreach ($hosting as $h)
                            <tr>
                                <td class="p-3 text-center">{{ $h->domain_name }}</td>
                                <td class="p-3 text-center">{{ $h->ip_address }}</td>
                                <td class="p-3 text-center">{{ $h->ram }}</td>
                                <td class="p-3 text-center">{{ $h->vcpu }}</td> 
                                <td class="p-3 text-center">{{ $h->ssd }}</td> 
                                <td class="p-3 text-center">
                                    <form action="/hosting/delete/{{ $h->id }}" method="POST">
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
                                <td colspan="6" class="text-center p-5">No Web Hosting service available</td> 
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
