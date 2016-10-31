<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/jQuery.print.js"></script>
<script type='text/javascript'>
$(function() {
$(".printiha").on('click', function() {
var id = $(this).attr('rel');	
var html = $("#ele"+id).html();
$('#toprint').html(html);
$('#toprint').show();
$('#toprint').print();
$('#toprint').hide();
});
});
</script> 
  </body>
</html>