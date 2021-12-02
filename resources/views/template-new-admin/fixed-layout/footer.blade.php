<footer class="main-footer" style="color: #000">
    <strong>Copyright &copy; Mujib Olympiad.</strong>
    All rights reserved.
    
    <div class="float-right d-none d-sm-inline-block" style="color: #000">
        Powered By <b>ICT Division</b> (Version 1.0.1)
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <span class="text-warning text-sm">Do you really want to logout? Confirm by clicking "Yes" button.</span>
    <form action="/logout" method="post" class="text-center">
        @csrf
        <input type="submit" value="Yes" class="btn btn-danger"/>
    </form>
</aside>
<!-- /.control-sidebar -->