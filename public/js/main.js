var skeletonId = 'skeleton';
var contentId = 'content';
var skipCounter = 0;
var takeAmount = 10;


function getRequests(type) {
    $('#suggestion-compo').hide();
    $('#'+skeletonId).removeClass('d-none');
    $.ajax({
        url         : site_url+'/get-requests',
        type        : 'post',
        data        : {"_token" : csrf_token, type: type},
        success:function(response) {
            $('#'+skeletonId).hide();
            console.log(response,'res');
            if (type == 'Sent') {
                showHideComponent('request-compo-sent')
                $('#request-compo-sent').html(response);
            }else {
                showHideComponent('request-compo-reveive')
                $('#request-compo-reveive').html(response);
            }
        }
    });
}

function getMoreRequests(mode) {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getConnections() {
    $('#suggestion-compo').hide();
    $('#'+skeletonId).removeClass('d-none');
    $.ajax({
        url         : site_url+'/get-connections',
        type        : 'get',
        success:function(response) {
            showHideComponent('connection-compo');
            $('#connection-compo').html(response);
            $('#'+skeletonId).hide();
        }
    });
}

function getMoreConnections() {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getConnectionsInCommon(userId, connectionId) {
  // your code here...
}

function getMoreConnectionsInCommon(userId, connectionId) {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getSuggestions() {
  // your code here...
}

function getMoreSuggestions() {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function sendRequest(userId, suggestionId) {
  // your code here...
}

function deleteRequest(tag) {
    let cancelBtn   = $(tag);
    let id          = cancelBtn.attr('data-id');
    let data        = {
        "_token"    : csrf_token,
        id          : id,
    }
    $.ajax({
        url         : site_url+'/cancel-requet/'+id,
        type        : 'post',
        dataType    : 'json',
        data        : data,
        success:function(response) {
            if (response.status == 200) {
                $('#cancel-request-'+id).remove();
            }
        }
    });
}

function acceptRequest(tag) {
    let acceptBtn   = $(tag);
    let id          = acceptBtn.attr('data-id');
    let data        = {
        "_token"    : csrf_token,
        id          : id,
    }
    $.ajax({
        url         : site_url+'/accept-requet/'+id,
        type        : 'post',
        dataType    : 'json',
        data        : data,
        success:function(response) {
            if (response.status == 200) {
                $('#cancel-request-'+id).remove();
            }
        }
    });
}

function removeConnection(tag) {
    let thisTag = $(tag);
    let id      = thisTag.attr('data-id');
    let data    = {
        "_token"    : csrf_token,
        id          : id,
    }
    $.ajax({
        url         : site_url+'/remove-connect/'+id,
        type        : 'post',
        dataType    : 'json',
        data        : data,
        success:function(response) {
            if (response.status == 200) {
                $('#connection-'+id).remove();
            }
        }
    });
}

$(function () {
  //getSuggestions();
  showHideComponent('suggestion-compo')
});

let componentsIds = ['suggestion-compo', 'request-compo-sent', 'request-compo-reveive', 'connection-compo'];

$('.btn-check').on('click', function(e) {
    let id = e.target.id;
    if(id == 'btnradio1') {
        showHideComponent('suggestion-compo')
    }else if(id == 'btnradio2') {
        getRequests('Sent');
    }else if(id == 'btnradio3') {
        getRequests('Received');
    }else if(id == 'btnradio4') {
        getConnections()
    }
})

function showHideComponent(id) {
    componentsIds.map(function (cId) {
        if (cId == id) {
            $('#'+cId).show();
        }else{
            $('#'+cId).hide();
        }
    });
}

function connectBtn(tag) {
    let thisTag = $(tag);
    let id      = thisTag.attr('data-id');
    let data    = {
        "_token"    : csrf_token,
        id          : id,
    }
    $.ajax({
        url         : site_url+'/connect',
        type        : 'post',
        dataType    : 'json',
        data        : data,
        success:function(response) {
            if (response.status == 200) {
                $('#connection-div-'+id).remove();
            }
        }
    });
}

function cancelRequest(tag) {
    let cancelBtn   = $(tag);
    let id          = cancelBtn.attr('data-id');
    let data        = {
        "_token"    : csrf_token,
        id          : id,
    }
    $.ajax({
        url         : site_url+'/cancel-requet/'+id,
        type        : 'post',
        dataType    : 'json',
        data        : data,
        success:function(response) {
            if (response.status == 200) {
                $('#cancel-request-'+id).remove();
            }
        }
    });
}
