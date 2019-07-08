<div id="inventory-tab"></div>
<h2 data-i18n="inventory.inventory_items"></h2>
<table class="inventory table table-striped table-bordered">
  <thead>
    <tr>
      <th data-i18n="name"></th>
      <th data-i18n="version"></th>
      <th data-i18n="bundle_id"></th>
      <th data-i18n="path"></th>
    </tr>
  </thead>
  <tbody></tbody>
</table>

<script>
$(document).on('appReady', function(){
	$.getJSON(appUrl + '/module/inventory/get_data/' + serialNumber, function(data){
    tbody = $('table.inventory tbody');
    $.each(data, function(i,item){

      var row = '<tr>'+
          '<td>'+item.name+'</td>'+
          '<td>'+item.version+'</td>'+
          '<td>'+item.bundleid+'</td>'+
          '<td>'+item.path+'</td>'+
      '</tr>';

      tbody.append(row)
    });

    // Initialize datatables
    $('.inventory').dataTable({
      "bServerSide": false,
      "aaSorting": [[1,'asc']],
      "fnDrawCallback": function( oSettings ) {
        $('#inventory-cnt').html(oSettings.fnRecordsTotal());
      }
    });
	});
});
</script>
