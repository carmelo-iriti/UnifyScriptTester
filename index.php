<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Runner</title>
    <!-- Include jQuery and json-viewer library -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="src/jquery.json-viewer.js"></script>
    <script src="src/messages.js"></script>
    <script src="src/init.js"></script>
    <script src="src/stateManagement.js"></script>
    <script src="src/cmp-skd-config.js"></script>
    <link href="css/style-runner.css" type="text/css" rel="stylesheet">
    
    <link href="css/jquery.json-viewer.css" type="text/css" rel="stylesheet">
    <script>
        $(function() {
            $('#btn-json-viewer').click(displayLocalStorageData);
            $('p.options input[type=checkbox]').click(displayLocalStorageData);

            displayLocalStorageData();
        });
    </script>
    <script>
            var properties = {
                "automation-mobile-usnat": {
                    "propertyId": "34049",
                    "accountId": "22",
                    "propertyName": "automation-mobile-usnat",
                    "authId": "",
                    "usnatPmId": "930374",
                    "ccpaPmId": "930569",
                    "gdprPmId": "930471",
                    "campaignEnv": "prod",
                    "environment": "preprod",
                    "usnatTransition": false,
                    "campaigns": ["USNAT"]
                },
                "automation-mobile-usnat2": {
                    "propertyId": "34336",
                    "accountId": "22",
                    "propertyName": "automation-mobile-usnat2",
                    "authId": "",
                    "usnatPmId": "961819",
                    "ccpaPmId": "961815",
                    "gdprPmId": "",
                    "campaignEnv": "prod",
                    "environment": "preprod",
                    "usnatTransition": false,
                    "campaigns": ["CCPA"]
                },
                "usnat.mobile.demo": {
                    "propertyId": "34152",
                    "accountId": "22",
                    "propertyName": "usnat.mobile.demo",
                    "authId": "",
                    "usnatPmId": "943886",
                    "ccpaPmId": "955869",
                    "gdprPmId": "",
                    "campaignEnv": "prod",
                    "environment": "preprod",
                    "usnatTransition": false,
                    "campaigns": ["USNAT"]
                },
                "mobile.multicampaign.demo": {
                    "propertyId": "16893",
                    "accountId": "22",
                    "propertyName": "mobile.multicampaign.demo",
                    "authId": "",
                    "usnatPmId": "",
                    "ccpaPmId": "509688",
                    "gdprPmId": "488393",
                    "campaignEnv": "prod",
                    "environment": "prod",
                    "usnatTransition": false,
                    "campaigns": ["CCPA", "GDPR"]
                }
            };

            // Helper function to set radio button selection
            function setSelectedRadio(groupName, value) {
                let radios = document.querySelectorAll(`input[name="${groupName}"]`);
                radios.forEach(radio => {
                    radio.checked = (radio.value === value);
                });
            }

            // Helper function to reset radio button selection
            function resetSelectedRadio(groupName) {
                let radios = document.querySelectorAll(`input[name="${groupName}"]`);
                radios.forEach(radio => {
                    radio.checked = false;
                });
            }
        </script>
</head>
<body">
    <div class="container">
        <h1>Metawebapp</h1>
        <div class="row">
            <div class="input-field">
                <label for="version">Unified-script version</label>
                <input type="text" id="version" placeholder="Enter value">
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <label for="propertySelect">Select Property</label>
                <select id="propertySelect">
                    <option value="">Select a property...</option>
                    <option value="automation-mobile-usnat">automation-mobile-usnat</option>
                    <option value="usnat.mobile.demo">usnat.mobile.demo</option>
                    <option value="mobile.multicampaign.demo">mobile.multicampaign.demo</option>
                    <option value="automation-mobile-usnat2">automation-mobile-usnat2</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <label for="propertyId">Property Id</label>
                <input type="text" id="propertyId">
            </div>
            <div class="input-field">
                <label for="accountId">Account Id</label>
                <input type="text" id="accountId">
            </div>
            <div class="input-field">
                <label for="propertyName">Property Name</label>
                <input type="text" id="propertyName">
            </div>
            <div class="input-field">
                <label for="authId">Auth Id</label>
                <input type="text" id="authId">
            </div>
        </div>
        <div class="row">
            <div class="checkbox-field">
                <label>Campaigns</label>
                <div class="checkbox-group">
                    <input type="checkbox" id="checkboxGDPR">
                    <label for="checkboxGDPR">GDPR</label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="checkboxCCPA">
                    <label for="checkboxCCPA">CCPA</label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="checkboxUSNAT">
                    <label for="checkboxUSNAT">USNAT</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="checkbox-field">
                <label>USNAT Transition</label>
                <div class="checkbox-group">
                    <input type="checkbox" id="usnatTransition">
                    <label for="usnatTransition">USNAT AuthId transition</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="radio-field">
                <label>Environment</label>
                <div class="radio-group">
                    <input type="radio" id="prod" name="environment" value="prod">
                    <label for="prod">Prod</label>
                </div>
                <div class="radio-group">
                    <input type="radio" id="preprod" name="environment" value="preprod" checked>
                    <label for="preprod">Preprod</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="radio-field">
                <label>Campaign Env</label>
                <div class="radio-group">
                    <input type="radio" id="prod" name="campaignEnv" value="prod" checked>
                    <label for="prod">Prod</label>
                </div>
                <div class="radio-group">
                    <input type="radio" id="stage" name="campaignEnv" value="stage">
                    <label for="stage">Stage</label>
                </div>
            </div>
        </div>
        <div class="row"  style="margin-top: 20px;">
            <div class="input-field">
                <label for="gdprPmId">GDPR PmId</label>
                <input type="text" id="gdprPmId" value="899812">
            </div>
            <div class="input-field">
                <label for="ccpaPmId">CCPA PmId</label>
                <input type="text" id="ccpaPmId" value="899813">
            </div>
            <div class="input-field">
                <label for="usnatPmId">USNAT PmId</label>
                <input type="text" id="usnatPmId" value="0000">
            </div>
        </div>
        <div class="row">
            <div class="button-field">
                <label>Privacy Manager</label>
                <div class="button-group">
                    <button type="button" onclick="loadGdprPm()">GDPR Pm</button>
                </div>
                <div class="button-group">
                    <button type="button" onclick="loadCcpaPm()">CCPA Pm</button>
                </div>
                <div class="button-group">
                    <button type="button" onclick="loadUsantPm()">USNAT Pm</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="button-field">
                <label>Utils</label>
                <div class="button-group">
                    <button type="button" onclick="reloadPage()">Reload Page</button>
                </div>
                <div class="button-group">
                    <button type="button" onclick="clearLocalStorage()">Remove stored consent</button>
                </div>
                <div class="button-group">
                    <button type="button" onclick="clearAllCookies()">Clear all cookies</button>
                </div>
                <div class="button-group">
                    <button type="button" onclick="displayLocalStorageData()">Show LocalStorage</button>
                </div>
                <form action="TP.php" method="get">
                    <div class="button-group">
                        <button type="button" id="loadScriptButton" onclick="loadDynamicScript()">Load Messages</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <label for="storageValue">Value for Local Storage:</label>
            <div class="full-width-input">
                <input type="text" id="storageValue" placeholder="Enter value">
                <button type="button" onclick="saveToLocalStorage()">Save to Local Storage</button>
            </div>
        </div>
        <div class="row">
            <div class="data-field">
                <label>Local Storage Data</label>
                <pre id="localStorageData"></pre>
            </div>
        </div>

    </div>
    </body>

</html>