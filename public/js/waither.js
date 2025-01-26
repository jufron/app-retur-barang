const cardCuaca = document.getElementById('cuaca');

const codeWilayahID = '51.71.04.2008';
// wilayah code https://kodewilayah.id/
const waitherUrlApi = `https://api.bmkg.go.id/publik/prakiraan-cuaca?adm4=${codeWilayahID}`;


async function fetchCuacaBMKG() {
    try {
        renderLoading(true);

        const response = await fetch(waitherUrlApi);
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();

        renderLoading(false);

        calculateDataCuaca(data);
    } catch (error) {
        console.error("Error fetching data:", error);
    }
}

const renderLoading = (data) => {
    if (data) {
        const element = `
            <div class="d-flex justify-content-center">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        `;
        cardCuaca.innerHTML = element;
    } else {
        cardCuaca.innerHTML = '';
    }
};

function calculateDataCuaca (result) {

    const cuaca = result.data[0].cuaca;

    // marge array
    const allCuaca = cuaca.flat();

    const now = new Date();

    // Cari data terdekat
    const nearest = allCuaca.reduce((prev, curr) => {
        const prevDiff = Math.abs(new Date(prev.datetime) - now);
        const currDiff = Math.abs(new Date(curr.datetime) - now);
        return currDiff < prevDiff ? curr : prev;
    });

    renderHTML(nearest, result.lokasi);
}

function renderHTML (cuaca, { provinsi, kotkab, kecamatan }) {

    const element = `
        <p>${provinsi}</p>
        <h5 class="card-title">${kotkab}</h5>
        <p class="card-text text-muted">${kecamatan}</p>

        <div class="d-flex justify-content-center align-items-center">
            <img
                src="${cuaca.image}"
                alt="Cuaca Hujan Ringan"
                class="img-fluid"
                style="max-width: 100px;"
            >
        </div>

        <h5 class="mt-3">
            <strong>${cuaca.weather_desc}</strong><br>
            ${cuaca.t}°C
        </h5>
    `;

    cardCuaca.innerHTML = element;
}

fetchCuacaBMKG();
