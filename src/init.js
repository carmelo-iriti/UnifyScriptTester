var updateTimer;
var properties = []

document.addEventListener('DOMContentLoaded', function() {
    loadProperties();
    setupEventListeners();
    restoreState();
});

function updateButton() {
    var versionValue = document.getElementById('version').value;
    updateURLParameter('_sp_version', versionValue);
}

function updateURLParameter(key, value) {
    var url = new URL(window.location.href);
    var params = new URLSearchParams(url.search);

    if (value) {
        params.set(key, value); // Set or update the parameter
    } else {
        params.delete(key); // Remove the parameter if the input is empty
    }

    url.search = params.toString();
    var newUrl = url.toString();

    // Use this to change the URL without reloading (HTML5 feature)
    window.history.pushState({path: newUrl}, '', newUrl);

    saveState(); // Save the state
    reloadPage(); // Reload the page
}

function getURLParameter(name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results == null) {
       return null;
    }
    return decodeURIComponent(results[1]) || null;
}

function setupEventListeners() {

    // Set the input field value based on the URL parameter
    var versionValue = getURLParameter('_sp_version');
    localStorage.setItem('version', versionValue? versionValue : "");

    document.getElementById('version').addEventListener('input', function() {
        clearTimeout(updateTimer); // Clear existing timer
        updateTimer = setTimeout(updateButton, 2000); // Set a new 2-second timer
    });

    document.getElementById('checkboxGDPR').addEventListener('change', saveState);
    document.getElementById('checkboxCCPA').addEventListener('change', saveState);
    document.getElementById('checkboxUSNAT').addEventListener('change', saveState);


    document.querySelectorAll('input[name="campaignEnv"]').forEach(radio => {
        radio.addEventListener('change', saveState);
    });
    document.querySelectorAll('input[name="environment"]').forEach(radio => {
        radio.addEventListener('change', saveState);
    });


    document.getElementById('propertyId').addEventListener('change', saveState);
    document.getElementById('accountId').addEventListener('change', saveState);
    document.getElementById('propertyName').addEventListener('change', saveState);
    document.getElementById('authId').addEventListener('change', saveState);
    document.getElementById('gdprPmId').addEventListener('change', saveState);
    document.getElementById('ccpaPmId').addEventListener('change', saveState);
    document.getElementById('usnatPmId').addEventListener('change', saveState);

    document.getElementById('propertySelect').addEventListener('change', function() {
        resetFormFields();
        clearAllCookies();
        clearLocalStorage();

        var keyProp = this.value;
        var selectedProperty = properties.find(function(property) {
            return property.propertyName === keyProp;
        });
        if (selectedProperty) {

            document.getElementById('propertyId').value = selectedProperty.propertyId;
            document.getElementById('accountId').value = selectedProperty.accountId;
            document.getElementById('propertyName').value = selectedProperty.propertyName;
            document.getElementById('authId').value = selectedProperty.authId;
            document.getElementById('usnatPmId').value = selectedProperty.usnatPmId;
            document.getElementById('ccpaPmId').value = selectedProperty.ccpaPmId;
            document.getElementById('gdprPmId').value = selectedProperty.gdprPmId;
            setSelectedRadio('campaignEnv', selectedProperty.campaignEnv);
            setSelectedRadio('environment', selectedProperty.environment);
            document.getElementById('usnatTransition').checked = selectedProperty.usnatTransition;
            selectedProperty.campaigns.forEach(campaign => {
                document.getElementById('checkbox' + campaign).checked = true;
            });
        }
        saveState()
    });
}

function resetFormFields() {

    document.getElementById('propertyId').value = '';
    document.getElementById('accountId').value = '';
    document.getElementById('propertyName').value = '';
    document.getElementById('authId').value = '';
    document.getElementById('usnatPmId').value = '';
    document.getElementById('ccpaPmId').value = '';
    document.getElementById('gdprPmId').value = '';
    resetSelectedRadio('campaignEnv');
    resetSelectedRadio('environment');
    document.getElementById('usnatTransition').checked = false;
    ["GDPR", "CCPA", "USNAT"].forEach(campaign => {
        document.getElementById('checkbox' + campaign).checked = false;
    });
}


function handlePropertySelectChange() {
    var selectedProperty = properties[document.getElementById('propertySelect').value];

    if (selectedProperty) {
        // Populate the form fields with the selected property's data
        document.getElementById('propertyId').value = selectedProperty.propertyId;
        document.getElementById('accountId').value = selectedProperty.accountId;
        document.getElementById('propertyName').value = selectedProperty.propertyName;
        document.getElementById('authId').value = selectedProperty.authId;
        document.getElementById('usnatPmId').value = selectedProperty.usnatPmId;
        document.getElementById('ccpaPmId').value = selectedProperty.ccpaPmId;
        document.getElementById('gdprPmId').value = selectedProperty.gdprPmId;

        setSelectedRadio('campaignEnv', selectedProperty.campaignEnv);
        setSelectedRadio('environment', selectedProperty.environment);
        document.getElementById('usnatTransition').checked = selectedProperty.usnatTransition;

        selectedProperty.campaigns.forEach(campaign => {
            document.getElementById('checkbox' + campaign).checked = true;
        });
    } else {
        // Reset the form fields if no property is selected
        resetFormFields();
    }
}

function setSelectedRadio(groupName, value) {
    let radios = document.querySelectorAll(`input[name="${groupName}"]`);
    radios.forEach(radio => {
        radio.checked = (radio.value === value);
    });
}

function resetSelectedRadio(groupName) {
    let radios = document.querySelectorAll(`input[name="${groupName}"]`);
    radios.forEach(radio => {
        radio.checked = false;
    });
}

function loadProperties() {
    fetch('properties.json') // Replace with the actual path to your JSON file
        .then(response => response.json())
        .then(propertyArray => {
            properties = propertyArray; // 
            var select = document.getElementById('propertySelect');
            propertyArray.forEach(function(property) {
                var option = document.createElement('option');
                option.value = property.propertyName;
                option.textContent = property.propertyName;
                select.appendChild(option);
            });
            var savedPropertySelect = localStorage.getItem('propertySelect');
            select.value = savedPropertySelect;
        })
        .catch(error => console.error('Error loading propertyArray:', error));
}
