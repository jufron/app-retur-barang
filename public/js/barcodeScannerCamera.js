
const inputBarcode = document.querySelector('#barcode');

const buttonShowModal = document.querySelector('#barcode-show-modal');
const modalElement = document.querySelector('#show-modal');
const myModal = new bootstrap.Modal(modalElement, { backdrop: 'static', keyboard: false });

const videoElement = document.getElementById('camera-stream');
const resultElement = document.getElementById('barcode-result');

buttonShowModal.addEventListener('click', () => {
  myModal.show();

  checkCameraSupport();

    Quagga.init({
        inputStream : {
            name : "Live",
            type : "LiveStream",
            constraints: {
                facingMode: "environment", // Rear camera
                width: { ideal: 1280 },    // Resolusi horizontal ideal
                height: { ideal: 720 },    // Resolusi vertikal ideal
            },
            // target: document.querySelector('#cameraScanner')    // Or '#yourElement' (optional)
            target: videoElement
        },
        decoder : {
            readers : [
                "ean_reader",       // EAN-13
                // "ean_8_reader",     // EAN-8
                "upc_reader",       // UPC-A
                // "code_128_reader"   // Code 128
            ]
        },
        locator: {
            patchSize: "large", // x-small, small, medium, large, x-large
        },
    }, function(err) {
        if (err) {
            console.log(err);
            return
        }
        console.log("Initialization finished. Ready to start");
        Quagga.start();
        // Quagga.stop();
    });

    Quagga.onDetected(function(result) {
        const code = result.codeResult.code;
        const barcodeType = result.codeResult.format;

        if (code && barcodeType) { // Validasi jika barcode berhasil

            resultElement.innerText = code;
            inputBarcode.value = code;

            Quagga.stop(); // Hentikan kamera
            myModal.hide(); // Tutup modal

            getData();
        }
    });

});

function checkCameraSupport () {
    if (navigator.mediaDevices && typeof navigator.mediaDevices.getUserMedia === 'function') {
        // safely access `navigator.mediaDevices.getUserMedia`

        // Request access to the camera
        navigator.mediaDevices.getUserMedia({
            video: {
                facingMode: 'environment' // Use rear camera for barcode scanning
            }
        })
        .then(stream => {
            // Assign the stream to the video element's source
            videoElement.srcObject = stream;
        })
        .catch(error => {
            alert(`Error accessing camera: , ${error}`);
        });
    } else {
        alert('Camera access is not supported on this device or browser.');
    }
}

function quaggaInit () {

}
