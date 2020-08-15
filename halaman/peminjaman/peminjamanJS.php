<script>
    $(document).ready(function(){
        
        $('.pinjam').datepicker({
            onSelect: function(dateText, inst){
                $(".kembali").datepicker('option', 'minDate', dateText);
            },
            dateFormat:"yy-mm-dd",
            minDate:new Date()
        });


        $('.kembali').datepicker({
            dateFormat:"yy-mm-dd",
        });

        $.ajax({
            url:'https://satalesmana.000webhostapp.com/api/member/proses.php',
            data:{mode  :'get'},
            dataType:'json',
            type:'POST',
            success:function(res){
                let option ="";
                for(let i=0; i<res.length; i++){
                    option +="<option value='"+res[i].nim+"'>"+res[i].nama+"</option>"
                }
                $('#peminjam').html(option);
            }
        });

        $.ajax({
            url:'https://satalesmana.000webhostapp.com/api/buku/bukucontroller.php',
            data:{mod:'get'},
            dataType:'json',
            type:'POST',
            success:function(res){
                console.log(res);
                let option ="<option value='0'>--Select Buku--</option>";
                for(let i=0; i<res.length; i++){
                    option +="<option value='"+res[i].id+"'>"+res[i].judul+"</option>"
                }
                $('#buku').html(option);
            }
        });

        var daftar = [];

        $.fn.tampil=function(){
            let html ="";
            for(let i=0; i<daftar.length; i++){
                let no = i+1;
                html += '<tr>';
                html += '<td scope="row">'+no+'</td>';
                html += '<td>'+daftar[i].judul+'</td>';
                html += '<td>'+daftar[i].pengarang+'</td>';
                html += '<td>'+daftar[i].jml+'</td>';
                html += '<td><button type="button" data-id="'+i+'" onclick="$(this).hapus()" class="btn btn-danger">Delete</button></td>';
                html += '</tr>';

            }
            $('#bukuItem').html(html);
        }

        $.fn.hapus = function(){
            let id = $(this).data('id');
            let baru =[];
            
            for(let i=0; i<daftar.length; i++){
                if(i !=id)
                    baru.push(daftar[i])
            }
            daftar = baru;
            $(this).tampil();
        }
		
		$.fn.bersih= function (){
			$('#peminjam').val('');
            $('#tglPinjam').val('');
            $('#tglKembali').val('');
            daftar = [];
			$(this).tampil();
		}
        
        $('#add_item').click(function(){
            let idbuku = $('#buku').val();
            let jml     = $('#jumlah').val();
            $.ajax({
                url:'https://satalesmana.000webhostapp.com/api/buku/bukucontroller.php',
                data:{mod:'getById',id:idbuku},
                dataType:'json',
                type:'POST',
                success:function(res){
                    var item = res[0];
                    item['jml'] = jml;
                    
                    daftar.push(item);

                    $(this).tampil();

                    $('#jumlah').val('')
                    $('#buku').val(0);
                }
            });
        });

        $('#proses_pinjam').click(function(){
            let data = {
                mod       : 'add',
                peminjam  : $('#peminjam').val(),
                tglpinjam : $('#tglPinjam').val(),
                tglkembali: $('#tglKembali').val(),
                detail    : daftar 
            }
            
            $.ajax({
                url:'https://satalesmana.000webhostapp.com/api/peminjaman/peminjamanController.php',
                data:data,
                dataType:'json',
                type:'POST',
				beforeSend:function(){
					$('#proses_pinjam').html("<i class='fa fa-spinner fa-spin'></i> Loading...");
				},
                success:function(res){
					$('#proses_pinjam').html('proses pinjam');
                    let title = (res.status==true)?"Success":"Error";
                    let icon = (res.status==true)?"success":"error";
                    $(this).bersih();
					
					Swal.fire({
                        title: title,
                        text: res.messages,
                        icon: icon,
                        confirmButtonText: 'Ok'
                    });
					
					
                }
            });
        });

    });
    
</script>