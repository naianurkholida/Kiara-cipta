<div id="copyrights" class="">
    <div class="container clearfix">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6">
                Copyrights &copy; {{date('Y')}} All Rights Reserved by Canvas Inc.<br>
                <div class="copyright-links">
                    <a href="#">
                        Terms of Use
                    </a>
                    /
                    <a href="#">
                        Privacy Policy
                    </a>
                </div>
            </div>

            <div class="col-md-6 d-md-flex flex-md-column align-items-md-end mt-4 mt-md-0">
                <div class="copyrights-menu copyright-links clearfix">
                    @foreach($footer as $foot)
                    <a href="#">
                        {{$foot->judul_menu}}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>