<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jitsi Meet</title>
    <script src="https://meet.jit.si/external_api.js"></script>
</head>
<body>
    <h1>Join the meeting</h1>
    <div id="jitsi-meet"></div>

    <script type="text/javascript">
        const domain = "meet.jit.si";
        const options = {
            roomName: "meeting-" + new Date().getTime(),
            width: "100%",
            height: "600px",
            parentNode: document.querySelector('#jitsi-meet'),
            configOverwrite: { startWithAudioMuted: true },
            interfaceConfigOverwrite: { filmStripOnly: false }
        };
        const api = new JitsiMeetExternalAPI(domain, options);
    </script>
</body>
</html>
