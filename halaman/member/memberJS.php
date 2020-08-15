<script>
    $(document).ready(function(){
        let modeAction='get';

        $.fn.delete = function(){
            modeAction='delete';
            let data = $(this).data('member');
            let _this = $(this).parents("tr");
            $.ajax({
                url:'https://satalesmana.000webhostapp.com/api/member/proses.php',
                dataType:'json',
                type:'POST',
                data:{id:data.id,mode:modeAction},
                success:function(res){
                    
                }
            });
            _this.fadeOut(400,function() {
                _this.remove();
            });
        }

        $.fn.detail=function(){
            let data = $(this).data('member');
            $('#id').val(data.id);
            $('#nim').val(data.nim);
            $('#nama').val(data.nama);
            $('#alamat').val(data.alamat);
            $('#telpon').val(data.telpon);

            $(".table tr").removeClass("selected");
            $(this).addClass("selected");
            
            $('#exampleModal').modal('toggle')
        }

        $.fn.loadData= function(){
            $.ajax({
                url:'https://satalesmana.000webhostapp.com/api/member/proses.php',
                dataType:'json',
                data:{mode:modeAction},
                type:'POST',
                beforeSend:function(){
                },
                success:function(res){
                    let row="";
                    let nomor=1;
                    for(let i=0; i<res.length; i++){
                        let member = JSON.stringify(res[i]);
                        
                        row +="<tr data-member='"+member+"' ondblclick='$(this).detail()' >";
                        row +="<td>"+nomor+"</td>";
                        row +="<td>"+res[i].nim+"</td>";
                        row +="<td>"+res[i].nama+"</td>";
                        row +="<td><button data-member='"+member+"' onclick='$(this).delete()' >Delete</button></td>";
                        row +="</tr>";
                        
                        nomor++
                    }
                    
                    $('#data').html(row)
                }
            });
        }

        $.fn.save= function(){
            let parameter={
                id:$('#id').val(),
                nim:$('#nim').val(),
                nama:$('#nama').val(),
                telpon:$('#telpon').val(),
                alamat:$('#alamat').val(),
                mode:modeAction
            }

            $.ajax({
                url:'https://satalesmana.000webhostapp.com/api/member/proses.php',
                data:parameter,
                type:'POST',
                dataType:'json',
                beforeSend:function(){

                },success:function(res){
                    $('#exampleModal').modal('toggle')

                    Swal.fire({
                        title: 'Success',
                        text: res.messages,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                    
                    modeAction='get';
                    $(this).loadData();
                }
            });
        }

        $.fn.bersih= function(){
            $('#id').val('')
            $('#nim').val('')
            $('#nama').val('')
            $('#telpon').val('')
            $('#alamat').val('')
        }

        $(this).loadData();
        $('#reload').click(function(){
            modeAction='get';
            $(this).loadData();
        });
        
        $('#simpan').click(function(){
            let id = $('#id').val();
            
            if(id !='')
                modeAction='update';
            else
                modeAction='add';

            $(this).save();
        });

        $('#tambah').click(function(){
            $(this).bersih();
            $('#exampleModal').modal('toggle')
        });


        $('#cancel').click(function(){
            $(".table tr").removeClass("selected");
            $( ":input" ).val('');
        });

    });
</script>