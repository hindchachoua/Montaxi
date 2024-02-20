<x-app-layout>
  @role('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12" style="background-image: linear-gradient(to left, rgb(210, 210, 210), rgb(171, 87, 199));">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 " style="font-family: 'Times New Roman', Times, serif; text-align: center">
                  {{ __("Welcome Admin!") }}
              </div>
          </div>
      </div>
      
  </div>
  <div class="main-banner" id="top" style="background-image: linear-gradient(to left, rgb(210, 210, 210), rgb(171, 87, 199));">
              <div class="container">
                <div class="row">
                  <div class="col-lg-7" style=" text-align: center;">
                    <h1 class="text-white mb-4 " style="font-size: 50px; font-weight: bold; margin-top: 150px;">{{ __('Welcome To MonGrandTaxi!!') }}</h1>
                    {{-- <a href="{{ route('driver.index')}}" style="font-size: 14px;color: #fff; background-color: #35004e; padding: 12px 30px;border-radius: 25px;">Add now</a> --}}
                    
                  </div>
                  <div class="col-lg-5 " style="margin-top: 150px;margin-bottom: 100px">
                    <img src="{{ asset('storage/images/taxi.png') }}" alt="" >
                  </div>
                </div>
              </div>
          </div>
    @else
    @role('driver')
    <div class="py-12" style="background-image: linear-gradient(to left, rgb(210, 210, 210), rgb(171, 87, 199));">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 " style="font-family: 'Times New Roman', Times, serif; text-align: center">
                    {{ __("Welcome Driver!") }}
                </div>
            </div>
        </div>
        
    </div>
    <div class="main-banner" id="top" style="background-image: linear-gradient(to left, rgb(210, 210, 210), rgb(171, 87, 199));">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-7" style=" text-align: center;">
                      <h1 class="text-white mb-4 " style="font-size: 50px; font-weight: bold; margin-top: 150px;font-family: 'Times New Roman', Times, serif">{{ __('Add your taxi!!') }}</h1>
                      <a href="{{ route('driver.index')}}" style="font-size: 14px;color: #fff; background-color: #35004e; padding: 12px 30px;border-radius: 25px;">Add now</a>
                      
                    </div>
                    <div class="col-lg-5 " style="margin-top: 150px;margin-bottom: 100px">
                      <img src="{{ asset('storage/images/taxi.png') }}" alt="" >
                    </div>
                  </div>
                </div>
            </div>


    @else
    @role('passenger')
    <div class="py-12" style="background-image: linear-gradient(to left, rgb(210, 210, 210), rgb(171, 87, 199));">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6" style="font-family: 'Times New Roman', Times, serif; text-align: center">
                    {{ __("Welcome Passenger!") }}
                </div>
            </div>
        </div>
        
    </div>
    <div class="main-banner" id="top" style="background-image: linear-gradient(to left, rgb(210, 210, 210), rgb(171, 87, 199));">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-7" style=" text-align: center;">
                      <h1 class="text-white mb-4 " style="font-size: 50px; font-weight: bold; margin-top: 150px;font-family: 'Times New Roman', Times, serif">{{ __('Book your taxi now!!') }}</h1>
                      <a href="{{ route('passenger.home')}}" style="font-size: 14px;color: #fff; background-color: #35004e; padding: 12px 30px;border-radius: 25px;">Book now</a>
                      
                    </div>
                    <div class="col-lg-5 " style="margin-top: 150px;margin-bottom: 100px">
                      <img src="{{ asset('storage/images/taxi.png') }}" alt="" >
                    </div>
                  </div>
                </div>
            </div>

    @endrole
    @endrole
    @endrole
</x-app-layout>
@include('layouts.footer')