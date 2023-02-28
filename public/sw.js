self.addEventListener('push', function (e) {
    if (!(self.Notification && self.Notification.permission === 'granted')) {
        console.log("notifications aren't supported or permission not granted!")//
        return;
    }

    if (e.data) {
        var msg = e.data.json();
        console.log(msg,"from SW")
        
        e.waitUntil(self.registration.showNotification(msg.title, {
            body: msg.body,
            icon: "/assets/images/logo/rollswallah.png",
            vibrate: [200, 100, 200, 100, 200, 100, 200],
            actions: [{action: "",title:"Click Here"}]
        }));

        // console.log(self.registration.showNotification("New Order", {
        //     body: "Hello this is body",
        //     icon: "",
        //     actions: [{action: "get",title:"titlehere"}]
        // }),"e")
    }
});