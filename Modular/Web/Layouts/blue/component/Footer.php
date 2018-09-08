

<footer>

	<h2>Footer</h2>
	
</footer>

<script>

$(document).ready( () => {
	var returndata = $("#content").ajaxhtml("web/welcome" , (res) => {
		return res;
	});
});



</script>



</body>
</html>