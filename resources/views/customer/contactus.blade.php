@extends('layouts.main')
@section('content')
<section class="messages_das_sec con_sec_chg">
    <div class="container">
        <div class="row">
            @include('customer.sidebar')
            <div class="col-md-9 pt-5 pb-5">
                <div class="dashborad_main_sec">
                    <div class="dash_head_sec">
                        <h2>Messages</h2>
                    </div>

                    <div class="dashborad_tab_main">
                        <div class="dash_tab_sec">
                            @foreach($query_inbox as $query_inbo)
                                <div class="containermsg">
                                <span class="name-initial {{$query_inbo->sent_by=='u'?'right':''}}">{{Auth::user()->name[0]}}</span>
                                    <p>{{$query_inbo->message}}</p>
                                    <span class=" {{$query_inbo->sent_by=='u'?'time-right':'time-left'}}">{{date('Y-m-d H:i:s', strtotime($query_inbo->created_at))}}</span>
                                </div>
                            @endforeach
                            <div class="sendmessage">
                                <form method="POST" action="{{route('customer.contactus.submit')}}">
                                    @csrf
                                <input name="message" type="text" class="form-control" />
                                <button>Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('css')
<style type="text/css">
.containermsg {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.containermsg::after {
  content: "";
  clear: both;
  display: table;
}

.containermsg span.name-initial {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.containermsg .right {
  float: right !important;
  margin-left: 20px !important;
  margin-right:0 !important;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.containermsg .name-initial {
    height: 60px;
    width: 60px;
    display: inline-block;
    font-size: 30px;
    text-align: center;
    align-items: center;
    background: #f57c20;
    color: white;
    border-radius: 60px;
    /* margin: 0 auto; */
    vertical-align: middle;
    line-height: 2;
    margin-right: 20px;
}
.sendmessage input{
    display: inline-block;
    width:89%
}
.sendmessage button {
    display: inline-block;
    width:10%;
    padding: .375rem .75rem;
    border: none;
    background: #f57c20;
    color: white;
    font-weight: bolder;
}
</style>
@endsection
@section('js')
<script type="text/javascript">
    (() => {
        /*in page css here*/
    })()
</script>
@endsection