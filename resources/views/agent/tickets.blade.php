@extends('agent.layout.agent_layout')
@section('agent')

    <div class="flex flex-col">




        <div class="flex flex-col">

          


            <!-- Card Sextion Starts Here -->
            <div id="ticket" class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                <!-- card -->

                <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                    <div class="px-6 py-2 border-b border-light-grey">
                        <div class="font-bold text-xl">
                        
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-grey-darkest">
                            <thead class="bg-gray-400  text-white text-normal">
                                <tr>
                                  <th colspan="6" class='text-center text-indigo-400'>
                                    New Ticket List
                                  </th>
                                </tr>
                              
                              <tr>
                                    <th class="border w-1/6 px-4 py-2">journey type</th>
                                    <th class="border w-1/6 px-4 py-2">class</th>
                                    <th class="border w-1/6 px-4 py-2"> Country</th>
                                    <th class="border w-1/6 px-4 py-2" >Request Payment</th>
                                    <th class="border w-1/6 px-4 py-2">Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($user->userable->tickets()->where('status', '!=', 'Done')->where('status', '!=', 'Cancel')->get()
                           as $ticket)
                                    <tr>


                                        <td class="border px-4 py-2">
                                            {{ $ticket->journey_type }}
                                        </td>

                                        <td class="border px-4 py-2 center">
                                            {{ $ticket->class }}

                                        </td>
                                        <td class="border px-4 py-2 center">

                                            {{ $ticket->ticket_apply_country }}
                                        </td>
                                        <td class="border px-4 py-2 w-12/2">
                                          @if ($ticket->payment)
                                          <a href="/agent/view-ticket/{{ $ticket->id }}"
                                              class="bg-gray-600 cursor-pointer rounded p-1 mx-1 text-white">
                                              <i class="fas fa-upload"></i></a>

                                          Upload Document

                                          <br>






                                      @elseif($ticket->total_payable==null|$ticket->payment==null)

                                          <a href="/agent/view-ticket/{{ $ticket->id }}"
                                              class="bg-gray-600 cursor-pointer rounded p-1 mx-1 text-white">
                                              Update Payment!
                                          </a>

                                      @endif

                                      
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                          {{-- <form action="{{ route('ticket-apply-charges') }}" method="post">
                                                @csrf
                                                <input name='id' value="{{ $ticket->id }}" type=hidden>
                                                <input name='customer_id' value="{{ $ticket->customer_id }}" type=hidden>
                                                <input name='total_payable' value="{{ $ticket->total_payable }}"
                                                    class="appearance-none @error('total_payable') border-red-500 @enderror block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 border-yellow-500   leading-tight focus:outline-none focus:bg-white-500"
                                                    id="total_payable" value="{{ old('charges') }}" type="number"
                                                    placeholder="Charges PKR">
                                            </form> --}}

                                        </td>



                                        <td class="border px-4 py-2">
                                            <a  href="/agent/view-ticket/{{$ticket->id}}"   class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                 <i class="fas fa-eye"></i></a>
                
                                            <a href="/agent/ticket_cancel?id={{ $ticket->id }}"
                                                class="bg-red-700 cursor-pointer rounded p-1 mx-1 text-white">
                                                <i class="fas fa-times bg-red-700"></i></a>


                                        </td>


                                    </tr>
                                 @empty
                                     <tr>
                                         <td colspan="5" class="text-center ">
                                             No Record Found!
                                         </td>
                                     </tr>
                                @endforelse



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/Grid Form-->








        








            <!-- Card Sextion Starts Here -->
            <div id="totalneworder" class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                <!-- card -->

                <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                    <div class="px-6 py-2 border-b border-light-grey">
                        <div class="font-bold text-xl">
                          
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-grey-darkest">
                            <thead class="bg-gray-400  text-white text-normal">
                              <tr>
                                <th colspan="6" class='text-center text-indigo-400'>
                                  Cancelled ticket
                                </th>
                              </tr>
                                <tr>
                                    <th class="border w-1/7 px-4 py-2">journey type</th>
                                    <th class="border w-1/7 px-4 py-2">class</th>
                                    <th class="border w-1/7 px-4 py-2"> Country</th>
                                   <th class="border w-1/7 px-4 py-2">Request Payment</th>
                                    <th class="border w-1/7 px-4 py-2">revoke</th>

                                </tr>
                            </thead>
                            <tbody>


                                @forelse ($user->userable->tickets->where('status', 'Cancel') as $ticket)
                                    <tr>


                                        <td class="border px-4 py-2">
                                            {{ $ticket->journey_type }}
                                        </td>

                                        <td class="border px-4 py-2 center">
                                            {{ $ticket->class }}

                                        </td>
                                        <td class="border px-4 py-2 center">

                                            {{ $ticket->ticket_apply_country }}
                                        </td>
         




                                        <td class="border px-4 py-2">
                                          @if ($ticket->payment)
          
                                              @if ($ticket->payment->refunded)
                                                  <div
                                                      class="bg-green-500 hover:bg-green-800 text-white font-light py-1 px-2 rounded-lg">
                                                      Payment Refunded! {{ $ticket->payment->charges }}
                                                  </div>
                                              @else
                                                  <button
                                                      class="bg-red-500 hover:bg-blue-800 text-white font-light py-1 px-2 rounded-lg">
                                                      Refund request! {{ $ticket->payment->charges }}
                                                  </button>
                                              @endif
          
          
                                          @else
                                              No payment History
          
                                          @endif
          
          
          
          
                                      </td>


                                        <td>
                                            <a  href="/agent/view-ticket/{{$ticket->id}}"   class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                <i class="fas fa-eye"></i></a>
                                              

                                            <a href="/agent/ticket_revoke?id={{ $ticket->id }}"
                                                class="bg-red-700 cursor-pointer rounded p-1 mx-1 text-white">
                                                <i class="fas fa-undo bg-red-700"></i></a>
                                        </td>


                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center ">
                                            No Record Found!
                                        </td>
                                    </tr>
                                @endforelse



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/Grid Form-->

















            <!-- Card Sextion Starts Here -->
            <div id="totalneworder" class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                <!-- card -->

                <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                    <div class="px-6 py-2 border-b border-light-grey">
                        <div class="font-bold text-xl">
                          
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-grey-darkest">
                            <thead class="bg-gray-400  text-white text-normal">
                                <tr>
                                  <tr>
                                    <th colspan="6" class='text-center text-indigo-400'>
                                      Done Tickets
                                    </th>
                                  </tr>
                                    <th class="border w-1/8 px-4 py-2">journey type</th>
                                    <th class="border w-1/8 px-4 py-2">class</th>
                                    <th class="border w-1/8 px-4 py-2"> Country</th>
                                    {{-- <th class="border w-1/3 px-4 py-2">Status</th> --}}
                                    <th class="border w-1/8 px-4 py-2">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user->userable->tickets->where('documents','!=',null) as $ticket)
                                    <tr>


                                        <td class="border px-4 py-2">
                                            {{ $ticket->journey_type }}
                                        </td>

                                        <td class="border px-4 py-2 center">
                                            {{ $ticket->class }}

                                        </td>
                                        <td class="border px-4 py-2 center">

                                            {{ $ticket->ticket_apply_country }}
                                        </td>
      
                                        <td class="border px-4 py-2 center">
                                            <a  href="/agent/view-ticket/{{$ticket->id}}"   class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                                <i class="fas fa-eye"></i></a>
                                              
                                        </td>
      

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center ">
                                            No Record Found!
                                        </td>
                                    </tr>

                                @endforelse



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/Grid Form-->











        </div>



    @stop
