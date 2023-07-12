@foreach ($users as $user)
<div class="my-2 shadow  text-white bg-dark p-1" id="connection-div-{{ $user->id }}">
    <div class="d-flex justify-content-between">
        <table class="ms-1">
            <td class="align-middle">{{ $user->name }}</td>
            <td class="align-middle"> - </td>
            <td class="align-middle">{{ $user->email }}</td>
            <td class="align-middle">
        </table>
        <div>
            <button id="create_request_btn_{{ $user->id }}"
                 onclick="connectBtn(this)"
                 class="btn btn-primary me-1"
                 data-id="{{ $user->id }}"
            >Connect</button>
        </div>
    </div>
</div>
@endforeach
