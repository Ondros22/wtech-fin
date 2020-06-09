function csvDownload(a){
    var data = {
        "action": "select",
        "name": a.getAttribute("value"),
        "key": "<?php echo $apiKey?>"
};
$.ajax({
    url: '/final_zadanie/ajax.php?',
    type: 'POST',
    data: data,
}).done(function (data, textStatus, request) {
    var blob = new Blob([data]);

    console.log(request.getAllResponseHeaders())
    var fileName = request.getResponseHeader('filename');

    if (window.navigator && window.navigator.msSaveOrOpenBlob) { // for IE
    window.navigator.msSaveOrOpenBlob(blob, fileName);
    } else {
    var url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.style.display = 'none';
    a.href = url;
    a.download = fileName;
    document.body.appendChild(a);
    a.click();
    window.URL.revokeObjectURL(url);
    }
});
}

function pdfDownload(a){
    var data = {
        "action": "pdfLog",
        "name": a.getAttribute("value"),
        "key": "<?php echo $apiKey?>"
    };
$.ajax({
    url: '/final_zadanie/ajax.php?',
    type: 'POST',
    data: data,
}).done(function (data, textStatus, request) {
    var blob = new Blob([data]);

    console.log(request.getAllResponseHeaders())
    var fileName = request.getResponseHeader('filename');

    if (window.navigator && window.navigator.msSaveOrOpenBlob) { // for IE
    window.navigator.msSaveOrOpenBlob(blob, fileName);
    } else {
    var url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.style.display = 'none';
    a.href = url;
    a.download = fileName;
    document.body.appendChild(a);
    a.click();
    window.URL.revokeObjectURL(url);
    }
});
}