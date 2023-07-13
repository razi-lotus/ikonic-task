@extends('layouts.app')

@section('content')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        var site_url = "{{ url('/') }}";
        var csrf_token  = '{{csrf_token()}}';
    </script>
  <script src="{{ asset('js/helper.js') }}?v={{ time() }}" defer></script>
  <script src="{{ asset('js/main.js') }}?v={{ time() }}" defer></script>

  <div class="container">
    <x-dashboard />

    <x-network_connections :users="$suggestionsData['users']"
        :sentReqs="$suggestionsData['sentReqs']"
        :receivedReqs="$suggestionsData['receivedReqs']"
        :connectionsCount="$suggestionsData['connectionsCount']"
    />
  </div>
@endsection
