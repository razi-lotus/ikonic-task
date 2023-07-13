@foreach ($commons as $conn)
    <div class="p-2 shadow rounded mt-2  text-white bg-dark">
        {{ $conn->commonUser->name }} - {{ $conn->commonUser->email }}
    </div>
@endforeach
