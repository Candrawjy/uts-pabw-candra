<footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>&copy; <script>document.write(new Date().getFullYear());</script> Poodies</small>
            </div>
        </div>
    </footer>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda akan keluar dari aplikasi!</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?=site_url('logout')?>">Yakin</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="<?=base_url('')?>assets/dashboard/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('')?>assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('')?>assets/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?=base_url('')?>assets/dashboard/vendor/chart.js/Chart.js"></script>
    <script src="<?=base_url('')?>assets/dashboard/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?=base_url('')?>assets/dashboard/vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="<?=base_url('')?>assets/dashboard/vendor/jquery.magnific-popup.min.js"></script>
    <script src="<?=base_url('assets/js/sweetalert2.min.js')?>"></script>
    <script src="<?=base_url('')?>assets/dashboard/js/admin-datatables.js"></script>
    <script src="<?=base_url('')?>assets/dashboard/select2/select2.min.js"></script>
    <script src="<?=base_url('assets/js/custom.js')?>"></script>
    <script src="<?=base_url('')?>assets/dashboard/js/admin.js"></script>
    <script src="<?=base_url('')?>assets/dashboard/js/admin-charts.js"></script>
</body>
</html>