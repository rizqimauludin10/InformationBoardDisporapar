
<body onload="startTime(), date()">
    <div class="container-fluid bg" id="bg">
        <div class="row align-items-center bg_header">

            <div class="col-sm-3 ml-3 mt-2 p-2 c_date">
                <div class="col-md-12" id="clock"></div> 
                <div class="col-md-12" id="date"></div> 
            </div>

            <div class="col-sm-3 mt-2 ">
            <img class="logo" src="https://i.imgur.com/TJk6ykj.png" alt="Logo Disporapar">
            </div>

            <div class="col-sm-5 text-left mt-2 title">
                <h5 style="font-family: Copperplate, fantasy; color: white; -webkit-text-stroke: 1px black; font-size:22pt;">DISPORAPAR <br> KABUPATEN KUBU RAYA </h5>
            </div>
        </div>

        <div class="row gx-2 mt-3">
            
            
            <div class="col-sm-5">
                <table id="table_fixed">
                    <thead>
                        <tr>
                            <th scope="col"> <h5 style="text-align: center">Agenda 2021</h5></th>
                        </tr>
                    </thead>
                </table>

                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="30000">
                    <div class="carousel-inner">
                        <?php $i=0; foreach($data_act as $act) : ?>
                            <div class="carousel-item <?php if($i==0){echo 'active';}else{echo'';} ?>">
                                <div id="contain">
                                    <table class="table table-warning" id="table_scroll">
                                        <tbody>
                                            <tr>
                                                <td id="tgl"><?= date('d F', strtotime($act['date_act'])); ?></td>
                                                <td id="isitabel">
                                                <?=  word_limiter ($act['title_act'], 10) ?>
                                                <hr>
                                                <?= $act['desc_act'] ?>
                                                <hr>
                                                <?= $act['name_act'] ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php $i++; endforeach ?>
                    </div>
                </div>

                <!-- Jadwal Piket -->

                <table id="table_fixed" class="mt-2">
                    <thead>
                        <tr>
                            <th scope="col"> <h6 style="text-align: center">Jadwal Piket Hari Ini</h6> </th>
                        </tr>
                    </thead>
                </table>

                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="15000">
                    <div class="carousel-inner">
                        <?php $i=0; foreach($data_piket as $piket) : ?>
                            <div class="carousel-item <?php if($i==0){echo 'active';}else{echo'';} ?>">
                                <table class="table table-warning">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Shift <?php if($piket['shift_piket'] == '1'){echo 'Pagi';} else{echo 'Siang';} ?></th>
                                            <td colspan="2">
                                                    <?php 
                                                        if($piket['shift_piket'] == '1' ) 
                                                            {
                                                                echo $piket['name_piket']; 
                                                            } else {
                                                                echo $piket['name_piket'];
                                                            } ?> 
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        <?php $i++; endforeach ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-7 float-end">
                <div class="float-end">
                    <iframe width="520" height="230" src="https://www.youtube.com/embed?listType=playlist&list=PLN4g3wAFypr8w9jSeE6GCddc3Cbf6Ocev" frameborder="0" allow="autoplay encrypted-media"></iframe>
                </div>

                <!-- Pelayanan Info -->
                <div class="info-image">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" data-interval="30000">
                        <div class="carousel-inner">
                        <?php $i=0; foreach($data_plyn as $plyn) : ?>
                            <div class="carousel-item <?php if($i==0){echo 'active';}else{echo'';} ?>">
                            <img class="d-block w-100" src="<?= $plyn['plyn_file'] ?> " alt="<?= $plyn['plyn_name'] ?>">
                            </div>
                        <?php $i++; endforeach ?>
                        </div>
                    </div>
                </div>

                

            </div>
        
        </div>

        <div class="element-to-stick-to-bottom">
            <div>
                <marquee class="py-2" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="5" behavior="scroll" style="color:white; font-size: 18px;">
                <b>Selamat Datang di Dinas Kepemudaan Olahraga dan Pariwisata Kabupaten Kubu Raya | </b>
                <b>Please Follow =>  </b> <b>Instagram : @disporaparkuburaya | </b> <b>Facebook : Disporapar Kabupaten Kubu Raya | </b>  <b>Twitter : @disporaparkkr | </b> <b>Youtube : Disporapar Kabupaten Kubu Raya </b>                
                </marquee>
            </div>
        </div>

        <!-- Modal On Load -->
        <div class="modal fade bd-example-modal-xl" id="myModalonLoad" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered modal-xl" role="dialog">

                <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal Video</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" alt="">
                </div>
                <div class="modal-footer">

                </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <video style="width: 100%; height: auto; margin:0 auto; frameborder:0;" autoplay>
                        <source src="<?= base_url(''); ?>/assets/video/opening.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="modal-footer">

                </div>
                </div>
            </div>
        </div> -->



    </div>
</body>

<script src="<?= base_url(''); ?>/assets/jquery/jquery.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(''); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(''); ?>/assets/bootstrap/js/bootstrap.bundle.js"></script>

<script>

    $(document).ready(function(){
        // setInterval(() => {
        //     console.log("5 Menit")
        //     $('#myModal').modal('show');
        // }, 300000);
    
        // setInterval(() => {
        //     console.log("1 Menit")
        //     $('#myModal').modal('hide');
        // }, 30000);


        // $("#myModalonLoad").modal('show');

        // setInterval(() => {
        //     $("#myModalonLoad").modal('hide');
        // }, 15000);
    });
                        
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('clock').innerHTML = 
        h + ":" + m+ ":" + s;
        var t = setTimeout(startTime, 500);

    }

    function checkTime(i) {
        if(i < 10) {
            i= "0" + i
        };

        return i;
    }

    function date() {

        let todayDate = new Date();
        let dd = String(todayDate.getDate()).padStart(2, '0');
        let mmmm = String(todayDate.toLocaleString('default', { month: 'short' })); //January is 0!
        let yyyy = todayDate.getFullYear();

        todayDate = dd + ' ' + mmmm + ' ' + yyyy;

        const today = new Date();
        const day = today.getDay();
        const daylist = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
        document.getElementById('date').innerHTML = '<b style="color:white"> ' + daylist[day] + '</b>'  + "," + " " + todayDate ;
    }
</script>

<style>
.bg {
    position: relative;
    height: 100vh;
    width: 100%;
}

.bg::before {
    content: "";
    /* background-image: url('https://i.imgur.com/syD8xgg.jpeg'); */
    background-image: url('../assets/image/bg_2.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    position: absolute;
    top: 0px;
    right: 0px;
    bottom: 0px;
    left: 0px;
    /* opacity: 0.75; */
}

@media only screen and (max-width: 767px) {
    html {
        background-image: url('../assets/image/bg_2.jpg');
    }
}
</style>