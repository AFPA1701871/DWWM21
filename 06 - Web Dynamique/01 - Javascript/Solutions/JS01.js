function QuelNavigateur() {
    var ua = navigator.userAgent;
    var x = ua.indexOf("MSIE");
    var navig = "MSIE";
    if (x == -1) {
        x = ua.indexOf("Firefox");
        navig = "Firefox";
        if (x == -1) {
            x = ua.indexOf("OPR");
            navig = "Opera";
            if (x == -1) {
                x = ua.indexOf("Edg");
                navig = "Microsoft Edge";
                if (x == -1) {
                    x = ua.indexOf("Chrome");
                    navig = "Chrome";
                    if (x == -1) {
                        x = ua.indexOf("Safari");
                        navig = "Safari"
                    }
                }
            }
        }
    }
    return navig;
}