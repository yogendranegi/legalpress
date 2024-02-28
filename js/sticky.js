
!(function () {
    "use strict";

        const width  = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var content = document.getElementById('content');
        if (width > 768) {
            document.getElementsByTagName('body')[0].onscroll = () => {
                sticyHeader();
            };
        }
        var header = document.getElementById("header-main");
        var sticky = header.offsetTop;
        function sticyHeader() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
                content.style.marginTop = "100px";
            } else {
                header.classList.remove("sticky");
                content.style.marginTop = "0";
            }
        }
})();