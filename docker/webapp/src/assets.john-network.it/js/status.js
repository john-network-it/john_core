$(document).ready(function () {
    console.log("[J.O.H.N.] Getting data from the server...")  
    modal("question", "Getting data from the server...", 1000)
    $.ajax({ 
        type: 'GET', 
        url: 'https://api.john-network.it/servicestatus/get/all', 
        success: function (data) { 
            console.log("[J.O.H.N.] Server data loaded.")
            console.log("[J.O.H.N.] Loading layout...")
            $.each(data, function(index) {
                var container = `
                <div class="col-xl-4">
                    <div class="card mb-3 server" id="${data[index].id}">
                        <div class="card-header d-flex align-items-center bg-white bg-opacity-15">
                            <span class="badge border border-success text-success text-uppercase status" id="s${data[index].id}_status">-</span>
                            <span class="m-1 flex-grow-1 fw-400" id="s${data[index].id}_name">-</span>
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex px-3">
                                <div class="me-3 pt-1">
                                    <i class="fas fa-server fa-fw fa-lg"></i>
                                </div>
                                <div class="flex-fill">
                                    <div class="text-white text-opacity-50 mb-2">Hostname: <span class="hostname" id="s${data[index].id}_hostname"></span></div>
                                    <div class="text-white text-opacity-50 mb-2">IPv4: <span class="ipv4" id="s${data[index].id}_ipv4"></span></div>
                                    <div class="text-white text-opacity-50 mb-2">Port: <span class="port" id="s${data[index].id}_port"></span></div>
                                    <div class="mb-1">
                                        <span class="badge border border-gray-300 text-gray-300 small last_check" id="s${data[index].id}_last_check">-</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>
                    </div>
                </div>
                `;
                document.getElementById("slist").innerHTML += container;
                console.log("[J.O.H.N.] Data loaded successfully.")
                modal("success", "Data loaded successfully.", 2000)
            })
        },
        error: function() {
            console.log("[J.O.H.N.] An error occured while loading the data.");
            modal("error", "An error occured while loading the data.", 2000)
            return;
        }
    });
    function refreshData() {
        $.ajax({ 
            type: 'GET', 
            url: 'https://api.john-network.it/servicestatus/get/all', 
            success: function (data) { 
                var serverlist = document.getElementsByClassName("server");
                if(serverlist.length <= 0 || serverlist.length == null) {
                    window.location.reload();
                }
                $.each(data, function(index) {
                    console.log("[J.O.H.N.] Refreshing all data from server...")
                    document.getElementById("s"+data[index].id+"_name").innerHTML = data[index].name;
                    document.getElementById("s"+data[index].id+"_status").innerHTML = data[index].status;
                    document.getElementById("s"+data[index].id+"_hostname").innerHTML = data[index].hostname;
                    document.getElementById("s"+data[index].id+"_ipv4").innerHTML = data[index].ipv4;
                    document.getElementById("s"+data[index].id+"_port").innerHTML = data[index].port;
                    document.getElementById("s"+data[index].id+"_last_check").innerHTML = data[index].last_check;

                    if(data[index].status == "Online") {
                        document.getElementById("s"+data[index].id+"_status").setAttribute("class", "badge border border-success text-success text-uppercase status");
                        return;
                    }
                    if(data[index].status == "Warning" || data[index].status == "Maintenance") {
                        document.getElementById("s"+data[index].id+"_status").setAttribute("class", "badge border border-warning text-warning text-uppercase status");
                        return;
                    }  
                    if(data[index].status == "Offline") {
                        document.getElementById("s"+data[index].id+"_status").setAttribute("class", "badge border border-danger text-danger text-uppercase status");
                        return;
                    }
                })
            },
            error: function() {
                console.log("[J.O.H.N.] An error occured while refreshing the data from the server.");
                modal("error", "An error occured while refreshing the data from the server.", 2500)
                var statuslist = document.getElementsByClassName("status");
                for (var statusindex = 0; statusindex < statuslist.length; ++statusindex) {
                    statuslist[statusindex].innerHTML = "Unknown";
                    statuslist[statusindex].setAttribute("class", "badge border border-light text-light text-uppercase status");
                }
                var hostnamelist = document.getElementsByClassName("hostname");
                for (var hostnameindex = 0; hostnameindex < hostnamelist.length; ++hostnameindex) {
                    hostnamelist[hostnameindex].innerHTML = "-";
                }
                var ipv4list = document.getElementsByClassName("ipv4");
                for (var ipv4index = 0; ipv4index < ipv4list.length; ++ipv4index) {
                    ipv4list[ipv4index].innerHTML = "-";
                }
                var portlist = document.getElementsByClassName("port");
                for (var portindex = 0; portindex < portlist.length; ++portindex) {
                    portlist[portindex].innerHTML = "-";
                }
                var datelist = document.getElementsByClassName("last_check");
                for (var dateindex = 0; dateindex < datelist.length; ++dateindex) {
                    datelist[dateindex].innerHTML = "Not Available";
                }
                return;
            }
        });
        setTimeout(refreshData, 5000);
    }
    refreshData();
});
function modal(type, message, duration) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: duration,
        timerProgressBar: true,
    })
    Toast.fire({
        icon: type,
        title: message
    })
}
