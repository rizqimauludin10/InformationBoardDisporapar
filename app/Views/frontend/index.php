
<body onload="startTime(), date()">
    <div class="container-fluid bg" id="bg">
        <div class="row align-items-center bg_header">

            <div class="col-sm-3 ml-3 mt-2 p-2 c_date">
                <div class="col-md-12" id="clock"></div> 
                <div class="col-md-12" id="date"></div> 
            </div>

            <div class="col-sm-3 mt-2 ">
            <img class="logo" src="https://i.imgur.com/TJk6ykj.png" alt="Logo Disporapar">


                <!-- <img src="https://i.imgur.com/KdA0qC5.png" alt="Logo Rising" class="logo" > -->
                <!-- <img style="width:40%" id="f2" src="https://i.imgur.com/FVnhGVT.png" alt="Logo Menanjak" >
                <img style="width:40%" id="f1" src="https://i.imgur.com/TJk6ykj.png" alt="Logo Disporapar" > -->
            </div>

            <div class="col-sm-5 text-left mt-2 title">
                <h5 style="font-family: Copperplate, fantasy; color: white; -webkit-text-stroke: 1px black; font-size:22pt;">PAPAN INFORMASI </h5>
                <h5 style="font-family: Copperplate, fantasy; color: black; font-size:16pt;">DISPORAPAR KABUPATEN KUBU RAYA </h5>
                <!-- <h6 style="font-family: Copperplate, fantasy; color: black; -webkit-text-stroke: 0.3px white; font-size:14pt;">Jalan Angkasa Pura II Komplek Perkantoran Pemda Kubu Raya</h6> -->
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

                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="20000">
                    <div class="carousel-inner">
                    <?php $i=0;?>
                        <?php foreach($data_act as $act) : ?>
                            <div class="carousel-item <?php if($i==0){echo 'active';}else{echo'';} ?>">
                                <div id="contain">
                                    <table class="table table-warning" id="table_scroll">
                                        <tbody>
                                            <tr>
                                                <td id="tgl"><?= date('d F', strtotime($act['date_act'])); ?></td>
                                                <td id="isitabel">
                                                <?=  word_limiter ($act['title_act'], 5) ?>
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
                            <?php $i++; ?>
                        <?php endforeach ?>
                    </div>
                </div>

                <!-- Jadwal Piket -->

                <table id="table_fixed" class="mt-1">
                    <thead>
                        <tr>
                            <th scope="col"> <h6 style="text-align: center">Jadwal Piket Hari Ini</h6></th>
                        </tr>
                    </thead>
                </table>

                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="10000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <table class="table table-warning">
                                <tbody>
                                    <tr>
                                        <th scope="row">Pagi</th>
                                        <td colspan="2">Muhammad Dahlan</td>
                                        <td colspan="2">Maulidia</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="carousel-item">
                        <table class="table table-warning">
                            <tbody>
                                <tr>
                                    <th scope="row">Siang</th>
                                    <td colspan="2">Ismail</td>
                                    <td colspan="2">Rizqi Mauludin</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>


            </div>

            


            <div class="col-sm-7 float-end">
                <div class="float-end">
                    <iframe width="520" height="250" src="http://www.youtube.com/embed/videoseries?list=PLN4g3wAFypr8w9jSeE6GCddc3Cbf6Ocev" frameborder="0" allow="autoplay; allowfullscreen encrypted-media"></iframe>
                        
                </div>

                <div class="float-end">
                    <iframe width="520" height="250" src="http://www.youtube.com/embed/videoseries?list=PLN4g3wAFypr8w9jSeE6GCddc3Cbf6Ocev" frameborder="0" allow="autoplay; allowfullscreen encrypted-media"></iframe>
                        
                </div>


            </div>
        </div>

        <div class="element-to-stick-to-bottom">
            <div>
                <marquee class="py-2" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="5" behavior="scroll" style="color:white; font-size: 16px;">
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
                    <video style="width: 100%; height: auto; margin:0 auto; frameborder:0;" autoplay>
                        <source src="<?= base_url(''); ?>/assets/video/opening.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="modal-footer">

                </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                </div>
                <div class="modal-footer">

                </div>
                </div>
            </div>
        </div>



    </div>
</body>

<script src="<?= base_url(''); ?>/assets/jquery/jquery.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> -->
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(''); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(''); ?>/assets/bootstrap/js/bootstrap.bundle.js"></script>

<script>

    // startImageTransition(); 
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

    // $(document).ready(function() {
    //     pageScroll();
    //     $("#contain").mouseover(function() {
    //         clearTimeout(my_time);
    //     }).mouseout(function() {
    //         pageScroll();
    //     });
        
    //     getWidthHeader('table_scroll');    
    // });

    // var my_time;
    // function pageScroll() {
    //     var objDiv = document.getElementById("contain");
    //     objDiv.scrollTop = objDiv.scrollTop + 1;

    //     if ((objDiv.scrollTop + 150) == objDiv.scrollHeight) {
    //         objDiv.scrollTop = 0;
    //     }
    //     my_time = setTimeout('pageScroll()', 60);
    //     }

    // function getWidthHeader(id_header, id_scroll) {
    //     var colCount = 0;
    //     $('#' + id_scroll + ' tr:nth-child(1) td').each(function () {
    //         if ($(this).attr('colspan')) {
    //         colCount += +$(this).attr('colspan');
    //         } else {
    //         colCount++;
    //         }
    //     });
        
    //     for(var i = 1; i <= colCount; i++) {
    //         var th_width = $('#' + id_scroll + ' > tbody > tr:first-child > td:nth-child(' + i + ')').width();
    //         $('#' + id_header + ' > thead th:nth-child(' + i + ')').css('width',th_width + 'px');
    //     }
    //     }


        function startImageTransition() { 
            var images = document.getElementsByClassName("logo"); 
  
            for (var i = 0; i < images.length; ++i) { 
                images[i].style.opacity = 1; 
            } 
  
            var top = 1; 
  
            var cur = images.length - 1; 
  
            setInterval(changeImage, 3000); 
  
            async function changeImage() { 
  
                var nextImage = (1 + cur) % images.length; 
  
                images[cur].style.zIndex = top + 1; 
                images[nextImage].style.zIndex = top; 
  
                await transition(); 
  
                images[cur].style.zIndex = top; 
  
                images[nextImage].style.zIndex = top + 1; 
  
                top = top + 1; 
  
                images[cur].style.opacity = 1; 
                
                cur = nextImage; 
  
            } 
  
            function transition() { 
                return new Promise(function(resolve, reject) { 
                    var del = 0.01; 
  
                    var id = setInterval(changeOpacity, 10); 
  
                    function changeOpacity() { 
                        images[cur].style.opacity -= del; 
                        if (images[cur].style.opacity <= 0) { 
                            clearInterval(id); 
                            resolve(); 
                        } 
                    } 
  
                }) 
            } 
        } 
</script>