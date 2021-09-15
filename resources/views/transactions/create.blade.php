<x-app-layout>
    <x-slot name="header">
        Add Account
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <x-validation-errors />
                    <x-success-message />
                    <form method="POST" action="{{ route('transactions.store') }}">
                    @csrf
                        <div class="mb-4">
                            <x-label for="account">Account</x-label>
                            <select name="account_id" id="account" class="block w-full mt-1">
                                <option value="0">--- SELECT ACCOUNT ---</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}"
                                            @if ($account->id == old('account')) selected @endif >{{ $account->account_number }}</option>
                                @endforeach
                            </select>
                            @error('account')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label class="block text-sm text-gray-600" for="name"/>Transaction Title
                            <x-input id="ac_number" class="block w-full mt-1" name="transaction_title" type="text" required/>
                            @error('transaction_title')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-label class="block text-sm text-gray-600" for="name"/>Transaction Amount
                            <x-input id="ac_type" class="block w-full mt-1" name="transaction_amt" type="text" required/>
                            @error('transaction_amt')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-label for="transaction_type">Transaction Type</x-label>
                            <select name="transaction_type" id="transaction_type" class="block w-full mt-1">
                                <option value="0">--- Type ---</option>
                                <option value="credit">Credit</option>
                                <option value="debit">Debit</option>
                                
                            </select>
                            @error('transaction_type')
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

