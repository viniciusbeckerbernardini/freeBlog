<?php
// Requesting the config file
require_once('inc' . DIRECTORY_SEPARATOR . 'config.php');
// Requesting the header file
require_once('templates' . DIRECTORY_SEPARATOR . 'header.php');
?>

<div class="empty-space"></div>
<div class="row">
    <div class="col s12">
        <div class="col s6">
            <div class="fb-cb" style="background:url('/view/library/img/photo-1.jpg') no-repeat center center;">
                <div class="fb-cb-hv">
                    <p>Programador ama café? <br> Descubra porque amamos tanto algo tão ruim</p>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="col s12">
                <div class="fb-cb" style="background:url('/view/library/img/photo-2.jpg') no-repeat center center;">
                    <div class="fb-cb-hv">
                        <p>
                        Você é programador?
                        <br>
                        Vamos descobrir agora
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="fb-cb" style="background:url('/view/library/img/photo-3.jpg') no-repeat center center;">
                    <div class="fb-cb-hv">
                        <p>Tiroteio e renteri <br> Galo véio ruim de briga </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
// Requesting the footer file
require_once('templates' . DIRECTORY_SEPARATOR . 'footer.php');
