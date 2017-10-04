<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 0.1
    </div>
    <strong>Copyright &copy; 2017 <a href="http://ruzagorod.ru">Ruzagorod</a>.</strong> All rights
    reserved.
</footer>

<!-- jQuery 3 -->
<script src="{{asset("admin/bower_components/jquery/dist/jquery.min.js")}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset("admin/bower_components/jquery-ui/jquery-ui.min.js")}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset("admin/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<!-- Morris.js charts -->
<script src="{{asset("admin/bower_components/raphael/raphael.min.js")}}"></script>
<script src="{{asset("admin/bower_components/morris.js/morris.min.js")}}"></script>
<!-- Sparkline -->
<script src="{{asset("admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js")}}"></script>
<!-- jvectormap -->
<script src="{{asset("admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}"></script>
<script src="{{asset("admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset("admin/bower_components/jquery-knob/dist/jquery.knob.min.js")}}"></script>
<!-- daterangepicker -->
<script src="{{asset("admin/bower_components/moment/min/moment.min.js")}}"></script>
<script src="{{asset("admin/bower_components/bootstrap-daterangepicker/daterangepicker.js")}}"></script>
<!-- datepicker -->
<script src="{{asset("admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset("admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
<!-- Slimscroll -->
<script src="{{asset("admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
<!-- FastClick -->
<script src="{{asset("admin/bower_components/fastclick/lib/fastclick.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("admin/dist/js/adminlte.min.js")}}"></script>

<script>
    $(document).ready(function(){
        $('input[type="checkbox"]').each(function(){
            this.value = (Number(this.checked));
        });

        $('input[type="checkbox"]').change(function(){
            this.value = (Number(this.checked));
        });

        $('.delete-img').click(function(e){
            e.preventDefault();
            if(confirm('Вы уверены что хотите удалить это изображение?')){
                $(this).parent().hide();
                var href = this.pathname;
                console.log(href, '<- href deleting page');
                $.ajax({
                    url: href,
                    data: { "_token": "{{ csrf_token() }}" },
                    type: "DELETE",
                    success: function(response){
                        console.log(response);
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            }
        });


        $('.img-wrap').hover(function(){
            $(this).find('i').toggle();
        });
    });
</script>
@section('footerSection')
    @show