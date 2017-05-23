/**
 * Created by Mathias Grauwels.
 */
function getId(id){
    var url = "http://192.168.126.134/~user/monkeyBusiness/wp1/";
    fetch(url + id, {
        method: 'GET'
    }).then(function (response) {
        return response.json();
    }).then (function (j) {
        printEvent(j[0]);
    });
}
function printEvent(event) {
    var div = document.getElementById("eventDiv");
    div.innerHTML = event.id;
    div.innerHTML = div.innerHTML + "<br>";
    div.innerHTML = div.innerHTML + "id " + event.event_id;
    div.innerHTML = div.innerHTML + "<br>";
    div.innerHTML = div.innerHTML + event.event_start_date;
    div.innerHTML = div.innerHTML + "<br>";
    div.innerHTML = div.innerHTML + event._end_date;
    div.innerHTML = div.innerHTML + "<br>";
    div.innerHTML = div.innerHTML + event.event_name;
}

function deleteID() {
    var delID = document.getElementById("delID").value;
    if (confirm('Do you want to delete evenement ' + delID + '?')) {
        fetch(url + delID, {
            method: 'DELETE'
        }).then (
            window.location.reload()
        );
    }
}




