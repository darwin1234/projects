<html>
  <head><title>OpenLayers Marker Popups</title>
  <style>
  .olFramedCloudPopupContent{overflow:hidden!important;}
  </style>
  </head>
  <body>
  <div id="mapdiv"></div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/openlayers/2.11/lib/OpenLayers.js"></script> 
  <script>
    map = new OpenLayers.Map("mapdiv");
    map.addLayer(new OpenLayers.Layer.OSM());
    
    epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
    projectTo = map.getProjectionObject(); //The map projection (Spherical Mercator)
   
    var lonLat = new OpenLayers.LonLat(116.363625 ,39.913818 ).transform(epsg4326, projectTo);
          
    
    var zoom=14;
    map.setCenter (lonLat, zoom);

    var vectorLayer = new OpenLayers.Layer.Vector("Overlay");
    
    // Define markers as "features" of the vector layer:
   
 <?php foreach($businesslist as $businessItems){?>
  
   var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point(<?php echo $businessItems->dslong;?> ,<?php echo $businessItems->dslat;?> ).transform(epsg4326, projectTo),
            {description:'<img src="<?php echo $businessItems->business_image;?>" style="width:250px;"><p><?php echo $businessItems->business_name;?>, (<?php echo $businessItems->business_category;?>)</p><a href="#">View</a>'} ,
            {externalGraphic: 'http://media.local/marker.png', graphicHeight: 55, graphicWidth: 51, graphicXOffset:-12, graphicYOffset:-25  }
        );    
    vectorLayer.addFeatures(feature);
 <?php }?>
  

   
    map.addLayer(vectorLayer);
 
    
    //Add a selector control to the vectorLayer with popup functions
    var controls = {
      selector: new OpenLayers.Control.SelectFeature(vectorLayer, { onSelect: createPopup, onUnselect: destroyPopup })
    };

    function createPopup(feature) {
      feature.popup = new OpenLayers.Popup.FramedCloud("pop",
          feature.geometry.getBounds().getCenterLonLat(),
          null,
          '<div class="markerContent">'+feature.attributes.description+'</div>',
          null,
          true,
          function() { controls['selector'].unselectAll(); }
      );
      //feature.popup.closeOnMove = true;
      map.addPopup(feature.popup);
    }

    function destroyPopup(feature) {
      feature.popup.destroy();
      feature.popup = null;
    }
    
    map.addControl(controls['selector']);
    controls['selector'].activate();
      
  </script>
  
</body></html>
    