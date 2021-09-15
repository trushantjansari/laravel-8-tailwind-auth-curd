<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Latest
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="-my-8 divide-y-2 divide-gray-100">           
                    @guest
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 bg-white border-gray-200">
                                        You need to login
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                       Cjeck
                    @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
