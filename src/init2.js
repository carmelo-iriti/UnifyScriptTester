// init.js

// Include any necessary imports if you're using modules
// import { setupEventListeners, restoreState } from './eventHandlers.js';

document.addEventListener('DOMContentLoaded', function() {
    // Call function to setup event listeners
    setupEventListeners();

    // Call function to restore state from localStorage or any other source
    restoreState();
});

// Function to setup event listeners
function setupEventListeners() {
    // Event listener for GDPR checkbox
    document.getElementById('checkboxGDPR').addEventListener('change', saveState);

    // Event listener for CCPA checkbox
    document.getElementById('checkboxCCPA').addEventListener('change', saveState);

    // Event listener for USNAT checkbox
    document.getElementById('checkboxUSNAT').addEventListener('change', saveState);

    // Event listener for USNAT Transition checkbox
    document.getElementById('usnatTransition').addEventListener('change', saveState);

    // Event listeners for text inputs
    document.getElementById('authId').addEventListener('change', saveState);
    document.getElementById('accountId').addEventListener('change', saveState);
    document.getElementById('propertyId').addEventListener('change', saveState);
    document.getElementById('propertyName').addEventListener('change', saveState);

    // Event listeners for PM ID inputs
    document.getElementById('ccpaPmId').addEventListener('change', saveState);
    document.getElementById('usnatPmId').addEventListener('change', saveState);
    document.getElementById('gdprPmId').addEventListener('change', saveState);

    // Event listener for property selection
    document.getElementById('propertySelect').addEventListener('change', handlePropertySelectChange);
}

function handlePropertySelectChange() {
    var selectedPropertyKey = document.getElementById('propertySelect').value;
    var selectedProperty = properties[selectedPropertyKey];

    if (selectedProperty) {
        // Set values based on selected property
        document.getElementById('propertyId').value = selectedProperty.propertyId || '';
        document.getElementById('accountId').value = selectedProperty.accountId || '';
        document.getElementById('propertyName').value = selectedProperty.propertyName || '';
        document.getElementById('authId').value = selectedProperty.authId || '';
        document.getElementById('usnatPmId').value = selectedProperty.usnatPmId || '';
        document.getElementById('ccpaPmId').value = selectedProperty.ccpaPmId || '';
        document.getElementById('gdprPmId').value = selectedProperty.gdprPmId || '';

        // Set radio buttons for 'campaignEnv' and 'environment'
        setSelectedRadio('campaignEnv', selectedProperty.campaignEnv);
        setSelectedRadio('environment', selectedProperty.environment);

        // Set checkboxes for campaigns
        ['GDPR', 'CCPA', 'USNAT'].forEach(campaign => {
            var isChecked = selectedProperty.campaigns.includes(campaign);
            document.getElementById('checkbox' + campaign).checked = isChecked;
        });

        // Set USNAT Transition checkbox
        document.getElementById('usnatTransition').checked = selectedProperty.usnatTransition;
    } else {
        // Reset all fields if no property is selected
        resetFormFields();
    }
}

// Utility function to reset form fields
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
    ['GDPR', 'CCPA', 'USNAT'].forEach(campaign => {
        document.getElementById('checkbox' + campaign).checked = false;
    });
}


function restoreState() {
    var savedValues = {
        gdprCheckbox: localStorage.getItem('gdprCheckbox'),
        ccpaCheckbox: localStorage.getItem('ccpaCheckbox'),
        usnatCheckbox: localStorage.getItem('usnatCheckbox'),
        isUsnatTransitionCheckbox: localStorage.getItem('isUsnatTransitionCheckbox'),
        authId: localStorage.getItem('authId'),
        accountId: localStorage.getItem('accountId'),
        propertyId: localStorage.getItem('propertyId'),
        propertyName: localStorage.getItem('propertyName'),
        gdprPmId: localStorage.getItem('gdprPmId'),
        ccpaPmId: localStorage.getItem('ccpaPmId'),
        usnatPmId: localStorage.getItem('usnatPmId'),
        selectedCampaignEnv: localStorage.getItem('campaignEnv'),
        selectedEnvironment: localStorage.getItem('selectedEnvironment'),
        selectedProperty: localStorage.getItem('selectedProperty'),
    };

    // Restore checkboxes
    document.getElementById('checkboxGDPR').checked = savedValues.gdprCheckbox === 'true';
    document.getElementById('checkboxCCPA').checked = savedValues.ccpaCheckbox === 'true';
    document.getElementById('checkboxUSNAT').checked = savedValues.usnatCheckbox === 'true';
    document.getElementById('usnatTransition').checked = savedValues.isUsnatTransitionCheckbox === 'true';

    // Restore text inputs
    document.getElementById('authId').value = savedValues.authId || '';
    document.getElementById('accountId').value = savedValues.accountId || '';
    document.getElementById('propertyId').value = savedValues.propertyId || '';
    document.getElementById('propertyName').value = savedValues.propertyName || '';

    // Restore PM ID inputs
    document.getElementById('gdprPmId').value = savedValues.gdprPmId || '';
    document.getElementById('ccpaPmId').value = savedValues.ccpaPmId || '';
    document.getElementById('usnatPmId').value = savedValues.usnatPmId || '';

    // Restore radio selections
    setSelectedRadio('campaignEnv', savedValues.selectedCampaignEnv);
    setSelectedRadio('environment', savedValues.selectedEnvironment);

    // Restore selected property
    if (savedValues.selectedProperty) {
        document.getElementById('propertySelect').value = savedValues.selectedProperty;
        handlePropertySelectChange(); // To update related fields based on the selected property
    }
}
