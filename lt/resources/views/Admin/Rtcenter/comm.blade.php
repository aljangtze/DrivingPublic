<div class="panel-body">
    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
    <button onclick="window.location ='{{ url("admin/qflist") }}'" class="btn btn-primary">群发消息【{{ $infocount }}】</button>

    <!-- Indicates a successful or positive action -->
    <button onclick="window.location ='{{ url("admin/xyinfo")."/"."2"."/"."0" }}'" class="btn btn-success">学员【{{ $xycount }}】</button>

    <!-- Contextual button for informational alert messages -->
    <button onclick="window.location ='{{ url("admin/xyinfo")."/"."1"."/"."0" }}'" class="btn btn-info">教练【{{ $jlcount }}】</button>

    <!-- Indicates caution should be taken with this action -->
    <button onclick="window.location ='{{ url("admin/xjqf") }}'" class="btn btn-warning">新建群发</button>
    
    <button onclick="window.location='{{ url("admin/txgl") }}'" class="btn btn-primary">申请提现次数【{{ $txcount }}】</button>
</div>