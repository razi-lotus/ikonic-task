@foreach ($connections as $con)
    <div class="my-2 shadow text-white bg-dark p-1" id="connection-{{ $con->id }}">
    <div class="d-flex justify-content-between">
        <table class="ms-1">
        <td class="align-middle">{{ $con->user->name }}</td>
        <td class="align-middle"> - </td>
        <td class="align-middle">{{ $con->user->email }}</td>
        <td class="align-middle">
        </table>
        <div>
        <button style="width: 220px" id="get_connections_in_common_" class="btn btn-primary" type="button"
            data-bs-toggle="collapse" data-bs-target="#collapse_{{ $con->id }}"
             aria-expanded="false" aria-controls="collapseExample">
            Connections in common ({{ count($con->connectionInCommon) }})
        </button>
        <button id="create_request_btn_" data-id="{{ $con->id }}" onclick="removeConnection(this)"
         class="btn btn-danger me-1">Remove Connection</button>
        </div>

    </div>
    <div class="collapse" id="collapse_{{ $con->id }}">

        <div id="content_" class="p-2">
            <x-connection_in_common :commons="$con->connectionInCommon" />
        </div>
        <div class="d-flex justify-content-center w-100 py-2">
        <button class="btn btn-sm btn-primary" id="load_more_connections_in_common_">Load
            more</button>
        </div>
    </div>
    </div>
@endforeach
