	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
	
    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	 <script>
        $(document).ready(function(){
        	// .increaseBtn use in html class name
          $(".increaseBtn").click(function(){
          	var id=$(this).attr('id');
          	var val=$("#quantity"+id).val();
          	var newVal=parseInt(val)+1;
          	var singlePrice=$(".singlePrice"+id).text();
          	var netPrice=parseInt(singlePrice)*newVal;
          	// alert(id);
          	// alert(val);
          	// alert(newVal);
          	// alert(singlePrice);
          	// alert(netPrice);
          	$("#quantity"+id).val(newVal);

          	$(".showNetPrice"+id).text("Net Price: : "+netPrice);
          	// below 6 lines are use for change the price values at the run time on web page
          	$.ajax({
          		url : 'cartUpdate.php',
          		method: 'POST',
          		data: {id:id,qty:newVal},
          		success:function(d){}
          	});
          });
          $(".decreaseBtn").click(function(){

          	var id=$(this).attr('id');
          	var val=$("#quantity"+id).val();
          	var newVal=parseInt(val) > 1 ? parseInt(val)-1 : parseInt(val);
          	var singlePrice=$(".singlePrice"+id).text();
          	var netPrice=parseInt(singlePrice)*newVal;
          	$("#quantity"+id).val(newVal);
          	$(".showNetPrice"+id).text("Net Price: : "+netPrice);
          	// below 6 lines are use for change the price values at the run time on web page
          	$.ajax({
          		url : 'cartUpdate.php',
          		method: 'POST',
          		data: {id:id,qty:newVal},
          		success:function(d){}
          	});

          });
        });
                </script>