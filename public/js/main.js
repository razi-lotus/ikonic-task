var skeletonId = 'skeleton';
var contentId = 'content';
var skipCounter = 0;
var takeAmount = 10;


function getRequests(mode) {
    $('#suggestion-compo').hide();
    $('#'+skeletonId).removeClass('d-none');
    $.ajax({
        url         : site_url+'/get-requests',
        type        : 'post',
        data        : {"_token" : csrf_token},
        success:function(response) {
            $('#'+skeletonId).hide();
            console.log(response,'res');
            showHideComponent('request-compo-sent')
            $('#request-compo-sent').html(response);
            // $('#request-compo-sent').html(response);
        }
    });
}

function getMoreRequests(mode) {
  // Optional: Depends on how you handle the "Load more"-Functionality
  // your code here...
}

function getConnections() {
  // your code here...
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

function deleteRequest(userId, requestId) {
  // your code here...
}

function acceptRequest(userId, requestId) {
  // your code here...
}

function removeConnection(userId, connectionId) {
  // your code here...
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
        getRequests();
    }else if(id == 'btnradio3') {
        showHideComponent('request-compo-reveive')
    }else if(id == 'btnradio4') {
        showHideComponent('connection-compo')
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
            $('#connection-div-'+id).remove();
        }
    });
}
