<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Your active services
                </div>

                <div class="p-4"></div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="p-3">
                        <a href="{{ route('vm') }}">
                          <!-- Card title -->
                          <div class="p-3 bg-green-500 text-white font-bold text-center">
                              <h1><i class="fas fa-hdd"></i> Virtual Machine</h1>
                          </div> 
                          <!-- end of Card title -->

                          <!-- Card Body -->
                          <div class="p-4 bg-green-400 text-white font-bold text-center">
                              <h1 class="text-5xl">{{ $vm_numbers }}</h1>
                          </div>
                          <!-- end of Card Body -->
                        </a>
                    </div>
                    <div class="p-3">
                        <a href="{{ route('hosting') }}">
                          <!-- Card title -->
                          <div class="p-3 bg-red-500 text-white font-bold text-center">
                              <h1><i class="fas fa-desktop"></i> Web Hosting</h1>
                          </div> 
                          <!-- end of Card title -->

                         <!-- Card Body -->
                          <div class="p-4 bg-red-400 text-white font-bold text-center">
                              <h1 class="text-5xl">{{ $hosting_numbers }}</h1>
                          </div>
                          <!-- end of Card Body -->
                        </a>
                    </div>

                    <div class="p-4"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
