<script src="<?=base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/conditional.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>assets/vendors/fastclick/lib/fastclick.js"></script>
<script src="<?=base_url();?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?=base_url();?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?=base_url();?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url();?>assets/vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="<?=base_url();?>assets/vendors/iCheck/icheck.min.js"></script>
<!-- jQuery Tags Input -->
<script src="<?=base_url();?>assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Chart.js -->
<script src="<?=base_url();?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?=base_url();?>assets/js/custom.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        show_anggota();
        $("#myModal").modal({backdrop: 'static', keyboard: false},'show');
        $('#ModalN').click(function(){
            $("#myModal").modal('hide');
  		    $('#ModalU').modal({backdrop: 'static', keyboard: false},'show');
        });
        $('#tema').val('<?= $usulan->tema ?>');
        $('#nidn').change(function(){
            var nidn=$(this).val();
            $.ajax({
                url : "<?php echo base_url(); ?>user/getDosen",
                method : "POST",
                data : {nidn: nidn},
                async : false,
                dataType : 'json',
                success: function(data){
                    //var obj = JSON.parse(data);
                    $('#namaDosen').val(data.nama);
                    console.log(data.nama);
                }
            });
        });
        function show_anggota(){
            $.ajax({
                type : 'ajax',
                url : '<?php echo site_url('user/getAnggota') ?>',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var a = 1;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+a+'</td>'+
                                '<td>'+data[i].idAnggota+'</td>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-product_code="'+data[i].id+'">Hapus</a>'+
                                '</td>'+
                                '</tr>';
                        a++;
                    }
                    console.log(data);
                    $('#show_data').html(html);
                }
            });
        }
        var anggota1 = $('#live_form input:radio[name=anggota1]');
        $('#tambah_anggota_dosen').on('click',function(){
            tambahDosen();
        });

        $('#tambah_anggota_mahasiswa').on('click',function(){
            tambahMahasiswa();
        });

        function tambahDosen(){
            var nidn = $('#nidn').val();
            var nama = $('#namaDosen').val();
            var ju = $('#ju').val();
            $.ajax({
                type :"POST",
                url  : "<?php echo site_url('user/tambahAnggota') ?>",
                dataType : "JSON",
                data : {nidn:nidn,nama:nama,ju:ju},
                success : function(data){
                    $('[name="nidn"').val("");
                    $('[name="namaDosen"]').val("");
                    show_anggota();
                }
            });
            return false;
        }

        function tambahMahasiswa(){
            var nidn = $('#nim').val();
            var nama = $('#namamhs').val();
            var ju = $('#ju').val();
            $.ajax({
                type :"POST",
                url  : "<?php echo site_url('user/tambahAnggota') ?>",
                dataType : "JSON",
                data : {nidn:nidn,nama:nama,ju:ju},
                success : function(data){
                    $('[name="nim"').val("");
                    $('[name="namamhs"]').val("");
                    show_anggota();
                }
            });
        }

        $('#show_data').on('click','.item_delete',function(){
            var product_code = $(this).data('product_code');
            
            $('#Modal_Delete').modal('show');
            $('[name="id"]').val(product_code);
        });

        $('#btn_delete').on('click',function(){
            var product_code = $('#id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('user/hapusAnggota')?>",
                dataType : "JSON",
                data : {id:product_code},
                success: function(data){
                    $('[name="id"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_anggota();
                }
            });
            return false;
        });

        //$("#myModal").modal({,backdrop: 'static', keyboard: false})
    });

</script>
