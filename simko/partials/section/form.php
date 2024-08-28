<?
global $forms;
global $brands;
$brand = is_brand();
$location = is_location();
$content = $content ?? get_the_content();
?>
<section class="form<?= !empty($classes) ? ' ' . implode(' ', $classes) : '';?>" id="form">
	<div class="content">
		<div class="inner-content">
			<article>
                <?= !empty($heading) ? '<h1>'.($heading).'</h1>' : ''; ?>
				<?= apply_filters('the_content', $content) ?>
			</article>
			<aside>
                <div class="form-wrapper">
					<?php if( $brand->ID === 8643 && is_page('schedule-appointment') ): ?>
						<iframe
							id="JotFormIFrame-240186390664965"
							title="Prairie Grove Orthodontics - Appointment Form"
							onload="window.parent.scrollTo(0,0)"
							allowtransparency="true"
							allowfullscreen="true"
							allow="geolocation; microphone; camera"
							src="https://forms.liine.com/240186390664965"
							frameborder="0"
							style="min-width:100%;max-width:100%;height:539px;border:none;"
							scrolling="no"
						>
						</iframe>
						<script type="text/javascript">
							var ifr = document.getElementById("JotFormIFrame-240186390664965");
							if (ifr) {
							var src = ifr.src;
							var iframeParams = [];
							if (window.location.href && window.location.href.indexOf("?") > -1) {
								iframeParams = iframeParams.concat(window.location.href.substr(window.location.href.indexOf("?") + 1).split('&'));
							}
							if (src && src.indexOf("?") > -1) {
								iframeParams = iframeParams.concat(src.substr(src.indexOf("?") + 1).split("&"));
								src = src.substr(0, src.indexOf("?"))
							}
							iframeParams.push("isIframeEmbed=1");
							ifr.src = src + "?" + iframeParams.join('&');
							}
							window.handleIFrameMessage = function(e) {
							if (typeof e.data === 'object') { return; }
							var args = e.data.split(":");
							if (args.length > 2) { iframe = document.getElementById("JotFormIFrame-" + args[(args.length - 1)]); } else { iframe = document.getElementById("JotFormIFrame"); }
							if (!iframe) { return; }
							switch (args[0]) {
								case "scrollIntoView":
								iframe.scrollIntoView();
								break;
								case "setHeight":
								iframe.style.height = args[1] + "px";
								if (!isNaN(args[1]) && parseInt(iframe.style.minHeight) > parseInt(args[1])) {
									iframe.style.minHeight = args[1] + "px";
								}
								break;
								case "collapseErrorPage":
								if (iframe.clientHeight > window.innerHeight) {
									iframe.style.height = window.innerHeight + "px";
								}
								break;
								case "reloadPage":
								window.location.reload();
								break;
								case "loadScript":
								if( !window.isPermitted(e.origin, ['jotform.com', 'jotform.pro']) ) { break; }
								var src = args[1];
								if (args.length > 3) {
									src = args[1] + ':' + args[2];
								}
								var script = document.createElement('script');
								script.src = src;
								script.type = 'text/javascript';
								document.body.appendChild(script);
								break;
								case "exitFullscreen":
								if      (window.document.exitFullscreen)        window.document.exitFullscreen();
								else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
								else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
								else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
								else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
								break;
							}
							var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false;
							if(isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) {
								var urls = {"docurl":encodeURIComponent(document.URL),"referrer":encodeURIComponent(document.referrer)};
								iframe.contentWindow.postMessage(JSON.stringify({"type":"urls","value":urls}), "*");
							}
							};
							window.isPermitted = function(originUrl, whitelisted_domains) {
							var url = document.createElement('a');
							url.href = originUrl;
							var hostname = url.hostname;
							var result = false;
							if( typeof hostname !== 'undefined' ) {
								whitelisted_domains.forEach(function(element) {
									if( hostname.slice((-1 * element.length - 1)) === '.'.concat(element) ||  hostname === element ) {
										result = true;
									}
								});
								return result;
							}
							};
							if (window.addEventListener) {
							window.addEventListener("message", handleIFrameMessage, false);
							} else if (window.attachEvent) {
							window.attachEvent("onmessage", handleIFrameMessage);
							}
						</script>
					<?php elseif ($brand->ID === 8643 && is_page('free-orthodontic-consultation') ): ?>
						<iframe
							id="JotFormIFrame-240186307930959"
							title="Prairie Grove Orthodontics - New Patient Form"
							onload="window.parent.scrollTo(0,0)"
							allowtransparency="true"
							allowfullscreen="true"
							allow="geolocation; microphone; camera"
							src="https://forms.liine.com/240186307930959"
							frameborder="0"
							style="min-width:100%;max-width:100%;height:539px;border:none;"
							scrolling="no"
							>
						</iframe>
						<script type="text/javascript">
							var ifr = document.getElementById("JotFormIFrame-240186307930959");
							if (ifr) {
							var src = ifr.src;
							var iframeParams = [];
							if (window.location.href && window.location.href.indexOf("?") > -1) {
								iframeParams = iframeParams.concat(window.location.href.substr(window.location.href.indexOf("?") + 1).split('&'));
							}
							if (src && src.indexOf("?") > -1) {
								iframeParams = iframeParams.concat(src.substr(src.indexOf("?") + 1).split("&"));
								src = src.substr(0, src.indexOf("?"))
							}
							iframeParams.push("isIframeEmbed=1");
							ifr.src = src + "?" + iframeParams.join('&');
							}
							window.handleIFrameMessage = function(e) {
							if (typeof e.data === 'object') { return; }
							var args = e.data.split(":");
							if (args.length > 2) { iframe = document.getElementById("JotFormIFrame-" + args[(args.length - 1)]); } else { iframe = document.getElementById("JotFormIFrame"); }
							if (!iframe) { return; }
							switch (args[0]) {
								case "scrollIntoView":
								iframe.scrollIntoView();
								break;
								case "setHeight":
								iframe.style.height = args[1] + "px";
								if (!isNaN(args[1]) && parseInt(iframe.style.minHeight) > parseInt(args[1])) {
									iframe.style.minHeight = args[1] + "px";
								}
								break;
								case "collapseErrorPage":
								if (iframe.clientHeight > window.innerHeight) {
									iframe.style.height = window.innerHeight + "px";
								}
								break;
								case "reloadPage":
								window.location.reload();
								break;
								case "loadScript":
								if( !window.isPermitted(e.origin, ['jotform.com', 'jotform.pro']) ) { break; }
								var src = args[1];
								if (args.length > 3) {
									src = args[1] + ':' + args[2];
								}
								var script = document.createElement('script');
								script.src = src;
								script.type = 'text/javascript';
								document.body.appendChild(script);
								break;
								case "exitFullscreen":
								if      (window.document.exitFullscreen)        window.document.exitFullscreen();
								else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
								else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
								else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
								else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
								break;
							}
							var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false;
							if(isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) {
								var urls = {"docurl":encodeURIComponent(document.URL),"referrer":encodeURIComponent(document.referrer)};
								iframe.contentWindow.postMessage(JSON.stringify({"type":"urls","value":urls}), "*");
							}
							};
							window.isPermitted = function(originUrl, whitelisted_domains) {
							var url = document.createElement('a');
							url.href = originUrl;
							var hostname = url.hostname;
							var result = false;
							if( typeof hostname !== 'undefined' ) {
								whitelisted_domains.forEach(function(element) {
									if( hostname.slice((-1 * element.length - 1)) === '.'.concat(element) ||  hostname === element ) {
										result = true;
									}
								});
								return result;
							}
							};
							if (window.addEventListener) {
							window.addEventListener("message", handleIFrameMessage, false);
							} else if (window.attachEvent) {
							window.attachEvent("onmessage", handleIFrameMessage);
							}
						</script>
					<?php elseif ($brand->ID === 8643 && is_page('contact-us') ): ?>
						<iframe
							id="JotFormIFrame-240186315377963"
							title="Prairie Grove Orthodontics - Contact Form"
							onload="window.parent.scrollTo(0,0)"
							allowtransparency="true"
							allowfullscreen="true"
							allow="geolocation; microphone; camera"
							src="https://forms.liine.com/240186315377963"
							frameborder="0"
							style="min-width:100%;max-width:100%;height:539px;border:none;"
							scrolling="no"
						>
						</iframe>
						<script type="text/javascript">
							var ifr = document.getElementById("JotFormIFrame-240186315377963");
							if (ifr) {
							var src = ifr.src;
							var iframeParams = [];
							if (window.location.href && window.location.href.indexOf("?") > -1) {
								iframeParams = iframeParams.concat(window.location.href.substr(window.location.href.indexOf("?") + 1).split('&'));
							}
							if (src && src.indexOf("?") > -1) {
								iframeParams = iframeParams.concat(src.substr(src.indexOf("?") + 1).split("&"));
								src = src.substr(0, src.indexOf("?"))
							}
							iframeParams.push("isIframeEmbed=1");
							ifr.src = src + "?" + iframeParams.join('&');
							}
							window.handleIFrameMessage = function(e) {
							if (typeof e.data === 'object') { return; }
							var args = e.data.split(":");
							if (args.length > 2) { iframe = document.getElementById("JotFormIFrame-" + args[(args.length - 1)]); } else { iframe = document.getElementById("JotFormIFrame"); }
							if (!iframe) { return; }
							switch (args[0]) {
								case "scrollIntoView":
								iframe.scrollIntoView();
								break;
								case "setHeight":
								iframe.style.height = args[1] + "px";
								if (!isNaN(args[1]) && parseInt(iframe.style.minHeight) > parseInt(args[1])) {
									iframe.style.minHeight = args[1] + "px";
								}
								break;
								case "collapseErrorPage":
								if (iframe.clientHeight > window.innerHeight) {
									iframe.style.height = window.innerHeight + "px";
								}
								break;
								case "reloadPage":
								window.location.reload();
								break;
								case "loadScript":
								if( !window.isPermitted(e.origin, ['jotform.com', 'jotform.pro']) ) { break; }
								var src = args[1];
								if (args.length > 3) {
									src = args[1] + ':' + args[2];
								}
								var script = document.createElement('script');
								script.src = src;
								script.type = 'text/javascript';
								document.body.appendChild(script);
								break;
								case "exitFullscreen":
								if      (window.document.exitFullscreen)        window.document.exitFullscreen();
								else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
								else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
								else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
								else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
								break;
							}
							var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false;
							if(isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) {
								var urls = {"docurl":encodeURIComponent(document.URL),"referrer":encodeURIComponent(document.referrer)};
								iframe.contentWindow.postMessage(JSON.stringify({"type":"urls","value":urls}), "*");
							}
							};
							window.isPermitted = function(originUrl, whitelisted_domains) {
							var url = document.createElement('a');
							url.href = originUrl;
							var hostname = url.hostname;
							var result = false;
							if( typeof hostname !== 'undefined' ) {
								whitelisted_domains.forEach(function(element) {
									if( hostname.slice((-1 * element.length - 1)) === '.'.concat(element) ||  hostname === element ) {
										result = true;
									}
								});
								return result;
							}
							};
							if (window.addEventListener) {
							window.addEventListener("message", handleIFrameMessage, false);
							} else if (window.attachEvent) {
							window.attachEvent("onmessage", handleIFrameMessage);
							}
						</script>
					<?php elseif( $brand->ID === 3291 && is_page('schedule-appointment') ): ?>
						<iframe
						id="JotFormIFrame-240185886545972"
						title="Great River Orthodontics - Appointment Form"
						onload="window.parent.scrollTo(0,0)"
						allowtransparency="true"
						allowfullscreen="true"
						allow="geolocation; microphone; camera"
						src="https://forms.liine.com/240185886545972"
						frameborder="0"
						style="min-width:100%;max-width:100%;height:539px;border:none;"
						scrolling="no"
						>
    					</iframe>
						<script type="text/javascript">
							var ifr = document.getElementById("JotFormIFrame-240185886545972");
							if (ifr) {
							var src = ifr.src;
							var iframeParams = [];
							if (window.location.href && window.location.href.indexOf("?") > -1) {
								iframeParams = iframeParams.concat(window.location.href.substr(window.location.href.indexOf("?") + 1).split('&'));
							}
							if (src && src.indexOf("?") > -1) {
								iframeParams = iframeParams.concat(src.substr(src.indexOf("?") + 1).split("&"));
								src = src.substr(0, src.indexOf("?"))
							}
							iframeParams.push("isIframeEmbed=1");
							ifr.src = src + "?" + iframeParams.join('&');
							}
							window.handleIFrameMessage = function(e) {
							if (typeof e.data === 'object') { return; }
							var args = e.data.split(":");
							if (args.length > 2) { iframe = document.getElementById("JotFormIFrame-" + args[(args.length - 1)]); } else { iframe = document.getElementById("JotFormIFrame"); }
							if (!iframe) { return; }
							switch (args[0]) {
								case "scrollIntoView":
								iframe.scrollIntoView();
								break;
								case "setHeight":
								iframe.style.height = args[1] + "px";
								if (!isNaN(args[1]) && parseInt(iframe.style.minHeight) > parseInt(args[1])) {
									iframe.style.minHeight = args[1] + "px";
								}
								break;
								case "collapseErrorPage":
								if (iframe.clientHeight > window.innerHeight) {
									iframe.style.height = window.innerHeight + "px";
								}
								break;
								case "reloadPage":
								window.location.reload();
								break;
								case "loadScript":
								if( !window.isPermitted(e.origin, ['jotform.com', 'jotform.pro']) ) { break; }
								var src = args[1];
								if (args.length > 3) {
									src = args[1] + ':' + args[2];
								}
								var script = document.createElement('script');
								script.src = src;
								script.type = 'text/javascript';
								document.body.appendChild(script);
								break;
								case "exitFullscreen":
								if      (window.document.exitFullscreen)        window.document.exitFullscreen();
								else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
								else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
								else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
								else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
								break;
							}
							var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false;
							if(isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) {
								var urls = {"docurl":encodeURIComponent(document.URL),"referrer":encodeURIComponent(document.referrer)};
								iframe.contentWindow.postMessage(JSON.stringify({"type":"urls","value":urls}), "*");
							}
							};
							window.isPermitted = function(originUrl, whitelisted_domains) {
							var url = document.createElement('a');
							url.href = originUrl;
							var hostname = url.hostname;
							var result = false;
							if( typeof hostname !== 'undefined' ) {
								whitelisted_domains.forEach(function(element) {
									if( hostname.slice((-1 * element.length - 1)) === '.'.concat(element) ||  hostname === element ) {
										result = true;
									}
								});
								return result;
							}
							};
							if (window.addEventListener) {
							window.addEventListener("message", handleIFrameMessage, false);
							} else if (window.attachEvent) {
							window.attachEvent("onmessage", handleIFrameMessage);
							}
						</script>
					<?php elseif( $brand->ID === 3291 && is_page('free-orthodontic-consultation') ): ?>
						<iframe
							id="JotFormIFrame-240186420192955"
							title="Great River Orthodontics - New Patient Form"
							onload="window.parent.scrollTo(0,0)"
							allowtransparency="true"
							allowfullscreen="true"
							allow="geolocation; microphone; camera"
							src="https://forms.liine.com/240186420192955"
							frameborder="0"
							style="min-width:100%;max-width:100%;height:539px;border:none;"
							scrolling="no"
							>
    					</iframe>
						<script type="text/javascript">
							var ifr = document.getElementById("JotFormIFrame-240186420192955");
							if (ifr) {
							var src = ifr.src;
							var iframeParams = [];
							if (window.location.href && window.location.href.indexOf("?") > -1) {
								iframeParams = iframeParams.concat(window.location.href.substr(window.location.href.indexOf("?") + 1).split('&'));
							}
							if (src && src.indexOf("?") > -1) {
								iframeParams = iframeParams.concat(src.substr(src.indexOf("?") + 1).split("&"));
								src = src.substr(0, src.indexOf("?"))
							}
							iframeParams.push("isIframeEmbed=1");
							ifr.src = src + "?" + iframeParams.join('&');
							}
							window.handleIFrameMessage = function(e) {
							if (typeof e.data === 'object') { return; }
							var args = e.data.split(":");
							if (args.length > 2) { iframe = document.getElementById("JotFormIFrame-" + args[(args.length - 1)]); } else { iframe = document.getElementById("JotFormIFrame"); }
							if (!iframe) { return; }
							switch (args[0]) {
								case "scrollIntoView":
								iframe.scrollIntoView();
								break;
								case "setHeight":
								iframe.style.height = args[1] + "px";
								if (!isNaN(args[1]) && parseInt(iframe.style.minHeight) > parseInt(args[1])) {
									iframe.style.minHeight = args[1] + "px";
								}
								break;
								case "collapseErrorPage":
								if (iframe.clientHeight > window.innerHeight) {
									iframe.style.height = window.innerHeight + "px";
								}
								break;
								case "reloadPage":
								window.location.reload();
								break;
								case "loadScript":
								if( !window.isPermitted(e.origin, ['jotform.com', 'jotform.pro']) ) { break; }
								var src = args[1];
								if (args.length > 3) {
									src = args[1] + ':' + args[2];
								}
								var script = document.createElement('script');
								script.src = src;
								script.type = 'text/javascript';
								document.body.appendChild(script);
								break;
								case "exitFullscreen":
								if      (window.document.exitFullscreen)        window.document.exitFullscreen();
								else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
								else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
								else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
								else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
								break;
							}
							var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false;
							if(isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) {
								var urls = {"docurl":encodeURIComponent(document.URL),"referrer":encodeURIComponent(document.referrer)};
								iframe.contentWindow.postMessage(JSON.stringify({"type":"urls","value":urls}), "*");
							}
							};
							window.isPermitted = function(originUrl, whitelisted_domains) {
							var url = document.createElement('a');
							url.href = originUrl;
							var hostname = url.hostname;
							var result = false;
							if( typeof hostname !== 'undefined' ) {
								whitelisted_domains.forEach(function(element) {
									if( hostname.slice((-1 * element.length - 1)) === '.'.concat(element) ||  hostname === element ) {
										result = true;
									}
								});
								return result;
							}
							};
							if (window.addEventListener) {
							window.addEventListener("message", handleIFrameMessage, false);
							} else if (window.attachEvent) {
							window.attachEvent("onmessage", handleIFrameMessage);
							}
						</script>
					<?php elseif( $brand->ID === 3291 && is_page('contact-us') ): ?>
						<iframe
							id="JotFormIFrame-240155804147957"
							title="Great River Orthodontics - Contact Form"
							onload="window.parent.scrollTo(0,0)"
							allowtransparency="true"
							allowfullscreen="true"
							allow="geolocation; microphone; camera"
							src="https://forms.liine.com/240155804147957"
							frameborder="0"
							style="min-width:100%;max-width:100%;height:539px;border:none;"
							scrolling="no"
							>
    					</iframe>
						<script type="text/javascript">
							var ifr = document.getElementById("JotFormIFrame-240155804147957");
							if (ifr) {
							var src = ifr.src;
							var iframeParams = [];
							if (window.location.href && window.location.href.indexOf("?") > -1) {
								iframeParams = iframeParams.concat(window.location.href.substr(window.location.href.indexOf("?") + 1).split('&'));
							}
							if (src && src.indexOf("?") > -1) {
								iframeParams = iframeParams.concat(src.substr(src.indexOf("?") + 1).split("&"));
								src = src.substr(0, src.indexOf("?"))
							}
							iframeParams.push("isIframeEmbed=1");
							ifr.src = src + "?" + iframeParams.join('&');
							}
							window.handleIFrameMessage = function(e) {
							if (typeof e.data === 'object') { return; }
							var args = e.data.split(":");
							if (args.length > 2) { iframe = document.getElementById("JotFormIFrame-" + args[(args.length - 1)]); } else { iframe = document.getElementById("JotFormIFrame"); }
							if (!iframe) { return; }
							switch (args[0]) {
								case "scrollIntoView":
								iframe.scrollIntoView();
								break;
								case "setHeight":
								iframe.style.height = args[1] + "px";
								if (!isNaN(args[1]) && parseInt(iframe.style.minHeight) > parseInt(args[1])) {
									iframe.style.minHeight = args[1] + "px";
								}
								break;
								case "collapseErrorPage":
								if (iframe.clientHeight > window.innerHeight) {
									iframe.style.height = window.innerHeight + "px";
								}
								break;
								case "reloadPage":
								window.location.reload();
								break;
								case "loadScript":
								if( !window.isPermitted(e.origin, ['jotform.com', 'jotform.pro']) ) { break; }
								var src = args[1];
								if (args.length > 3) {
									src = args[1] + ':' + args[2];
								}
								var script = document.createElement('script');
								script.src = src;
								script.type = 'text/javascript';
								document.body.appendChild(script);
								break;
								case "exitFullscreen":
								if      (window.document.exitFullscreen)        window.document.exitFullscreen();
								else if (window.document.mozCancelFullScreen)   window.document.mozCancelFullScreen();
								else if (window.document.mozCancelFullscreen)   window.document.mozCancelFullScreen();
								else if (window.document.webkitExitFullscreen)  window.document.webkitExitFullscreen();
								else if (window.document.msExitFullscreen)      window.document.msExitFullscreen();
								break;
							}
							var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false;
							if(isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) {
								var urls = {"docurl":encodeURIComponent(document.URL),"referrer":encodeURIComponent(document.referrer)};
								iframe.contentWindow.postMessage(JSON.stringify({"type":"urls","value":urls}), "*");
							}
							};
							window.isPermitted = function(originUrl, whitelisted_domains) {
							var url = document.createElement('a');
							url.href = originUrl;
							var hostname = url.hostname;
							var result = false;
							if( typeof hostname !== 'undefined' ) {
								whitelisted_domains.forEach(function(element) {
									if( hostname.slice((-1 * element.length - 1)) === '.'.concat(element) ||  hostname === element ) {
										result = true;
									}
								});
								return result;
							}
							};
							if (window.addEventListener) {
							window.addEventListener("message", handleIFrameMessage, false);
							} else if (window.attachEvent) {
							window.attachEvent("onmessage", handleIFrameMessage);
							}
						</script>
					<?php elseif( $brand->ID === 16332 && is_page('contact-us') ): ?>
						<iframe
      						id="JotFormIFrame-242116023870952"
      						title="Ross Orthodontics - Contact Form"
      						onload="window.parent.scrollTo(0,0)"
      						allowtransparency="true"
      						allow="geolocation; microphone; camera; fullscreen"
      						src="https://forms.liine.com/242116023870952"
      						frameborder="0"
      						style="min-width:100%;max-width:100%;height:539px;border:none;"
      						scrolling="no"
    					>
    					</iframe>
    					<script src='https://forms.liine.com/s/umd/latest/for-form-embed-handler.js'></script>
    					<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-242116023870952']", "https://forms.liine.com/")</script>
					<?php elseif( $brand->ID === 16332 && is_page('free-orthodontic-consultation') ): ?>
						<iframe
      						id="JotFormIFrame-242116056916959"
      						title="Ross Orthodontics - New Patient Form"
      						onload="window.parent.scrollTo(0,0)"
      						allowtransparency="true"
      						allow="geolocation; microphone; camera; fullscreen"
      						src="https://forms.liine.com/242116056916959"
      						frameborder="0"
      						style="min-width:100%;max-width:100%;height:539px;border:none;"
      						scrolling="no"
    					>
    					</iframe>
    					<script src='https://forms.liine.com/s/umd/latest/for-form-embed-handler.js'></script>
    					<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-242116056916959']", "https://forms.liine.com/")</script>
					<?php elseif( $brand->ID === 16332 && is_page('schedule-appointment') ): ?>
						<iframe
      						id="JotFormIFrame-242116016402945"
      						title="Ross Orthodontics - Appointment Form"
      						onload="window.parent.scrollTo(0,0)"
      						allowtransparency="true"
      						allow="geolocation; microphone; camera; fullscreen"
      						src="https://forms.liine.com/242116016402945"
      						frameborder="0"
      						style="min-width:100%;max-width:100%;height:539px;border:none;"
      						scrolling="no"
    					>
    					</iframe>
    					<script src='https://forms.liine.com/s/umd/latest/for-form-embed-handler.js'></script>
    					<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-242116016402945']", "https://forms.liine.com/")</script>
					<?php elseif( $brand->ID === 13032 && is_page('contact-us') ): ?>
						<iframe
      						id="JotFormIFrame-242185334899974"
      						title="Dietmeier Orthodontics - Contact Form"
      						onload="window.parent.scrollTo(0,0)"
      						allowtransparency="true"
      						allow="geolocation; microphone; camera; fullscreen"
      						src="https://forms.liine.com/242185334899974"
      						frameborder="0"
      						style="min-width:100%;max-width:100%;height:539px;border:none;"
      						scrolling="no"
    					>
    					</iframe>
    					<script src='https://forms.liine.com/s/umd/latest/for-form-embed-handler.js'></script>
    					<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-242185334899974']", "https://forms.liine.com/")</script>
					<?php elseif( $brand->ID === 13032 && is_page('free-orthodontic-consultation') ): ?>
						<iframe
      						id="JotFormIFrame-242186150152953"
      						title="Dietmeier Orthodontics - New Patient Form"
      						onload="window.parent.scrollTo(0,0)"
      						allowtransparency="true"
      						allow="geolocation; microphone; camera; fullscreen"
      						src="https://forms.liine.com/242186150152953"
      						frameborder="0"
      						style="min-width:100%;max-width:100%;height:539px;border:none;"
      						scrolling="no"
    					>
    					</iframe>
    					<script src='https://forms.liine.com/s/umd/latest/for-form-embed-handler.js'></script>
    					<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-242186150152953']", "https://forms.liine.com/")</script>
					<?php elseif( $brand->ID === 13032 && is_page('schedule-appointment') ): ?>
						<iframe
      						id="JotFormIFrame-242186155230955"
      						title="Dietmeier Orthodontics - Appointment Form"
      						onload="window.parent.scrollTo(0,0)"
      						allowtransparency="true"
      						allow="geolocation; microphone; camera; fullscreen"
      						src="https://forms.liine.com/242186155230955"
      						frameborder="0"
      						style="min-width:100%;max-width:100%;height:539px;border:none;"
      						scrolling="no"
    					>
    					</iframe>
    					<script src='https://forms.liine.com/s/umd/latest/for-form-embed-handler.js'></script>
    					<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-242186155230955']", "https://forms.liine.com/")</script>
					<?php elseif( $brand->ID === 16618 && is_page('contact-us') ): ?>
						<iframe
      						id="JotFormIFrame-242274455990969"
      						title="Central Lakes Orthodontics - Contact Form"
      						onload="window.parent.scrollTo(0,0)"
      						allowtransparency="true"
      						allow="geolocation; microphone; camera; fullscreen"
      						src="https://forms.liine.com/242274455990969"
      						frameborder="0"
      						style="min-width:100%;max-width:100%;height:539px;border:none;"
      						scrolling="no"
    					>
    					</iframe>
    					<script src='https://forms.liine.com/s/umd/latest/for-form-embed-handler.js'></script>
    					<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-242274455990969']", "https://forms.liine.com/")</script>
					<?php elseif( $brand->ID === 16618 && is_page('free-orthodontic-consultation') ): ?>
						<iframe
      						id="JotFormIFrame-242275162989973"
      						title="Central Lakes Orthodontics - New Patient Form"
      						onload="window.parent.scrollTo(0,0)"
      						allowtransparency="true"
      						allow="geolocation; microphone; camera; fullscreen"
      						src="https://forms.liine.com/242275162989973"
      						frameborder="0"
      						style="min-width:100%;max-width:100%;height:539px;border:none;"
      						scrolling="no"
    					>
    					</iframe>
    					<script src='https://forms.liine.com/s/umd/latest/for-form-embed-handler.js'></script>
    					<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-242275162989973']", "https://forms.liine.com/")</script>
					<?php elseif( $brand->ID === 16618 && is_page('schedule-appointment') ): ?>
						<iframe
      						id="JotFormIFrame-242275388878980"
      						title="Central Lakes Orthodontics - Appointment Form"
      						onload="window.parent.scrollTo(0,0)"
      						allowtransparency="true"
      						allow="geolocation; microphone; camera; fullscreen"
      						src="https://forms.liine.com/242275388878980"
      						frameborder="0"
      						style="min-width:100%;max-width:100%;height:539px;border:none;"
      						scrolling="no"
    					>
    					</iframe>
    					<script src='https://forms.liine.com/s/umd/latest/for-form-embed-handler.js'></script>
    					<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-242275388878980']", "https://forms.liine.com/")</script>
					<?php elseif( $brand->ID === 12097 && is_page('contact-us') ): ?>
						<iframe
      						id="JotFormIFrame-242394144527963"
      						title="Shawano Ortho - Contact Form"
      						onload="window.parent.scrollTo(0,0)"
      						allowtransparency="true"
      						allow="geolocation; microphone; camera; fullscreen"
      						src="https://forms.liine.com/242394144527963"
      						frameborder="0"
      						style="min-width:100%;max-width:100%;height:539px;border:none;"
      						scrolling="no"
    					>
    					</iframe>
    					<script src='https://forms.liine.com/s/umd/latest/for-form-embed-handler.js'></script>
    					<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-242394144527963']", "https://forms.liine.com/")</script>
					<?php elseif( $brand->ID === 12097 && is_page('free-orthodontic-consultation') ): ?>
						<iframe
      						id="JotFormIFrame-242395175379973"
      						title="Shawano Ortho - Appointment Form"
      						onload="window.parent.scrollTo(0,0)"
      						allowtransparency="true"
      						allow="geolocation; microphone; camera; fullscreen"
      						src="https://forms.liine.com/242395175379973"
      						frameborder="0"
      						style="min-width:100%;max-width:100%;height:539px;border:none;"
      						scrolling="no"
    					>
    					</iframe>
    					<script src='https://forms.liine.com/s/umd/latest/for-form-embed-handler.js'></script>
    					<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-242395175379973']", "https://forms.liine.com/")</script>
					<?php elseif( $brand->ID === 12097 && is_page('schedule-appointment') ): ?>
						<iframe
      						id="JotFormIFrame-242394684793977"
      						title="Shawano Ortho - New Patient Form"
      						onload="window.parent.scrollTo(0,0)"
      						allowtransparency="true"
      						allow="geolocation; microphone; camera; fullscreen"
      						src="https://forms.liine.com/242394684793977"
      						frameborder="0"
      						style="min-width:100%;max-width:100%;height:539px;border:none;"
      						scrolling="no"
    					>
    					</iframe>
    					<script src='https://forms.liine.com/s/umd/latest/for-form-embed-handler.js'></script>
    					<script>window.jotformEmbedHandler("iframe[id='JotFormIFrame-242394684793977']", "https://forms.liine.com/")</script>
					<?php else: ?>
                    	<? $forms->generateForm($form); ?>
					<?php endif; ?>		
                </div>
			</aside>
		</div>
	</div>
</section>
