<?php include(__DIR__."/../_header.php") ?>
  <header id="head" class="secondary"></header>
  <!-- container -->
  <div class="container">

    <ol class="breadcrumb">
      <li><a href="<?=site_url("/")?>">台灣創客運動</a></li>
      <li class="active">2015 Fab Truck 3D列印校園巡迴計畫</li>
    </ol>

    <div class="row">
      
     
      <!-- Sidebar -->
      <aside class="col-sm-5 ">

        <div class="widget">
          <header class="page-header">
            <h4 class="page-title">行程</h4>
          </header>
          <table style="height:600px;overflow:auto;display:block;" class="table table-bordered table-school">
            <tr>
              <td width="10%">#</td>
              <td width="30%">巡迴日期</td>
              <td>巡迴學校</td>
            </tr>
            <?php foreach($events as $ind => $event) { ?>
            <tr>
              <td><?=$event["index"]?></td><td><?=$event["start"]?> ~ <?=$event["end"]?></td>
              <td data-ind="<?=h($event["index"])?>" 
                  data-lat="<?=$event["lat"]?>"
                  data-lng="<?=$event["lng"]?>" 
                  data-name="<?=h($event["name"])?>"
                  data-address="<?=h($event["address"])?>" 
                  data-start="<?=h($event["start"])?>" 
                  data-end="<?=h($event["end"])?>"
                  data-event="<?=site_url("school/event/".$event["index"])?>"
                   class="school"> 
                <a href="javascript:void 0;" class="handler"><?=$event["name"]?> </a>
                <br />
                <a target="_blank" href="http://tonyq-b35d68.kktix.cc/events/46b73ab2" class="pull-right">報名志工 »</a>
              </td>
            </tr>
            <?php } ?>
          </table>


        </div>

      </aside>
      <!-- /Sidebar -->

      <!-- Article main content -->
      <article class="col-sm-7 about-content">
        <header class="page-header">
          <h4 class="page-title">活動地圖</h4>
        </header>


        <div id="map-canvas" style="height:600px;width:100%;"></div>

      </article>
      <!-- /Article -->

    </div>
  </div>  <!-- /container -->

<?php function js_section(){ ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3pjQV-YnaO1pAhhE-RhsM_0bPuzlYFVg"></script>
 <script>
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see a blank space instead of the map, this
// is probably because you have denied permission for location sharing.

var map;

function initialize() {
  var mapOptions = {
    zoom: 8,
    center:{lat:23.7386712,lng:120.7118946},
    panControl: true,
    zoomControl: true,
    mapTypeControl: true,
    scaleControl: true,
    streetViewControl: true,
    overviewMapControl: true
  };
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  http://google-maps-icons.googlecode.com/files/red01.png

  initGeoCoder();
}

function initGeoCoder(){
  var markers = {};
  var markerInfos = {};
  var flightPlanCoordinates = [];
  var infowindow = new google.maps.InfoWindow({
      content: ""
  });

  var openMaker = function (infowindow,data,marker){
      infowindow.setContent("<h3>" + data.name + 
        "</h3><p>地址：" + 
        data.address+"</p>"+
        "<p>"+data.start+" ~ "+data.end+" </p>"+
        "<a href='"+data.event+"' >報名志工 »</a>");
      infowindow.open(map,marker);
      map.setCenter({lat:data.lat,lng:data.lng});
  }  
  $(".school").each(function(){

    var $school= $(this);
    var ind = parseInt($school.data("ind"),10);

    var info = markerInfos[ind] = {
      ind:ind,
      name:$school.data("name"),
      address:$school.data("address"),
      start:$school.data("start"),
      end:$school.data("end"),
      lat:$school.data("lat"),
      lng:$school.data("lng"),
      event:$school.data("event")
    };

    var that = this;
    var pic_ind = ind < 10 ? "0" +ind : ind;
    var marker = new google.maps.Marker({
        map: map,
        position: {lat: info.lat, lng: info.lng},
        icon:"http://google-maps-icons.googlecode.com/files/red"+
          pic_ind +".png",
        title:info.name
    });
    
    markers[ind] = marker;

    google.maps.event.addListener(marker, 'click', function() {
      openMaker(infowindow,info,marker);
    });
    flightPlanCoordinates.push(new google.maps.LatLng($(this).data("lat"), $(this).data("lng")));
  });

  $(".school .handler").click(function(){
    var $school = $(this).parents(".school");
    var ind = $school.data("ind");
    var data = markerInfos[ind];
    openMaker(infowindow,data,markers[$school.data("ind")]);
  });

  var flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: '#FF00CC',
    strokeOpacity: 1.0,
    strokeWeight: 1,
    icons: [{
      icon: {
        path: 'M 0,-1 0,1',
        strokeOpacity: 1,
        scale: 4
      },
      offset: '0',
      repeat: '20px'
    }],
  });

  flightPath.setMap(map);

}


google.maps.event.addDomListener(window, 'load', initialize);

    </script>

<?php } ?>

<?php include(__DIR__."/../_footer.php") ?>

