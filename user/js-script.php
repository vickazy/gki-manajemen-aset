
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'responsive'  : true
    })
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
	$('.modalLink').click(function(){
		var id = $(this).attr('data-id');
		console.log(id);
		$.ajax({
			url:"ajax.php",
			cache:false,
			type: "GET",
			data: "ID="+id,
			success:function(result){
				console.log(result);
        var data = JSON.parse(result);
        $('#id_user').val(data.id);
        $('#nama').val(data.nama);
        $('#username').val(data.username);
        $('#password').val(data.password);
        $('#hak_akses').val(data.role);
        $('#keterangan').val(data.keterangan);
			}
		});
	});
  $('.modalDelete').click(function(){
    var id = $(this).attr('delete-id');
    console.log(id);
    $("#id-komisi").val(id);
  });
  $('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
      $('#message').html('Matching').css('color', 'green');
    } else 
      $('#message').html('Not Matching').css('color', 'red');
  });
  $('#new_password, #new_confirm_password').on('keyup', function () {
    if ($('#new_password').val() == $('#new_confirm_password').val()) {
      $('#message1').html('Matching').css('color', 'green');
    } else 
      $('#message1').html('Not Matching').css('color', 'red');
  });
</script>
<script>
  $('.logout').on('click', function (event) {
      event.preventDefault();
      swal({
          title: 'Do you want to log out?',
          type: 'warning',
          showCancelButton: true,
          //confirmButtonColor: '#d9534f',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
      }).then((result) => {
          if (result.value) {
              swal({
                  title: "Success!",
                  text: "Redirecting in 2 seconds.",
                  type: "success",
                  timer: 2000,
                  showConfirmButton: false
                  }).then(function(){
                      window.location.href = "../logout.php";
                      //return false;
                  })
              }
          }
      )
  });
</script>