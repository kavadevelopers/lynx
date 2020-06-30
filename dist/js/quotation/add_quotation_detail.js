var box = 0;
$(function(){
	service_id = 'service_id1-1';
	$('#add_box_button').click(function(e){
		if($('#bname').val() && $('#bqty').val() !== ''){
			if(box < 100)
			{
				box++;
				$('#box-append').append('<input type="hidden" name="box_name[]" id="box_name'+box+'" /> <input type="hidden" name="box_qty[]" id="box_qty'+box+'" /><div id="box'+box+'" class="box" style="overflow-x:scroll;"><div class="box-header with-border"><h3 class="box-title" id=""> No.'+box+'-'+$('#bname').val()+'</h3></div><table id="table'+box+'" style=" margin-bottom: 0px;" class="table table-bordered table-hover"><thead><tr><th>SR. No.</th><th>Model Number</th><th>Manufacturer</th><th>Description</th><th>Add Description</th><th>Qty</th><th>Unit Price</th><th>Currency</th><th>Margin in %</th><th>Total Price</th><th>Remarks</th></tr></thead><tbody><tr id="tr'+box+'-1"><td>'+box+'.1<a href="" id="rowremove'+box+'-1" onclick="return remove_row_func(this.id);">remove</a></td><td> <input type="text" id="model_number'+box+'-1" name="" onclick="auto(this.id);" placeholder="Search Here" autocomplete="off" spellcheck="false" required/> <br><a href="" onclick="pop_up(); return false;">Add Product</a> <input type="hidden" id="product_id'+box+'-1" name="product_id[]" /></td><td> <input type="text" id="manufacturer'+box+'-1" name="" style="width:100px;" readonly/></td><td> <input type="text" onclick="disc(this.id);" autocomplete="off" spellcheck="false" id="description'+box+'-1" name="" placeholder="Search Here" required/></td><td><textarea type="text" id="add_disc'+box+'-1" name="add_disc[]" style="width:100px;"></textarea></td><td> <input type="number" id="quntity'+box+'-1" step="0.01" onkeyup="total(this.id);" name="quantity[]" style="width:80px;" required/></td><td> <input type="text" onkeyup="total(this.id);" id="price'+box+'-1" name="unit_price[]" style="width:80px;" required readonly/></td><td> <input type="text" id="currency'+box+'-1" name="" style="width:40px;" readonly/></td><td> <input type="number" id="margin'+box+'-1" name="margin[]" step="0.01" value="20.00" onkeyup="total(this.id);" style="width:60px;" required/></td><td> <input type="hidden" id="price_hidden'+box+'-1" value="" /> <input type="text" id="total_price'+box+'-1" name="total_price[]" style="width:100px;" readonly/></td><td> <select id="remarks'+box+'-1" onchange="remarks(this.id)" class="form-control form-control-sm" name="remark[]" style="width:100px;"><option value="">Select</option><option value="Optional">Optional</option><option value="Refer To Note">Refer To Note</option><option value="Client Supplied Equipment">Client Supplied Equipment</option><option value="Required Additional As Per Spec.">Required Additional As Per Spec.</option><option value="Not In Scope">Not In Scope</option><option value="Included In Above">Included In Above</option> </select></td></tr></tbody><tfoot><tr><td colspan="8" style="text-align:right;">Installation Testing & commisioning</td><td> <select id="service1-'+box+'" onchange="totalb('+box+')" class="form-control form-control-sm" name="re_val['+box+'][]" style="width:100px;"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5" selected>5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option> </select></td><td> <input type="number" value="" step="0.01" id="add_remark1-'+box+'" name="" style="width:100px;" readonly/></td><td> <select id="Aremarks1-'+box+'" onchange="remarks1(this.id)" class="form-control form-control-sm" name="remarks1['+box+'][]" style="width:100px;"><option value="">Select</option><option value="Optional">Optional</option><option value="Not In Scope">Not In Scope</option><option value="Included In Above">Included In Above</option> </select></td></tr><tr><td colspan="8" style="text-align:right;">Cables Connectors & Accessories</td><td> <select id="service2-'+box+'" onchange="totalb('+box+')" class="form-control form-control-sm" name="re_val['+box+'][]" style="width:100px;"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5" selected>5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option> </select></td><td> <input type="number" step="0.01" id="add_remark2-'+box+'" value="" name="['+box+'][]" style="width:100px;" readonly/></td><td> <select id="Aremarks2-'+box+'" onchange="remarks1(this.id)" class="form-control form-control-sm" name="remarks1['+box+'][]" style="width:100px;"><option value="">Select</option><option value="Optional">Optional</option><option value="Not In Scope">Not In Scope</option><option value="Included In Above">Included In Above</option> </select></td></tr><tr><td colspan="8" style="text-align:right;">Programming And Project management</td><td> <select id="service3-'+box+'" onchange="totalb('+box+')" class="form-control form-control-sm" name="re_val['+box+'][]" style="width:100px;"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5" selected>5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option> </select></td><td> <input type="number" step="0.01" id="add_remark3-'+box+'" value="" name="['+box+'][]" style="width:100px;" readonly/></td><td> <select id="Aremarks3-'+box+'" onchange="remarks1(this.id)" class="form-control form-control-sm" name="remarks1['+box+'][]" style="width:100px;"><option value="">Select</option><option value="Optional">Optional</option><option value="Not In Scope">Not In Scope</option><option value="Included In Above">Included In Above</option> </select></td></tr></tfoot><tfoot><tr><td></td><td colspan="2"> <button type="button" class="btn btn-sm btn-primary" onclick="add_row(this.id)" id="add_row'+box+'">Add New Row</button> <button type="button" class="btn btn-sm btn-danger" onclick="remove_row(this.id)" id="remove_row'+box+'">Remove Row</button></td><td colspan="1"> <label for="">Vat in %</label> <input type="number" class="form-control form-control-sm" id="vat'+box+'" step="0.01" name="vat[]" autocomplete="off" spellcheck="false" onkeyup="vatFU(this.id);" placeholder="Vat In %" required></td><td colspan="1"> <label for="">Total Tax Amount</label> <input type="text" class="form-control form-control-sm" id="total_t_amt'+box+'" step="" name="" autocomplete="off" spellcheck="false" placeholder="Total Tax Amount" readonly></td><td colspan="1"> <label for="">Total</label> <input type="text" class="form-control form-control-sm" id="total'+box+'" step="" name="total[]" autocomplete="off" spellcheck="false" placeholder="Total" readonly></td><td colspan="2"> <label for="">Total With Tax</label> <input type="text" class="form-control form-control-sm" id="boxtotal'+box+'" step="" name="" autocomplete="off" spellcheck="false" placeholder="Total With Tax" readonly> <input type="hidden" name="length[]" value="1" id="T_lEngth'+box+'" ></td><td colspan="3"> <label for="">Note</label><textarea type="text" class="form-control form-control-sm" id="note'+box+'" step="" name="note[]" autocomplete="off" spellcheck="false" placeholder="Note"></textarea></td></tr></tfoot></table></div>');
				$('#box_name'+box).val($('#bname').val());
				$('#box_qty'+box).val($('#bqty').val());
				$('#bname').val('');
				$('#bqty').val('');
			}
			else
			{
				alert('Maximum Box Inserted..');
			}
		}
		else
		{
			alert('Please Insert Name And Qty To Add Box..');
		}
	});


	$('#remove_box_button').click(function(e){
		var last_div = $('#last_box').val();
		if(last_div != 1){	
			$('#box'+last_div).remove();
			box--;
			$('#last_box').val(box);
		}
		else
		{
			alert('Minimum One Box Required..');
		}
	});

	$(document).keypress(
		function(event){
			if (event.which == '13') {
				event.preventDefault();
			}
		}
	);

});

function remove_row_func(id)
{
	var num = id.replace("rowremove", "");
	var nbox = num.substring( 0,num.indexOf( "-" ));
	var tr = id.substring( id.length,id.indexOf( "-" ) +1 );
	if($('#table'+nbox+' tbody tr').length != 1){
		$('#'+id).closest('tr').remove();
		total(id);
		return false;
	}
	return false;
}

function remarks(id)
{
	total(id);
}

function remarks1(id)
{
	var num = id.replace("Aremarks", "");
	var nbox = num.substring( 0,num.indexOf( "-" ));
	var tr = id.substring( id.length,id.indexOf( "-" ) +1 );
	
	if($('#'+id).val() == 'Optional')
	{
		$('#add_remark'+nbox+'-'+tr).prop('type', 'text');
		$('#add_remark'+nbox+'-'+tr).val('Optional');
		total('As'+tr+'-1');
	}
	if($('#'+id).val() == 'Not In Scope')
	{
		$('#add_remark'+nbox+'-'+tr).prop('type', 'text');
		$('#add_remark'+nbox+'-'+tr).val(0);
		total('As'+tr+'-1');
	}
	if($('#'+id).val() == 'Blank')
	{
		$('#add_remark'+nbox+'-'+tr).prop('type', 'text');
		$('#add_remark'+nbox+'-'+tr).val('');
		total('As'+tr+'-1');
	}
	if($('#'+id).val() == 'Included In Above')
	{
		$('#add_remark'+nbox+'-'+tr).prop('type', 'text');
		$('#add_remark'+nbox+'-'+tr).val(0);
		total('As'+tr+'-1');
		
	}
	if($('#'+id).val() == '')
	{
		$('#add_remark'+nbox+'-'+tr).prop('type', 'text');
		var per = $('#service'+num).val();
		var gtotal = $('#total'+tr).val();
		var pers = gtotal * per / 100;
		$('#add_remark'+nbox+'-'+tr).val(pers.toFixed(2));
		$('#add_remark'+nbox+'-'+tr).attr("readonly", true);
		total('As'+tr+'-1');
	}
}

function auto(id)
{
	var num = id.replace("model_number", "");
	$( '#'+id ).autocomplete({
			source: base_url+'quotation/product_details',
			select:function(e, ui){
				$(this).val(ui.item.label);
				$(this).attr("readonly", true);
				$('#product_id'+num).val(ui.item.id);
				$('#manufacturer'+num).val(ui.item.Manufacturer);
				$('#manufacturer'+num).attr("readonly", true);
				$('#description'+num).val(ui.item.Description);
				$('#add_disc'+num).val(ui.item.Description);
				$('#description'+num).attr("readonly", true);
				$('#price'+num).val(ui.item.total);
				$('#price_hidden'+num).val(ui.item.total);
				$('#currency'+num).val(ui.item.Currency);
				total(num);
			},
			change: function( event, ui ) {
				if(ui.item==null)
				{
					this.value='';
				}
			}	
		});
		
				$('#model_number'+num).removeAttr('readonly');
				$('#model_number'+num).val('');
				$('#product_id'+num).val('');
				$('#manufacturer'+num).val('');
				$('#price'+num).val('');
				$('#price_hidden'+num).val('');
				$('#currency'+num).val('');
				$('#description'+num).val('');
				$('#add_disc'+num).val('');
				$('#description'+num).removeAttr('readonly');
				total(num);
}


function disc(id)
{
	var num = id.replace("description", "");
	$( '#'+id ).autocomplete({
			source: base_url+'quotation/product_details_desc',
			select:function(e, ui){
				$(this).val(ui.item.label);
				$(this).attr("readonly", true);
				$('#product_id'+num).val(ui.item.id);
				$('#manufacturer'+num).val(ui.item.Manufacturer);
				$('#manufacturer'+num).attr("readonly", true);
				$('#model_number'+num).val(ui.item.mnumber);
				$('#add_disc'+num).val(ui.item.value);
				$('#model_number'+num).attr("readonly", true);
				$('#price_hidden'+num).val(ui.item.total);
				$('#price'+num).val(ui.item.total);
				$('#currency'+num).val(ui.item.Currency);
				$('#currency'+num).attr("readonly", true);
				total(num);
			},
			change: function( event, ui ) {
				if(ui.item==null)
				{
					this.value='';
				}
			}	
		});
		
			$('#description'+num).removeAttr('readonly');
			$('#description'+num).val('');
			$('#product_id'+num).val('');
			$('#add_disc'+num).val('');
			$('#manufacturer'+num).val('');
			$('#price'+num).val('');
			$('#price'+num).removeAttr('readonly');
			$('#price_hidden'+num).val('');
			$('#currency'+num).val('');
			$('#model_number'+num).val('');
			$('#model_number'+num).removeAttr('readonly');
			total(num);
}

function add_row(id)
{
	id = id.replace("add_row", "");
	var table = '#table'+id;
	var last_id = $(table+' tbody tr:last').attr('id');
	last_id = last_id.replace(/[^0-9-]/g,'');
	var last_id = last_id.substring( last_id.length,last_id.indexOf( "-" ) +1 );
	var length = parseInt(last_id) + 1;
	$(table+' tbody').append('<tr id="tr'+id+'-'+length+'"><td>'+id+'.'+length+'<a href="" id="rowremove'+box+'-'+length+'" onclick="return remove_row_func(this.id);">remove</a></td><td> <input type="text" id="model_number'+id+'-'+length+'" onclick="auto(this.id);" name="" autocomplete="off" spellcheck="false" placeholder="Search Here" /> <br><a href="" onclick="pop_up(); return false;">Add Product</a> <input type="hidden" id="product_id'+id+'-'+length+'" name="product_id[]" /></td><td> <input type="text" id="manufacturer'+id+'-'+length+'" name="" style="width:100px;" readonly/></td><td> <input type="text" onclick="disc(this.id);" autocomplete="off" spellcheck="false" id="description'+id+'-'+length+'" name="" placeholder="Search Here" /></td><td><textarea type="text" id="add_disc'+id+'-'+length+'" name="add_disc[]" style="width:100px;"></textarea></td><td> <input type="number" id="quntity'+id+'-'+length+'" step="0.01" onkeyup="total(this.id);" name="quantity[]" style="width:80px;" required/></td><td> <input type="text" id="price'+id+'-'+length+'" onkeyup="total(this.id);" step="" name="unit_price[]" style="width:80px;" required readonly/></td><td> <input type="text" id="currency'+id+'-'+length+'" name="" style="width:40px;" readonly/></td><td> <input type="text" onkeyup="total(this.id);" id="margin'+id+'-'+length+'" name="margin[]" value="20.00" style="width:60px;" required/></td><td> <input type="hidden" id="price_hidden'+id+'-'+length+'" value="" /> <input type="text" id="total_price'+id+'-'+length+'" name="total_price[]" style="width:100px;" readonly/></td><td> <select id="remarks'+id+'-'+length+'" onchange="remarks(this.id)" class="form-control form-control-sm" name="remark[]" style="width:100px;"><option value="">Select</option><option value="Optional">Optional</option><option value="Refer To Note">Refer To Note</option><option value="Client Supplied Equipment">Client Supplied Equipment</option><option value="Required Additional As Per Spec.">Required Additional As Per Spec.</option><option value="Not In Scope">Not In Scope</option><option value="Included In Above">Included In Above</option> </select></td></tr>');
	$('#T_lEngth'+id).val(parseFloat($('#T_lEngth'+id).val()) + 1);
}

function remove_row(id)
{
	id = id.replace("remove_row", "");
	var table = '#table'+id;
	if($(table+' tbody tr').length != 1)
	{
		$(table+' tbody tr').last().remove();
		$('#T_lEngth'+id).val($('#T_lEngth'+id).val() - 1);
	}
}

function totalb(id)
{
	total('service'+id+'-1');
}

function remark_auto(id)
{
	nbox = id;
	var re_id_tr = $('#table'+nbox+' tbody tr:last').attr('id');
	var aa_num = re_id_tr.replace("tr", "");
	var aa_tr = parseFloat(aa_num.substring( aa_num.length,aa_num.indexOf( "-" ) +1 )) + 1;
	box_total = 0;
	for(var t_l_th = 1; t_l_th < aa_tr; t_l_th++)
	{
		if($('#quntity'+nbox+'-'+t_l_th).val() != ''){ var qty = $('#quntity'+nbox+'-'+t_l_th).val(); }else{ var qty = 0; }
		if($('#price_hidden'+nbox+'-'+t_l_th).val() != ''){ var price_hidden = parseFloat($('#price_hidden'+nbox+'-'+t_l_th).val()); }else{ var price_hidden = 0; }
		box_total += price_hidden * qty;
	}
	
	if($('#Aremarks1-'+nbox).val() == '')
	{
		var add_remark1 = box_total * $('#service1-'+nbox).val() / 100;
		$('#add_remark1-'+nbox).val(parseFloat(add_remark1.toFixed(2)));
	}
	if($('#Aremarks2-'+nbox).val() == '')
	{
		var add_remark2 = box_total * $('#service2-'+nbox).val() / 100;
		$('#add_remark2-'+nbox).val(parseFloat(add_remark2.toFixed(2)));
	}
	if($('#Aremarks3-'+nbox).val() == '')
	{
		var add_remark3 = box_total * $('#service3-'+nbox).val() / 100;
		$('#add_remark3-'+nbox).val(parseFloat(add_remark3.toFixed(2)));
	}
}

function total(id)
{	

	var box_total = 0;
 	id = id.replace(/[^0-9-]/g,'');
	var tr = id.substring( id.length,id.indexOf( "-" ) +1 );
	var nbox = id.substring( 0,id.indexOf( "-" ));
		
	var re_id_tr = $('#table'+nbox+' tbody tr:last').attr('id');
	
	var aa_num = re_id_tr.replace("tr", "");
	var aa_tr = parseFloat(aa_num.substring( aa_num.length,aa_num.indexOf( "-" ) +1 )) + 1;
	var per_service = 0;
	if($('#Aremarks1-'+nbox).val() == 'Included In Above')
	{
		per_service += parseFloat($('#service1-'+nbox).val());
	}
	if($('#Aremarks2-'+nbox).val() == 'Included In Above')
	{
		per_service += parseFloat($('#service2-'+nbox).val());
	}
	if($('#Aremarks3-'+nbox).val() == 'Included In Above')
	{
		per_service += parseFloat($('#service3-'+nbox).val());
	}
	
	
	for(var t_l_th = 1; t_l_th < aa_tr; t_l_th++)
	{	
		if($('#quntity'+nbox+'-'+t_l_th).val() != ''){ var qty = $('#quntity'+nbox+'-'+t_l_th).val(); }else{ var qty = 0; }
		if($('#price_hidden'+nbox+'-'+t_l_th).val() != ''){ var price_hidden = $('#price_hidden'+nbox+'-'+t_l_th).val(); }else{ var price_hidden = 0; }
		price_hiddena = parseFloat(price_hidden * per_service / 100); 
		price_ToR = price_hiddena + parseFloat(price_hidden);
		
		if($('#remarks'+nbox+'-'+t_l_th).val() == 'Not In Scope')
		{
			$('#price'+nbox+'-'+t_l_th).val(0);
		}else{
			$('#price'+nbox+'-'+t_l_th).val(price_ToR.toFixed(2));
		}
		
		var g_total = qty * price_ToR;
		if($('#margin'+nbox+'-'+t_l_th).val() != ''){ var margin = parseFloat($('#margin'+nbox+'-'+t_l_th).val()); margin = g_total/((100-margin)/100) - g_total; }else{ var margin = 0; }
		var total = g_total + margin;
		if($('#remarks'+nbox+'-'+t_l_th).val() == 'Not In Scope')
		{
			$('#total_price'+nbox+'-'+t_l_th).val(0);
		}else if($('#remarks'+nbox+'-'+t_l_th).val() == 'Optional')
		{
			$('#total_price'+nbox+'-'+t_l_th).val('Optional');
		}else if($('#remarks'+nbox+'-'+t_l_th).val() == 'Client Supplied Equipment')
		{
			$('#total_price'+nbox+'-'+t_l_th).val(0);
		}else if($('#remarks'+nbox+'-'+t_l_th).val() == 'Included In Above')
		{
			$('#total_price'+nbox+'-'+t_l_th).val('Included In Above');
		}else{
			$('#total_price'+nbox+'-'+t_l_th).val(total.toFixed(2));
		}
	}	
		
	remark_auto(nbox);
		
		
		
		var box_total = parseFloat(0);
		for(var p = 1;p < $('#table'+nbox+' tbody tr').length + 1;p++)
		{
			if($('#total_price'+nbox+'-'+p).val() != '')
			{
				if(!isNaN($('#total_price'+nbox+'-'+p).val()))
				{
					box_total += parseFloat($('#total_price'+nbox+'-'+p).val());
				}
			}
		}
		
		
		
		$('#total'+nbox).val(box_total.toFixed(2));
		T_AMT = 0; vat =0;
		for(var p = 1;p < box + 1;p++)
		{
			if($('#total'+p).val() != '')
			{
				if($('#vat'+p).val() != '')
				{
					vat += parseFloat($('#total'+p).val()) * parseFloat($('#vat'+p).val()) / 100;
				}
			}
			if($('#vat'+nbox).val() != '')
			{
				if($('#total'+nbox).val() != '')
				{
					$('#total_t_amt'+nbox).val(parseFloat($('#total'+nbox).val()) * parseFloat($('#vat'+nbox).val()) / 100);
					$('#boxtotal'+nbox).val(parseFloat($('#total'+nbox).val()) + parseFloat($('#total'+nbox).val()) * parseFloat($('#vat'+nbox).val()) / 100);
				}
			}
			if($('#total'+p).val() != '')
			{
				T_AMT += parseFloat($('#total'+p).val());
			}
		}
		$('#total_vat').val(vat);
		$('#total_value').val(T_AMT);
		$('#with_tax').val(T_AMT + vat);
}

function vatFU(id)
{
	id = id.replace(/[^0-9-]/g,'');
	var vat = parseFloat(0);
	for(var p = 1;p < box + 1;p++)
	{
		if($('#total'+p).val() != '')
		{
			if($('#vat'+p).val() != '')
			{
				vat += parseFloat($('#total'+p).val()) * parseFloat($('#vat'+p).val()) / 100;
			}
		}
	}
	if($('#vat'+id).val() != '')
	{
		if($('#total'+id).val() != '')
		{
			$('#total_t_amt'+id).val(parseFloat($('#total'+id).val()) * parseFloat($('#vat'+id).val()) / 100);
			$('#boxtotal'+id).val(parseFloat($('#total'+id).val()) + parseFloat($('#total'+id).val()) * parseFloat($('#vat'+id).val()) / 100);
		}
	}
	else
	{
		if($('#total'+id).val() != '')
		{
			$('#boxtotal'+id).val(parseFloat($('#total'+id).val()));
		}
		$('#total_t_amt'+id).val('0');
	}
	$('#total_vat').val(vat);
	if($('#total_value').val() !== '')
	{
		amount = parseFloat($('#total_value').val());
	}
	else
	{
		amount = parseFloat(0);
	}
	$('#with_tax').val(amount + vat);
}