fileInp = document.getElementById("qr_input"),
infoText = document.getElementById("pp"),
watcher = document.getElementById("watcher"),
qr = document.getElementById("qr_data"),
stuid = document.getElementById("inputstuid");
function fetchRequest(file, formData) {
    watcher.value = "";
    document.getElementById("qr_data").value = "";
    infoText.innerText = "Scanning QR Code...";
    fetch("http://api.qrserver.com/v1/read-qr-code/", {
        method: 'POST', body: formData
    }).then(res => res.json()).then(result => {
        result = result[0].symbol[0].data;
        //infoText.innerText = result ? "Scanned Successfully" : "Couldn't scan QR Code, Please Select Clearer Image";
        if(result === null) {
            infoText.innerText = "Couldn't scan QR Code, Please Select Clearer Image";

        }
        else if(result !== null){
            document.getElementById("qr_data").value = result;
            let stuid_val = document.getElementById("inputstuid").value;
            let lname_val = document.getElementById("inputLast").value;
            let lname_val_up = lname_val.toUpperCase()
            verifying_info_id = result.search(stuid_val);
            verifying_info_lname = result.search(lname_val_up);
            if((verifying_info_id !== -1) && (stuid_val !== "TUPC-")){
                infoText.innerText = "Scanned Successfully";
                watcher.value = "1";
            }
            else{
                infoText.innerText ="Invalid QR Code";
                watcher.value = "0";
                stuid.value = "TUPC-";
                
            }

        }
        
    }).catch(() => {
        infoText.innerText = "System Error";
    });
}

fileInp.addEventListener("change", async e => {
    let file = e.target.files[0];
    if(!file) return;
    let formData = new FormData();
    formData.append('file', file);
    fetchRequest(file, formData);
});

