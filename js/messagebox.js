
(function () {
var options = {
facebook: "1537309449844275", // Facebook page ID
line: "//lin.ee/pyv0gCc", // Line QR code URL
call_to_action: "與我們聯絡", // Call to action
button_color: "#666666", // Color of button
position: "left", // Position may be 'right' or 'left'
order: "facebook,line", // Order of buttons
};
var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
})();
