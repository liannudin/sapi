var cookie = Cookies.get('csrf_cookie_sapi');

$(document).on("click","#next-step",function(){
	window.location.assign(base_url);
	$("#tambah-bobot").attr("disable");
});
$(document).on("click","#reset",function(){
	$("#reset").text("Tunggu");
	$("#reset").attr("disable");
	$.ajax({
		url: base_url+"reset",
		data:{csrf_sapi:cookie},
		success:function(){
			window.location.assign(base_url);
		}
	});
	window.location.assign(base_url);
});


$(function(){

$.ajaxSetup({
	type:"post",
	cache:false,
	dataType: "json",
	data:{csrf_sapi:cookie},
})



$("#tambah-data").click(function(){

$("#loader-table").show(); //show loading
$.ajax({
url:base_url+'create',
data:{csrf_sapi:cookie},
success: function(a){
$("#loader-table").hide(); //show loading

var ele="";
ele+="<tr data-id='"+a.id+"'>";
ele+="<td><select data-style='btn-new' class='datac alternatif selectpicker' data-id='"+a.id+"' id='matrik-sapi' name='matriks' onclick='listsapi(this)' onchange='listsapi(this)'><option value='A0'>Alternatif</option><option value='A1'>A1</option><option value='A2'>A2</option><option value='A3'>A3</option><option value='A4'>A4</option></select></td>";
ele+="<td><select data-style='btn-new' class0='selectpicker' class='datac c1' data-id='"+a.id+"'><option value='-'>-</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select></td>";
ele+="<td><select data-style='btn-new' class0='selectpicker' class='datac c2' data-id='"+a.id+"'atriks(this)'><option value='-'>-</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select></td>";
ele+="<td><select data-style='btn-new' class0='selectpicker' class='datac c3' data-id='"+a.id+"'><option value='-'>-</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select></td>";
ele+="<td><select data-style='btn-new' class0='selectpicker' class='datac c4' data-id='"+a.id+"'><option value='-'>-</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select></td>";
ele+="<td><button class='btn btn-xs btn-danger hapus-member' data-id='"+a.id+"'><i class='glyphicon glyphicon-remove'></i> Hapus</button></td>";
ele+="</tr>";

var element=$(ele);
element.hide();
element.prependTo("#table-body-matriks").fadeIn(1500);

}
});
});




$(document).on("click",".hapus-member",function(){
	var id=$(this).attr("data-id");
	swal({
		title:"Hapus Baris",
		text:"Yakin akan menghapus?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Hapus",
		closeOnConfirm: true,
	},
		function(){
			$("#loader-table").show(); //show loading
		 $.ajax({
			url:base_url+"delete",
			data:{csrf_sapi:cookie,id:id},
			success: function(){
				$("#loader-table").hide(); //show loading
				$("tr[data-id='"+id+"']").fadeOut("fast",function(){
					$(this).remove();
				});
			}
		 });
	});
});

$(document).on("click",".hapus-matriks",function(){
	var id=$(this).attr("data-id");
	swal({
		title:"Hapus Baris",
		text:"Yakin akan menghapus?",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Hapus",
		closeOnConfirm: true,
	},
		function(){
			$("#loader-table").show(); //show loading
		 $.ajax({
			url:base_url+"delete",
			data:{csrf_sapi:cookie,id:id},
			success: function(){
				window.location.assign(base_url);
			}
		 });
	});
});

});

$(document).ready(function(){
    $.ajax({
		    type:'POST',
		    url:base_url+'read_inputan',
		    data:{csrf_sapi:cookie},
		    dataType:'JSON',
		    success:function(data){ 
		    	var row=''
		    	for (var i = 0 ; i < data.length ; i++) {
		    	 	row += '<tr>'
		    	 	row += '<td>'+data[i].id_alternatif+'</td>'
		    	 	row += '<td>'+data[i].c1+'</td>'
		    	 	row += '<td>'+data[i].c2+'</td>'
		    	 	row += '<td>'+data[i].c3+'</td>'
		    	 	row += '<td>'+data[i].c4+'</td>'
		    	 	row += '</tr>'
		    	}
		    	$('#matrik_x').show();
		        $('#matrik_x').html('<h3>Matrik X</h3><table id="table-data" class="table table-striped table-bordered"><thead><tr><th>Alternatif</th><th>C1</th><th>C2</th><th>C3</th><th>C4</th></tr></thead><tbody id="table-body">'+row+'</tbody></table>');
		    },
		    error:function(data){
		    	$('#matrik_x').html('<h3>Sorry belum ada data</h3>');
		    }
		});
});

function sapi(idsapi){
	$("#loading").show(); //show loading
	$('#show-tables-matriks').hide();
	$.ajax({
		    type:'POST',
		    url:base_url+'lihat/'+idsapi+'',
		    dataType:'JSON',
		    data:{csrf_sapi:cookie},
		    success:function(data){ 
		    	var row=''
		    	for (var i = 0 ; i < data.length ; i++) {
		    	 	row += '<tr>'
		    	 	row += '<td>'+data[i].berat+'</td>'
		    	 	row += '<td>'+data[i].umur+'</td>'
		    	 	row += '<td>'+data[i].tinggi+'</td>'
		    	 	row += '<td>'+data[i].panjang_tanduk+'</td>'
		    	 	row += '<td>'+data[i].kondisi+'</td>'
		    	 	row += '<td>'+data[i].nilai+'</td>'
		    	 	row += '</tr>'
		    	}
		    	$("#loading").hide(); //show loading
		    	$('#show-tables-matriks').show();
		        $('#show-tables-matriks').html('<h3>Kriteria ' +data[0].jenis_sapi+'</h3><table class="table table-striped table-bordered"><thead><tr><th>Berat(C1)</th><th>Umur(C2)</th><th>Tinggi(C3)</th><th>Panjang Tanduk(C4)</th><th>Kondisi</th>	<th>Nilai</th></tr></thead><tbody>'+row+'</tbody></table>');
		    }
		});
};


function listsapi(e){
$(e).change(function() {
    if ($(this).val() === 'A0'){
    	$('#show-tables-matriks').fadeOut();
    	$('#show-tables-matriks').hide();
    }
    if ($(this).val() === 'A1') {      	
         sapi('A1');
    }if ($(this).val() == 'A2') {
    	sapi('A2');
    }if ($(this).val() == 'A3') {
    	sapi('A3');
    }if ($(this).val() == 'A4') {
    	sapi('A4');
    }
});
}

$(document).on("change",".datac",function(e){

var target=$(e.target);
var value=target.val();
var id=target.attr("data-id");
var data={csrf_sapi:cookie,id:id,value:value};
if(target.is(".c1")){
data.modul="c1";
}else if(target.is(".c2")){
data.modul="c2";
}else if(target.is(".c3")){
data.modul="c3";
}else if(target.is(".c4")){
	data.modul="c4";
}else if(target.is(".alternatif")){
	data.modul="id_alternatif";
}

$.ajax({
	data:data,
	url:base_url+"update",
	success: function(a){

	}

})


});



$(document).on("click","#tambah-bobot",function(){

$("#loader-table-bobot").show(); //show loading
$.ajax({

url:base_url+"inputw",
data:{csrf_sapi:cookie},
success: function(a){
$("#next-step").show();
$("#loader-table-bobot").hide(); //show loading
$("#tambah-bobot").hide(); //hide button add 

var ele="";
ele+="<tr data-id='"+a.id+"'>";
ele+="<td><select data-style='btn-new' class0='selectpicker' class='bobot berat' data-id='"+a.id+"'><option value='-'>-</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select></td>";
ele+="<td><select data-style='btn-new' class0='selectpicker' class='bobot umur' data-id='"+a.id+"'><option value='-'>-</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select></td>";
ele+="<td><select data-style='btn-new' class0='selectpicker' class='bobot tinggi' data-id='"+a.id+"'atriks(this)'><option value='-'>-</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select></td>";
ele+="<td><select data-style='btn-new' class0='selectpicker' class='bobot panjang' data-id='"+a.id+"'><option value='-'>-</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select></td>";
ele+="</tr>";

var element=$(ele);
element.hide();
element.appendTo("#table-body-bobot").fadeIn(1500);

}
});
});

$(document).on("change",".bobot",function(e){

var target=$(e.target);
var value=target.val();
var id=target.attr("data-id");
var data={csrf_sapi:cookie,id:id,value:value};
if(target.is(".berat")){
data.modul="berat";
}else if(target.is(".umur")){
data.modul="umur";
}else if(target.is(".tinggi")){
data.modul="tinggi";
}else if(target.is(".panjang")){
	data.modul="panjang_tanduk";
}

$.ajax({
	data:data,
	url:base_url+'updatew',
	success: function(a){
		
	}

})


});