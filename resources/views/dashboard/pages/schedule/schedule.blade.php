@extends('dashboard.layouts.app')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table_headline">
                <h2 style="text-align:center; color:rgb(7, 66, 54)">পরিদর্শন সময়সূচী</h2>
            </div>
            <div style="" class="container">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_schedule">নতুন পরিদর্শন কার্যক্রম সূচি যুক্ত
                    করুন</button><br><br>
                <div class="mgs"></div>
               
            </div>
            <table id="table"  class="display">
                <thead>
                    <tr>
                        <th>ক্র: নং</th>
                        <th>অফিসের নাম</th>
                        <th>বিভাগ</th>
                        <th>জেলা</th>
                        <th>উপজেলা</th>
                        <th>পরিদর্শক</th>
                        <th>তারিখ</th>
                        <th>সময়</th>
                        <th>প্রক্রিয়া</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($schedule_data as $schedule)
                        <tr>
                            @php 
                            $data_time=explode((' '),date('h:i A', strtotime($schedule->schedule_time )));
                            if($data_time[1] == 'PM'){
                                $modified_am_pm='বিকাল';
                            }
                            else
                            {
                                $modified_am_pm='সকাল';
                            }
                                
                            $time_value=$modified_am_pm.' '.en2bn($data_time[0]);
                            @endphp
                            <td>{{en2bn($loop->index+1)}}</td>
                            <td>{{$schedule->off_id}}</td>
                            <td>{{$schedule->div_id}}</td>
                            <td>{{$schedule->dis_id}}</td>
                            <td>{{$schedule->upa_id}}</td>
                            <td>{{en2bn($schedule->inspector_id)}}</td>
                            <td>{{en2bn($schedule->schedule_date)}}</td>
                            <td>{{$time_value}}</td>
                            <td>{{$schedule->inspector_id}}</td>
                        </tr>
                        @endforeach
                    
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--schedule create Modal -->
<div class="modal fade" id="add_schedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h5 style="color:rgb(45, 36, 54);" class="modal-title" id="exampleModalLabel">পরিদর্শন কার্যক্রম সূচি সংযুক্ত করুন</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" id="add_schedule_form">
                @csrf

                
                <div class="modal-body p- bg-light">
                    <div class="row mb-3">
                        <span style="font-weight: bold;"> পরিদর্শক নির্বাচন করুন 
                            </span><br><br>
                       <div class="row">
                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label">অফিস</label>
                                <select name="office_select" class="form-select office_select" aria-label="Default select example"
                                    id="office_select">
                                    <option value=""> অফিস নির্বাচন করুন </option>
                                    @php
                                        $office_data_new= DB::table('land_office_new')->get();
                                    @endphp
                                    @foreach ($office_data_new as $office)
                                    <option value="{{$office->id}}"> {{$office->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="division_div" style="display:none" class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label">বিভাগ</label>
                                @php
                                    $division_data= DB::table('lmdt_divisions')->get();
                                @endphp
                                <select name="division_select_id" id="division_select_id" class="form-select division_select_id"
                                    aria-label="Default select example">
                                    <option value=""> -- নির্বাচন করুন --</option>
                                    @foreach ($division_data as $division)
                                    <option value="{{$division->div_id}}">{{$division->div_name}}</option>                                    
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label">পদবী</label>
                                <select name="role_new" class="form-select role_new" aria-label="Default select example"
                                    id="role_new">
                                    <option value=""> পদবী নির্বাচন করুন </option>
                                    
                                </select>
                            </div>
                           
                       </div>

                       <div class="row">
                            <div class="col-md-4">
                                <label for="exampleInputEmail1" class="form-label">পরিদর্শক</label>
                                <select name="select_inspector" class="form-select select_inspector"
                                    aria-label="Default select example" id="select_inspector">
                                    <option value=""> পরিদর্শক নির্বাচন করুন </option>



                                </select>
                            </div>
                       </div>
                        
                        
                        
                     
                    </div>

                    <hr><hr>
                    <div class="row mb-3">
                        <span style="font-weight: bold;">পরিদর্শন অফিস নির্বাচন করুন 
                            </span><br><br>
                       
                        <div class="col-md-4">
                            <label for="exampleInputEmail1" class="form-label">বিভাগ</label>
                            @php
                                $division_data= DB::table('lmdt_divisions')->get();
                            @endphp
                            <select name="division_select" id="division_select" class="form-select division_select"
                                aria-label="Default select example">
                                <option value=""> -- নির্বাচন করুন --</option>
                                @foreach ($division_data as $division)
                                <option value="{{$division->div_id}}">{{$division->div_name}}</option>                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputEmail1" class="form-label">জেলা</label>
                            <select name="district" class="form-select district_select"
                                aria-label="Default select example" id="district_select">
                                <option value=""> -- নির্বাচন করুন --</option>

                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputEmail1" class="form-label">উপজেলা</label>
                            <select name="upazila" class="form-select upazila_select"
                                aria-label="Default select example" id="upozila_select">
                                <option value=""> -- নির্বাচন করুন --</option>

                            </select>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="exampleInputEmail1" class="form-label">অফিস</label>
                            <select name="office" class="form-select office_select" aria-label="Default select example"
                                id="office_select">
                                <option value=""> অফিস নির্বাচন করুন </option>

                            </select>
                        </div>
                        
                        <div class="col-md-4 mt-4">
                            <label for="exampleInputEmail1" class="form-label">তারিখ নির্ধারণ করুণ</label>
                            <input type="text" name="schedule_date" class="form-control "
                                placeholder="তারিখ" id="schedule_date">
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="exampleInputEmail1" class="form-label">সময় নির্ধারণ করুণ </label>
                            <input name="schedule_time" type="time" class="form-control" id="schedule_time" >
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="exampleInputEmail1" class="form-label">মন্তব্য </label>
                            <textarea class="form-control" name="scdl_desc" id="scdl_desc" rows="3"></textarea>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="scd_submit_btn" class="btn btn-success">যুক্ত করুন </button>
                </div>
            </form>
        </div>
        
      </div>
    </div>
</div>
@endsection


@section('scripts')
    <script>
        
        $(document).ready(function(){
            $('#table').DataTable({
                order: [[3, 'desc']],
            });

            //designation select by office
            $('.office_select').on('change', function(){
            
            // $('#division_select').prop('selected', false).find('option:first').prop('selected', true);
            // $('.district_select').prop('selected', false).find('option:first').prop('selected', true);
            // $('.office_select_id').prop('selected', false).find('option:first').prop('selected', true);
            // $('.select_inspector').prop('selected', false).find('option:first').prop('selected', true);
            let off_id = $(this).find(":selected").val();
            let csrf = '{{ csrf_token() }}';
                if (off_id==1) {
                    $('#division_div').hide();
                }
                if (off_id==2) {
                    $('#division_div').show();
                }
            $.ajax({
                url: '{{ route('depend.on.office.to.role') }}',
                method: 'post',
                data: JSON.stringify({
                    off_id: off_id,
                    _token: csrf
                }),
                cache: false,
                contentType: 'application/json',
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        $('#role_new').empty();
                        $('#role_new').append(response.html);
                        // $('#select_inspector').select2({
                        //     dropdownParent: $('#add_schedule .modal-content')
                        // });
                    }
                }
            });
            })

            // inspector select from role 
            $('.role_new').on('change', function(){
              let off_id = $('.office_select').find(":selected").val();
              let role_id = $(this).find(":selected").val();
              let div_id = $('#division_select_id').find(":selected").val();
              let csrf = '{{ csrf_token() }}';
              $.ajax({
                  url: '{{ route('depend.on.role.to.inspector') }}',
                  method: 'post',
                  data: JSON.stringify({
                      role_id: role_id,
                      div_id: div_id,
                      off_id: off_id,
                      _token: csrf
                  }),
                  cache: false,
                  contentType: 'application/json',
                  processData: false,
                  dataType: 'json',
                  success: function(response) {
                      if (response.status == 'success') {
                          $('#select_inspector').empty();
                          $('#select_inspector').append(response.ins_html);
                          // $('#select_inspector').select2({
                          //     dropdownParent: $('#add_schedule .modal-content')
                          // });
                      }
                  }
              });
            })

            // role select from div 
            $('.division_select_id').on('change', function(){
              let div_id = $(this).find(":selected").val();
              let csrf = '{{ csrf_token() }}';
              $.ajax({
                url: '{{ route('depend.on.div.to.role') }}',
                method: 'post',
                data: JSON.stringify({
                    div_id: div_id,
                    _token: csrf
                }),
                cache: false,
                contentType: 'application/json',
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        $('#role_new').empty();
                        $('#role_new').append(response.html);
                        // $('#select_inspector').select2({
                        //     dropdownParent: $('#add_schedule .modal-content')
                        // });
                    }
                }
              });
            })

            //division to district and office select
            $('.division_select').on('change', function(){
                // $('#division_select').prop('selected', false).find('option:first').prop('selected', true);
                // $('.district_select').prop('selected', false).find('option:first').prop('selected', true);
                // $('.office_select_id').prop('selected', false).find('option:first').prop('selected', true);
                // $('.select_inspector').prop('selected', false).find('option:first').prop('selected', true);
                let division_id = $(this).find(":selected").val();
                let csrf = '{{ csrf_token() }}';
                $.ajax({
                    url: '{{ route('depend.on.division.to.office') }}',
                    method: 'post',
                    data: JSON.stringify({
                        div_id: division_id,
                        _token: csrf
                    }),
                    cache: false,
                    contentType: 'application/json',
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#district_select').empty();
                            $('#district_select').append(response.dis_html);
                            $('#office_select').empty();
                            $('#office_select').append(response.Off_html);
                            $('#select_inspector').select2({
                                dropdownParent: $('#add_schedule .modal-content')
                            });
                        }
                    }
                });
            })

        });

        search

    </script>
@endsection