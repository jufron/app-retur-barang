// * input barcode
const inputBarcode = document.getElementById('barcode');
// * get url from search
const urlSearch = document.getElementById('form').getAttribute('data-url-search');

// * input hidden barang id
const inputBarangId = document.getElementById('barang_id');
// * input disable nama barang
const inputNamaBarang = document.getElementById('nama_barang');
// * input disable kategory
const inputKategory = document.getElementById('kategory');

// * button show modal
const buttonShowModal = document.querySelector('#barcode-show-modal');
// * modal html element
const modalElement = document.querySelector('#show-modal');
// * init modal bootstrap
const myModal = new bootstrap.Modal(modalElement, { backdrop: 'static', keyboard: false });
// * modal html element video
const videoElement = document.getElementById('camera-stream');
// * modal html result barcode after scanner
const resultElement = document.getElementById('barcode-result');


// * modal is show after click button modal camera
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

              inputBarcode.dispatchEvent(new Event('input'));
  
              Quagga.stop(); // Hentikan kamera
              myModal.hide(); // Tutup modal
  
              getData();
          }
      });
  
});

// * check camera support for device
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

// * init function modal
function popupAlert (obj) {
    const {
        text = "Data Berhasil Ditemukan",
        gravity = 'top',
        position = 'center',
        background = "linear-gradient(to right, #00b09b, #96c93d)"
    } = obj;

    Toastify({
        text,
        duration: 4000,
        destination: "https://github.com/apvarun/toastify-js",
        newWindow: true,
        close: true,
        gravity,
        position,
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background,
        },
        onClick: function(){} // Callback after click
    }).showToast();
}

// * render after fetch data
function render (data) {
    const {id, nama_barang, kode_barcode, kategory} = data.data;
    inputBarangId.value = id;
    inputNamaBarang.value = nama_barang;
    inputKategory.value = kategory;

    popupAlert({
        text: "Data Berhasil Ditemukan",
    })
}

// * fetch data when user input code barcode max 13 digit
inputBarcode.addEventListener('input', function() {
    const nomor_barcode = inputBarcode.value;

    if (nomor_barcode.length === 13) {
        fetch(`${urlSearch}?keyword=${nomor_barcode}`)
            .then(response => {
                if (!response.ok) {
                    if (response.status === 404) {
                        popupAlert({
                            text: "Data Tidak Ditemukan",
                            background: "linear-gradient(135deg, #EF2064, #A01326)"
                        });
                    }

                    return response.json().then(errorData => {
                        throw new Error(errorData.message || "Terjadi kesalahan!");
                    });
                }
                return response.json();
            })
            .then(data => {
                render(data);
            })
            .catch(error => {
                popupAlert({
                    text: error.message || "Error Gagal mengambil data",
                    background: "linear-gradient(135deg, #EF2064, #A01326)"
                })
                console.error("Error:", error);
            });
    } else {
        hasilDiv.innerHTML = ''; // Kosongkan hasil jika tidak 13 digit
    }
});

