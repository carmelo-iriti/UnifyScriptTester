<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Runner</title>
    <style>
        h1 {
            background-color: #734bc0; /* Sets the background color to purple */
            color: #fff; /* Example: white color */
            text-align: center; /* Centers the title */
            padding: 10px 0; /* Adds padding above and below the title */
            margin-top: 20px;
        }

        body {
            background-color: #333;
            /* Dark background */
            color: #fff;
            /* Light text */
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .input-field {
            flex: 0 0 15%;
            /* Adjust the width for each input field */
            margin: 10px 0;
            box-sizing: border-box;
        }

        .input-field label {
            display: block;
            margin-bottom: 5px;
        }

        .input-field input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        .input-field input,
        .checkbox-group input,
        .radio-group input,
        .button-group button {
            background-color: #555;
            /* Darker background for input */
            color: #fff;
            /* Light text for input */
            border: 1px solid #777;
            /* Slightly lighter border for visibility */
            padding: 10px;
            margin-top: 5px;
        }

        .checkbox-field,
        .radio-field,
        .button-field,
        .data-field {
            flex: 0 0 100%;
            box-sizing: border-box;
            margin-top: 30px;
            /* Space between rows */
        }

        .checkbox-field>label,
        .radio-field>label,
        .button-field>label {
            display: block;
            margin-bottom: 10px;
            color: #fff;
            /* Light text for labels */
        }

        .checkbox-group,
        .radio-group,
        .button-group {
            display: inline-block;
            /* or use 'flex' */
            margin-right: 20px;
            /* Spacing between groups */
        }

        .checkbox-group label,
        .radio-group label,
        .button-group label {
            margin-left: 5px;
        }

        .button-group button {
            padding: 10px;
            margin-top: 5px;
            transition: transform 0.1s ease;
        }

        .button-group button:active {
            transform: scale(0.95);
        }

        .full-width-input {
            flex: 0 0 100%;
            /* Take full width */
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .full-width-input input {
            flex-grow: 1;
            /* Grow to take available space */
            margin-right: 10px;
            /* Space between input and button */
            background-color: #555;
            /* Darker background for input */
            color: #fff;
            /* Light text for input */
            border: 1px solid #777;
            /* Slightly lighter border for visibility */
            padding: 10px;
            margin-top: 5px;
        }

        .full-width-input button {
            flex-shrink: 0;
            /* Prevent button from shrinking */
            padding: 10px;
            margin-top: 5px;
            transition: transform 0.1s ease;
            /* Smooth transition for the press effect */
            background-color: #555;
            /* Darker background for input */
            color: #fff;
            /* Light text for input */
            border: 1px solid #777;
            /* Slightly lighter border for visibility */
        }

        #propertySelect {
            width: 100%; /* Adjust as needed */
            height: 40px; /* Adjust as needed */
            font-size: 16px; /* Adjust as needed */
            padding: 5px 10px; /* Adjust as needed */
            border: 1px solid #777; /* Style for the border */
            background-color: #555; /* Background color */
            color: #fff; /* Text color */
            box-sizing: border-box; /* Ensures padding doesn't affect overall width */
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {

            .input-field,
            .checkbox-group,
            .radio-group,
            .button-group {
                flex: 0 0 48%;
                /* Adjust the width for smaller screens */
            }
        }

        @media (max-width: 480px) {

            .input-field,
            .checkbox-group,
            .radio-group,
            .button-group {
                flex: 0 0 100%;
                /* Full width on very small screens */
                margin-right: 0;
            }
        }
    </style>
    <script>
        (function() {
            var e = false,
                c = window,
                t = document;

            function r() {
                if (!c.frames["__uspapiLocator"]) {
                    if (t.body) {
                        var a = t.body,
                            e = t.createElement("iframe");
                        e.style.cssText = "display:none";
                        e.name = "__uspapiLocator";
                        a.appendChild(e);
                    } else {
                        setTimeout(r, 5);
                    }
                }
            }

            r();

            function p() {
                var a = arguments;
                __uspapi.a = __uspapi.a || [];
                if (!a.length) return __uspapi.a;
                else if (a[0] === "ping") a[2]({
                    gdprAppliesGlobally: e,
                    cmpLoaded: false
                }, true);
                else __uspapi.a.push([].slice.apply(a));
            }

            function l(t) {
                var r = typeof t.data === "string";
                try {
                    var a = r ? JSON.parse(t.data) : t.data;
                    if (a.__cmpCall) {
                        var n = a.__cmpCall;
                        c.__uspapi(n.command, n.parameter, function(a, e) {
                            var c = {
                                __cmpReturn: {
                                    returnValue: a,
                                    success: e,
                                    callId: n.callId
                                }
                            };
                            t.source.postMessage(r ? JSON.stringify(c) : c, "*");
                        });
                    }
                } catch (a) {}
            }

            if (typeof __uspapi !== "function") {
                c.__uspapi = p;
                __uspapi.msgHandler = l;
                c.addEventListener("message", l, false);
            }
        })();
    </script>

    <script>
        window.__gpp_addFrame = function(e) {
            if (!window.frames[e])
                if (document.body) {
                    var t = document.createElement("iframe");
                    t.style.cssText = "display:none", t.name = e, document.body.appendChild(t)
                } else window.setTimeout(window.__gpp_addFrame, 10, e)
        }, window.__gpp_stub = function() {
            var e = arguments;
            if (__gpp.queue = __gpp.queue || [], __gpp.events = __gpp.events || [], !e.length || 1 == e.length &&
                "queue" == e[0]) return __gpp.queue;
            if (1 == e.length && "events" == e[0]) return __gpp.events;
            var t = e[0],
                p = e.length > 1 ? e[1] : null,
                s = e.length > 2 ? e[2] : null;
            if ("ping" === t) p({
                gppVersion: "1.1",
                cmpStatus: "stub",
                cmpDisplayStatus: "hidden",
                signalStatus: "not ready",
                supportedAPIs: ["2:tcfeuv2", "5:tcfcav1", "6:uspv1", "7:usnatv1", "8:uscav1", "9:usvav1",
                    "10:uscov1", "11:usutv1", "12:usctv1"
                ],
                cmpId: 0,
                sectionList: [],
                applicableSections: [],
                gppString: "",
                parsedSections: {}
            }, !0);
            else if ("addEventListener" === t) {
                "lastId" in __gpp || (__gpp.lastId = 0), __gpp.lastId++;
                var n = __gpp.lastId;
                __gpp.events.push({
                    id: n,
                    callback: p,
                    parameter: s
                }), p({
                    eventName: "listenerRegistered",
                    listenerId: n,
                    data: !0,
                    pingData: {
                        gppVersion: "1.1",
                        cmpStatus: "stub",
                        cmpDisplayStatus: "hidden",
                        signalStatus: "not ready",
                        supportedAPIs: ["2:tcfeuv2", "5:tcfcav1", "6:uspv1", "7:usnatv1", "8:uscav1",
                            "9:usvav1", "10:uscov1", "11:usutv1", "12:usctv1"
                        ],
                        cmpId: 0,
                        sectionList: [],
                        applicableSections: [],
                        gppString: "",
                        parsedSections: {}
                    }
                }, !0)
            } else if ("removeEventListener" === t) {
                for (var a = !1, i = 0; i < __gpp.events.length; i++)
                    if (__gpp.events[i].id == s) {
                        __gpp.events.splice(i, 1), a = !0;
                        break
                    } p({
                    eventName: "listenerRemoved",
                    listenerId: s,
                    data: a,
                    pingData: {
                        gppVersion: "1.1",
                        cmpStatus: "stub",
                        cmpDisplayStatus: "hidden",
                        signalStatus: "not ready",
                        supportedAPIs: ["2:tcfeuv2", "5:tcfcav1", "6:uspv1", "7:usnatv1", "8:uscav1",
                            "9:usvav1", "10:uscov1", "11:usutv1", "12:usctv1"
                        ],
                        cmpId: 0,
                        sectionList: [],
                        applicableSections: [],
                        gppString: "",
                        parsedSections: {}
                    }
                }, !0)
            } else "hasSection" === t ? p(!1, !0) : "getSection" === t || "getField" === t ? p(null, !0) : __gpp.queue
                .push([].slice.apply(e))
        }, window.__gpp_msghandler = function(e) {
            var t = "string" == typeof e.data;
            try {
                var p = t ? JSON.parse(e.data) : e.data
            } catch (e) {
                p = null
            }
            if ("object" == typeof p && null !== p && "__gppCall" in p) {
                var s = p.__gppCall;
                window.__gpp(s.command, (function(p, n) {
                    var a = {
                        __gppReturn: {
                            returnValue: p,
                            success: n,
                            callId: s.callId
                        }
                    };
                    e.source.postMessage(t ? JSON.stringify(a) : a, "*")
                }), "parameter" in s ? s.parameter : null, "version" in s ? s.version : "1.1")
            }
        }, "__gpp" in window && "function" == typeof window.__gpp || (window.__gpp = window.__gpp_stub, window
            .addEventListener("message", window.__gpp_msghandler, !1), window.__gpp_addFrame("__gppLocator"));
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('checkboxGDPR').addEventListener('change', saveState);
            document.getElementById('checkboxCCPA').addEventListener('change', saveState);
            document.getElementById('checkboxUSNAT').addEventListener('change', saveState);

            document.querySelectorAll('input[name="campaignEnv"]').forEach(radio => {
                radio.addEventListener('change', saveState);
            });

            document.getElementById('propertyId').addEventListener('change', saveState);
            document.getElementById('accountId').addEventListener('change', saveState);

            document.getElementById('propertySelect').addEventListener('change', function() {
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
                    // Update other fields if necessary
                } else {
                    // Reset fields if no property is selected
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
                    // Reset other fields if necessary
                }
            });

            restoreState();
        });
    </script>
    <!-- Include jQuery and json-viewer library -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="src/jquery.json-viewer.js"></script>
    <link href="css/jquery.json-viewer.css" type="text/css" rel="stylesheet">
    <script>
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
    </script>
    <script>
        $(function() {
            $('#btn-json-viewer').click(displayLocalStorageData);
            $('p.options input[type=checkbox]').click(displayLocalStorageData);

            displayLocalStorageData();
        });
    </script>
    <script>
        function loadDynamicScript() {
            
            var isGdprChecked = document.getElementById('checkboxGDPR').checked;
            var isCcpaChecked = document.getElementById('checkboxCCPA').checked;
            var isUsnatChecked = document.getElementById('checkboxUSNAT').checked;

            var isUsnatTransitionChecked = document.getElementById('usnatTransition').checked;
            
            var propertyId = document.getElementById('propertyId').value;
            var accountId = document.getElementById('accountId').value;
            var propertyName = document.getElementById('propertyName').value;
            var authId = document.getElementById('authId').value;
            var campaignEnvElement = document.querySelector('input[name="campaignEnv"]:checked');
            var campaignEnv = campaignEnvElement ? campaignEnvElement.value : 'prod';

            var selectedEnvironment = document.querySelector('input[name="environment"]:checked').value;
            var environmentPrefix = selectedEnvironment === 'preprod' ? 'preprod-' : '';
            
            var inlineScript = document.createElement('script');
            inlineScript.type = 'text/javascript';
            inlineScript.innerHTML = `
                        window._sp_ = {
                            config: {
                                accountId: ${accountId ? accountId : 22},
                                baseEndpoint: 'https://${environmentPrefix}cdn.privacy-mgmt.com',
                                propertyHref: 'https://${propertyName}',
                                campaignEnv: "${campaignEnv}",
                                ${authId ? `authId: "${authId}",` : ''}
                                ${isGdprChecked ? 'gdpr: {},' : ''}
                                ${isCcpaChecked ? 'ccpa: {},' : ''}
                                ${isUsnatChecked ? `usnat: { transitionCCPAAuth: ${isUsnatTransitionChecked} },` : ''}
                                events: {
                                    onConsentReady: function (campaignType, uuid, consent) {
                                        displayLocalStorageData();
                                        window.postMessage({
                                            name: 'onConsentReady',
                                            payload: {
                                                campaignType,
                                                uuid,
                                                consent
                                            }
                                        }, '*');
                                        console.log("onConsentReady");
                                    },
                                    onMessageChoiceSelect: function () { console.log("[event] onMessageChoiceSelect", arguments); },
                                    onMessageReady: function () { console.log("[event] onMessageReady", arguments); },
                                    onMessageChoiceError: function () { console.log("[event] onMessageChoiceError", arguments);},
                                    onPrivacyManagerAction: function () { console.log("[event] onPrivacyManagerAction", arguments);},
                                    onPMCancel: function () { console.log("[event] onPMCancel", arguments); },
                                    onMessageReceiveData: function () { console.log("[event] onMessageReceiveData", arguments);},
                                    onSPPMObjectReady: function () { console.log("[event] onSPPMObjectReady", arguments); },
                                    onConsentReady: function (consentUUID, euconsent) { 
                                        console.log("[event] onConsentReady", arguments);
                                        displayLocalStorageData();
                                    },
                                    onError: function (category, errorCode) { 
                                        console.log("[event] onError", arguments); 
                                        alert("category[" + category + "] errorCode[" + errorCode + "]");
                                    },
                                }
                            }
                        };
                    `;
            document.head.appendChild(inlineScript);
            
            
            var externalScript = document.createElement('script');
            externalScript.src = `https://${environmentPrefix}cdn.privacy-mgmt.com/unified/wrapperMessagingWithoutDetection.js`;
            externalScript.async = true;
            document.head.appendChild(externalScript);

            console.log('Scripts loaded dynamically.');
        }
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
                    "campaigns": ["USNAT", "CCPA"]
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