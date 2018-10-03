<?php
	$pgId = "1589165937878233";
	$accessToken = "EAACae3UlP14BAFZBiUWKIOTMBBhJ3f5lokiV9QdeJZAzqGNGRLSxF5ZCzZBWekccyx0ZAuFRVmNZCB4K6iBK5SJMTXfrp0No2swEkhxylTNQVfoffvUyx6vRPorVMKb5alRMD4BRO6VLmxY2V5KvZCqzcytR2ZBdVVD3s7goqhJcaZBgaMUOai5NfQUUZA7YUjHLEZD";
	$fields = "id, message, link, created_time, type";
	$limit = 5;

	$jsonLink = "https://graph.facebook.com/$pgId/feed?access_token=$accessToken&fields=$fields&limit=$limit";
?>
<script>
function ajax(url, callback){
	var xhttp = new XMLHttpRequest()
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			callback(JSON.parse(this.responseText))
		}else{
			Document.innerHTML = "Failed to load facebook feed"
		}
	}

	xhttp.open("GET", url, true)
	xhttp.send()
}
	
ajax("<?php echo $jsonLink;?>", function(data){
	// console.log(data)e
})
</script>