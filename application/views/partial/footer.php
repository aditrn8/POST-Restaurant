</div>
</div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>



  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
  <script src="<?= base_url('vendor/jquery/jqueryea.min.js') ?>"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?= base_url('vendor/chart.js/Chart.min.js') ?>"></script>
  <script src="<?= base_url('vendor/datatables/jquery.dataTables.js') ?>"></script>
  <script src="<?= base_url('vendor/datatables/dataTables.bootstrap4.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('js/sb-admin.min.js') ?>"></script>
  
  <!-- Demo scripts for this page-->
  <script src="<?= base_url('js/demo/datatables-demo.js') ?>"></script>
  <script src="<?= base_url('js/demo/chart-area-demo.js') ?>"></script>

  </body>
  </html>
  <script type="text/javascript">
$(document).ready(function(){
    $("#simpann").attr('disabled', 'disabled');
    $("#bayar").keyup(function(){
        var harga = parseInt($('#harga').val());
        var bayar = parseInt($('#bayar').val());
        var total = bayar - harga;
        $("#total").val(total);
        if (total < 0 || $("#bayar").val() == '' || $("#total").val() == 'NaN') {
          $("#simpann").attr('disabled', 'disabled');
          $("#total").val(0);
        }else{
          $("#simpann").removeAttr('disabled');
        }
    });
    $("#harga_masakan").keyup(function(){
      var id = 0;
        if ($("#harga_masakan").val() == '' || $("#harga_masakan").val() == 0 || $("#harga_masakan").val() < 0) {
          $("#simpan").attr('disabled', 'disabled');
          $("#update").attr('disabled', 'disabled');
        }else{
          $("#simpan").removeAttr('disabled');
          $("#update").removeAttr('disabled');
        }
    });
});
</script>