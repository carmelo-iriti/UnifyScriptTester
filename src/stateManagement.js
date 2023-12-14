function clearLocalStorage() {
    var propertyId = $('#propertyId').val();
    var key = '_sp_user_consent_' + propertyId;
    localStorage.removeItem(key);
    console.log(key + " removed");
    displayLocalStorageData();
}

function clearAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
    }
}


function reloadPage() {
    location.reload();
}

function displayLocalStorageData() {
    var propertyId = $('#propertyId').val();
    var key = '_sp_user_consent_' + propertyId;
    var data = localStorage.getItem(key);
    var displayElement = $('#localStorageData');
    displayElement.empty();

    if (data) {
        var options = {
            collapsed: $('#collapsed').is(':checked'),
            rootCollapsable: $('#root-collapsable').is(':checked'),
            withQuotes: $('#with-quotes').is(':checked'),
            withLinks: $('#with-links').is(':checked')
        };
        displayElement.jsonViewer(JSON.parse(data), options);

    } else {
        displayElement.text('No data found');
    }
    displayLocalStorageDataAsString();
}

function loadGdprPm() {
    var gdprPmId = document.getElementById('gdprPmId').value;
    if (gdprPmId) {
        window._sp_.gdpr.loadPrivacyManagerModal(gdprPmId);
    } else {
        console.log("No GDPR PM ID provided");
    }
}

function loadCcpaPm() {
    var ccpaPmId = document.getElementById('ccpaPmId').value;
    if (ccpaPmId) {
        window._sp_.ccpa.loadPrivacyManagerModal(ccpaPmId);
    } else {
        console.log("No CCPA PM ID provided");
    }
}

function loadUsantPm() {
    var usnatPmId = document.getElementById('usnatPmId').value;
    if (usnatPmId) {
        window._sp_.usnat.loadPrivacyManagerModal(usnatPmId);
    } else {
        console.log("No USNAT PM ID provided");
    }
}

function displayLocalStorageDataAsString() {
    var propertyId = $('#propertyId').val();
    var key = '_sp_user_consent_' + propertyId;
    var data = localStorage.getItem(key);
    document.getElementById('storageValue').value = data ? data.toString() : "";
}

function saveToLocalStorage() {
    var propertyId = document.getElementById('propertyId').value;
    var storageValue = document.getElementById('storageValue').value;
    var key = '_sp_user_consent_' + propertyId;
    localStorage.setItem(key, storageValue);
    displayLocalStorageData();
    console.log("Value saved to local storage for key", key, ":", storageValue);
}

function saveState() {
    var gdprChecked = document.getElementById('checkboxGDPR').checked;
    var ccpaChecked = document.getElementById('checkboxCCPA').checked;
    var usnatChecked = document.getElementById('checkboxUSNAT').checked;
    var isUsnatTransitionChecked = document.getElementById('usnatTransition').checked;
    var authId = document.getElementById('authId').value;
    var accountId = document.getElementById('accountId').value;
    var propertyId = document.getElementById('propertyId').value;
    var propertyName = document.getElementById('propertyName').value;

    var gdprPmId = document.getElementById('gdprPmId').value;
    var ccpaPmId = document.getElementById('ccpaPmId').value;
    var usnatPmId = document.getElementById('usnatPmId').value;

    var selectedCampaignEnvRadio = document.querySelector('input[name="campaignEnv"]:checked');
    if(selectedCampaignEnvRadio) {
        var selectedCampaignEnv = selectedCampaignEnvRadio.value;
        localStorage.setItem('campaignEnv', selectedCampaignEnv);
    }

    var selectedEnvironmentRadio = document.querySelector('input[name="environment"]:checked');
    if(selectedEnvironmentRadio) {
        var selectedEnvironment = selectedEnvironmentRadio.value;
        localStorage.setItem('selectedEnvironment', selectedEnvironment);
    }

    var propertySelect = document.getElementById('propertySelect').value;

    localStorage.setItem('gdprCheckbox', gdprChecked);
    localStorage.setItem('ccpaCheckbox', ccpaChecked);
    localStorage.setItem('usnatCheckbox', usnatChecked);
    localStorage.setItem('isUsnatTransitionCheckbox', isUsnatTransitionChecked);
    localStorage.setItem('authId', authId);
    localStorage.setItem('accountId', accountId);
    localStorage.setItem('propertyId', propertyId);
    localStorage.setItem('propertyName', propertyName);

    localStorage.setItem('gdprPmId', gdprPmId);
    localStorage.setItem('ccpaPmId', ccpaPmId);
    localStorage.setItem('usnatPmId', usnatPmId);
    localStorage.setItem('selectedProperty', propertySelect);
}

function restoreState() {
    var gdprChecked = JSON.parse(localStorage.getItem('gdprCheckbox'));
    var ccpaChecked = JSON.parse(localStorage.getItem('ccpaCheckbox'));
    var usnatChecked = JSON.parse(localStorage.getItem('usnatCheckbox'));
    var isUsnatTransitionChecked = JSON.parse(localStorage.getItem('isUsnatTransitionCheckbox'));
    var authId = localStorage.getItem('authId');
    var accountId = localStorage.getItem('accountId');
    var propertyId = localStorage.getItem('propertyId');
    var propertyName = localStorage.getItem('propertyName');

    var gdprPmId = localStorage.getItem('gdprPmId');
    var ccpaPmId = localStorage.getItem('ccpaPmId');
    var usnatPmId = localStorage.getItem('usnatPmId');

    var savedCampaignEnv = localStorage.getItem('campaignEnv');
    var savedEnvironment = localStorage.getItem('selectedEnvironment');

    var savedPropertySelect = localStorage.getItem('propertySelect');

    document.getElementById('checkboxGDPR').checked = gdprChecked;
    document.getElementById('checkboxCCPA').checked = ccpaChecked;
    document.getElementById('checkboxUSNAT').checked = usnatChecked;
    document.getElementById('usnatTransition').checked = isUsnatTransitionChecked;
    
    if (savedPropertySelect !== null && savedPropertySelect !== undefined) {
        document.getElementById('propertySelect').value = savedPropertySelect;
    }

    if (authId !== null && authId !== undefined) document.getElementById('authId').value = authId;
    if (accountId !== null && accountId !== undefined) document.getElementById('accountId').value = accountId;
    if (propertyId !== null && propertyId !== undefined) document.getElementById('propertyId').value = propertyId;
    if (propertyName !== null && propertyName !== undefined) document.getElementById('propertyName').value = propertyName;
    if (gdprPmId !== null && gdprPmId !== undefined) document.getElementById('gdprPmId').value = gdprPmId;
    if (ccpaPmId !== null && ccpaPmId !== undefined) document.getElementById('ccpaPmId').value = ccpaPmId;
    if (usnatPmId !== null && usnatPmId !== undefined) document.getElementById('usnatPmId').value = usnatPmId;
    if(savedCampaignEnv) document.getElementById(savedCampaignEnv).checked = true;      
    if(savedEnvironment) document.getElementById(savedEnvironment).checked = true;
}

document.addEventListener('DOMContentLoaded', function() {


    document.getElementById('checkboxGDPR').addEventListener('change', saveState);
    document.getElementById('checkboxCCPA').addEventListener('change', saveState);
    document.getElementById('checkboxUSNAT').addEventListener('change', saveState);
    document.getElementById('usnatTransition').addEventListener('change', saveState);
    document.getElementById('authId').addEventListener('change', saveState);
    document.getElementById('accountId').addEventListener('change', saveState);
    document.getElementById('propertyId').addEventListener('change', saveState);
    document.getElementById('propertyName').addEventListener('change', saveState);

    document.getElementById('ccpaPmId').addEventListener('change', saveState);
    document.getElementById('usnatPmId').addEventListener('change', saveState);
    document.getElementById('gdprPmId').addEventListener('change', saveState);

    restoreState();
});
