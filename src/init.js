document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    restoreState();
});

function setupEventListeners() {

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
        var selectedProperty = properties[this.value];
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
