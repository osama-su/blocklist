<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pending Requests') }}
        </h2>
        <p class="text-gray-500 dark:text-gray-400">Manage Companies Accounts</p>
    </x-slot>

<div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
    </div>
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
    </div>
  </div>
  <div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <table class="min-w-full divide-y divide-gray-300">
          <thead>
            <tr>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 sm:pl-0">Name</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Reg. No.</th>
               <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Industry</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Email</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Phone</th>
              <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
           @foreach($pendingRequests as $company)
            <tr>
                <td
                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-gray-200 sm:pl-0">
                         <a href="{{route('registered-companies.show', $company->id)}}">
                        {{$company->name}}
                        </a>
                </td>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-gray-200 sm:pl-0">{{
                    $company->registration_number}}</td>
                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500 dark:text-gray-400">{{$company->industry}}</td>
                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500 dark:text-gray-400">{{$company->email}}</td>
                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500 dark:text-gray-400">{{$company->phone_number}}</td>
                <td class="relative whitespace-nowrap py-4 pr-4 text-right text-sm font-medium">
                    <a href="{{route('pending-requests.approve', $company->id)}}" class="text-indigo-600 hover:text-indigo-900">Approve</a>
                </td>
                    </td>



            </tr>
            @endforeach

            <!-- More people... -->
          </tbody>

        </table>
          {{ $pendingRequests->links() }}
      </div>
    </div>
  </div>
</div>
     </div>
</div>
</x-app-layout>
