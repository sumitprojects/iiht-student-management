 <!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('reports'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
  <style type="text/css">
    /*html, body {width:100%;height:100%; padding:0; margin:0; overflow-y:scroll;}*/
    #wpt-container {
        width:100%;
        height:750px;
        padding:0; margin:0; overflow-y:scroll;
    }
    .wpt-control-panel{width: 300px; height: 598px;}
  </style>
  <script type="text/javascript" src="<?=base_url()?>assets/backend/js/wpt.js"></script>
  <div style="margin: 5px;">
    Try to connect to a data source:
    <select id="wpt-select">
      <option value="" selected disabled hidden>Choose here</option>
      <optgroup label="Admin Reports">
        <option value="ws1">Admission Report</option>
        <option value="ws2">Inquiry Report</option>
        <option value="ws3">Assets By Users Report</option>
        <option value="ws4">Assets Stock Report</option>
        <option value="ws5">Attendance Report</option>
        <option value="ws6">Finance Report</option>
      </optgroup>
    </select>
  </div>
</div>

<div id="wpt-container">
  <web-pivot-table option='{"locale":"en"}'/>
</div>

<script>
  
  jQuery(document).ready(function(){
  var wptSelect = document.querySelector('#wpt-select'),
    wpt = document.getElementsByTagName('web-pivot-table')[0];
  const fileMap = {
      ws1: {
      link: "<?=base_url()?>admin/reports_apis/admission",
      type: wpt.Constants.sourceType.WSDATA
    },
    ws2: {
      link: "<?=base_url()?>admin/reports_apis/enquiry",
      type: wpt.Constants.sourceType.WSDATA
    },
    ws3: {
      link: "<?=base_url()?>admin/reports_apis/assetsbyuser",
      type: wpt.Constants.sourceType.WSDATA
    },
    ws4: {
      link: "<?=base_url()?>admin/reports_apis/assetreport",
      type: wpt.Constants.sourceType.WSDATA
    },
    ws5: {
      link: "<?=base_url()?>admin/reports_apis/admission",
      type: wpt.Constants.sourceType.WSDATA
    },
    ws6: {
      link: "<?=base_url()?>admin/reports_apis/admission",
      type: wpt.Constants.sourceType.WSDATA
    },
  };
      var option = {
          uiFlags :{}
      };
     option.uiFlags['dropPrompt'] = 0;
     option.uiFlags['pivotPrompt'] = 0;
     option.uiFlags['connectSource'] = 0;
     option.uiFlags['language'] = 0;
     option.uiFlags['source'] = 0;
     option.uiFlags['open'] = 0;
     option.uiFlags['fileProxyEnabled'] = 0;
     wpt.setOptions(option); 
       wptSelect.addEventListener('change',function(event){
    const file = fileMap[event.target.value];
    console.log("event", event, file);
    wpt.setWptFromWebService(file.link);
  });

  });
  

</script>