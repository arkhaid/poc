@extends('layout')
 
@section('content')
<div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
  @if(session()->has('token'))
  <div class="px-4 py-5 sm:px-6">
    Your API Token: {{ session('token') }} 
    <br><span style="color: red">(ONLY SHOW UP ONCE, KEEP IN SECRET)</span>
  </div>
  @endif
  <div class="px-4 py-5 sm:px-6">
    <h2 class="text-xl">Wheather in {{ $response['weather']['name'] }}</h2>
  </div>
  <div class="px-4 py-5 sm:p-6">
    <ul>
        <li>Temp: {{ $response['weather']['main']['temp'] }}</li>
        <li>Pressure: {{ $response['weather']['main']['pressure'] }}</li>
        <li>Humidity: {{ $response['weather']['main']['humidity'] }}</li>
        <li>Temp min: {{ $response['weather']['main']['temp_min'] }}</li>
        <li>Temp max: {{ $response['weather']['main']['temp_max'] }}</li>
    </ul>
  </div>
  <div class="px-4 py-5 sm:px-6">
    <h2 class="text-xl">User Data</h2>
  </div>
  <div class="px-4 py-4 sm:px-6">
    <ul>
        <li>id: {{ $response['user']['id'] }}</li>
        <li>first_name: {{ $response['user']['first_name'] }}</li>
        <li>last_name: {{ $response['user']['last_name'] }}</li>
        <li>email: {{ $response['user']['email'] }}</li>
        <li>profile: {{ $response['user']['profile_picture'] }}</li>
        <li>status: {{ $response['user']['status'] }}</li>
        <li>created_at: {{ $response['user']['created_at'] }}</li>
        <li>updated_at: {{ $response['user']['updated_at'] }}</li>
    </ul>
  </div>
</div>
@endsection