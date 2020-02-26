<script src="{{asset('themes/theme1/js/jquery.js')}}"></script>
<script src="{{asset('themes/theme1/js/plugins.js')}}"></script>
<script src="{{asset('themes/theme1/demos/nonprofit/js/events.js')}}"></script>
<script src="{{asset('themes/theme1/js/functions.js')}}"></script>
<script src="{{asset('themes/theme1/js/components/bs-datatable.js')}}"></script>
<script src="{{asset('themes/theme1/js/components/moment.js')}}"></script>
<script src="{{asset('themes/theme1/js/components/datepicker.js')}}"></script>
<!-- Start of mizanamanah Zendesk Widget script -->
    <script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=66f193fc-95ad-4c98-a136-cd956b6edec3"> </script>
    <!-- End of mizanamanah Zendesk Widget script -->
    
    <!-- Global site tag (gtag.js) - Google Ads: 955472882 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-955472882"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'AW-955472882');
    </script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-74860308-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-74860308-1');
    </script>
    
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '1451309445049544');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1451309445049544&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
<script type="text/javascript">

	$(document).ready(function(){
		$("#tanggal_konfirmasi").datepicker({
			dateFormat : "Y/m/d",
			todayHighlight: true,
			autoclose: true,
			pickerPosition: 'bottom-left'
		});
	});

	document.addEventListener("DOMContentLoaded",
		function() {
			var div, n,
			v = document.getElementsByClassName("youtube-player");
			for (n = 0; n < v.length; n++) {
				div = document.createElement("div");
				div.setAttribute("data-id", v[n].dataset.id);
				div.innerHTML = loadThumb(v[n].dataset.id);
				div.onclick = loadIframe;
				v[n].appendChild(div);
			}
		});
	
	function loadThumb(id) {
		var thumb = '<img src="https://i.ytimg.com/vi/ID/hqdefault.jpg">',
		play = '<div class="play"></div>';
		return thumb.replace("ID", id) + play;
	}
	
	function loadIframe() {
		var iframe = document.createElement("iframe");
		var embed = "https://www.youtube.com/embed/ID?autoplay=1";
		iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
		iframe.setAttribute("frameborder", "0");
		iframe.setAttribute("allowfullscreen", "1");
		this.parentNode.replaceChild(iframe, this);
	}
</script>