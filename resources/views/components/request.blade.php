@foreach ($requests as $req)
<div class="my-2 shadow text-white bg-dark p-1" id="cancel-request-{{ $req->id }}">
    <div class="d-flex justify-content-between">
        <table class="ms-1">
            @if ($req->user_id == auth()->user()->id)
                <td class="align-middle">{{ $req->sent->name }}</td>
                <td class="align-middle"> - </td>
                <td class="align-middle">{{ $req->sent->email }}</td>
                <td class="align-middle">
            @else
                <td class="align-middle">{{ $req->recevied->name }}</td>
                <td class="align-middle"> - </td>
                <td class="align-middle">{{ $req->recevied->email }}</td>
                <td class="align-middle">
            @endif
            </table>
            <div>
                @if ($req->user_id == auth()->user()->id)
                    <button id="cancel_request_btn_{{ $req->id }}" data-id="{{ $req->id }}"
                     onclick="deleteRequest(this)" class="btn btn-danger me-1"
                    onclick="">Withdraw Request</button>
                @else
                    <button id="accept_request_btn_{{ $req->id }}" data-id="{{ $req->id }}"
                         class="btn btn-primary me-1"
                    onclick="acceptRequest(this)">Accept</button>
                @endif
            </div>
        </div>
    </div>
@endforeach
