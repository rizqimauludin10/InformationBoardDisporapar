<!-- Footer -->
    <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; DISPORAPAR KKR 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(''); ?>/assets/jquery/jquery.min.js"></script>
    <script src="<?= base_url(''); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(''); ?>/assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(''); ?>/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="<?= base_url(''); ?>/assets/chart.js/Chart.min.js"></script> -->
    <script src="<?= base_url(''); ?>/assets/jquery/jquery.js"></script>
    <script src="<?= base_url(''); ?>/assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="<?= base_url(''); ?>/assets/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(''); ?>/assets/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(''); ?>/assets/js/demo/datatables-demo.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
    $(function() {
        $("#datepicker").datepicker({
            format:'yyyy-mm-dd'
        });

        
    });

    function dataActivity(){
    $.ajax({
        url : "<?= site_url('b_activity/getData') ?>" ,
        dataType : "json" ,
        success: function(response) {
        $('.viewdata').html(response.data);
        },

        error: function(xhr,ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
    }

    $(document).ready(function(){
    dataActivity();

    $('.button_actTambah').click(function(e){
        e.preventDefault();

        $.ajax({
        url : "<?= site_url('b_activity/addData') ?>" ,
        dataType : "json" ,
        success: function(response) {
        $('.viewdata').html(response.data);
        },

        error: function(xhr,ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
    })

    })
    </script>
</script>
    

</body>
</html>