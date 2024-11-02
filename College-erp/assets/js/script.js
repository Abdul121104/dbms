// Simple form validation
function validateForm(event) {
    const requiredFields = document.querySelectorAll('input[required], select[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            alert("Please fill out all required fields.");
            isValid = false;
            event.preventDefault();
        }
    });

    return isValid;
}

// Attach validation to forms with the 'validate-form' class
document.querySelectorAll('.validate-form').forEach(form => {
    form.addEventListener('submit', validateForm);
});

// Table filtering
function filterTable(inputId, tableId) {
    const filter = document.getElementById(inputId).value.toUpperCase();
    const table = document.getElementById(tableId);
    const tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {
        const td = tr[i].getElementsByTagName("td")[0]; // Adjust column index if needed
        if (td) {
            const txtValue = td.textContent || td.innerText;
            tr[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? "" : "none";
        }
    }
}

// Example usage for search input
const searchInput = document.getElementById('searchInput');
if (searchInput) {
    searchInput.addEventListener('keyup', () => filterTable('searchInput', 'dataTable'));
}
