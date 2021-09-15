<x-app-layout>
    <x-slot name="header">
        Edit Account Details
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-validation-errors />
                    <x-success-message />
                    <form method="POST" action="{{ route('accounts.update', $account->id) }}">
                        @method('PUT')
                        @csrf
                        <div>
                            <x-label class="block text-sm text-gray-600" for="name"/>Account Number
                            <x-input id="name" class="block w-full mt-1 mb-4" name="account_number" type="text" value="{{ $account->account_number }}" required/>
                            <x-label class="block text-sm text-gray-600" for="name"/>Account Type
                            <select name="account_type" id="account_type" class="block w-full mt-1">
                                <option value="0">--- Type ---</option>
                                <option value="primary">Primary</option>
                                <option value="secondary">Secondary</option>                                
                            </select>
                            @error('name')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <x-label class="block text-sm text-gray-600" for="name"/>Account Balance
                            <x-input id="ac_type" class="block w-full mt-1" name="account_balance" type="text" value="{{ $account->account_balance }}" required/>
                            @error('account_balance')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <x-button>Submit</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

