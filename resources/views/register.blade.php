@extends('template.mainTemplate')
@section('title','KAPMI Nasional - Register')
@section('content')
<div class="card mx-auto mb-5 login" >
  <div class="card-body">
        <h1 class="text-center">REGISTER USER</h1>
        <form action="#" class="col-12">
            <div class="form-group mb-3">
                <div class="form-row">
                    <div class="col">
                        <label for="first">First Name</label>
                        <input type="text" class="form-control" id="first" name="first">
                    </div>
                    <div class="col">
                        <label for="last">Last Name</label>
                        <input type="text" class="form-control" id="last" name="last">
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="prov">Provinsi Sekolah</label>
                <select name="prov" id="prov" class="form-control">
                    <option value="0">-- Provinsi Sekolah --</option>
                    @foreach($provinsi as $prov)
                        <option value="{{encrypt($prov->id)}}">{{$prov->nm_provinsi}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="wilayah">Wilayah / Kota Sekolah</label>
                <select name="wilayah" id="wilayah" class="form-control" disabled>
                    <option value="0">-- Wilayah / Kota Sekolah --</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="sekolah">Asal Sekolah</label>
                <select name="sekolah" id="sekolah" class="form-control" disabled>
                    <option value="0" selected>-- Asal Sekolah --</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <input type="checkbox" class="form-check-input" id="noschool">
                <label class="form-check-label" for="noschool">sekolahmu tidak ada?</label>
                <label for="nm_sekolah">Masukan nama sekolah mu</label>
                <input type="text" class="form-control" id="nm_sekolah" name="nm_sekolah" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group mb-3">
                <label for="uname">Username</label>
                <input type="text" class="form-control" id="uname" name="uname">
            </div>
            <div class="form-group mb-3">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" name="pass">
            </div>
            <div class="form-group mb-3">
                <label for="repass">Re-type your Password</label>
                <input type="password" class="form-control" id="repass" name="repass">
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success">Register</button>
            </div>
        </form>
  </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#prov').change(function(){
                var wilayah = '';
                var i;
                $.ajax({
                    url:'/getWilayah',
                    method: 'POST',
                    data: {idprov: $('#prov').val()},
                    success: function(data){
                        if(data != 0){
                            $("#wilayah").removeAttr('disabled');
                            //console.log(data.id[0]);
                            for(i=0;i<data.id.length;i++){
                                wilayah+="<option value='"+data.id[i]+"'>"+data.nm_wilayah[i]+"</option>";
                            }
                            $("#wilayah").html(wilayah);
                        }else{
                            wilayah='<option>-- Wilayah / Kota Sekolah --</option>';
                            $("#wilayah").html(wilayah);
                            $("#wilayah").prop('disabled',true);
                        }
                    }
                }); 
            });

            $('#wilayah').change(function(){
                var sekolah = '';
                $.ajax({
                    url:'/getSekolah',
                    method: 'POST',
                    data: {idwil: $('#wilayah').val()},
                    success: function(data){
                        if(data != 0){
                            $("#sekolah").removeAttr('disabled');
                            //console.log(data.id[0]);
                            for(i=0;i<data.id.length;i++){
                                sekolah+="<option value='"+data.id[i]+"'>"+data.nm_sekolah[i]+"</option>";
                            }
                            $("#sekolah").html(sekolah);
                        }else{
                            if (!$('#noschool').is(":checked")){
                                sekolah='<option>-- Asal Sekolah --</option>';
                                $("#sekolah").html(sekolah);
                                $("#sekolah").prop('disabled',true);
                            }
                        }
                    }
                }); 
            });
        });

        $('#noschool').change(function(){
            if ($('#noschool').is(":checked")){               
                $('#nm_sekolah').removeAttr('disabled');
                $('#sekolah').prop('disabled',true);
            }else{
                if($('#sekolah').val()!='0'){
                    $('#sekolah').removeAttr('disabled');
                }
                $('#nm_sekolah').prop('disabled',true);
            }
        });
    </script>
@endsection