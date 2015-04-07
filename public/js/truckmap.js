// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see a blank space instead of the map, this
// is probably because you have denied permission for location sharing.

(function(){
  function CustomMarker(latlng, map, args) {
    this.latlng = latlng; 
    this.args = args; 
    this.setMap(map); 
  }
   
  CustomMarker.prototype = new google.maps.OverlayView();
   
  CustomMarker.prototype.draw = function() {
    
    var self = this;
    
    var div = this.div;
    
    if (!div) {
    
      div = this.div = document.createElement('div');
        
      var m_width = 30;
      var m_height = 43/30 * m_width; 
      var m_top = m_height * -1;
      var textColor = self.args.color;
      if(textColor == "yellow"){
        textColor = "black";
      }
      var type = self.args.type || "marker";

      if(type == "truck"){
        m_width = 60;
        m_height = 40;
        m_top = -10;

      }



      div.className = 'marker';
      div.innerHTML = " <img style='cursor:pointer;width:"+m_width+"px;' src='/images/"+type+"_"+self.args.color+".png'>"+
        "<span style='color:"+textColor+";cursor:pointer;position: absolute; left: 0px; width: 30px; text-align: center; top: 8px; z-index: 100;' >" + 
          self.args.index+"</span>"; 

      div.style.position = 'absolute';

      if(self.args.zIndex != null){
        div.style.zIndex = self.args.zIndex ;
      }else{
        div.style.zIndex = 3000 - self.args.index;
      }

      div.style.cursor = 'pointer';
      div.style.width = m_width + 'px';
      div.style.height = m_height+'px';
      div.style.marginLeft = (-1 * (m_width/2)) +"px";
      div.style.marginTop = m_top +"px";
      div.style.background = 'transparent';
      
      if (self.args && typeof(self.args.marker_id) !== 'undefined') {
        div.dataset.marker_id = self.args.marker_id;
      }
      
      google.maps.event.addDomListener(div, "click", function(event) {      
        google.maps.event.trigger(self, "click");
      });
      
      var panes = this.getPanes();
      panes.overlayImage.appendChild(div);
    }
    
    var point = this.getProjection().fromLatLngToDivPixel(this.latlng);
    
    if (point) {
      div.style.left = (point.x)  + 'px';
      div.style.top = (point.y) + 'px';
    }
  };
   
  CustomMarker.prototype.remove = function() {
    if (this.div) {
      this.div.parentNode.removeChild(this.div);
      this.div = null;
    } 
  };
   
  CustomMarker.prototype.getPosition = function() {
    return this.latlng; 
  };


  var map;

  window.map_init = function () {
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
    //http://google-maps-icons.googlecode.com/files/red01.png
    
    if($("#map-canvas2").length){
      var name = $("#map-canvas2").data("name");
      map2 = new google.maps.Map(document.getElementById('map-canvas2'), mapOptions);
    }
    initGeoCoder();

    $.each(window.schools,function(ind,s){
      if(s.name == name){
        s.marker.setMap(map2);
      }
    });
  }


  var ta = {
    "全區": "yellow",
    "北區":  "green",
    "中區":  "orange",
    "南區":  "red",
    "高屏區": "purple",
    "東區":  "blue"
  };

  var fa = {
    "全區": "black",
    "北區":  "white",
    "中區":  "white",
    "南區":  "white",
    "高屏區": "white",
    "東區":  "white"
  };
  var own = {
    "全區": "台中家商",
    "北區":  "新北高工",
    "中區":  "台中高工",
    "南區":  "南二中",
    "高屏區": "鳳山高工",
    "東區":  "花蓮高工"
  };

  var infowindow = new google.maps.InfoWindow({
      content: ""
  });

  function initGeoCoder(){
    var markers = {};
    var markerInfos = {};
    var flightPlanCoordinates = [];


    var openMaker = function (infowindow,data,marker){
        infowindow.setContent("<h3>" + data.name + 
          "</h3><p>地址：" + 
          data.address+"</p>"+
          "<p>活動時間："+data.start+" ~ "+data.end+" </p>"+
          "<p>所屬區域：<span style='padding:5px;background:"+ta[data.area]+";color:" + fa[data.area] + ";'>"+data.area+"</span> </p>"+
          "<p><a href='/school/info/"+data.name+"'>詳細資料</p>"

          /* + "<a href='"+data.event+"' >報名志工 »</a>" */ );
        infowindow.open(map,marker);
        map.setCenter({lat:data.lat,lng:data.lng});
    };

    var openTruck = function (infowindow,data,marker){
        infowindow.setContent("<h1>"+data.area+" Fab Truck</h1>"+
          "<p>負責學校："+own[data.area]+"</p>"+
          "<p>最近活動在 <a href='/school/info/"+data.name+"'>" + 
            data.name+" ("+data.start +" ~ "+ data.end +") </a></p>"
        );
        infowindow.open(map,marker);
        map.setCenter({lat:data.lat,lng:data.lng});
    };

    var lines = {};


    window.schools = window.schools || [];
    
    $.each(window.schools,function(ind,sch){
      sch.end_time = new Date("2015/"+sch.end.replace(/[下上]午/,""));
    });
    window.schools = window.schools.sort(function(a1,a2){
      return a1.end_time.getTime() - a2.end_time.getTime();
    });

    $.each(window.schools,function(){

      var $school= this;
//      console.log($school.start_time,$school.start);

      if($school.lat == null){
        return true;
      }
      var ind = parseInt($school.index,10);
      var info = markerInfos[ind] = {
        area:$school.area,
        ind:ind,
        name:$school.name,
        address:$school.address,
        start:$school.start,
        end:$school.end,
        lat:$school.lat,
        lng:$school.lng,
        event:$school.url
      };

      var that = this;
      var marker = new CustomMarker(
          new google.maps.LatLng(info.lat, info.lng),
          map,
          { 
            color:ta[$school.area],
            index:$school.index
          }
      );
      
      $school.marker = marker;

      google.maps.event.addListener(marker, 'click', function() {
        openMaker(infowindow,info,marker);
      });
      // markers[$school.area +":"+ $school.index] = marker;

      if(!lines[$school.area]){
        lines[$school.area]=[];
      }
      lines[$school.area].push(new google.maps.LatLng(info.lat, info.lng));
    });

    for(var key in lines){
      var flightPath = new google.maps.Polyline({
        path: lines[key],
        geodesic: true,
        strokeColor: ta[key],
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



    /*
        "全區": "yellow",
    "北區":  "green",
    "中區":  "orange",
    "南區":  "red",
    "高屏區": "purple",
    "東區":  "blue"
    */

    var auto_mode = true;
    var areas = {};
    var next_events = [],event_size = 6;
    var $now = new Date();
    $.each(window.schools,function(ind,$school){
      google.maps.event.addListener($school.marker, 'click', function() {
        auto_mode = false;
      });
      if($now < $school.end_time.getTime() && next_events.length < event_size && !areas[$school.area]){
        next_events.push($school);
        areas[$school.area] =1 ;
      }
    });

    $.each(next_events,function(ind,info){
      var marker = new CustomMarker(
          new google.maps.LatLng(info.lat, info.lng),
          map,
          { 
            color:ta[info.area],
            index:"",
            type:"truck",
            zIndex:4001
          }
      );

      google.maps.event.addListener(marker, 'click', function() {
        auto_mode = false;
        openTruck(infowindow,info,marker);
      });      
      // var marker = new google.maps.Marker({
      //     position: new google.maps.LatLng(info.lat, info.lng),
      //     icon:"/images/truck_"+ta[info.area]+".png",
      //     map: map,
      //     title:info.area+" 卡車",
      //     zIndex:10000
      // });
    });


    var auto_index = 1 ;
    google.maps.event.trigger(next_events[0].marker, "click");
    window.setInterval(function(){
      if(!auto_mode){
        return true;
      }
      auto_index = (auto_index +1 ) % event_size;
      google.maps.event.trigger(next_events[auto_index].marker, "click");
    },8000);



    $( ".map-search" ).autocomplete({
      minLength: 0,
      source: window.schools,
      select: function( event, ui ) {
        google.maps.event.trigger(ui.item.marker, "click");
        auto_mode = false;
        return true;
      },
      search: function(oEvent, oUi) {
        // get current input value
        var sValue = $(oEvent.target).val();
        // init new search array
        var aSearch = [];
        // for each element in the main array ...
        $(window.schools).each(function(iIndex, sElement) {
            if (sElement.name.indexOf(sValue) != -1) {
                aSearch.push(sElement);
            }
        });
        // change search array
        $(this).autocomplete('option', {'source': aSearch});
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.start.replace("下午","").replace("上午","") +" "+item.name +" </a>" )
        .appendTo( ul );
    };

  }
})();