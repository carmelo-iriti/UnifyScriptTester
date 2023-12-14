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