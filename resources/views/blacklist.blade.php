<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blacklist Customer') }}
        </h2>
        <p class="text-gray-500 dark:text-gray-400">Manage Customer list</p>
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
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">ID</th>
               <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Phone</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Rate</th>
              <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
           @foreach($blacklists as $customer)
            <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-gray-200 sm:pl-0">{{$customer->name}}</td>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-gray-200 sm:pl-0">{{
                    $customer->id_number}}</td>
                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500 dark:text-gray-400">{{$customer->phone_number}}</td>
{{--             Rate with stars and fill the remainig of 5 with grey star one line    --}}
    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500 dark:text-gray-400 inline-flex">
        @for ($i = 0; $i < $customer->rate; $i++)
                <svg class="h-5 w-5 fill-current text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M10 12.585l-5.417 3.25 1.084-6.326L.367 6.165l6.326-.917L10 0l3.307 5.248 6.326.917-4.3 3.344 1.084 6.326z"/>
                </svg>

        @endfor
        @for ($i = 0; $i < 5 - $customer->rate; $i++)

                <svg class="h-5 w-5 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M10 12.585l-5.417 3.25 1.084-6.326L.367 6.165l6.326-.917L10 0l3.307 5.248 6.326.917-4.3 3.344 1.084 6.326z"/>
                </svg>

        @endfor
                    </td>
                <td class="relative whitespace-nowrap py-4 pr-4 text-right text-sm font-medium">
                    <a href="{{route('blacklist.remove', $customer->id)}}" class="text-indigo-600 hover:text-indigo-900">Remove</a>
                </td>

            </tr>
            @endforeach

            <!-- More people... -->
          </tbody>

        </table>
          {{ $blacklists->links() }}
      </div>
    </div>
  </div>
</div>
     </div>
</div>
</x-app-layout>
