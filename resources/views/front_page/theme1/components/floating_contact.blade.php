<div class="floating-contact-wrap">
    <div class="floating-contact-btn shadow">
        <i class="floating-contact-icon btn-unactive icon-envelope21"></i>
        <i class="floating-contact-icon btn-active icon-line-plus"></i>
    </div>
    <div class="floating-contact-box">
        <div id="q-contact" class="widget quick-contact-widget clearfix">
            <div class="floating-contact-heading bgcolor p-4 rounded-top">
                <h3 class="mb-0 font-secondary h2 ls0">Quick Contact 👋</h3>
                <p class="mb-0">Get in Touch with Us</p>
            </div>
            <div class="form-widget" data-alert-type="false">
                <div class="form-result"></div>
                <div class="floating-contact-loader css3-spinner" style="position: absolute;">
                    <div class="css3-spinner-bounce1"></div>
                    <div class="css3-spinner-bounce2"></div>
                    <div class="css3-spinner-bounce3"></div>
                </div>
                <div id="floating-contact-submitted" class="p-5 center">
                    <i class="icon-line-mail h1 color"></i>
                    <h4 class="t400 mb-0 font-body">Thank You for Contact Us! Our Team will contact you asap on
                        your email Address.</h4>
                </div>
                <form class="mb-0" id="form" action="{{Route('inbox.post')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text nobg"><i class="icon-user-alt"></i></span>
                        </div>
                        <input type="text" name="nama" id="nama"
                            class="form-control required" value="" placeholder="Enter your Full Name">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text nobg"><i class="icon-at"></i></span>
                        </div>
                        <input type="email" name="email" id="email"
                            class="form-control required" value="" placeholder="Enter your Email Address">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text nobg"><i class="icon-comment21"></i></span>
                        </div>
                        <textarea name="inbox" id="inbox"
                            class="form-control required" cols="30" rows="4"></textarea>
                    </div>
                    <input type="hidden" id="floating-contact-botcheck" name="floating-contact-botcheck"
                        value="" />
                    <button type="button" onclick="cek_simpan()" name="floating-contact-submit"
                        class="btn btn-dark btn-block py-2">Send Message</button>
                    <input type="hidden" name="prefix" value="floating-contact-">
                    <input type="hidden" name="subject" value="Messgae From Floating Contact">
                    <input type="hidden" name="html_title" value="Floating Contact Message">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function cek_simpan(){
        if($("#nama").val() == ""){
            alert('Nama Tidak Boleh Kosong')
        }else if($("#email").val() == ""){
            alert('Email Tidak Boleh Kosong')
        }else if($("#inbox").val() == ""){
            alert('inbox Tidak Boleh Kosong')
        }else{
            alert('Pesan Terkirim')
            $("#form").submit();
            location.reload()
        }
    }
</script>