

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Sticky Footer -->
<footer class="sticky-footer">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © <a href="https://www.hashnative.com" target="_blank">Hash Native</a> 2019</span>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script>
    function printDiv(divName){
        // var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        // document.body.innerHTML = printContents;

        window.print();
        document.body.innerHTML = originalContents;
    }
</script>


<script>
    $(document).ready(function(){

        $(".add-new").click(function () {

            alert('test');

            var table = $("#product_info_table");
            var count_table_tbody_tr = $("#product_info_table tbody tr").length;
            var row_id = count_table_tbody_tr + 1;

            $.ajax({
                // console.log(reponse.x);
                var html = '<tr id="row_'+row_id+'">'+
                    '<td>'+
                    '<select class="form-control select_group product" data-row-id="'+row_id+'" id="product_'+row_id+'" name="product[]" style="width:100%;" onchange="getProductData('+row_id+')">'+
                    '<option value=""></option>';


            html += '</select>'+
                '</td>'+
                '<td><input type="number" name="qty[]" id="qty_'+row_id+'" class="form-control" onkeyup="getTotal('+row_id+')"></td>'+
                '<td><input type="text" name="rate[]" id="rate_'+row_id+'" class="form-control" disabled><input type="hidden" name="rate_value[]" id="rate_value_'+row_id+'" class="form-control"></td>'+
                '<td><input type="text" name="amount[]" id="amount_'+row_id+'" class="form-control" disabled><input type="hidden" name="amount_value[]" id="amount_value_'+row_id+'" class="form-control"></td>'+
                '<td><button type="button" class="btn btn-default" onclick="removeRow(\''+row_id+'\')"><i class="fa fa-close"></i></button></td>'+
                '</tr>';

            if(count_table_tbody_tr >= 1) {
                $("#product_info_table tbody tr:last").after(html);
            }
            else {
                $("#product_info_table tbody").html(html);
            }




        });

            return false;
        });



    });

</script>



<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/sb-admin.min.js'); ?>"></script>

<!-- Demo scripts for this page-->
<script src="<?php echo base_url('assets/js/demo/datatables-demo.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/demo/chart-area-demo.js'); ?>"></script>

<!-- Demo scripts for this page-->
<script src="<?php echo base_url('assets/js/demo/chart-area-demo.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/demo/chart-bar-demo.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/demo/chart-pie-demo.js'); ?>"></script>


<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>



</body>

</html>
