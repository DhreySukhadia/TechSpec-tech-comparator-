l// Dummy data for device comparison
const devices = {
    "iPhone 13": {
        price: "$799",
        display: "6.1-inch",
        battery: "3240mAh",
        camera: "12MP Dual",
        processor: "A15 Bionic"
    },
    "Samsung Galaxy S21": {
        price: "$749",
        display: "6.2-inch",
        battery: "4000mAh",
        camera: "64MP Triple",
        processor: "Exynos 2100"
    }
};

// Search functionality for the landing page
document.getElementById('searchBtn')?.addEventListener('click', function() {
    const searchQuery = document.getElementById('deviceSearch')?.value;
    if (searchQuery) {
        alert(`Searching for: ${searchQuery}`);
        window.location.href = `comparison.html?search=${encodeURIComponent(searchQuery)}`;
    } else {
        alert('Please enter a device name to search.');
    }
});

// Comparison functionality
document.getElementById('compareBtn')?.addEventListener('click', function() {
    const device1 = document.getElementById('device1')?.value;
    const device2 = document.getElementById('device2')?.value;

    if (device1 && device2 && devices[device1] && devices[device2]) {
        displayComparison(device1, device2);
    } else {
        alert('Please enter valid devices to compare.');
    }
});

function displayComparison(device1, device2) {
    const table = `
        <table>
            <tr>
                <th>Feature</th>
                <th>${device1}</th>
                <th>${device2}</th>
            </tr>
            <tr>
                <td>Price</td>
                <td>${devices[device1].price}</td>
                <td>${devices[device2].price}</td>
            </tr>
            <tr>
                <td>Display</td>
                <td>${devices[device1].display}</td>
                <td>${devices[device2].display}</td>
            </tr>
            <tr>
                <td>Battery</td>
                <td>${devices[device1].battery}</td>
                <td>${devices[device2].battery}</td>
            </tr>
            <tr>
                <td>Camera</td>
                <td>${devices[device1].camera}</td>
                <td>${devices[device2].camera}</td>
            </tr>
            <tr>
                <td>Processor</td>
                <td>${devices[device1].processor}</td>
                <td>${devices[device2].processor}</td>
            </tr>
        </table>
    `;

    document.getElementById('comparisonTable').innerHTML = table;
}
// Basic interactivity for filtering laptops by company
document.querySelectorAll('input[name="company"]').forEach(companyCheckbox => {
    companyCheckbox.addEventListener('change', function() {
        // Code to filter laptops by selected companies
        const selectedCompanies = Array.from(document.querySelectorAll('input[name="company"]:checked'))
            .map(checkbox => checkbox.value);
        console.log("Selected companies:", selectedCompanies);
        
        // Filter logic can go here based on selected companies
    });
});
