 <!-- Footer -->

 <footer class="mt-lg-3">
     <div class="text-center fw-light">
         <span>Copyright &copy; BBWS VII 2021</span>
     </div>
 </footer>
 <!-- End Footer -->
 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Yakin ingin keluar ?</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
             </div>
         </div>
     </div>
 </div>
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Script -->
 <script type="text/javascript" src="<?= base_url('assets/'); ?>js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/jquery.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
 </script>
 <script src="https://kit.fontawesome.com/206142bfe3.js" crossorigin="anonymous"></script>

 <script>
     $(function() {
         $('[data-bs-toggle="tooltip"]').tooltip();
     });
 </script>
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="<?= base_url('assets/js/'); ?>script.js"></script>
 <!-- End Script -->

 </body>

 </html>