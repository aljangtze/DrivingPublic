<div class="coach_box">
    @foreach($cqh as $v)
    <ul>
        <li>
            <a href="{{ url('tel/zzfbdetails')."/".$v->id }}">
                <div class="coach_img">
                    <img src="{{ asset('pic')."/".$v->pic }}" />
                </div>
            </a>
            <div class="drive_xx">
                <p><a href="{{ url('tel/zzfbdetails')."/".$v->id }}">{{ $v->jxname }}</a></p>
                <p style="font-size:1.5rem;color:#f00;font-weight:bold;">￥{{ $v->price }}</p>
                <p>报名数：{{ $cjl[$v->id] }}</p>
                <p class="dhyc_p" style="height:40px;"><span>{{ $v->address }}</span></p>
            </div>
        </li>
    </ul>
    @endforeach
</div>
