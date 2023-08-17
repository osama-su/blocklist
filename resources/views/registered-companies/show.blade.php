<x-app-layout>
    <x-slot name="header">
{{-- Back Arrow --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{
    isset($registeredCompany->status) && $registeredCompany->status == 'pending' ? route('pending-requests') : route('registered-companies')
    }}">
                    <svg class="h-6 w-6 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-gray-200">

                    <a href="{{route('registered-companies.show', $registeredCompany->id)}}">{{$registeredCompany->name}}</a>
{{--                    status --}}
                    <span class="ml-1 text-sm text-gray-500 dark:text-gray-400">
                        @if($registeredCompany->status == 'pending')
                            <span class="px-2 inline-flex text-s leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Pending
                            </span>
                        @elseif($registeredCompany->status == 'approved')
                            <span class="px-2 inline-flex text-s leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Approved
                            </span>
                        @elseif($registeredCompany->status == 'rejected')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Rejected
                            </span>
                        @endif
                </div>
            </div>
        </div>
{{-- End Back Arrow --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
   <div class="w-[1040px] h-[125px] relative">
    <div class="w-[1040px] h-[125px] left-0 top-0 absolute bg-white rounded-xl"></div>
    <div class="w-[61px] h-[0px] left-[267px] top-[93px] absolute origin-top-left -rotate-90 border border-slate-200"></div>
    <div class="w-[61px] h-[0px] left-[505px] top-[93px] absolute origin-top-left -rotate-90 border border-slate-200"></div>
    <div class="w-[61px] h-[0px] left-[763px] top-[93px] absolute origin-top-left -rotate-90 border border-slate-200"></div>
    <div class="w-[155px] h-[61px] left-[56px] top-[32px] absolute">
        <div class="left-[35px] top-[41px] absolute text-stone-900 text-base font-normal">{{$registeredCompany->registration_number}}</div>
        <div class="left-0 top-0 absolute text-center text-gray-400 text-sm font-bold">Registration Number</div>
    </div>
    <div class="w-[78px] h-[61px] left-[347px] top-[32px] absolute">
        <div class="left-0 top-[41px] absolute text-center text-stone-900 text-base font-normal">{{$registeredCompany->industry}}</div>
        <div class="left-[8px] top-0 absolute text-center text-gray-400 text-sm font-bold">Industry</div>
    </div>
    <div class="w-[129px] h-[61px] left-[570px] top-[32px] absolute">
        <div class="left-0 top-[41px] absolute text-center text-stone-900 text-base font-normal">{{$registeredCompany->email}}</div>
        <div class="left-[43px] top-0 absolute text-center text-gray-400 text-sm font-bold">Email</div>
    </div>
    <div class="w-[117px] h-[61px] left-[843px] top-[32px] absolute">
        <div class="left-0 top-[41px] absolute text-center text-stone-900 text-base font-normal">{{$registeredCompany->phone_number}}</div>
        <div class="left-[35px] top-0 absolute text-center text-gray-400 text-sm font-bold">Phone</div>
    </div>
</div>
        </div>
    </div>

    @if ($registeredCompany->status == 'pending')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="text-center text-stone-900 text-lg font-bold">Pending Request</div>
        <div class="text-center text-slate-600 text-s font-normal">Approve Company Registration to Access Platform </div>
        <div class="text-center text-slate-600 text-s font-normal">Features and Services</div>
{{--            Approve button --}}
            <div class="flex items-center justify-center mt-6">
                <a href="{{route('pending-requests.approve', $registeredCompany->id)}}" class="bg-violet-900 hover:bg-violet-500 text-white font-bold py-2 px-4 rounded">
                    <div class="">Approve Request</div>
                </a>
            </div>
        </div>
    </div>
    @elseif ($registeredCompany->status == 'approved')
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
    @endif


</x-app-layout>
