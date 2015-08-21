<script>
function displayDate()
{
document.getElementById("demo2").innerHTML="kuy";
document.getElementById("demo").innerHTML="kuy";
}
function rollback(){
document.getElementById("demo2").innerHTML="This is a paragraph2.";
document.getElementById("demo").innerHTML="This is a paragraph.";
}

function win()
{
	$.post( 
				"<?php echo site_url();?>emeeting/olocon/ajaxTest/",
				{name:"kkkk"}, 
				function( data ) {
					$( "#hum" ).html( data );
					alert( " Data You True?: " + data );
				}
	);
}
</script>

<a id="winwoak"><button  type="button" onclick="win()" >dfghj</button></a>
<h1 id='hum'></h1>