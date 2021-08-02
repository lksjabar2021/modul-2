<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Virtual Machine') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Head section -->
                <div class="p-6 bg-white border-b border-gray-200">
                  <div class="grid grid-cols-2 gap-4">
                    <div>
                      {{ __('Create a virtual machine') }}
                    </div>
                    <div class="flex justify-end">
                      <button class="bg-red-500 text-white px-3 py-1 font-bold">
                        <a href="{{ route('vm') }}">
                          Back
                        </a>
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Form section -->
                <div class="p-6">
                  <!-- error message -->
                  @if ($errors->any())
                    <div class="p-3 bg-red-500 text-white font-bold">
                      <ul>
                        @foreach ($errors->all() as $e)
                          <li>{{ $e }}</li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="p-3"></div>
                  @endif
                  <!-- end -->
                  <form class="" method="post" action="{{ route('vm-create-post') }}">
                    @csrf
                    <div class="py-2">
                      <label class="block">Hostname</label>
                      <input class="rounded border-gray-300" type="text" name="hostname" required>
                    </div>
                    <div class="py-2">
                      <label class="block">IP Address</label>
                      <input class="rounded border-gray-300" type="text" name="ip_address" required>
                    </div>
                    <div class="py-2">
                      <label class="block">RAM</label>
                      <select class="block border-gray-300" name="ram" required>
                        <option value="1 GB">1 GB</option>
                        <option value="2 GB">2 GB</option> 
                        <option value="4 GB">4 GB</option> 
                        <option value="8 GB">8 GB</option>
                      </select>
                    </div> 
                    <div class="py-2">
                      <label class="block">vCPU</label>
                      <select class="block border-gray-300" name="vcpu" required>
                        <option value="1 Core">1 Core</option>
                        <option value="2 Core">2 Core</option> 
                        <option value="4 Core">4 Core</option> 
                        <option value="8 Core">8 Core</option>
                      </select>
                    </div> 
                    <div class="py-2">
                      <label class="block">Storage (SSD)</label>
                      <select class="block border-gray-300" name="ssd" required>
                        <option value="20 GB">20 GB</option>
                        <option value="40 GB">40 GB</option> 
                        <option value="70 GB">70 GB</option> 
                        <option value="120 GB">120 GB</option>
                      </select>
                    </div> 
                    <div class="py-5"></div>
                    <div class="py-2">
                      <a class="px-5 py-1 text-gray-500 font-bold" href="{{ route('vm') }}">Cancel</a> 
                      <input class="px-3 py-1 bg-blue-500 text-white font-bold" type="submit" value="Create VM">
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
